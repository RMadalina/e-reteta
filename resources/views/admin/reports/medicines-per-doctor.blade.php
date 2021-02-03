@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Raport Medicamente per Doctor') }}</div>

                <div class="card-body">
                 
                    <table class = "table">
                      <thead>
                        <tr>
                          <th>Id Medic</th>
                          <th>Medic</th>
                          <th>Medicament</th>
                          <th>Cantitate</th>
                          <th>Valoare</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      @forelse($doctors as $doctor)
                        <tr>
                          <td>{{$doctor->id }}</td>
                          <td>{{$doctor->name}}</td>
                          <td>{{$doctor->medicinename}}</td>
                          <td>{{$doctor->medicinesVolume}}</td>
                          <td>{{$doctor->medicinesValue}}</td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan = "4"> Lista vida!</td>
                        </tr>
                      @endforelse
                      </tbody>
                    </table> 
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
