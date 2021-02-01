@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editeaza pacient') }}</div>

                <div class="card-body">
                  <form action="{{route('pacients.update', $pacient->cnp)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nume pacient') }}</label>
                      <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $pacient->user->name }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <br><br>
                    <div class="form-group row">
                      <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Varsta pacient') }}</label>
                      <div class="col-md-6">
                        <input id="age" type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ $pacient->age }}" required autocomplete="age" autofocus>

                        @error('age')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <br><br>
                    <div class="form-group row">
                      <label for="insurancetype" class="col-md-4 col-form-label text-md-right">{{ __('Tip asigurare pacient') }}</label>
                      <div class="col-md-6">
                        <input id="insurancetype" type="text" class="form-control @error('insurancetype') is-invalid @enderror" name="insurancetype" value="{{ $pacient->insurancetype }}" required autocomplete="insurancetype" autofocus>

                        @error('insurancetype')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <br><br>
                    <div class="form-group row">
                      <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email pacient') }}</label>
                      <div class="col-md-6">
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $pacient->user->email }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <div class="col-md-8 offset-md-4">
                          <button type="submit" class="btn btn-primary">
                            {{ __('Salveaza facultate') }}
                          </button>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
