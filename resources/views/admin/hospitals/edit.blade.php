@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editeaza clinica') }}</div>

                <div class="card-body">
                  <form action="{{route('hospitals.update', $hospital->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Denumire Clinica') }}</label>
                      <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $hospital->name }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <br><br>
                    <div class="form-group row">
                      <label for="fiscalcode" class="col-md-4 col-form-label text-md-right">{{ __('Cod Fiscal') }}</label>
                      <div class="col-md-6">
                        <input id="fiscalcode" type="text" class="form-control @error('fiscalcode') is-invalid @enderror" name="fiscalcode" value="{{ $hospital->fiscalcode }}" required autocomplete="fiscalcode" autofocus>

                        @error('fiscalcode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <br><br>
                    <div class="form-group row">
                      <label for="county" class="col-md-4 col-form-label text-md-right">{{ __('Judet') }}</label>
                      <div class="col-md-6">
                        <input id="county" type="text" class="form-control @error('county') is-invalid @enderror" name="county" value="{{ $hospital->county }}" required autocomplete="county" autofocus>

                        @error('county')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <div class="col-md-8 offset-md-4">
                          <button type="submit" class="btn btn-primary">
                            {{ __('Salveaza clinica') }}
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