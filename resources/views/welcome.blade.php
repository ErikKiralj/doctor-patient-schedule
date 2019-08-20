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

        <form class="item4" method="POST" action="/search">

                {{ csrf_field() }}

            <div>
                <select id="spec" name="spec">
                    <option value="" selected disabled hidden>Odabir zavoda</option>
                    <option value="kirurg">Klinika za kirurgiju</option>
                    <option value="pedijatar">Klinika za pedijatriju</option>
                    <option value="neurolog">Klinika za neurologiju</option>
                    <option value="infektolog">Klinika za infektologiju</option>
                    <option value="zubar">Dentalna medicina</option>
                </select><br>

                <div>
                    <input style="text-align:center" type="text" id="city" name="city" placeholder="Grad">
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Pretraži</button>
                </div>
            </div>
            </form> 
    </div>

@endsection