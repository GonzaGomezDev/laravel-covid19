	<!-- Contenido -->
		<section class="content">	
			<div>
				<h4 class="pt-3" style="color: white">Estadísticas - Argentina</h4>
			</div>

		<!-- Small boxes (Stat box) -->
        <div class="row pt-3">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 style="color: white; padding-left: 5px">{{$respuesta->cases}}</h3>

                <p style="color: white; padding-left: 5px">Total de casos</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag" style="font-size: 70px; top: 20px"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 style="color:white; padding-left: 5px">{{$respuesta->todayCases}}</h3>

                <p style="color:white; padding-left: 5px">Casos de hoy</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 style="color:white; padding-left: 5px">{{$respuesta->deaths}}</h3>

                <p style="color:white; padding-left: 5px">Total de muertes</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 style="color:white; padding-left: 5px">{{$respuesta->todayDeaths}}</h3>

                <p style="color:white; padding-left: 5px">Muertes de hoy</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <!-- Small boxes 2 (Stat box) -->
        <div class="row pt-3">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 style="color: white; padding-left: 5px">{{$respuesta->recovered}}</h3>

                <p style="color: white; padding-left: 5px">Casos recuperados</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag" style="font-size: 70px; top: 20px"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 style="color:white; padding-left: 5px">{{$respuesta->active}}</h3>

                <p style="color:white; padding-left: 5px">Casos activos</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 style="color:white; padding-left: 5px">{{$respuesta->critical}}</h3>

                <p style="color:white; padding-left: 5px">Casos críticos</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 style="color:white; padding-left: 5px">{{$respuesta->casesPerOneMillion}}</h3>

                <p style="color:white; padding-left: 5px">Casos por millón</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
      </div>
	  <!-- ./Row -->

	  <!-- Timeline -->
	  <div class="chart-container row ml-1 mt-2" style="height: 250px">
	  	<canvas id="myChart"></canvas>
	  </div>

		<div class="row">
			
			<?php $indice = NULL;
				  $val = NULL; 
				  $total = NULL;
		    ?>

			@foreach($timeline->timelineitems as $key)
				@foreach($key as $ind => $value)
					<?php $indice .= $ind."','"?>
					<?php $arr = (array)$value; 

				    $output = array_slice($arr, 0, 1);
					foreach ($output as $key => $value) {
							$val .= $value."','";
						}

					$casosTotales = array_slice($arr,2,1);
					foreach ($casosTotales as $key => $value) {
							$total .= $value."','";
						}
					?>
				@endforeach
			@endforeach
			<?php $indice = substr($indice,0,-7); 
				  $indice .= "'"; 
			 	  $val .= substr($val,0,-5);
				  $val .= "'";
				  $total .= "ok,";
				  $total .= substr($total,0,-3);
				  $total .= "'"; ?>	
			
		</div>
	</section>
</div>



<script>
	var ctx = document.getElementById('myChart').getContext('2d');
	var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: [<?php echo "'".$indice?>],
        datasets: [{
            label: 'Nuevos casos por fecha',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [<?php echo "'".$val?>]
        },
        {
        label: 'Casos totales por fecha',
            backgroundColor: 'rgba(255, 66, 51,.4)',
            borderColor: 'rgba(255, 66, 51,.4)',
            data: [<?php echo "'".$total?>]	
        }]
    },

    // Configuration options go here
    options: {"responsive":true, "maintainAspectRatio":false}
});
</script>
