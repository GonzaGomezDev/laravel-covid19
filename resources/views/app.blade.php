<!DOCTYPE html>
<html>
<head>
	<title>Covid19 - Gonzalo Gomez</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#605CA8">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#605CA8">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#605CA8">

	<link rel="icon" type="image/png" href="{{asset('img/icono_negro_2.png')}}">
	
	{{-- CSS --}}

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- Style -->
	<link rel="stylesheet" href="{{asset('css/style.css')}}">

	<!-- FontAwesome -->
	<link rel="stylesheet" href="{{asset('css/fontawesome-free/css/all.css')}}">

	{{-- DataTable --}}
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">


	<!-- Ionicons -->
  	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  	{{-- Fonts --}}
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">

	{{-- Leaflet --}}
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>


  	{{-- JS --}}

	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	{{-- PopperJS --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

	<!-- Bootstrap JS -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<!-- ChartJS -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

	{{-- DataTable --}}
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>


	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-dark">

    <!--Main Navigation-->
	<header>
		<div class="col-12 navbar-dark pl-0" style="background:#212121 !important">
			<div class="row">
					<div class="col-3 col-md-1 d-block d-lg-none">
						 <li class="nav-item dropdown" style="top: 20px; list-style-type: none">
					        <a class=" text-white fas fa-bars nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					        </a>
					        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
					        	<div class="wrapper d-flex align-items-stretch">
					                <ul class="list-unstyled components wrapper">
							          <li class="active" style="background:#4D4C7D">
							            <a href="{{action('CovidController@index')}}" class="text-white"><span class="fa fa-home mr-3"></span> Inicio</a>
							          </li>
							          <li>
							          	<a href="{{action('CovidController@statistics')}}" class="text-white"><span class="fas fa-chart-bar mr-1"></span> Estadisticas</a>
							          </li>
							          <li>
							          	<a href="{{action('CovidController@global')}}" class="text-white"><span class="fas fa-globe mr-3"></span> Global</a>
							          </li>
							        </ul>
							    </div>
					        </div>
					     </li>
					</div>

					<div class="col-9 col-md-4 col-lg-12">
						<nav class="navbar navbar-expand-lg ml-3 ml-sm-0 ml-md-0 ml-lg-0 ml-xl-0">
				 			<a class="navbar-brand" href="#"><i class="fas fa-virus"></i> Estadisticas COVID-19.</a>
						</nav>
					</div>


				</div>
			</div>
	</header>

	<!-- Document body -->
	<div class="wrapper d-flex align-items-stretch">

	 <!-- Sidebar -->
       	<nav id="sidebar">
				<div class="custom-menu">
        		</div>

        <ul class="list-unstyled components mb-5">
          <li class="active" style="background:#4D4C7D">
            <a href="{{action('CovidController@index')}}"><span class="fa fa-home mr-3"></span> Inicio</a>
          </li>
          <li>
          	<a href="{{action('CovidController@statistics')}}" class="text-white"><span class="fas fa-chart-bar mr-1"></span> Estadisticas</a>
          </li>
          <li>
          	<a href="{{action('CovidController@global')}}" class="text-white"><span class="fas fa-globe mr-3"></span> Global</a>
          </li>
        </ul>
    	</nav>

    	<!--Contenido-->
    	<div class="container-fluid">
    		@yield('content')
    	</div>


<!-- Footer -->
<footer style="background:#212121 !important">

  <!-- Copyright -->
  <div class="footer-copyright text-center text-white py-3">© 2020
    Gonzalo Ivan Gomez. Contacto: <a href="mailto:gonzaloholzmeister&#064;gmail.com">gonzaloholzmeister&#064;gmail.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

</body>
	
</html>
