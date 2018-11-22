@extends ('layouts.DashboardStore')
@section ('contenido')
 <div class="row">
  			
  			 <div class="col-md-4">
          		<div  class="text-center" style="background-color: white;">
          			<h3>Pedidos</h3>
					<h4>0</h4>

          		</div>
          		
          	</div>

          	<div class="col-md-4">
          		<div  class="text-center" style="background-color: white;">
          			<h3>Ventas</h3>
					<h4>0</h4>

          		</div>
          		
          	</div>
          	<div class="col-md-4">
          		<div  class="text-center" style="background-color: white;">
          			<h3>Visitas a la pagina</h3>
					<h4>0</h4>

          		</div>
          		
          	</div>
          </div>


          <div class="row">
            <div class="col-md-6">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Mis Clientes</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                              <!--Contenido-->
                              @yield('clientes')
                              <!--Fin Contenido-->
                           </div>
                        </div>
                        
                      </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
            
               
            <div class="col-md-6">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Ventas</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                              <!--Contenido-->
                              @yield('ventas')
                              <!--Fin Contenido-->
                           </div>
                        </div>
                        
                      </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div>
		<div class="row">
			<div class="box">
		 		<div class="box-header with-border">
                  <h3 class="box-title">Pedidos</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                 <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                              <!--Contenido-->
                              @include('DashStore/sale')
                              <!--Fin Contenido-->
                           </div>
                        </div>
    	
                  </div> 	
	</div>
		</div>
@endsection