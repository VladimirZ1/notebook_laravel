@extends('layouts.default')

@section('content')
<body class="text-center">
    
      <header>
        <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
            <div class="container justify-content-center">
                <h1>Добро пожаловать,{{ Auth::user()->name }}! <a href='logout'>Выйти</a></h1>
            </div>
        </nav>
      </header>
      <div class="container mt-5">
       <div class="row">
        <div class="col-md-4" style="border-right: 1px solid;">
			@foreach ($posts as $post) 
 				 <p>Title :{{ $post->title }}</p>
			@endforeach
        </div>
        <div class="col-md-6">
			xcvsd
        </div>
       </div>
      </div>
@endsection
