@extends('layouts.encabezado')
@section('content')
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


        <style>
           body {
               background-image: url(/imagenes/t4.jpg);
               background-size:100%,100%;
               background-repeat: no-repeat;
            }
            .contenido{
                border-style: solid;
                width:100%;
                height:100px;
                margin:8px; 
                background-color: white;
                
     }

            
        </style>
    </head>
    <body>
       <div class="contenido">
       

       </div>

        
    </body>
</html>
@endsection