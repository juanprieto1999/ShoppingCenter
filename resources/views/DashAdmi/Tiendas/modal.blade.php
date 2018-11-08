<div class="modal fade moda-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$tiend->idEmpresa}}">
	{{Form::Open(array('action'=>array('storeController@destroy',$tiend->idEmpresa),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Cambiar Estado</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				
			</div>
			<div class="modal-body">
				<p>Confirme si desea Cambiar el estado de la tienda.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
			
		</div>
		
	</div>
{{Form::Close()}}
</div>