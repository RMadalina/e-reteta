@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editeaza diagnostic') }}</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif

                <div class="card-body">
                  <form action="{{route('diagnoses.update', $diagnose->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                      <label for="cnp" class="col-md-4 col-form-label text-md-right">{{ __('CNP') }}</label>
                      <div class="col-md-6">
                        <select name="cnp" id="cnp">
                          
                          <option value="">--Alege -</option>

                              @foreach($pacients as $pacient)
                      
                              <option value="{{$pacient->cnp}}">{{$pacient->cnp }} {{$pacient->user->name}}</option>
                              @endforeach
                        </select>   
                      </div>               
                    </div>

                    <div class="form-group row">
                      <label for="deseasecode" class="col-md-4 col-form-label text-md-right">{{ __('Cod Boala') }}</label>
                      <div class="col-md-6">
                        <input id="deseasecode" type="text" class="form-control @error('deseasecode') is-invalid @enderror" name="deseasecode" value="{{ $desease->deseasecode }}" required autocomplete="deseasecode" autofocus>

                        @error('deseasecode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <br><br>
                    <div class="form-group row">
                      <label for="doctor_id" class="col-md-4 col-form-label text-md-right">{{ __('Medic') }}</label>
                      <div class="col-md-6">
                        <input id="doctor_id" type="text" class="form-control @error('doctor_id') is-invalid @enderror" name="doctor_id" value="{{ $doctor->id }}" required autocomplete="doctor_id" autofocus>

                        @error('doctor_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <br><br>
                    <div class="form-group row">
                      <label for="hospital_id" class="col-md-4 col-form-label text-md-right">{{ __('Clinica') }}</label>
                      <div class="col-md-6">
                        <input id="hospital_id" type="text" class="form-control @error('hospital_id') is-invalid @enderror" name="hospital_id" value="{{ $hospital->id }}" required autocomplete="hospital_id" autofocus>

                        @error('hospital_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row mb-0">
                      <div class="col-md-8 offset-md-4">
                          <button type="submit" class="btn btn-primary">
                            {{ __('Salveaza diagnostic') }}
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