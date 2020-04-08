@extends('app')
@section('content')

<style>
	.content{
		overflow-x: hidden;
	}
</style>
	<section class="content container-fluid pl-5 ml-4 ml-md-0 pl-md-0">
		<div>
			<h3 class="pt-lg-3" style="color: white">Evolución en principales paises de Sudamérica</h3>
			<h5 class="pl-5 pl-lg-0 pt-lg-3" style="color: white"><i class="fas fa-viruses"></i> Origen de datos: <a href="https://about-corona.net/" class="text-white"><strong><u>https://about-corona.net/</u></strong></a><h5>
		</div>

	      <div class="pt-lg-1 text-white">
	         <?php 
	      		$fecha = $respuestaArg['data']['updated_at'];
	      		$fechaConvertida = date('Y-m-d H:i:s', strtotime($fecha));
	      		$newFechaConvertida = strtotime('-3 hour', strtotime($fechaConvertida));
	      		$fechaActualizacion = date('Y-m-d H:i:s', $newFechaConvertida);
	      	?>
	      	
	      	<p>Última actualización: {{$fechaActualizacion}}</p>
	      </div>

	    <!-- Small boxes (Stat box) -->
        <div class="row ml-4 ml-lg-0 pt-lg-3">
          <div class="col-lg-3 col-12 col-md-6">
            <!-- small box -->
            <div class="small-box" style="background: #4d4c7d">
              <div class="inner text-center">
                <h3 style="color: white; padding-left: 5px">{{($respuestaArg['data']['latest_data']['confirmed']+$respuestaChl['data']['latest_data']['confirmed']+$respuestaUy['data']['latest_data']['confirmed']+$respuestaPy['data']['latest_data']['confirmed']+$respuestaBr['data']['latest_data']['confirmed']+$respuestaPe['data']['latest_data']['confirmed']+$respuestaVe['data']['latest_data']['confirmed'])}}</h3>

                <p style="color: white; padding-left: 5px">Casos totales</p>
              </div>
              <div class="icon">
                <i class="fas fa-head-side-mask d-none d-xl-block" style="font-size: 70px; top: 20px; color: white"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-12 mt-4 mt-md-0 col-md-6">
            <!-- small box -->
            <div class="small-box" style="background:#4d4c7d;">
              <div class="inner text-center">
                <h3 style="color:white; padding-left: 5px">{{($respuestaArg['data']['latest_data']['critical']+$respuestaChl['data']['latest_data']['critical']+$respuestaUy['data']['latest_data']['critical']+$respuestaPy['data']['latest_data']['critical']+$respuestaBr['data']['latest_data']['critical']+$respuestaPe['data']['latest_data']['critical']+$respuestaVe['data']['latest_data']['critical'])}}</h3>

                <p style="color:white; padding-left: 5px">Casos críticos</p>
              </div>
              <div class="icon">
                <i class="fas fa-syringe d-none d-xl-block" style="color: white"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-12 col-md-6 mt-lg-0 mt-4">
            <!-- small box -->
            <div class="small-box" style="background: #4d4c7d">
              <div class="inner text-center">
                <h3 style="color:white; padding-left: 5px">{{($respuestaArg['data']['latest_data']['deaths']+$respuestaChl['data']['latest_data']['deaths']+$respuestaUy['data']['latest_data']['deaths']+$respuestaPy['data']['latest_data']['deaths']+$respuestaBr['data']['latest_data']['deaths']+$respuestaPe['data']['latest_data']['deaths']+$respuestaVe['data']['latest_data']['deaths'])}}</h3>

                <p style="color:white; padding-left: 5px">Total de fallecidos</p>
              </div>
              <div class="icon">
                <i class="fas fa-cross d-none d-xl-block" style="color: white !important"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-12 col-md-6 mt-lg-0 mt-4">
            <!-- small box -->
            <div class="small-box" style="background: #4d4c7d">
              <div class="inner text-center">
                <h3 style="color:white; padding-left: 5px">{{($respuestaArg['data']['latest_data']['recovered']+$respuestaChl['data']['latest_data']['recovered']+$respuestaUy['data']['latest_data']['recovered']+$respuestaPy['data']['latest_data']['recovered']+$respuestaBr['data']['latest_data']['recovered']+$respuestaPe['data']['latest_data']['recovered']+$respuestaVe['data']['latest_data']['recovered'])}}</h3>

                <p style="color:white; padding-left: 5px">Recuperados</p>
              </div>
              <div class="icon">
                <i class="fas fa-house-user d-none d-xl-block" style="color: white"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

		<div class="ml-4 ml-lg-0">
	      <div class="chart-container row ml-lg-1 mt-lg-2 mr-xl-1" style="height: 598px">
	  			<canvas id="myChart"></canvas>
	  	  </div>
		</div>

	</section>
		<!--New timeline-->
		<?php $arr= [];
		      $confFecha = [];
		      $totalFecha = [];
		      $totalMuertes = [];

		      //Chile
		      $arrChl= [];
		      $confFechaChl = [];
		      $totalFechaChl = [];
		      $totalMuertesChl = [];

		      //Uruguay
		      $arrUy= [];
		      $confFechaUy = [];
		      $totalFechaUy = [];
		      $totalMuertesUy = [];

		      //Paraguay
  		      $arrPy= [];
		      $confFechaPy = [];
		      $totalFechaPy = [];
		      $totalMuertesPy = [];

		      //Brasil
	          $arrBr= [];
		      $confFechaBr = [];
		      $totalFechaBr = [];
		      $totalMuertesBr = [];

		      //Peru
		      $arrPe= [];
		      $confFechaPe = [];
		      $totalFechaPe = [];
		      $totalMuertesPe = [];

		      //Venezuela
		      $arrVe= [];
		      $confFechaVe = [];
		      $totalFechaVe = [];
		      $totalMuertesVe = [];

		?>
		@foreach($respuestaArg['data']['timeline'] as $key=>$value)
		  <?php $arr[] .= $value['date']; 
		        $confFecha[] .= $value['new_confirmed'];
		        $totalFecha[] .= $value['confirmed'];
		  ?>
		@endforeach

		@foreach($respuestaChl['data']['timeline'] as $key=>$value)

		  <?php $arrChl[] .= $value['date']; 
		        $confFechaChl[] .= $value['new_confirmed'];
		        $totalFechaChl[] .= $value['confirmed'];
		  ?>
		@endforeach

		@foreach($respuestaUy['data']['timeline'] as $key=>$value)
		  <?php $arrUy[] .= $value['date']; 
		        $confFechaUy[] .= $value['new_confirmed'];
		        $totalFechaUy[] .= $value['confirmed'];
		  ?>
		@endforeach

		@foreach($respuestaPy['data']['timeline'] as $key=>$value)
		  <?php $arrPy[] .= $value['date']; 
		        $confFechaPy[] .= $value['new_confirmed'];
		        $totalFechaPy[] .= $value['confirmed'];
		  ?>
		@endforeach

		@foreach($respuestaBr['data']['timeline'] as $key=>$value)
		  <?php $arrBr[] .= $value['date']; 
		        $confFechaBr[] .= $value['new_confirmed'];
		        $totalFechaBr[] .= $value['confirmed'];
		  ?>
		@endforeach

		@foreach($respuestaPe['data']['timeline'] as $key=>$value)
		  <?php $arrPe[] .= $value['date']; 
		        $confFechaPe[] .= $value['new_confirmed'];
		        $totalFechaPe[] .= $value['confirmed'];
		  ?>
		@endforeach

		@foreach($respuestaVe['data']['timeline'] as $key=>$value)
		  <?php $arrVe[] .= $value['date']; 
		        $confFechaVe[] .= $value['new_confirmed'];
		        $totalFechaVe[] .= $value['confirmed'];
		  ?>
		@endforeach

		<?php $revArr = array_reverse($arr);
		  $fecha = "";
		  foreach ($revArr as $key => $value) {
		    $fecha .= "'".$value."',";
		  }

		  $revFecha = array_reverse($confFecha);
		  $casosPorDia = "";
		  foreach ($revFecha as $key => $value) {
		    $casosPorDia .= "'".$value."',";
		  }

		  $revTotalFecha = array_reverse($totalFecha);
		  $totalCases = "";
		  foreach ($revTotalFecha as $key => $value) {
		    $totalCases .= "'".$value."',";
		  }

		  //Chile
		  $revArrChl = array_reverse($arrChl);
		  $fechaChl = "";
		  foreach ($revArrChl as $key => $value) {
		    $fechaChl .= "'".$value."',";
		  }

		  $revTotalFechaChl = array_reverse($totalFechaChl);
		  $totalCasesChl = "";
		  for ($i=0; $i < 3; $i++) { 
		  	$totalCasesChl .= "0,";
		  }
		  foreach ($revTotalFechaChl as $key => $value) {
		    $totalCasesChl .= "'".$value."',";
		  }

		  //Uruguay
		  $revArrUy = array_reverse($arrUy);
		  $fechaUy = "";
		  foreach ($revArrUy as $key => $value) {
		    $fechaUy .= "'".$value."',";
		  }

		  $revTotalFechaUy = array_reverse($totalFechaUy);
		  $totalCasesUy = "";
		  for ($i=0; $i < 9; $i++) { 
		  	$totalCasesUy .= "0,";
		  }
		  foreach ($revTotalFechaUy as $key => $value) {
		    $totalCasesUy .= "'".$value."',";
		  }

		  //Paraguay
  		  $revArrPy = array_reverse($arrPy);
		  $fechaPy = "";
		  foreach ($revArrPy as $key => $value) {
		    $fechaPy .= "'".$value."',";
		  }

		  $revTotalFechaPy = array_reverse($totalFechaPy);
		  $totalCasesPy = "";
		  for ($i=0; $i < 8; $i++) { 
		  	$totalCasesPy .= "0,";
		  }
		  foreach ($revTotalFechaPy as $key => $value) {
		    $totalCasesPy .= "'".$value."',";
		  }

		  //Brazil
		  $revArrBr = array_reverse($arrBr);
		  $fechaBr = "";
		  foreach ($revArrBr as $key => $value) {
		    $fechaBr .= "'".$value."',";
		  }

		  $revTotalFechaBr = array_reverse($totalFechaBr);
		  $totalCasesBr = "";

		  foreach ($revTotalFechaBr as $key => $value) {
		    $totalCasesBr .= "'".$value."',";
		  }

		  //Peru
		  $revArrPe = array_reverse($arrPe);
		  $fechaPe = "";
		  foreach ($revArrPe as $key => $value) {
		    $fechaPe .= "'".$value."',";
		  }

		  $revTotalFechaPe = array_reverse($totalFechaPe);
		  $totalCasesPe = "0,";

		  foreach ($revTotalFechaPe as $key => $value) {
		    $totalCasesPe .= "'".$value."',";
		  }

		  //Venezuela
		  $revArrVe = array_reverse($arrVe);
		  $fechaVe = "";
		  foreach ($revArrVe as $key => $value) {
		    $fechaVe .= "'".$value."',";
		  }

		  $revTotalFechaVe = array_reverse($totalFechaVe);
		  $totalCasesVe = "0,0,0,0,0,0,0,0,0,";

		  foreach ($revTotalFechaVe as $key => $value) {
		    $totalCasesVe .= "'".$value."',";
		  }
		?>

		{{-- Ver que fecha de referencia tomar --}}

	</div>


	<script>
	var ctx = document.getElementById('myChart').getContext('2d');
	var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: [<?php echo $fecha?>],
        datasets: [
        {
        label: 'Argentina',
            backgroundColor: 'rgba(130,197,212,.5)',
            fill: false,
            borderColor: 'rgba(130,197,212,.5)',
            data: [<?php echo $totalCases?>]	
        },
        {
        label: 'Chile',
        	fill: false,
            borderColor: '#EFB805',
            backgroundColor: '#EFB805',
            data: [<?php echo $totalCasesChl?>]	
        },
        {
        label: 'Uruguay',
        	fill: false,
            borderColor: '#9A1936',
            backgroundColor: '#9A1936',
            data: [<?php echo $totalCasesUy?>]	
        },
        {
        label: 'Paraguay',
        	fill: false,
            borderColor: '#A2C540',
            backgroundColor: '#A2C540',
            data: [<?php echo $totalCasesPy?>]	
        },
        {
        label: 'Brasil',
        	fill: false,
            borderColor: '#FF0060',
            backgroundColor: '#FF0060',
            data: [<?php echo substr($totalCasesBr,12)?>]	
        },
        {
        label: 'Peru',
        	fill: false,
            borderColor: '#0074D9',
            backgroundColor: '#0074D9',
            data: [<?php echo $totalCasesPe?>]	
        },
        {
        label: 'Venezuela',
        	fill: false,
            borderColor: '#F7D7C7',
            backgroundColor: '#F7D7C7',
            data: [<?php echo $totalCasesVe?>]	
        }]
    },

    // Configuration options go here
    options: {
      "responsive":true, 
      "maintainAspectRatio":false,
      legend: {
        labels:{
          "fontColor":"white"
        }
      },
      scales:{
        yAxes:[{
          ticks: {
            fontColor: "white"
          }
        }],
        xAxes:[{
          ticks:{
            fontColor: "white"
          }
        }]
      },
      title: {
            "display": true,
            "text": "Historial de casos por fecha.",
            "fontColor": "#FFFFFF",
            "fontSize": 24
        }
      }
});
</script>

@endsection