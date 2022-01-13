<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css"> 
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
              <strong>Tus bitácoras</strong>
            </h1>				    			
        </div>
        <div id="page-inner">			
        @if(isset($bitacoras))
        <br>
            <div class="container">
              <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <td>Fecha</td>
                        <td>Acciones</td>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($bitacoras as $bitacora)
                        <tr>
                          <td>{{$bitacora->Fecha}}</td>
                          <td>
                            
                          <form action="{{url('/Usuario.bitacoras/'.$bitacora->ID_Bitacora)}}" method="POST">
                            @csrf
                            {{method_field('GET')}}
                            <button type="submit">Ver</button> 
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