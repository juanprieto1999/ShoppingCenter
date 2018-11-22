<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use App\Models\venta;
use App\Models\detalleventa;


class PaypalController extends Controller
{
   private $_api_context;
	public function __construct()
	{
		// setup PayPal api context
		$paypal_conf = \Config::get('paypal');
		$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
		$this->_api_context->setConfig($paypal_conf['settings']);
	}

	public function postPayment(){
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');
		$items = array(); 
		$subtotal = 0;
		$cart = \Session::get('cart'); //obtener datos del carrito
		$currency = 'MXN'; //Moneda

		foreach($cart as $producto){
			$item = new Item();
			$item->setName($producto->Nombre)
			->setCurrency($currency)
			->setDescription($producto->Descripcion)
			->setQuantity($producto->cantidad)
			->setPrice($producto->Valor);
			$items[] = $item;
			$subtotal += $producto->cantidad * $producto->Valor;
	}

		$item_list = new ItemList(); //Objeto qque tiene items del carrito
		$item_list->setItems($items);

		//Costo por el envio
		$details = new Details();
		$details->setSubtotal($subtotal)
		->setShipping(100); //costo

		$total = $subtotal + 100;
		$amount = new Amount();
		$amount->setCurrency($currency)
			->setTotal($total)
			->setDetails($details);


		$transaction = new Transaction();
		$transaction->setAmount($amount) //Toal a pagar, costo de envio, Moneda
			->setItemList($item_list)
			->setDescription('Pedido de prueba en mi Shopping Center');

//Redirije a la url
		$redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl(\URL::route('payment.status'))
			->setCancelUrl(\URL::route('payment.status'));

//Se realizar el pago
		$payment = new Payment();
		$payment->setIntent('Sale') //Tipo de pago
			->setPayer($payer) //objeto
			->setRedirectUrls($redirect_urls) //urls
			->setTransactions(array($transaction));	 //Transaccion

//Conexion de la api, para ver si esta bien.
		try {
			$payment->create($this->_api_context);
		} catch (\PayPal\Exception\PPConnectionException $ex) {
			if (\Config::get('app.debug')) {
				echo "Exception: " . $ex->getMessage() . PHP_EOL;
				$err_data = json_decode($ex->getData(), true);
				exit;
			} else {
				die('Ups! Algo salió mal');
			}
		}

		//Paypal devuelve una respuesta
		foreach($payment->getLinks() as $link) {
			if($link->getRel() == 'approval_url') {
				$redirect_url = $link->getHref(); //Redirecciona al usuario a paypal
				break;
			}
		}

		// add payment ID to session
		\Session::put('paypal_payment_id', $payment->getId());
		if(isset($redirect_url)) {
			// redirect to paypal
			return \Redirect::away($redirect_url); //redirecciona al usuario a paypal
		}
		return \Redirect::route('cart-show')
			->with('error', 'Ups! Error desconocido.'); //Mensaje si salio algo mal

}
//Paypal Da Una Respuesta
public function getPaymentStatus()
	{


		// Get the payment ID before session clear
		$payment_id = \Session::get('paypal_payment_id'); //otener variable de sesion
		// clear the session payment ID
		\Session::forget('paypal_payment_id');


		$payerId = \Input::get('PayerID'); //Paypal Id
		$token = \Input::get('token');
		//if (empty(\Input::get('PayerID')) || empty(\Input::get('token'))) {
		if (empty($payerId) || empty($token)) {
			return \Redirect::route('cart-show')
				->with('message', 'Hubo un problema al intentar pagar con Paypal');
		}

		$payment = Payment::get($payment_id, $this->_api_context);
		// PaymentExecution object includes information necessary 
		// to execute a PayPal account payment. 
		// The payer_id is added to the request query parameters
		// when the user is redirected from paypal back to your site
		$execution = new PaymentExecution();
		$execution->setPayerId(\Input::get('PayerID'));
		//Execute the payment
		$result = $payment->execute($execution, $this->_api_context);
		//echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later
		if ($result->getState() == 'approved') { // payment made
			// Registrar el pedido --- ok
			// Registrar el Detalle del pedido  --- ok
			// Eliminar carrito 
			// Enviar correo a user
			// Enviar correo a admin
			// Redireccionar
			$this->saveOrder();
			\Session::forget('cart');

			return \Redirect::to('/')
				->with('message', 'Compra realizada de forma correcta');
		}
		return \Redirect::to('/')
			->with('message', 'La compra fue cancelada');
	}

	protected function saveOrder(){
		$subtotal = 0;
		$cart=\Session::get('cart');
		$envio=100;
		foreach ($cart as $producto) {
			$subtotal += $producto->cantidad * $producto->Valor;
		}

		$venta = venta::create([
		'Total_Venta' => $subtotal,
		'Envio'=>$envio,
		'idUsuario'=> \Auth::user()->id,
		]);
		foreach ($cart as $producto) {
			$this->saveOrderItem($producto, $venta->idVenta);
		}


	}



	

	protected function saveOrderItem($producto, $idVenta){
detalleventa::create([
'idVenta'=> $idVenta,
'idArticulo'=> $producto->idArticulo,
'Precio' => $producto->Valor,
'Cantidad' => $producto->cantidad,
'Estado' => 'Pendiente'
]);

	}


}