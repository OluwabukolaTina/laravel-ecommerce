@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

<div class="panel panel-default">

      <div class="panel-heading">

            Edit: {{ $category->name }}

      </div>

      <div class="panel-body">

            <form action="{{ route('category.update', ['id' => $category->id ])}}" method="post">

                  {{ csrf_field() }}

            <div class="form-group">

            <label for="title">Name</label>
        
            <input type="text" value="{{ $category->name }}" name="name" class="form-control">

        	</div>

            
          <div class="form-group">

            <div class="text-center">

                  <button type="submit" class="btn btn-success">Edit Category</button> 
            </div>

          </div>
            
            </form>
      </div>

</div>
        
@section('scripts')

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

<script>
  
    $(document).ready(function() {
    
      $('#summernote').summernote();
    
    });

</script>

@endsection