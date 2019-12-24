@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 mb-2 ">
            <div class="card-header">You can add your company info below</div>
            <div class="card">
                <div class="card-body">
                    <ul>
                        @foreach($employee as $employee)
                            <li>Employee name : <b>{{$employee->name}}</b></li>
{{--                            <li>Employee email : <b>{{$employee->roles->jobDescription}}</b></li>--}}
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @if (auth()->user()->isAdmin == true)
        <div class="row justify-content-center">
            <div class="col-md-8 mb-2 ">
                <div class="card-body">
                    <p >You have  <b>{{$user->count()}} available Uers </b>  You can add new user <a href="{{route('register')}}"> here </a>  </p>
                    {{--            <p>{{auth()->user()->company}}</p>--}}
                </div>
            </div>
        </div>
    @endif



    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">You can add new employee below</div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('employees')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Employee nick name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Job title') }}</label>
                            <div class="col-md-6">
                                <select name="role_id" id="role_id" class = "form-control">
                                    @foreach (auth()->user()->role as $role)
                                        <option value="{{ $role->id }}" >{{ $role->jobDescription }}</option>
                                    @endforeach
                                </select>

                                @error('errors')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Company name') }}</label>
                            <div class="col-md-6">
                                        <input  name="company_id" id="company_id" class = "form-control" value="{{ auth()->user()->company->name }}" />

                                @error('company_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Employee ID') }}</label>
                            <div class="col-md-6">
                                <select name="user_id" id="user_id" class = "form-control">
                                    @foreach ($user as $user)
                                        <option value="{{ $user->id }}" >{{ $user->email }}</option>
                                    @endforeach
                                </select>

                                @error('role_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
