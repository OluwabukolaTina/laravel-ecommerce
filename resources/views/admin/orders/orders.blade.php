@extends('layouts.app')

@section('content')

<div class="panel panel-default">

    <div class="panel-heading">Categories</div>

    <div class="panel-body">

        <table class="table table-hover">

    <thead>

        <th>{{ $order->user }}</th>

         <th>Edit</th>

          <th>Delete</th>

    <thead>

    <tbody>

        @if($categories->count() > 0)

        @foreach($orders as $order)

        <tr>

            <td>{{  $category->name }}</td>

            <td><a href="{{ route('category.edit', ['id' => $category->id ]) }}" class="btn btn-xs btn-info">

                <span class="glyphicon glyphicon-pencil"><span>

                </a>

            </td>

            <td><a href="{{ route('category.delete', ['id' => $category->id ]) }}" class="btn btn-xs btn-danger">

                <span class="glyphicon glyphicon-trash"><span>

                </a>

            </td>

        </tr>

        @endforeach

        @else

        <tr>

            <th class="text-center" colspan="5">No categories Created</th>

        </tr>

        @endif

    </tbody>

    </table>

    </div>
</div>

@stop
