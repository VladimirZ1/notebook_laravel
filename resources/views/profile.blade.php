@extends('layouts.default')

@section('content')
  <body class="text-center">
  	
    <header>
      <<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
      <div class="container justify-content-center">
        <h1>РЕДАКТИРОВАНИЕ ПРОФИЛЯ</h1>
      </div>
    </nav>
    </header>
    <input id="csrf_token" type="hidden" value="{{ csrf_token() }}"/>
    <main role="main" class="container mt-5">
      <form id="profileForm" class="form-group row justify-content-center" method="POST" action="/profilesave"  enctype="multipart/form-data">
        @csrf   
        <div class="col-8 col-sm-6 col-md-4 col-lg-3">
          <img src="/storage/avatars/{{ Auth::user()->id }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
          <input name="avatar" type="file">
          <button id="btnSaveProfile" type="submit" class="btn btn-info btn-block mt-2">СОХРАНИТЬ И ЗАКРЫТЬ</button>
          <button id="btnCloseProfile" type="button" class="btn btn-success btn-block mt-2">ЗАКРЫТЬ</button>
        </div>
      </form>
    </main>
    <script src="/js/profile.js"></script>
@endsection
