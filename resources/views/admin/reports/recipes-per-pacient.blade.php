@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Raport Retete per Pacient') }}</div>

                <div class="card-body">
                 
                    <table class = "table">
                      <thead>
                        <tr>
                          <th>Cnp</th>
                          <th>Pacient</th>
                          <th>Numar Retete</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      @forelse($pacients as $pacient)
                        <tr>
                          <td>{{$pacient->cnp}}</td>
                          <td>{{$pacient->name}}</td>
                          <td>{{$pacient->recipesCount}}</td>
                        
                        </tr>
                      @empty
                        <tr>
                          <td colspan = "3">Raport vid!</td>
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
