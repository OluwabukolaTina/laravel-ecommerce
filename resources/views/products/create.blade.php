@extends('layouts.app')

@section('content')

@include('includes.errors')

<div class="panel panel-default">

      <div class="panel-heading">

            add products

      </div>

      <div class="panel-body">

            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">

                  {{ csrf_field() }}

            <div class="form-group">

            <label for="name">Name</label>
        
            <input type="text" name="name" value="{{ old('name') }}" class="form-control">

        	 </div>

           <div class="form-group">

            <label for="price">Price</label>
        
            <input type="number" name="price" value="{{ old('price') }}" class="form-control">

           </div>

            <div class="form-group">

            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">

            </div>

          <div class="form-group">

            <label for="content">Description</label>
            <textarea name="description" id="description" cols="20" rows="6" class="form-control">{{ old('description') }}</textarea>
          
          </div>
  
          <div class="form-group">

            <div class="text-center">

                  <button type="submit" class="btn btn-success">Save Product</button> 
            </div>

          </div>
            
            </form>
      </div>

</div>
        

@stop

@section('styles')

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">

@stop
