@extends('layouts.master')

@section('content')

@if(count($doctors)!=0)

<table class="table table-borderless table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Ime i prezime</th>
      <th scope="col">E-mail adresa</th>
      <th scope="col">Broj telefona</th>
      <th scope="col">Specijalizacija</th>
      <th scope="col">Naziv ordinacije</th>
      <th scope="col">Adresa ordinacije</th>
      <th scope="col">Poštanski broj</th>
      <th scope="col">Grad</th>
      <th scope="col">Opcije</th>
    </tr>
  </thead>
  <tbody>
      @foreach($doctors as $doctor)
                <form method="POST" action="">

                {{ csrf_field() }}

    <tr>
        <td> {{$doctor->id}} </td>
        <td> {{$doctor->name}} </td>
        <td> {{$doctor->email}} </td>
        <td> {{$doctor->phone_number}} </td>
        <td> {{$doctor->spec}} </td>
        <td> {{$doctor->practise_name}} </td>
        <td> {{$doctor->practise_address}} </td>
        <td> {{$doctor->zip_code}} </td>
        <td> {{$doctor->city}} </td>
        <td>
        <input type="hidden" name="doctor_id" id="doctor_id" value="{{$doctor->id}}">
         <div class="btn-group">
        <button type="submit" class="btn btn-primary" formaction="/admin/edit_doc">Uredi</button>
        <button type="submit" class="btn btn-danger" formaction="/admin/delete_doc">Obriši</button>
        </div>
        </td>
    </tr>
           </form>
        @endforeach
  </tbody>
</table>

@else
      <h6>Još nema unesenih liječnika</h6>
      <br>
@endif


<div class="col-sm-8">
        <a class="btn btn-primary" href="/admin/add_doc">Dodaj novog liječnika</a>
</div>

        @include('layouts.errors')

@endsection