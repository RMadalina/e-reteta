@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editeaza medicament') }}</div>

                <div class="card-body">
                  <form action="{{route('medicines.update', $medicine->medicinecode)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Denumire Medicament') }}</label>
                      <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $medicine->name }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <br><br>
                    <div class="form-group row">
                      <label for="medicinecode" class="col-md-4 col-form-label text-md-right">{{ __('Cod Medicament') }}</label>
                      <div class="col-md-6">
                        <input id="medicinecode" type="text" class="form-control @error('medicinecode') is-invalid @enderror" name="medicinecode" value="{{ $medicine->medicinecode }}" required autocomplete="medicinecode" autofocus>

                        @error('medicinecode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <br><br>
                    <div class="form-group row">
                      <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Pret') }}</label>
                      <div class="col-md-6">
                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $medicine->price }}" required autocomplete="price" autofocus>

                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <div class="col-md-8 offset-md-4">
                          <button type="submit" class="btn btn-primary">
                            {{ __('Salveaza medicament') }}
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