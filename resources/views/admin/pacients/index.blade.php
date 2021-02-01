@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Medicament') }}</div>

                <div class="card-body">
                  <a href="{{route('pacients.create')}}"
                      class ="btn btn-primary">Adauga pacient nou</a><br><br>
                    <table class = "table">
                      <thead>
                        <tr>
                          <th>Nume</th>
                          <th>CNP</th>
                          <th>Varsta</th>
                          <th>Tip Asigurare</th>
                          <th>Email</th>
                          
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      @forelse($pacients as $pacient)
                        <tr>
                          <td>{{$pacient->user->name}}</td>
                          <td>{{$pacient->cnp}}</td>
                          <td>{{$pacient->age}}</td>
                          <td>{{$pacient->insurancetype}}</td>
                          <td>{{$pacient->user->email}}</td>
                          
                          <td>
                            <a href="{{route('pacients.edit', $pacient->cnp)}}"
                              class="btn btn-sm btn-info">Editeaza</a>
                            <form action="{{route('pacients.destroy', $pacient->cnp)}}" method = "POST"
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
                          <td colspan = "4"> Lista de pacienti vida!</td>
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
