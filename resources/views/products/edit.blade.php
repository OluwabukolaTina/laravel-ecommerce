@extends('layouts.app')

@section('content')

@include('includes.errors')

<div class="panel panel-default">

      <div class="panel-heading">

            Edit: "{{ $product->name }}"

      </div>

      <div class="panel-body">

            <form action="{{ route('products.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">

                  {{ csrf_field() }}

            <div class="form-group">

            <label for="title">Name</label>
        
            <input value="{{ $product->name }}" type="text" name="name" class="form-control">

        	 </div>

          <div class="form-group">

            <label for="title">Price</label>
        
            <input value="{{ $product->price }}" type="number" name="price" class="form-control">

           </div>

           <div class="form-group">

            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">

          </div>

          <div class="form-group">
            
            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $product->description }}</textarea>
          </div>

          <div class="form-group">

            <div class="text-center">

                  <button type="submit" class="btn btn-success">Update Product</button> 
            
                </div>

          </div>
            
            </form>
      </div>

</div>

@stop


@section('styles')

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">

@stop
        

@section('scripts')

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

<script>
  
    $(document).ready(function() {
    
      $('#content').summernote();
    
    });

</script>

