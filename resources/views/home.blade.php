@extends('layouts.app')

@section('content')

<div class="panel-heading">Dashboard</div>
    <div id="main">
        <div class="inner">
            <div class="thumbnails">
                  

            @if (Auth::guest())

                 <div class="box">
                    <div class="inner">
                        <a href="{{ route('login') }}">Login</a>
                    </div>
                </div>
            @else

                @php
                    $movies = json_decode($movies);
                @endphp


                @foreach ($movies as $movie)

                <div class="box">
                    <div class="inner">
                        <form action="/addF" method="get">
                            {{ csrf_field() }}
                            <p>{{ $movie->original_title }}</p>
                            <p>{{ $movie->overview }}</p>
                            <p>Release Date: {{ $movie->release_date }}</p>
                            <p>TMDB Rating: {{ $movie->vote_average }}</p>
                            <input type="hidden" name="movie_title" value="{{ $movie->original_title }}"/>
                            <input type="hidden" name="user" value="{{ Auth::user()->name }}"/>
                            <input type="submit" name="submit" value="Add to Favourites"/>

                        </form>  
                    </div>          
                </div>

                @endforeach
            </div>

            <div class="box">
                <div class="inner">
                    <form action="/getF" method="get">
                        {{ csrf_field() }}

                        <input type="hidden" name="user" value="{{ Auth::user()->name }}"/>

                        <input type="submit" name="submit" value="Go to Favourites"/>
                    </form>
                </div>
            </div>

  
            <div class="box">
                <div class="inner">
                    <form action="/search" method="get">
                                {{ csrf_field() }}
                        <input type="text" name="query" placeholder="Search for a movie" required/><br/>
                        <input type="submit" name="submit" value="Search"/>
                    </form><br/>
                </div>
            </div>
        </div>
    </div>
          
        @endif
@endsection
