@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 mb-2 ">
            <div class="card-header">You can add your company info below</div>
            <div class="card">
                <div class="card-body">
                    <ul>
                        @foreach($goods as $goods)
                            <li>Description and distination  : <b>{{$goods->desc}} | {{$goods->dest}}</b></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 mb-2 ">

                <div class="card-body">
                    <p >You have  <b>{{$repos->count()}} available Repository </b>  You can add new one <a href="{{route('add.repo')}}"> here </a>  </p>

                </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card-header">You can add Goods info below</div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('goods')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Repo Name') }}</label>
                            <div class="col-md-6">
                                <select name="repository_id" id="repository_id" class = "form-control">
                                    @foreach ($repos as $repo)
                                        <option value="{{ $repo->id }}" >{{ $repo->name}}</option>
                                    @endforeach
                                </select>

                                @error('repository_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Final Cost') }}</label>
                            <div class="col-md-6">
                                <input id="desc" type="text" class="form-control @error('finalCost') is-invalid @enderror" name="finalCost" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('finalCost')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                            <div class="col-md-6">
                                <input id="desc" type="text" class="form-control @error('desc') is-invalid @enderror" name="desc" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('desc')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Destination') }}</label>
                            <div class="col-md-6">
                                <input id="desc" type="text" class="form-control @error('dest') is-invalid @enderror" name="dest" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('dest')
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
