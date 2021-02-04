@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Adauga reteta noua') }}</div>
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
                  <form action="{{route('diagnoses.store')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                      <label for="cnp" class="col-md-4 col-form-label text-md-right">{{ __('Pacient') }}</label>
                      <div class="col-md-6">
                        <select name="cnp" id="cnp">
                          
                          <option value="">--Alege--</option>

                              @foreach($pacients as $pacient)
                      
                              <option value="{{$pacient->cnp}}">{{$pacient->user->name}} - {{$pacient->cnp }} </option>
                              @endforeach
                        </select>   
                      </div>               
                    </div>
                    <br><br>
                    <div class="form-group row">
                      <label for="deseasecode" class="col-md-4 col-form-label text-md-right">{{ __('Cod boala') }}</label>
                      <div class="col-md-6">
                        <select name="deseasecode" id="deseasecode">
                          
                          <option value="">--Alege--</option>

                              @foreach($deseases as $desease)
                      
                              <option value="{{$desease->deseasecode}}">{{$desease->name}}</option>
                              @endforeach
                        </select>   
                      </div>               
                    </div>
                    <br><br>
                    <div class="form-group row">
                      <label for="hospital_id" class="col-md-4 col-form-label text-md-right">{{ __('Spital') }}</label>
                      <div class="col-md-6">
                        <select name="hospital_id" id="hospital_id">
                          
                          <option value="">--Alege--</option>

                              @foreach($hospitals as $hospital)
                      
                              <option value="{{$hospital->id}}">{{$hospital->name}}</option>
                              @endforeach
                        </select>   
                      </div>               
                    </div>
                    <br><br>


                    <div class="form-group row">
                      <label for="medicinecode" class="col-md-4 col-form-label text-md-right">{{ __('Medicament') }}</label>
                      <div class="col-md-6">
                        <select name="medicinecode[]" id="medicinecode">
                          
                          <option value="">--Alege--</option>

                              @foreach($medicines as $medicine)
                      
                              <option value="{{$medicine->medicinecode}}">{{$medicine->name}}</option>
                              @endforeach
                        </select>  
                      </div>
                    </div>
                    <div class="form-group row">
                          <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Cantitate') }}</label>
                          <div class="col-md-6">
                          <input id="quantity" type="number" min="0" max="100" class="form-control @error('quantity') is-invalid @enderror" name="quantity[]" value="0" required autocomplete="quantity" autofocus>
  
                          @error('quantity')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>             
                    </div>
                    <br><br>

                    <div class="form-group row">
                      <label for="medicinecode" class="col-md-4 col-form-label text-md-right">{{ __('Medicament') }}</label>
                      <div class="col-md-6">
                        <select name="medicinecode[]" id="medicinecode">
                          
                          <option value="">--Alege--</option>

                              @foreach($medicines as $medicine)
                      
                              <option value="{{$medicine->medicinecode}}">{{$medicine->name}}</option>
                              @endforeach
                        </select>  
                      </div>
                    </div>
                    <div class="form-group row">
                          <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Cantitate') }}</label>
                          <div class="col-md-6">
                          <input id="quantity" type="number" min="0" max="100" class="form-control @error('quantity') is-invalid @enderror" name="quantity[]" value="0" required autocomplete="quantity" autofocus>
  
                          @error('quantity')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>             
                    </div>
                    <br><br>

                    <div class="form-group row">
                      <label for="medicinecode" class="col-md-4 col-form-label text-md-right">{{ __('Medicament') }}</label>
                      <div class="col-md-6">
                        <select name="medicinecode[]" id="medicinecode">
                          
                          <option value="">--Alege--</option>

                              @foreach($medicines as $medicine)
                      
                              <option value="{{$medicine->medicinecode}}">{{$medicine->name}}</option>
                              @endforeach
                        </select>  
                      </div>
                    </div>
                    <div class="form-group row">
                          <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Cantitate') }}</label>
                          <div class="col-md-6">
                          <input id="quantity" type="number" min="0" max="100" class="form-control @error('quantity') is-invalid @enderror" name="quantity[]" value="0" required autocomplete="quantity" autofocus>
  
                          @error('quantity')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>             
                    </div>
                    <br><br>

                 
                    <div class="form-group row mb-0">
                      <div class="col-md-8 offset-md-4">
                          <button type="submit" class="btn btn-primary">
                            {{ __('Salveaza') }}
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

