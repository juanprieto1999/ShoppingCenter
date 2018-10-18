@extends ('layouts.DashboardAdmin')
@section ('contenido')
 <div class="row">
        
         <div class="col-md-4">
              <div  class="text-center" style="background-color: white;">
                <h3>Tiendas</h3>
          <h4>{{ $ntiendas }}</h4>

              </div>
              
            </div>

            <div class="col-md-4">
              <div  class="text-center" style="background-color: white;">
                <h3>Usuarios</h3>
          <h4>{{ $nusuarios }}</h4>

              </div>
              
            </div>
            <div class="col-md-4">
              <div  class="text-center" style="background-color: white;">
                <h3>Pedidos Hoy</h3>
          <h4>0</h4>

              </div>
              
            </div>
          </div>


          <div class="row">
            <div class="col-md-6">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Ingresos</h3>
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
                  <h3 class="box-title">Tiendas</h3>
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
                  <h3 class="box-title">Estadisticas</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                 <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                              <!--Contenido-->
                              @yield('pedidos')
                              <!--Fin Contenido-->
                           </div>
                        </div>
      
                      </div>  
  </div>
    </div>

         


@endsection