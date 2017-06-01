<?php

namespace App\Http\Controllers;
use App\User;
use GuzzleHttp\Exception\GuzzleException;
use Jenssegers\Mongodb\Eloquent\Model;
use GuzzleHttp\Client;
use Illuminate\Http\Request;


class omdb extends Controller
{
    public function request(){

    	$client = new Client();
    	$result = $client->post('https://api.themoviedb.org/3/movie/popular?api_key=88f87340c5e056d757ff6fd53a51ddff&language=en-US');

    	$movies = json_decode($result->getBody())->results;

    	
    	return view('home',['movies'=>json_encode($movies)]);
    }

    public function getDetails($movie_id){


		$client = new Client();
    	$result = $client->request('GET','https://api.themoviedb.org/3/movie/' . $movie_id . '?api_key=88f87340c5e056d757ff6fd53a51ddff&language=en-US');

        $users = User::first();

        //process movie details
    	$details = json_decode($result->getBody());


    	//get configuration for tmdb images
    	$result = $client->request('GET', 'https://api.themoviedb.org/3/configuration?api_key=88f87340c5e056d757ff6fd53a51ddff');

    	$config = json_decode($result->getBody());

    	$config = $config->images->base_url;

    	return view('display', ['details'=>json_encode($details), 'config' => json_encode($config), 'users'=>json_encode($users)]);

    }

    public function search(Request $request){

        $query = $request->input('query');

        $client = new Client();
        $result = $client->request('GET', 'https://api.themoviedb.org/3/search/movie?api_key=88f87340c5e056d757ff6fd53a51ddff&language=en-US&query=' . $query .'&page=1&include_adult=false');

        $search = json_decode($result->getBody());



        return view('search', ['results'=>json_encode($search->results), 'query'=>$query]);
    }





}
