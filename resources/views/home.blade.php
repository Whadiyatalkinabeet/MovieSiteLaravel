@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

               
                @if (Auth::guest())
                    <p>You should make an account and start adding favourites!</p>
                @else 
                     <div class="panel-body">
                        You are logged in!
                    </div>

                    @php
                        $movies = json_decode($movies);
                    @endphp


                    @foreach ($movies as $movie)

                        <form action="/addF" method="get">
                                {{ csrf_field() }}

                                <input type="hidden" name="movie_title" value="{{ $movie->original_title }}"/>
                                <input type="hidden" name="user" value="{{ Auth::user()->name }}"/>
                                <input type="submit" name="submit" value="Add {{ $movie->original_title }}"/>

                         </form>            

                    @endforeach

                        <form action="/getF" method="get">
                            {{ csrf_field() }}

                            <input type="hidden" name="user" value="{{ Auth::user()->name }}"/>

                            <input type="submit" name="submit" value="Go to Favourites"/>
                        </form>
                    @endif

          
            </div>
        </div>
    </div>
</div>
@endsection
