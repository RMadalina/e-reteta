@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editeaza medic') }}</div>

                <div class="card-body">
                  <form action="{{route('doctors.update', $doctor->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nume medic') }}</label>
                      <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $doctor->user->name }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <br><br>
                    <div class="form-group row">
                      <label for="stampno" class="col-md-4 col-form-label text-md-right">{{ __('Cod Stampila') }}</label>
                      <div class="col-md-6">
                        <input id="stampno" type="text" class="form-control @error('stampno') is-invalid @enderror" name="stampno" value="{{ $doctor->stampno }}" required autocomplete="stampno" autofocus>

                        @error('stampno')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <br><br>
                    <div class="form-group row">
                      <label for="cascontract" class="col-md-4 col-form-label text-md-right">{{ __('Contract CAS') }}</label>
                      <div class="col-md-6">
                        <input id="cascontract" type="text" class="form-control @error('cascontract') is-invalid @enderror" name="cascontract" value="{{ $doctor->cascontract }}" required autocomplete="cascontract" autofocus>

                        @error('cascontract')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <br><br>
                    <div class="form-group row">
                      <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email medic') }}</label>
                      <div class="col-md-6">
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $doctor->user->email }}" required autocomplete="email" autofocus>

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
                            {{ __('Salveaza medic') }}
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
