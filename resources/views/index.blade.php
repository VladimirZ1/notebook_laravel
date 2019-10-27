@extends('layouts.default')

@section('content')
  <body class="text-center" onload="forms.bodyOnLoad()">
  	
    <header>
      <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
        <div class="container justify-content-center">
          <h1>ЗАПИСНАЯ КНИЖКА</h1>
        </div>
      </nav>
    </header>
    <input id="csrf_token" type="hidden" value="{{ csrf_token() }}"/>
    <main role="main" class="container mt-5">
      <form id="loginForm" class="form-group row justify-content-center">
        @csrf   
      	<div class="col-8 col-sm-6 col-md-4 col-lg-3">
        	<input class="form-control" id="name" name="name" placeholder="Логин">
          <input type="password" class="form-control mt-1" id="password" name="password" placeholder="Пароль">
          <button id="btnLogin" type="button" class="btn btn-info btn-block mt-2">ВОЙТИ</button>
          <button id="btnReg" type="button" class="btn btn-success btn-block mt-2">РЕГИСТРАЦИЯ</button>
        </div>
  		</form>
    </main>
@endsection
