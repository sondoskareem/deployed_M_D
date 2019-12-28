@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8  mb-3  ">
            <div class="card-header">You can add your company info below</div>
            <div class="card">
                <div class="card-body">
                    <ul>
                        @foreach($roles as $roles)
                            <li>Roles added : <b>{{$roles->jobDescription}}</b></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">You can add Job description below</div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('roles')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('jobDescription') }}</label>
                            <div class="col-md-6">
                                <input id="jobDescription" type="text" class="form-control @error('jobDescription') is-invalid @enderror" name="jobDescription" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('jobDescription')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Degree') }}</label>
                            <div class="col-md-6">
{{--                                <input id="degree" type="text" class="form-control @error('degree') is-invalid @enderror" name="degree" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}
                                <select name="degree" id="degree" class = "form-control">
                                        <option value="{{1}}" >Manager</option>
                                        <option value="{{2}}" >HR</option>
                                        <option value="{{3}}" >Delegate</option>
                                        <option value="{{4}}" >Employee</option>
                                </select>
                                @error('degree')
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
