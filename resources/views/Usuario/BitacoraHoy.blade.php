<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>
    <!-- Bootstrap Styles-->
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="{{asset('assets/js/morris/morris-0.4.3.min.css')}}" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="{{asset('assets/css/custom-styles.css')}}" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{asset('assets/js/Lightweight-Chart/cssCharts.css')}}"> 
</head>

<body>
  <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand"><strong> Bitácoras C&C</strong></a>
				
            </div>

            <ul class="nav navbar-top-links navbar-right">             
              <li><a href="/"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión</a></li>
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                <li>
                    <a  href="/Usuario"></i> Inicio</a>
                  </li>
                  <li>
                    <a href="/Usuario.bitacoras"> Bitácoras personales</a>
                  </li>
                  <li>
                    <a href="/Usuario.hoy"> Bitácora de hoy</a>
                  </li>
                  </ul>
            </div>

        </nav>
        <div id="page-wrapper">
        <div class="header"> 
            <h1 class="page-header">
              <strong>Bitácora de hoy</strong>
            </h1>				    			
        </div>
        <div id="page-inner">			
            <form @if(!isset($editar)) action="/Usuario.hoy"  method="POST"@endif @if(isset($editar)) action="{{url('/Usuario.hoy/'.$editar->ID_Entrada)}}"  method="post"@endif>
              @csrf
              @if(isset($editar))
                {{method_field('PATCH')}}
              @endif
              <label>
              <b>Nombre de la actividad</b>
                <input required type="text" name="nombre" @if(isset($editar)) value="{{$editar->Nombre_actividad}}" @endif>
              </label>
              <label>
              <b>Descripción de la actividad</b>
                <input required name="descripcion" @if(isset($editar)) value="{{$editar->Descripcion_actividad}}" @endif></textarea>
              </label>
              <label>
                <b>Hora de inicio</b>
                <input required type="time" name="hora"@if(isset($editar)) value="{{$editar->Hora}}" @endif>
              </label>
              <label>
              <b>Frecuencia</b>
                <select name="frecuencia">
                  <option value="Nunca">Nunca</option> 
                  <option value="Poco frecuente">Poco frecuente</option> 
                  <option value="Frecuente">Frecuente</option>
                  <option value="Siempre">Siempre</option> 
                </select>
              </label>
              <br>
              <button type="submit">@if(!isset($editar)) Ingresar entrada @endif @if(isset($editar)) Editar entrada @endif</button>
            </form>
            <br>
            @if(isset($entradas))
            <div class="container">
              <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <td>Hora de inicio</td>
                        <td>Frecuencia</td>
                        <td>Nombre actividad</td>
                        <td>Descripción</td>
                        <td>Acciones</td>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($entradas as $entrada)
                        <tr>
                          <td>{{$entrada->Hora}}</td>
                          <td>{{$entrada->Frecuencia}}</td>
                          <td>{{$entrada->Nombre_actividad}}</td>
                          <td >{{$entrada->Descripcion_actividad}}</td>
                          <td>
                            
                          <form action="{{url('/Usuario.hoy/'.$entrada->ID_Entrada)}}" method="POST">
                            @csrf
                            {{method_field('GET')}}
                            <button type="submit">Editar</button> 
                          </form>
       
                          <form action="{{url('/Usuario.hoy/'.$entrada->ID_Entrada)}}" method="POST">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit" onclick="return confirm('¿estás seguro?')">Eliminar</button>
                          </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>           
              </div>
            </div>
            @endif
        </div>
    </div>
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
	 
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
	
	
	<script src="assets/js/easypiechart.js"></script>
	<script src="assets/js/easypiechart-data.js"></script>
	
	 <script src="assets/js/Lightweight-Chart/jquery.chart.js"></script>
	
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>

      
    <!-- Chart Js -->
    <script type="text/javascript" src="assets/js/Chart.min.js"></script>  
    <script type="text/javascript" src="assets/js/chartjs.js"></script> 

</body>
</html>