@extends('layouts.app')

@section('content')

    <div class="panel-heading">Favourites</div>
       <div id="main">
        <div class="inner">
            <div class="thumbnails">
                @if($favourites)
                    @foreach ($favourites as $f)
                        <div class="box">
                            <div class="inner">

                                <p>{{ $f }}</p>
                                <form action="/deleteF" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="user" value="{{ Auth::user()->name }}"/>
                                    <input type="hidden" name="movie_title" value="{{ $f }}"/>
                                    <input type="submit" name="submit" value="Delete"/>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else 
                    <div class="box">
                        <div class="inner">
                            <p>Go back to add favourites!</p>
                            <a href="{{ url('/home') }}">Back</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
