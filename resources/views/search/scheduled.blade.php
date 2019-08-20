@extends ('layouts.master')

@section('content')

<h3>Naručivanje termina kod doktora {{$doctor->name}}</h3>

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

            <form  method="POST" action="/scheduled">
                {{ csrf_field() }}

                <input type="hidden" name="user" id="user" value="{{$user->id}}">
                <input type="hidden" name="doctor" id="doctor" value="{{$doctor->id}}">
                <input type="hidden" name="job_id" id="job_id" value="{{$job->id}}">

                <div>
                    <input style="text-align:center" type="textbox" id="description" name="description" placeholder="Opis poteškoća">
                </div>

                <select id="appointment" name="appointment">
                            <option value="" selected disabled hidden>Odabir termina</option>
                            <option value="08:00">08:00</option>
                            <option value="09:00">09:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                </select>

                <button type="submit" class="btn btn-primary">Naruči se za {{$job->description}} </button>
                        
                <div>
                   

                </div>
            </form>

@endsection