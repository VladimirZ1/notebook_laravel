@extends('layouts.default')

@section('content')
<body class="text-center">
    
      <header>
        <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
            <div class="container justify-content-center">
                <h1>Добро пожаловать,{{ Auth::user()->name }}! <a href='logout' class="btn-link">Выйти</a></h1>
            </div>
        </nav>
      </header>
      <div class="container mt-5">
       <div class="row">
        <div class="col-md-4" style="border-right: 1px solid;">
        	<h3>Мои POST'ы:</h3>
			@foreach ($posts as $post) 
 				<p>{{ $post->title }} {{ $post->date }}</p>
			@endforeach
			<button id="btnLogin" type="button" class="btn btn-success btn-block">Создать POST</button>
        </div>
        <div class="col-md-6">
        	<div class="container">
				<form id="loginForm" class="form-group row">
	        	@csrf
	        	    <div class="row">
	        	    	<div class="col-md-6">
	        	    		<input class="form-control" id="title" name="title" placeholder="Заголовок">
	        	    	</div>
	        	    	<div class="col-md-6">
	        	    		<input type="date" class="form-control" id="date" name="date" placeholder="Дата" required>
	        	    	</div>
	        	    </div>   
	        		
	        		
	          		<textarea class="form-control mt-1" id="post" name="post" placeholder="Текст" rows="10"></textarea>
	          		<button id="btnDeletePost" type="button" class="btn btn-danger mt-2">Удалить POST</button>

          			<button id="btnSavePost" type="button" class="offset-md-3 btn btn-info mt-2">Сохранить изменения</button>
         			<button id="btnClosePost" type="button" class="btn btn-link" >Закрыть</button>
	  			</form>
  			</div>
        </div>
       </div>
      </div>
@endsection
