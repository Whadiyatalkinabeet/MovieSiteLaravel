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

    public function getFavourites(Request $request){



        $user = User::where('name', $request->user)->first();

        $favourites = $user->favourites;


      

        return view('favourites')->with('favourites', $favourites);
    }

    public function insertFavourite(Request $request){

        $user = User::where('name', $request->user)->first();

        $movie = $request->movie_title;

        

        if($user->favourites){
            //if favourites array already exists
            $newFavourite = [$movie];
            $user->favourites = array_merge($user->favourites, $newFavourite);

        } else{
            //if favourites array doesn't exist
            $user->favourites = [$movie];
        }


        $user->save();

        $favourites = $user->favourites;
        

        return $this->request();

    }


}
