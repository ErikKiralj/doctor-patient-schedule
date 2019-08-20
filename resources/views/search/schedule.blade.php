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
                <div>
                    
                    <div>
                            @foreach($jobs as $job)
                                <form  method="GET" action="/scheduled">

                                                {{ csrf_field() }}
                                        <div>
    
                                            <input type="hidden" name="user" id="user" value="{{$user->id}}">
                                            <input type="hidden" name="doctor" id="doctor" value="{{$doctor->id}}">

                                            <input type="hidden" name="job_id" id="job_id" value="{{$job->id}}"> 
                                            <button type="submit" class="btn btn-primary">Odaberi termin za {{$job->description}} </button>
                                        
                                        </div>
                                    </form>
                            @endforeach
                    </div>

                </div>
            </form>

@endsection