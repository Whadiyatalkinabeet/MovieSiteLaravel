<?php

namespace App\Http\Controllers;
use GuzzleHttp\Exception\GuzzleException;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class omdb extends Controller
{
    public function request(){
    	$client = new Client();
    	$result = $client->post('https://api.themoviedb.org/3/movie/popular?api_key=88f87340c5e056d757ff6fd53a51ddff&language=en-US');

    	$movies = json_decode($result->getBody())->results;

    	

    	return view('welcome',['movies'=>json_encode($movies)]);
    }

    public function getDetails($movie_id){


		$client = new Client();
    	$result = $client->request('GET','https://api.themoviedb.org/3/movie/' . $movie_id . '?api_key=88f87340c5e056d757ff6fd53a51ddff&language=en-US');


    	$details = json_decode($result->getBody());

    
    	
    	return view('/display', ['details'=>json_encode($details)]);
    	
    
    }
}
