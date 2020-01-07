@extends('layouts.app');

{{--@section('title' ,' Add new customer')--}}


@section('content')
<div class="container marginTop">
    <div class="row  m-4 ">
        <div class="col-6">
            <h6>Details information about the repo and th goods</h6>

        <ul class="extraSmall">
            <li>Goods ID   <b>{{$goods->id}}</b></li>
            <li>Distenation  <b>{{$goods->dest}}</b></li>
            <li>Description  <b>{{$goods->desc }}</b></li>
{{--            <li>It's  <b> {{$goods->taken ? 'Taken by the some employees' : 'Not taken' }} </b></li>--}}
            <li>Cost<b>  {{$goods->finalCost}}</b></li>
            <li>Repository name  <b>  {{$goods->repository->name }}</b></li>
            <li>Repository location <b>  {{$goods->repository->location}}</b></li>
        </ul>
        </div>


    </div>
    <div class="row m-4">
        <div class="col-md-12">
            <h4><strong>List of Delegates</strong></h4>
            <div class="card " >
                <table class="table table-striped table-dark text-sm-center table-condensed">
                    <thead>
                    <tr>
                        <th class="btn-primary" scope="col">Person name</th>
                        <th class="btn-primary" scope="col">Email</th>
{{--                        <th class="btn-primary" scope="col">Job Description</th>--}}
                        <th class="btn-primary" scope="col">Company name</th>
                        <th class="btn-primary" scope="col">Company location</th>
                        <th class="btn-primary" scope="col">Is Admin</th>
                        <th class="btn-primary" scope="col">Assign Task</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employee as $employee)
{{--                        <p>{{$employee}}</p>--}}
                    <tr>
                        <th scope="row">{{$employee->name}}</th>
                        <td>{{$goods->id}}</td>
{{--                        <td>{{$employee->role->jobDescription}}</td>--}}
                        <td>{{$employee->company->id}}</td>
                        <td>{{$employee->company->location}}</td>
                        <td>{{$employee->user->isAdmin}}</td>
                        <td><form method="POST" action="{{route('asign')}}">
                                @csrf
                                <input type="hidden" value="{{$goods->id}}" name ="goods_id" >
                                <input type="hidden" value="{{$employee->id}}" name ="employee_id"  >
                           <button type="submit" class="btn btn-primary button">Give me</button>
                        </form></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection
