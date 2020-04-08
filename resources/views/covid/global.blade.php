@extends('app')
@section('content')

<style>
	.content{
		overflow-x: hidden;
	}
</style>

	{{-- Content --}}
	<section class="content">
		<div>
			<h3 class="pl-5 pl-lg-0 pt-lg-3" style="color: white">Tabla de datos global</h3>
		    <h5 class="pl-5 pl-lg-0 pt-lg-3" style="color: white"><i class="fas fa-viruses"></i> Origen de datos: <a href="https://about-corona.net/" class="text-white"><strong><u>https://about-corona.net/</u></strong></a><h5>
		</div>

	      <div class="pl-5 pl-lg-0 pt-lg-1 text-white">

	      	<?php 
	      		$fecha = $respuestaArg['data']['updated_at'];
	      		$fechaConvertida = date('Y-m-d H:i:s', strtotime($fecha));
	      		$newFechaConvertida = strtotime('-3 hour', strtotime($fechaConvertida));
	      		$fechaActualizacion = date('Y-m-d H:i:s', $newFechaConvertida);
	      	?>
	      	
	      	<p>Última actualización: {{$fechaActualizacion}}</p>
	      </div>

		<div>
			
			{{-- Contenido del sitio --}}
			<div class="container-fluid mb-4 ml-4 ml-md-4 ml-lg-0 mt-2 bg-white p-3">
			  <table class="table text-center table-bordered cell-border table-striped responsive nowrap tablaGlobal text-center" id="tablaGlobal">		         
		        <thead> 
			         <tr> 
			           <th>Pais</th>
			           <th style="width: 75px">Confirmados</th>
			           <th>Fallecidos</th>
			           <th>Recuperados</th>
			           <th>Graves</th>
			           <th>Detalle</th>
			         </tr> 
		        </thead>

		        <tbody>
		        	
		        	@foreach($respuesta['data'] as $key=>$value)
					
						<tr>
							<td><img src="https://www.countryflags.io/<?php echo $value['code']?>/shiny/32.png"> {{$value['name']}}</td>
							<td>{{$value['latest_data']['confirmed']}}</td>
							<td class="text-danger">{{$value['latest_data']['deaths']}}</td>
							<td class="text-primary">{{$value['latest_data']['recovered']}}</td>
							<td class="text-muted">{{$value['latest_data']['critical']}}</td>
							<td><button type="button" data-toggle="modal" data-target="#modalPais" class="btn btn-success btnInfo" codigo="{{$value['code']}}"><i class="fas fa-chart-bar"></i>Mas info</button></td>
						</tr>
					
		        	@endforeach

		        </tbody>	          
		      </table>
		 	 </div>
		</div>

{{-- Modal pais --}}

<div class="modal fade" id="modalPais" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
    	<div class="preloader">
    	</div>
      <div class="modal-header">
      	<div class="modal-title">
	        <h5 id="pais"></h5>
	        <p id="poblacion"></p>
    	</div>
      </div>
      <div class="modal-body">
        <div>
       <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box" style="background: #4d4c7d">
              <div class="inner text-center">
                <h3 style="color: white; padding-left: 5px" id="porcentajeMuertes">0</h3>

                <p style="color: white; padding-left: 5px">de muertes</p>
              </div>
              <div class="icon">
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box" style="background:#4d4c7d;">
              <div class="inner text-center">
                <h3 style="color:white; padding-left: 5px" id="porcentajeRecuperados">0</h3>

                <p style="color:white; padding-left: 5px">de recuperación</p>
              </div>
              <div class="icon">
               
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-12 mt-2 mt-lg-0 col-lg-4">
            <!-- small box -->
            <div class="small-box" style="background: #4d4c7d">
              <div class="inner text-center">
                <h3 style="color:white; padding-left: 5px" id="casosPorMillon">0</h3>

                <p style="color:white; padding-left: 5px">Casos por millon</p>
              </div>
              <div class="icon">
               
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>

        </div>
        <!-- /.row -->

	  <!-- Timeline -->
	  <div class="chart-container row" style="height: 200px; padding-top: 10px">
	  	<canvas id="myChart"></canvas>
	  </div>

	  <!-- Timeline -->
	  <div class="chart-container row" style="height: 200px; padding-top: 10px">
	  	<canvas id="myChart2"></canvas>
	  </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" style="background: #4D4C7D; color: white" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
  <div>
</div>
 </section>
</div>

 <script>

 	$(document).ready(function(){
	
 		$('.tablaGlobal').dataTable({
 			"responsive": true,
			"order": [[1,"desc"]],
 			"pageLength": 30,
 			"responsive": true,
 			"language": {
		      "sProcessing":     "Procesando...",
		      "sLengthMenu":     "Mostrar _MENU_ registros",
		      "sZeroRecords":    "No se encontraron resultados",
		      "sEmptyTable":     "Ningún dato disponible en esta tabla",
		      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		      "sInfoPostFix":    "",
		      "sSearch":         "Buscar:",
		      "sUrl":            "",
		      "sInfoThousands":  ",",
		      "sLoadingRecords": "Cargando...",
		      "oPaginate": {
		      "sFirst":    "Primero",
		      "sLast":     "Último",
		      "sNext":     "Siguiente",
		      "sPrevious": "Anterior"
		      }
		  }
 		});

 		$("#tablaGlobal tbody").on("click", 'button', function(){
 				
 			var token = $('meta[name="csrf-token"]').attr('content')

 			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});

 			var code = $(this).attr('codigo');
 			var data = new FormData();
 			data.append("code", code);
	
 			
 			$.ajax({

 				 url:"{{action('CovidController@individual')}}",
				    method: "POST",
				    data: {codigo: code},
				    success: function(respuesta){

				    	$('.preloader').fadeOut('slow');

				    	$('#modalPais').on('hidden.bs.modal', function () {

				    		$('.preloader').fadeIn('slow');

				    	var ctx = document.getElementById('myChart').getContext('2d');
						var chart = new Chart(ctx, {
					    // The type of chart we want to create
					    type: 'line',

					    // The data for our dataset
					    data: {
					        labels: [],
					        datasets: [{
					            label: 'Fallecidos por fecha',
					            fill: false,
					            backgroundColor: 'rgb(220,20,60)',
					            borderColor: 'rgb(220,20,60)',
					            data: []
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
					      title: {
					            "display": true,
					            "text": "Historial de casos por fecha.",
					            "fontSize": 24
					        }
					      }
					});

						var ctx2 = document.getElementById('myChart2').getContext('2d');
						var chart2 = new Chart(ctx, {
					    // The type of chart we want to create
					    type: 'line',

					    // The data for our dataset
					    data: {
					        labels: [],
					        datasets: [{
					            label: 'Fallecidos por fecha',
					            fill: false,
					            backgroundColor: 'rgb(220,20,60)',
					            borderColor: 'rgb(220,20,60)',
					            data: []
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
					      title: {
					            "display": true,
					            "text": "Historial de casos por fecha.",
					            "fontSize": 24
					        }
					      }
					});


							destroyChart();

							function destroyChart(){
								chart.destroy();
								chart2.destroy();
							}

						});

				    	var ctx = document.getElementById('myChart').getContext('2d');
						var chart = new Chart(ctx, {
					    // The type of chart we want to create
					    type: 'line',

					    // The data for our dataset
					    data: {
					        labels: [],
					        datasets: [{
					            label: 'Fallecidos por fecha',
					            fill: false,
					            backgroundColor: 'rgb(220,20,60)',
					            borderColor: 'rgb(220,20,60)',
					            data: []
					        }]
					    },

					    // Configuration options go here
					    options: {
					      "responsive":true, 
					      "maintainAspectRatio":false,
					      legend: {
					        labels:{
					          "display":false
					        }
					      }					      
					  }
					});

						var ctx2 = document.getElementById('myChart2').getContext('2d');
						var chart2 = new Chart(ctx2, {
					    // The type of chart we want to create
					    type: 'line',

					    // The data for our dataset
					    data: {
					        labels: [],
					        datasets: [{
					            label: 'Recuperados por fecha',
					            fill: false,
					            backgroundColor: 'rgb(50,205,50)',
					            borderColor: 'rgb(50,205,50)',
					            data: []
					        }]
					    },

					    // Configuration options go here
					    options: {
					      "responsive":true, 
					      "maintainAspectRatio":false,
					      legend: {
					        labels:{
					          "display":false
					        }
					      }					     
					    }
					});

										
						$("#pais").html(respuesta['img']+' '+respuesta['respuesta']['data']['name']);
						var n = respuesta['respuesta']['data']['population']
						$("#poblacion").html("<i class='fa fa-user'></i> Poblacion: "+n.toLocaleString());

						var numb = respuesta['respuesta']['data']['latest_data']['calculated']['death_rate'];
						var numbRec = respuesta['respuesta']['data']['latest_data']['calculated']['recovery_rate'];
						$("#porcentajeMuertes").html(numb.toFixed(2)+"%");
						$("#porcentajeRecuperados").html(numbRec.toFixed(2)+"%");
						$("#casosPorMillon").html(respuesta['respuesta']['data']['latest_data']['calculated']['cases_per_million_population'])

						var response = respuesta['respuesta']['data']['timeline'];
						var revResp = response.reverse();
						// Actualizo chart
						revResp.forEach(function(valor, indice, array){
							chart.data.labels.push(valor["date"]);
							chart.data.datasets[0].data.push(valor["deaths"]);
							chart.update();	

							chart2.data.labels.push(valor["date"]);
							chart2.data.datasets[0].data.push(valor["recovered"]);
							chart2.update();	
						});


						

						
				    }
 			});
 		});
 	});

 </script>

@endsection