@extends('posts')

@section('post')
        <div class="col-md-6">
        	<div class="container">
				    <form class="form-group row" method="POST" action="/post">
	        	  @csrf
	        	  <div class="row">
	        	    <div class="col-md-6">
	        	    	<input class="form-control" id="title" name="title" placeholder="Заголовок" required value="{{ isset($post) ? $post->title : ''  }}">
	        	    </div>
	        	    <div class="col-md-6">
	        	    	<input type="date" class="form-control" id="date" name="date" placeholder="Дата" required value="{{ isset($post) ? $post->date : ''  }}" >
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
@endsection
