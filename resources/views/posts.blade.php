@extends('layouts.default')

@section('content')

<body class="text-center">
  
  <header>
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
      <div class="container justify-content-center">
        <h1>Добро пожаловать,<a href='/profile' class="btn-link"><img src="/storage/avatars/{{ Auth::user()->id }}" style="width:40px; height:40px;border-radius:50%; margin-right:5px;">{{ Auth::user()->name }}</a>! <a href='/logout' class="btn-link">Выйти</a></h1>
      </div>
    </nav>
  </header>
  
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-4" style="border-right: 1px solid;">
      	<h3>Мои POST'ы:</h3>
	      @foreach ($posts as $post) 
 	        <a href='/post/{{ $post->id }}' class="btn-link">{{ $post->title }} {{ $post->date }}</a>
          <br>
			  @endforeach
			  <button id="btnNewPost" type="button" class="btn btn-success btn-block mt-3">Создать POST</button>
      </div>
      @yield('post')
    </div>
  </div>
  <script src="/js/posts.js"></script>
@endsection
