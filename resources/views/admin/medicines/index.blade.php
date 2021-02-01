@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Medicament') }}</div>

                <div class="card-body">
                  <a href="{{route('medicines.create')}}"
                      class ="btn btn-primary">Adauga medicament nou</a><br><br>
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
                          <td>{{$medicine->name}}</td>
                          <td>{{$medicine->medicinecode}}</td>
                          <td>{{$medicine->price}}</td>
                          <td>
                            <a href="{{route('medicines.edit', $medicine->medicinecode)}}"
                              class="btn btn-sm btn-info">Editeaza</a>
                            <form action="{{route('medicines.destroy', $medicine->medicinecode)}}" method = "POST"
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
                          <td colspan = "4"> Lista de medicamente vida!</td>
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
