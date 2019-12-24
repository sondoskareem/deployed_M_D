@extends('layouts.app')
@section('content')
    <div class="container ">
        <div class="row m-4">
            <h4 class="mb-lg-5"><strong>Information about The order </strong></h4>

            <div class="col-md-12">
                {{--                <div class="card">--}}
                <table class="table table-striped table-light text-sm-center table-condensed ">
                    <thead>
                    <tr>
                        <th class="btn-dark" scope="col">OrderID</th>
                        <th class="btn-dark" scope="col">Customer name</th>
                        <th class="btn-dark" scope="col"> Phone Number</th>
                        <th class="btn-dark" scope="col">Customer location</th>
                        <th class="btn-dark" scope="col">Cost</th>
                        <th class="btn-dark" scope="col">Description</th>
                        <th class="btn-dark" scope="col">Count</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orderResult as $orderResult)
                        <tr>
                            <td>{{$orderResult->id}}</td>
                            <td>{{$orderResult->customer->name}}</td>
                            <td>{{$orderResult->customer->phone}}</td>
                            <td>{{$orderResult->customer->location}}</td>
                            <td>{{$orderResult->goods->finalCost}}</td>
                            <td>{{$orderResult->goods->desc}}</td>
                            <th scope="row">{{$orderResult->count}}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{--            </div>--}}
        </div>
        <div class="col-md-8 ">

            <div class="card-body">
                <a href="{{route('order.taken')}}"> Back </a>
            </div>
        </div>
    </div>
@endsection
