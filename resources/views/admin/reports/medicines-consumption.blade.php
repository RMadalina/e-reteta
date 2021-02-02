@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Raport Medicamente Cantitati') }}</div>

                <div class="card-body">
                 
                    <table class = "table">
                      <thead>
                        <tr>
                          <th>Cod Medicament</th>
                          <th>Nume Medicament</th>
                          <th>Cantitate</th>
                          <th>Valoare</th>
                        </tr>
                      </thead>
                      <tbody>
                      @forelse($medicines as $medicine)
                        <tr>
                          <td>{{$medicine->medicinecode}}</td>
                          <td>{{$medicine->name}}</td>
                          <td>{{$medicine->quantity}}</td>
                          <td>{{$medicine->value}}</td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan = "4"> Lista  vida!</td>
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
