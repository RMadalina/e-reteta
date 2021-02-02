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
                          <th>Denumire</th>
                          <th>Cod Medicament</th>
                          <th>Pret</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      @forelse($medicines as $medicine)
                        <tr>
                          <td>{{$medicine->id}}</td>
                          <td>{{$medicine->name}}</td>
                          <td>{{$medicine->medicinesVolume}}</td>
                          <td>{{$medicine->medicinesValue}}</td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan = "4"> Lista de diagnostice vida!</td>
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
