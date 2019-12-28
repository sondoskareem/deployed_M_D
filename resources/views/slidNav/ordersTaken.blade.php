@extends('layouts.app')
@section('content')
    <div class="container marginTop">
        <div class="row m-4">
            <div class="col-md-12">
                <h6><strong>Task finished</strong></h6>
{{--                <div class="card">--}}
                    <table class="table table-striped table-light text-sm-center table-condensed">
                        <thead>
                        <tr>
                            <th class="btn-dark" scope="col">Person involved</th>
                            <th class="btn-dark" scope="col">More info</th>
                            <th class="btn-dark" scope="col">More info</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orderTaken as $orderTaken)
                            <tr>
                                <th scope="row">{{$orderTaken->employee->name}}</th>
{{--                                <th scope="row">Order {{$orderTaken->order->id}}</th>--}}
{{--                                <th scope="row">{{$orderTaken->employee->id}}</th>--}}
                                <td><a href="{{route('empById'  , ['employee' =>$orderTaken->employee->id])}}">EmployeeInfo</a></td>
                                <td><a href="{{route('ordById' , ['order' =>$orderTaken->order->id])}}">OrderInfo</a></td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
{{--            </div>--}}
        </div>
    </div>
@endsection
