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
@endsection
