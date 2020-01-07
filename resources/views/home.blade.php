@extends('layouts.app')

@section('content')
<div class="container">
    <p class="table-condensed">You have  <b>{{$goods->count()}} Goods</b>  You can add new goods for shipping <a href="{{route('add.goods')}}"> here </a>  </p>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <p><a href="{{route('add.goods')}}">Add goods</a></p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table text-sm-center table-condensed">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Repository Name</th>
                                <th scope="col"> Description</th>
                                <th scope="col"> Date</th>
                                <th scope="col"> Available</th>
                                <th scope="col">A sign to user</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($goods as $goods)
                            <tr>
                                <th scope="row">{{$goods->repository->name}}</th>
                                <td>{{$goods->desc}}</td>
                                <td>{{$goods->created_at}}</td>
                                <td><a  href="{{route('available' , ['goods'=>$goods->id] )}}" class="btn btn-dark" style="color: white" >{{$goods->available ? 'Yes' : 'No'}}</a></td>
                                <td><a class=" {{!$goods->available ?'btn btn-secondary button ':'btn btn-dark button'}}" href="{{ !$goods->available ?'#': route('asign.goods' ,['goods' => $goods] )}}"> A sign to</a></td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>

                </div>
            </div>
        </div>

</div>
@endsection
