@extends('posts')

@section('post')
<div class="col-md-6">
  <div class="container">
   <form class="form-group row" method="POST" action="/postsave">
	 @csrf
	 <input id="idPost" type="hidden" name="id" value="{{ isset($post) ? $post->id : ''  }}">
     <div class="row">
       <div class="col-md-6">
        @if ($errors->any())
         <input class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Заголовок" value="{{ old('title') }}">
        @else
          <input class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Заголовок" value="{{ isset($post) ? $post->title : '' }}">
        @endif
         @error('title')
            <div id="titleError" class="invalid-feedback" style="display : flex;">{{ $message }}</div>
         @enderror
       </div>
       <div class="col-md-6">
        @if ($errors->any())
          <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" placeholder="Дата" value="{{ old('date') }}" >
        @else
         <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" placeholder="Дата" value="{{ isset($post) ? $post->date : '' }}" >
        @endif
         @error('date')
            <div id="dateError" class="invalid-feedback" style="display : flex;">{{ $message }}</div>
         @enderror
       </div>
     </div>   
     <textarea class="form-control mt-1" id="post" name="post" placeholder="Текст" rows="10">{{ isset($post) ? $post->post : '' }}</textarea>
     
     @isset($post)
      @include('deleteEnable')
     @endisset
     @empty($post)
      @include('deleteDisable')
     @endempty
     <button id="btnSavePost" type="submit" class="offset-md-3 btn btn-info mt-2">Сохранить и закрыть</button>
     <button id="btnClosePost" type="button" class="btn btn-link" >Закрыть</button>
   </form>
  </div>
</div>
<script src="/js/post.js"></script>
@endsection
