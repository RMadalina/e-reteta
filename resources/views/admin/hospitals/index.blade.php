@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Clinica') }}</div>

                <div class="card-body">
                  <a href="{{route('hospitals.create')}}"
                      class ="btn btn-primary">Adauga clinici noi</a><br><br>
                    <table class = "table">
                      <thead>
                        <tr>
                          <th>Nume</th>
                          <th>Cod Fiscal</th>
                          <th>Judet</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      @forelse($hospitals as $hospital)
                        <tr>
                          <td>{{$hospital->name}}</td>
                          <td>{{$hospital->fiscalcode}}</td>
                          <td>{{$hospital->county}}</td>
                          <td>
                            <a href="{{route('hospitals.edit', $hospital->id)}}"
                              class="btn btn-sm btn-info">Editeaza</a>
                            <form action="{{route('hospitals.destroy', $hospital->id)}}" method = "POST"
                                          style="display: inline-block">
                              @method('DELETE')
                              @csrf
                              <button type = "submit" 
                                      onclick="return confirm('Sunteti sigur ca doriti sa stergeti?')"
                                      class = "btn btn-sm btn-danger">Sterge</button>
                            </form>
                          </td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan = "4"> Lista de clinici vida!</td>
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
