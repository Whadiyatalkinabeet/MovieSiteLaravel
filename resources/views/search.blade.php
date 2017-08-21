@extends('layouts.app')

@section('content')

    <div class="panel-heading">Dashboard</div>
        <div id="main">
            <div class="inner">
                <div class="thumbnails">
                   <div class="panel-body">Search results for {{ $query }}:<a href="{{ url('/home') }}">Back</a></div>   
   
                    @php
                        $results = json_decode($results);
                    @endphp

                    @foreach ($results as $r)

                        <div class="box">
                            <div class="inner">

                                <form action="" method="post">
                                    
                                    <input type="submit" name="submit" value="{{ $r->original_title }}"/>

                                </form>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
@endsection
