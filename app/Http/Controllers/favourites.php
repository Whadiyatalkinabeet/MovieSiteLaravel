<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Jenssegers\Mongodb\Eloquent\Model;


class favourites extends Controller
{
    //
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
        

        return redirect('/home');

    }

    public function deleteFavourite(Request $request){

    	$username = $request->user;
    	$movie = $request->movie_title;

    	$user = User::where('name', $username)->first();

    	$user->favourites;

    	$user->favourites = array_diff($user->favourites, [$movie]);

    	$user->save();

    	return view('favourites')->with('favourites', $user->favourites);


    }
}
