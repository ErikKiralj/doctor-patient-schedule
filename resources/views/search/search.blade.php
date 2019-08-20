@extends ('layouts.master')

@section('content')

<h3>Online naručivanje pacijenata</h3>

    <div class="grid-container">

        @if(Auth::check())
            <div class="item2">
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
        @else

        @endif

        
        @foreach($doctors as $doctor)
            <form  method="POST" action="/schedule">

                        {{ csrf_field() }}
                <div>
                    <h3>{{$doctor->name}}</h3>
                    <h6>Email: {{$doctor->email}}</h6>
                    <h6>Broj telefona: {{$doctor->phone_number}}</h6>
                    <h6>Specijalizacija: {{$doctor->spec}}</h6>
                    <h6>Naziv ordinacije: {{$doctor->practise_name}}</h6>
                    <h6>Adresa ordinacije: {{$doctor->practise_address}}</h6>
                    <h6>Poštanski broj: {{$doctor->zip_code}}</h6>
                    <h6>Grad: {{$doctor->city}}</h6>

                    <input type="hidden" name="doctor" id="doctor" value="{{$doctor->id}}">

                    <div>
                        <div>
                            <button type="submit" class="btn btn-primary">Naruči se</button>
                        </div>
                    </div>
                
                </div>
            </form>
        @endforeach

@endsection