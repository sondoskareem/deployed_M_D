@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">Add new order</div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('orders')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Customer Name') }}</label>
                            <div class="col-md-6">
                                <select name="customer_id" id="customer_id" class = "form-control">
                                    @foreach (auth()->user()->customers as $customers)
                                        <option value="{{ $customers->id }}" >{{ $customers->name }}</option>
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
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Goods') }}</label>
                            <div class="col-md-6">
                                <select name="goods_id" id="goods_id" class = "form-control">
                                    @foreach (auth()->user()->goods as $goods)
                                        <option value="{{ $goods->id }}" >{{ $goods->desc }}</option>
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
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Destination') }}</label>
                            <div class="col-md-6">
                                <input id="dest" type="text" class="form-control @error('name') is-invalid @enderror" name="dest" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Count') }}</label>
                            <div class="col-md-6">
                                <input id="count" type="text" class="form-control @error('location') is-invalid @enderror" name="count" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('phone')
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
