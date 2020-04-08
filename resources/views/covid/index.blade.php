@extends('app')
@section('content')

<?php 
  foreach ($respuesta['data']['timeline'] as $key => $value) {
      if($key === 0){
      $casosActivos = $value['active'];
      $casosDeHoy = $value['new_confirmed'];
      $muertesDeHoy = $value['new_deaths'];
    }
  }
if($pais != 'Argentina'){
  $data = (new League\ISO3166\ISO3166)->alpha2($pais);
}else{
  $data['name'] = 'Argentina';
}


?>
	<!-- Contenido -->
		<section class="content ml-2">	
			<div>
				<h3 class="pl-5 pl-lg-0 pt-lg-3" style="color: white">Datos principales - {{$data['name']}}</h3>
        <h5 class="pl-5 pl-lg-0 pt-lg-3" style="color: white"><i class="fas fa-viruses"></i> Origen de datos: <a href="https://about-corona.net/" class="text-white"><strong><u>https://about-corona.net/</u></strong></a><h5>
			</div>

      <div class="pl-5 pl-lg-0 pt-lg-1 text-white">
          <?php 
            $fecha = $respuesta['data']['updated_at'];
            $fechaConvertida = date('Y-m-d H:i:s', strtotime($fecha));
            $newFechaConvertida = strtotime('-3 hour', strtotime($fechaConvertida));
            $fechaActualizacion = date('Y-m-d H:i:s', $newFechaConvertida);
          ?>
          
          <p>Última actualización: {{$fechaActualizacion}}</p>
      </div>

      <?php 
       $nombrePais = array("AF"=>"Afghanistan","AL"=>"Albania","AX"=>"Åland Islands","AS"=>"American Samoa","DZ"=>"Algeria","AD"=>"Andorra","AO"=>"Angola","AI"=>"Anguilla","AG"=>"Antigua and Barbuda","AQ"=>"Antarctica","AU"=>"Australia","AT"=>"Austria","BH"=>"Bahrain","BD"=>"Bangladesh","BJ"=>"Benin","BZ"=>"Belize","AR"=>"Argentina","AM"=>"Armenia","BA"=>"Bosnia and Herzegovina","AW"=>"Aruba","AZ"=>"Azerbaijan","BS"=>"Bahamas","BN"=>"Brunei Darussalam","BQ"=>"Bonaire, Sint Eustatius and Saba","BY"=>"Belarus","BB"=>"Barbados","IO"=>"British Indian Ocean Territory","BM"=>"Bermuda","BE"=>"Belgium","CM"=>"Cameroon","BT"=>"Bhutan","BO"=>"Bolivia, Plurinational State of","KH"=>"Cambodia","CF"=>"Central African Republic","BW"=>"Botswana","TD"=>"Chad","BG"=>"Bulgaria","BV"=>"Bouvet Island","BR"=>"Brazil","CC"=>"Cocos (Keeling) Islands","CO"=>"Colombia","CA"=>"Canada","BF"=>"Burkina Faso","BI"=>"Burundi","CR"=>"Costa Rica","CV"=>"Cape Verde","KY"=>"Cayman Islands","CK"=>"Cook Islands","CN"=>"China","CW"=>"Curaçao","CY"=>"Cyprus","CX"=>"Christmas Island","CL"=>"Chile","DO"=>"Dominican Republic","KM"=>"Comoros","CG"=>"Congo","CD"=>"Congo, the Democratic Republic of the","DM"=>"Dominica","GQ"=>"Equatorial Guinea","CI"=>"Côte d'Ivoire","HR"=>"Croatia","CU"=>"Cuba","ER"=>"Eritrea","CZ"=>"Czechia","DK"=>"Denmark","DJ"=>"Djibouti","FJ"=>"Fiji","FO"=>"Faroe Islands","SV"=>"El Salvador","EG"=>"Egypt","TF"=>"French Southern Territories","PF"=>"French Polynesia","EC"=>"Ecuador","GH"=>"Ghana","EE"=>"Estonia","ET"=>"Ethiopia","DE"=>"Germany","FK"=>"Falkland Islands (Malvinas)","FI"=>"Finland","GD"=>"Grenada","FR"=>"France","GP"=>"Guadeloupe","GA"=>"Gabon","GF"=>"French Guiana","GN"=>"Guinea","GM"=>"Gambia","GW"=>"Guinea-Bissau","HN"=>"Honduras","GI"=>"Gibraltar","GE"=>"Georgia","GR"=>"Greece","GL"=>"Greenland","VA"=>"Holy See (Vatican City State)","GT"=>"Guatemala","ID"=>"Indonesia","GG"=>"Guernsey","IN"=>"India","GU"=>"Guam","IM"=>"Isle of Man","IL"=>"Israel","GY"=>"Guyana","HK"=>"Hong Kong","HT"=>"Haiti","HM"=>"Heard Island and McDonald Islands","JE"=>"Jersey","HU"=>"Hungary","IS"=>"Iceland","IR"=>"Iran","IQ"=>"Iraq","IE"=>"Ireland","IT"=>"Italy","JM"=>"Jamaica","JP"=>"Japan","KP"=>"Korea, Democratic People's Republic of","LV"=>"Latvia","LI"=>"Liechtenstein","MG"=>"Madagascar","MT"=>"Malta","YT"=>"Mayotte","MN"=>"Mongolia","MM"=>"Myanmar","NC"=>"New Caledonia","NU"=>"Niue","JO"=>"Jordan","KR"=>"S. Korea","LB"=>"Lebanon","LT"=>"Lithuania","MW"=>"Malawi","MH"=>"Marshall Islands","KE"=>"Kenya","MX"=>"Mexico","KG"=>"Kyrgyzstan","ME"=>"Montenegro","KI"=>"Kiribati","LR"=>"Liberia","LA"=>"Lao People's Democratic Republic","MO"=>"Macao","LY"=>"Libya","MV"=>"Maldives","MK"=>"Macedonia, the Former Yugoslav Republic of","MR"=>"Mauritania","ML"=>"Mali","MU"=>"Mauritius","NA"=>"Namibia","PK"=>"Pakistan","MD"=>"Moldova, Republic of","NZ"=>"New Zealand","MA"=>"Morocco","NF"=>"Norfolk Island","NP"=>"Nepal","PY"=>"Paraguay","NE"=>"Niger","MC"=>"Monaco","MZ"=>"Mozambique","NL"=>"Netherlands","NO"=>"Norway","NG"=>"Nigeria","PT"=>"Portugal","OM"=>"Oman","RU"=>"Russia","LC"=>"Saint Lucia","SM"=>"San Marino","PW"=>"Palau","SC"=>"Seychelles","PE"=>"Peru","SI"=>"Slovenia","PR"=>"Puerto Rico","SS"=>"South Sudan","RW"=>"Rwanda","SJ"=>"Svalbard and Jan Mayen","MF"=>"Saint Martin (French part)","TW"=>"Taiwan, Province of China","ST"=>"Sao Tome and Principe","TG"=>"Togo","SL"=>"Sierra Leone","TR"=>"Turkey","SB"=>"Solomon Islands","UA"=>"Ukraine","ES"=>"Spain","UY"=>"Uruguay","SZ"=>"Swaziland","VG"=>"Virgin Islands, British","TJ"=>"Tajikistan","TK"=>"Tokelau","TM"=>"Turkmenistan","AE"=>"United Arab Emirates","UZ"=>"Uzbekistan","VI"=>"U.S. Virgin Islands","ZW"=>"Zimbabwe","KZ"=>"Kazakhstan","KW"=>"Kuwait","LS"=>"Lesotho","LU"=>"Luxembourg","MY"=>"Malaysia","MQ"=>"Martinique","FM"=>"Micronesia, Federated States of","MS"=>"Montserrat","NR"=>"Nauru","NI"=>"Nicaragua","MP"=>"Northern Mariana Islands","PA"=>"Panama","PN"=>"Pitcairn","RE"=>"Réunion","SH"=>"Saint Helena, Ascension and Tristan da Cunha","VC"=>"Saint Vincent and the Grenadines","SN"=>"Senegal","SX"=>"Sint Maarten (Dutch part)","ZA"=>"South Africa","SD"=>"Sudan","CH"=>"Switzerland","TH"=>"Thailand","TT"=>"Trinidad and Tobago","TV"=>"Tuvalu","US"=>"USA","VE"=>"Venezuela","PG"=>"Papua New Guinea","PL"=>"Poland","RO"=>"Romania","KN"=>"Saint Kitts and Nevis","WS"=>"Samoa","RS"=>"Serbia","SK"=>"Slovakia","GS"=>"South Georgia and the South Sandwich Islands","SR"=>"Suriname","SY"=>"Syria","TL"=>"Timor-Leste","TN"=>"Tunisia","UG"=>"Uganda","UM"=>"United States Minor Outlying Islands","VN"=>"Vietnam","PS"=>"Palestine, State of","PH"=>"Philippines","QA"=>"Qatar","BL"=>"Saint Barthélemy","PM"=>"Saint Pierre and Miquelon","SA"=>"Saudi Arabia","SG"=>"Singapore","SO"=>"Somalia","LK"=>"Sri Lanka","SE"=>"Sweden","TZ"=>"Tanzania, United Republic of","TO"=>"Tonga","TC"=>"Turks and Caicos Islands","GB"=>"UK","VU"=>"Vanuatu","WF"=>"Wallis and Futuna","ZM"=>"Zambia","EH"=>"Western Sahara","YE"=>"Yemen");

      
      ?>

      <form action="{{action('CovidController@country')}}" method="POST" class="ml-4 ml-lg-0 pt-lg-2">
        {{csrf_field()}}
        <select type="text" name="pais" placeholder="Seleccionar otro pais">

            <option value="AR">Seleccionar otro pais</option>

          <?php 

            foreach ($nombrePais as $key => $value) {
              echo '<option name='.$key.' value='.$key.'>'.$value.'</option>';
            }

          ?>
        </select>
        <input type="submit" name="Enviar">
      </form>

		<!-- Small boxes (Stat box) -->
        <div class="row ml-4 ml-sm-0 ml-lg-0 ml-xl-0 pt-2 pt-lg-3 pr-xl-4">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background: #4d4c7d">
              <div class="inner text-center">
                <h3 style="color: white; padding-left: 5px">{{$respuesta['data']['latest_data']['confirmed'] ?? 0}}</h3>

                <p style="color: white; padding-left: 5px">Casos totales</p>
              </div>
              <div class="icon">
                <i class="fas fa-head-side-mask d-none d-xl-block" style="font-size: 70px; top: 20px; color: white"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background:#4d4c7d;">
              <div class="inner text-center">
                <h3 style="color:white; padding-left: 5px">{{$casosActivos ?? 0}}</h3>

                <p style="color:white; padding-left: 5px">Casos activos</p>
              </div>
              <div class="icon">
                <i class="fas fa-viruses d-none d-xl-block" style="color: white"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6 mt-4 mt-lg-0">
            <!-- small box -->
            <div class="small-box" style="background: #4d4c7d">
              <div class="inner text-center">
                <h3 style="color:white; padding-left: 5px">{{$respuesta['data']['latest_data']['deaths'] ?? 0}}</h3>

                <p style="color:white; padding-left: 5px">Total de fallecidos</p>
              </div>
              <div class="icon">
                <i class="fas fa-cross d-none d-xl-block" style="color: white !important"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6 mt-lg-0 mt-4">
            <!-- small box -->
            <div class="small-box" style="background: #4d4c7d">
              <div class="inner text-center">
                <h3 style="color:white; padding-left: 5px">{{$respuesta['data']['latest_data']['recovered'] ?? 0}}</h3>

                <p style="color:white; padding-left: 5px">Recuperados</p>
              </div>
              <div class="icon">
                <i class="fas fa-house-user d-none d-xl-block" style="color: white"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <!-- Small boxes 2 (Stat box) -->
        <div class="row pt-2 ml-4 ml-sm-0 ml-lg-0 ml-xl-0 pt-lg-3 pr-xl-4">
          <div class="col-lg-3 col-6 mt-lg-0 mt-4">
            <!-- small box -->
            <div class="small-box" style="background: #4d4c7d">
              <div class="inner text-center">
                <h3 style="color: white; padding-left: 5px">{{$casosDeHoy ?? 0}}</h3>

                <p style="color: white; padding-left: 5px">Casos de hoy</p>
              </div>
              <div class="icon">
                <i class="fas fa-head-side-virus d-none d-xl-block" style="font-size: 70px; top: 20px; color: white !important"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6 mt-lg-0 mt-4">
            <!-- small box -->
            <div class="small-box" style="background:#4d4c7d;">
              <div class="inner text-center">
                <h3 style="color:white; padding-left: 5px">{{$respuesta['data']['latest_data']['critical']}}</h3>

                <p style="color:white; padding-left: 5px">Casos criticos</p>
              </div>
              <div class="icon">
                <i class="fas fa-biohazard d-none d-xl-block" style="color: white !important"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6 mt-lg-0 mt-4">
            <!-- small box -->
            <div class="small-box" style="background: #4d4c7d">
              <div class="inner text-center">
                <h3 style="color:white; padding-left: 5px">{{$muertesDeHoy ?? 0}}</h3>

                <p style="color:white; padding-left: 5px">Fallecidos hoy</p>
              </div>
              <div class="icon">
                <i class="fas fa-disease d-none d-xl-block" style="color: white !important"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6 mt-lg-0 mt-4">
            <!-- small box -->
            <div class="small-box" style="background: #4d4c7d">
              <div class="inner text-center">
                <h3 style="color:white; padding-left: 5px">{{number_format($respuesta['data']['latest_data']['calculated']['death_rate'],2).'%'}}</h3>

                <p style="color:white; padding-left: 5px">Tasa de mortalidad</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph d-none d-xl-block" style="color: white !important"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
      </div>
	  <!-- ./Row -->

	  <!-- Timeline -->
	  <div class="chart-container row ml-1 ml-md-2 ml-lg-0 mt-2 pr-xl-4" style="height: 430px">
	  	<canvas id="myChart"></canvas>
	  </div>

		<div class="row">
			
			<?php $indice = NULL;
				  $val = NULL; 
				  $total = NULL;
		    ?>


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

<!--New timeline-->
<?php $arr= [];
      $confFecha = [];
      $totalFecha = [];
      $totalMuertes = [];
?>
@foreach($respuesta['data']['timeline'] as $key=>$value)
  <?php $arr[] .= $value['date']; 
        $confFecha[] .= $value['new_confirmed'];
        $totalFecha[] .= $value['confirmed'];
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
?>

<script>
	var ctx = document.getElementById('myChart').getContext('2d');
	var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: [<?php echo $fecha?>],
        datasets: [{
            label: 'Nuevos casos',
            backgroundColor: 'rgb(3,156,161)',
            borderColor: 'rgb(3,156,161)',
            data: [<?php echo $casosPorDia?>]
        },
        {
        label: 'Casos totales',
            backgroundColor: 'rgba(130,197,212,.4)',
            borderColor: 'rgba(130,197,212,.4)',
            data: [<?php echo $totalCases?>]	
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
