<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CovidController extends Controller
{
    public function index($pais = 'Argentina'){
    //creo un nuevo cliente Guzzle con el servidor API de prueba
    $cliente = new Client(['base_uri' => 'http://corona-api.com/countries/AR']);
    $timeline = new Client(['base_uri' => 'https://thevirustracker.com/free-api?countryTimeline=AR']);
    //$cliente2 = new Client(['base_uri' => 'https://corona.lmao.ninja/countries/Argentina']);
    //llamo al servicio ubicado en esa URL utilizando método GET (debe estar 
    // especificado en el servicio)
    $respuesta = $cliente->request('GET')->getBody();
    //$respuesta2 = $cliente2->request('GET')->getBody();
    $respuestaTimeline = $timeline->request('GET')->getBody();

    return view('covid.index',[
    		'respuesta'=>json_decode($respuesta, true),
    		'timeline'=>json_decode($respuestaTimeline),
    		'pais'=>$pais
    	]);
	}

	public function country(Request $request){
	//creo un nuevo cliente Guzzle con el servidor API de prueba
    $cliente = new Client(['base_uri' => 'http://corona-api.com/countries/'.$request->input('pais')]);
    //$timeline = new Client(['base_uri' => 'https://thevirustracker.com/free-api?countryTimeline='.$request->input('pais')]);
    //llamo al servicio ubicado en esa URL utilizando método GET (debe estar 
    // especificado en el servicio)
    $respuesta = $cliente->request('GET')->getBody();
    //$respuestaTimeline = $timeline->request('GET')->getBody();

    return view('covid.index',[
    		'respuesta'=>json_decode($respuesta, true),
    		'pais'=>$request->input('pais')
    	]);
	}

	public function corona(){
		 $cliente = new Client(['base_uri' => 'https://corona-api.com/countries']);
	    //llamo al servicio ubicado en esa URL utilizando método GET (debe estar 
	    // especificado en el servicio)
    	$respuesta = $cliente->request('GET')->getBody();
		return view('covid.corona',[
			'respuesta'=>json_decode($respuesta, true)
		]);
	}

	public function statistics(){
		//creo un nuevo cliente Guzzle con el servidor API de prueba
    	$clienteArg = new Client(['base_uri' => 'http://corona-api.com/countries/AR']);
    	$respuestaArg = $clienteArg->request('GET')->getBody();

    	$clienteChl = new Client(['base_uri' => 'http://corona-api.com/countries/CL']);
    	$respuestaChl = $clienteChl->request('GET')->getBody();

    	$clienteUy = new Client(['base_uri' => 'http://corona-api.com/countries/UY']);
    	$respuestaUy = $clienteUy->request('GET')->getBody();

    	$clientePY = new Client(['base_uri' => 'http://corona-api.com/countries/PY']);
    	$respuestaPY = $clientePY->request('GET')->getBody();

    	$clienteBR = new Client(['base_uri' => 'http://corona-api.com/countries/BR']);
    	$respuestaBR = $clienteBR->request('GET')->getBody();

    	$clientePE = new Client(['base_uri' => 'http://corona-api.com/countries/PE']);
    	$respuestaPE = $clientePE->request('GET')->getBody();

		$clienteCo = new Client(['base_uri' => 'http://corona-api.com/countries/CO']);
    	$respuestaCo = $clienteCo->request('GET')->getBody();

		$clienteVe = new Client(['base_uri' => 'http://corona-api.com/countries/VE']);
    	$respuestaVe = $clienteVe->request('GET')->getBody();

		return view('covid.statistics',[
			'respuestaArg'=>json_decode($respuestaArg, true),
			'respuestaChl'=>json_decode($respuestaChl, true),
			'respuestaUy'=>json_decode($respuestaUy, true),
			'respuestaPy'=>json_decode($respuestaPY, true),
			'respuestaBr'=>json_decode($respuestaBR, true),
			'respuestaPe'=>json_decode($respuestaPE, true),
			'respuestaCo'=>json_decode($respuestaCo, true),
			'respuestaVe'=>json_decode($respuestaVe, true)
		]);
	}

	public function global(){

		//creo un nuevo cliente Guzzle con el servidor API de prueba
    	$cliente = new Client(['base_uri' => 'http://corona-api.com/countries']);
    	$respuesta = $cliente->request('GET')->getBody();

        $clienteArg = new Client(['base_uri' => 'http://corona-api.com/countries/AR']);
        $respuestaArg = $clienteArg->request('GET')->getBody();
		return view('covid.global',[
			'respuesta'=>json_decode($respuesta, true),
            'respuestaArg'=>json_decode($respuestaArg, true)
		]);
	}

	public function individual(Request $request){
		$cliente = new Client(['base_uri' => 'http://corona-api.com/countries/'.$request->codigo]);
		$respuesta = $cliente->request('GET')->getBody();
		return ['respuesta'=>json_decode($respuesta, true),
				'img'=>'<img src="https://www.countryflags.io/'.$request->codigo.'/shiny/64.png">'];
	}
}
