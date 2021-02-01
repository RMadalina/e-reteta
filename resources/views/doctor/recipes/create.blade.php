@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Adauga Reteta noua') }}</div>
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
                  <form action="{{route('recipes.store')}}" method="POST">
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
                    <br><br>
                    <div class="form-group row">
                      <label for="medicinecode" class="col-md-4 col-form-label text-md-right">{{ __('Cod medicamente') }}</label>
                      <div class="col-md-6">
                        <select name="medicinecode" id="medicinecode">
                          
                          <option value="">--Cod medicament--</option>

                              @foreach($medicines as $medicine)
                      
                              <option value="{{$medicine->medicinecode}}">{{$medicine->name}}</option>
                              @endforeach
                        </select>   
                      </div>               
                    </div>
                    <br><br>
                 
                    <div class="form-group row mb-0">
                      <div class="col-md-8 offset-md-4">
                          <button type="submit" class="btn btn-primary">
                            {{ __('Salveaza reteta') }}
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

