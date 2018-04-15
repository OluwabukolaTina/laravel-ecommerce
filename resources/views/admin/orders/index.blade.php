@extends('layouts.app')

@section('content')

<div class="panel panel-default">

    <div class="panel-heading text-center">Orders</div>

    <div class="panel-body">

        <table class="table table-hover">

    <thead>

        <th> Order By </th>

         <th>Quanitiy</th>

          <th>Delete</th>

    <thead>

    <tbody>

        @if($orders->count() > 0)

        @foreach($orders->orderItems as $order)

        <tr>

            <td>{{  $order->user->name }}</td>

            <td><!-- <a href="#" class="btn btn-xs btn-info">

                <span class="glyphicon glyphicon-pencil"><span>

                </a> -->
                {{  $order->orderItems->withPivot->quantity }}

            </td>

            <td><a href="#" class="btn btn-xs btn-danger">

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
