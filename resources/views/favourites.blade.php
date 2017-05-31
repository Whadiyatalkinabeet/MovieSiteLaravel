@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                @if($favourites)
                    @foreach ($favourites as $f)

                        <p>{{ $f }}</p>
                        <form action="/deleteF" method="post">
                        {{ csrf_field() }}

                            <input type="hidden" name="user" value="{{ Auth::user()->name }}"/>
                            <input type="hidden" name="movie_title" value="{{ $f }}"/>
                            <input type="submit" name="submit" value="Delete"/>
                        </form>

                    @endforeach
                @else 

                    <p>Go back to add favourites!</p>
                    <a href="{{ url('/home') }}">Back</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
