@extends ('layouts.master')

@section('content')

    <h1>Profil doktora {{$doctor->name}}</h1>

    <div>
        <h6>Email: {{$doctor->email}}</h6>
        <h6>Broj telefona: {{$doctor->phone_number}}</h6>
        <h6>Specijalizacija: {{$doctor->spec}}</h6>
        <h6>Naziv ordinacije: {{$doctor->practise_name}}</h6>
        <h6>Adresa ordinacije: {{$doctor->practise_address}}</h6>
        <h6>Poštanski broj: {{$doctor->zip_code}}</h6>
        <h6>Grad: {{$doctor->city}}</h6>
    </div>

    <br>

    <div>
    <h6>Ponuđene usluge:</h6>
    @foreach($jobs as $job)
    <li>{{$job->description}}</li>
    @endforeach
    </div>

    <form method="get" action="/service">
        <button type="submit" class="btn btn-primary">Dodaj novu uslugu</button>
    </form>

@endsection