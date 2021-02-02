@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Diagnostice') }}</div>

                <div class="card-body">
                  <a href="{{route('diagnoses.create')}}"
                    class ="btn btn-primary">Adauga diagnostic nou</a><br><br>
                    
                    <table class = "table">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Pacient</th>
                          <th>Boala</th>
                          <th>Medic</th>
                          <th>Reteta</th>
                         
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      @forelse($diagnoses as $diagnose)
                        <tr>
                          <td>{{$diagnose->id}}</td>
                          <td>{{$diagnose->pacient->user->name}}</td>
                          <td>{{$diagnose->desease->name}}</td>
                          <td>{{$diagnose->doctor->user->name}}</td>
                          <td>
                            @if($diagnose->recipe)
                            <ul>
                              @foreach ($diagnose->recipe->recipeMedicines as $recipeMedicine)
                                <li>{{ $recipeMedicine->medicine->name }} - {{ $recipeMedicine->quantity }}</li>
                              @endforeach
                            </ul>
                            @endif
                          </td>
                          <td>
                            <a href="{{route('diagnoses.edit', $diagnose->id)}}"
                              class="btn btn-sm btn-info">Editeaza</a>
                              
                            <a href="{{route('recipes.create',['diagnose_id' => $diagnose->id])}}"
                              class="btn btn-sm btn-info">Reteta</a>


                            <form action="{{route('diagnoses.destroy', $diagnose->id)}}" method = "POST"
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
