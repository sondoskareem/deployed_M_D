@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8  mb-2  ">
            <div class="card-header">You can add your company info below</div>
            <div class="card">
                <div class="card-body">
                    <ul>
                        @foreach($repo as $repo)
                            <li>Repository  : <b>{{$repo->name}}</b></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 mb-2 ">

            <div class="card-body">
                <p >Goods Page<a href="{{route('add.goods')}}"> here </a>  </p>

            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">You can add Repo below</div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('repo')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Repo Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Repo location') }}</label>
                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('location')
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
