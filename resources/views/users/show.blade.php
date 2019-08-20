@extends ('layouts.master')

@section('content')

    <h1>Profil</h1>

    <div class="span8">
            <h3>{{$user->name}}</h3>
            <h6>OIB: {{$user->oib}}</h6>
            <h6>MBO: {{$user->mbo}}</h6>
            <h6>Email: {{$user->email}}</h6>
            <h6>Spol: {{$user->gender}}</h6>
            <h6>Datum rođenja: {{$user->date_of_birth}}</h6>
            <h6>Broj telefona: {{$user->phone_number}}</h6>
            <h6>Poštanski broj: {{$user->zip_code}}</h6>
            <h6>Adresa: {{$user->address}}</h6>
            <h6>Grad: {{$user->city}}</h6> 
    </div>

@endsection