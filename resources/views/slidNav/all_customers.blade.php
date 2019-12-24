@extends('layouts.app')
@section('content')
    <div class="container ">
        <div class="row m-6">
            <div class="col-md-6">
                <h6><strong>Customers</strong></h6>
                {{--                <div class="card">--}}
                <div class="row">
                    <div class="col-12">
                        <p><a href="{{route('add.customers')}}">Add customer</a></p>
                    </div>
                </div>
                <table class="table  text-sm-center table-condensed">
                    <thead >
                    <tr>
                        <th class="" scope="col">#</th>
                        <th class="" scope="col">Name</th>
                        <th class="" scope="col">Phone</th>
                        <th class="" scope="col"> Location</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($user->customers as $customers)
                        <tr>
                            <td>{{$loop->index}}</td>
                            <td>{{$customers->name}}</td>
                            <td>{{$customers->phone}}</td>
                            <td>{{$customers->location}}</td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
