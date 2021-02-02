@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Medic') }}</div>

                <div class="card-body">
                  <a href="{{route('doctors.create')}}"
                      class ="btn btn-primary">Adauga medic nou</a><br><br>
                    <table class = "table">
                      <thead>
                        <tr>
                          <th>Nume</th>
                          <th>Cod Stampila</th>
                          <th>Contract CAS</th>
                          <th>Email</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      @forelse($doctors as $doctor)
                        <tr>
                          <td>{{$doctor->user->name}}</td>
                          <td>{{$doctor->stampno}}</td>
                          <td>{{$doctor->cascontract}}</td>
                          <td>{{$doctor->user->email}}</td>
                          
                          <td>
                            <a href="{{route('doctors.edit', $doctor->id)}}"
                              class="btn btn-sm btn-info">Editeaza</a>
                            <form action="{{route('doctors.destroy', $doctor->id)}}" method = "POST"
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
                          <td colspan = "4"> Lista de medici vida!</td>
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
