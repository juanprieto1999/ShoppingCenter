<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DashBoard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
 <link rel="stylesheet" href="{{asset('css/dashstore.css')}}">
  </head>


<body class="hold-transition skin-green sidebar-mini">


      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>S</b>C</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Shopping Center</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->         
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
               <li id="irtienda">
              <a href="{{ url('store/'.Auth::user()->idempresa)}}">
                <span>Ir a la tienda</span>
      </a>
      
              </li>
              <li class="dropdown user user-menu">
              <h3>Bienvenido! {{ Auth::user()->name }}</h3>

              </li>

              <li>
             <a href="{{ route('logout') }}"
         onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
         <span class="glyphicon glyphicon-off"></span>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>  </li>

              </ul>
 
            </div>

              </nav>

      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            
            <li class="imagenperfil">
            	<img class="img-responsive img-rounded" src="{{ asset('Imagenes/bebida1.jpg') }} "></img>
            </li>
            <li class="namestore">
            	<p class="text-center ">{{Auth::user()->email}}</p>
            </li>


            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Mi Tienda</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('/dash/articulos') }}"><i class="fa fa-circle-o"></i> Articulos</a></li>
                <li><a href="categoria"><i class="fa fa-circle-o"></i>Categorias</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Pedidos</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="compras/ingreso"><i class="fa fa-circle-o"></i> Ingresos</a></li>
                <li><a href="compras/proveedor"><i class="fa fa-circle-o"></i> Proveedores</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Ventas</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="ventas/venta"><i class="fa fa-circle-o"></i> Ventas</a></li>
                <li><a href="ventas/cliente"><i class="fa fa-circle-o"></i> Clientes</a></li>
              </ul>
            </li>
                       
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                
              </ul>
            </li>
             <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Soporte</span>
                <small class="label pull-right bg-red">Soporte</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
               
              </a>
            </li>
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
         @yield('contenido')

              <!-- /.box -->
        </section><!-- /.content -->




      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2018 <a href="www..com">ShoppingCenter</a>.</strong> All rights reserved.
      </footer>

      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    
  </body>
</html>