@extends('layouts.app')
@section('content')
<div class="container ">
    <div class="row m-4">
        <div class="col-md-12">
            <h6><strong>Orders</strong></h6>
            {{--                <div class="card">--}}
                <div class="row">
                    <div class="col-12">
                        <p><a href="{{route('add.orders')}}">Add new order</a></p>
                    </div>
                </div>
                <table class="table  text-sm-center table-condensed">
                    <thead >
                    <tr>
                        <th class="" scope="col">Order Number</th>
                        <th class="" scope="col">Customer Name</th>
                        <th class="" scope="col">Customer Phone </th>
                        <th class="" scope="col">Goods Destination</th>
                        <th class="" scope="col">Goods Description</th>
                        <th class="" scope="col">Taken?</th>
                        <th class="" scope="col">Assign to</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($user->orders as $orders)
                    <tr>
                        <td>{{$orders->id}}</td>
                        <td>{{$orders->customer->name}}</td>
                        <td>{{$orders->customer->phone}}</td>
                        <td>{{$orders->dest}}</td>
                        <td>{{$orders->goods->desc}}</td>
                        <td>{{$orders->taken?'Yes' :'No'}}</td>
{{--                        <td>{{$orders}}</td>--}}

                        <td><a class="{{!$orders->taken?'btn btn-dark button' : 'btn btn-secondary button '}}" href="{{$orders->taken?'#':route('asign.order' ,['orders' => $orders->id] )}}"> A sign to</a></td>
{{--                        <td><a class="btn btn-dark button" href="{{route('asign.goods' ,['goods' => $goods] )}}"> A sign to</a></td>--}}

                    </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endsection
