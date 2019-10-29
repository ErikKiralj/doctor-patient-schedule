@extends ('layouts.master')

@section('content')

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/lang-all.js"></script>
    
    {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}
    <br>
    @if(count($services)!=0)
            <h4>Ponuđene usluge:</h4>
                <div class="card-deck">

            @foreach($services as $service)
            <form method="post" action="">
                {{ csrf_field() }}
                <div style="max-width: 18rem;" class="border-dark card text-info bg-light mb-3">
                    <div class="card-body">
                        <p class="card-text" style="text-align:center">{{$service->description}}</p>
                        <input type="hidden" name="service_id" id="service_id" value="{{$service->id}}">
                        <button type="submit" class="btn btn-danger" formaction="/service_delete">Obriši uslugu</button>
                    </div>
                </div>
            </form>
            @endforeach
        </div>

        <form method="get" action="/service_add">
                <button type="submit" class="btn btn-primary">Dodaj novu uslugu</button>
        </form>
        <br>

         @else
        <h4>Ponuđene usluge:</h4>
            <h6>Još nema ponuđenih usluga</h6>
            <form method="get" action="/service_add">
                <button type="submit" class="btn btn-primary">Dodaj novu uslugu</button>
        </form>
        <br>
    @endif
@if(count($doctor_appointments)!=0)
        <div>
            <h4>Zabilježeni termini:</h4>
            
            <div class="card-deck">
            @foreach($doctor_appointments as $doctor_appointment)
                
            <div style="max-width: 18rem;" class="{{Carbon\Carbon::now()->gt(Carbon\Carbon::parse($doctor_appointment->date)) ? 'border-dark card text-white bg-success mb-3' : 'border-dark card text-white bg-info mb-3'}}">
            <div class="card-header">{{$doctor_appointment->service->description}}</div>
            <div class="card-body">
                <p class="card-text mojfont">Ime pacijenta: {{$doctor_appointment->user->name}}</p>
                <p class="card-text mojfont">Datum: {{$doctor_appointment->date}}</p>
                <p class="card-text">Početak usluge: {{$doctor_appointment->start}}h</p>
                <p class="card-text">Kraj usluge: {{$doctor_appointment->end}}h</p>
                <p class="card-text">Email: {{$doctor_appointment->user->email}}</p>
                <p class="card-text">Adresa: {{$doctor_appointment->user->address}}</p>
                <p class="card-text">Poštanski broj: {{$doctor_appointment->user->zip_code}}</p>
                <p class="card-text">Grad: {{$doctor_appointment->user->city}}</p>
                <p class="card-text">Broj telefona: {{$doctor_appointment->user->phone_number}}}</p>
                <p class="card-text">Opis poteškoća: {{$doctor_appointment->description}}</p>
                <p class="card-text">Dijagnoza: {{$doctor_appointment->diagnose}}</p>
            </div>

            <div class="bg-danger">
                <form style=" float: left;" class="card-text"method="post" action="/appointment_delete_doc">
                    {{ csrf_field() }}
                        <input type="hidden" name="appointment_id" id="appointment_id" value="{{$doctor_appointment->id}}">
                        <p class="card-text"><button type="submit" class="btn btn-danger">Obriši termin</button></p>       
                </form>
        
                <form style=" float: right; " class="card-text" method="get" action="/diagnose_add">
                    <input type="hidden" name="appointment_id" id="appointment_id" value="{{$doctor_appointment->id}}">
                    <p class="card-text"><button type="submit" class="btn btn-dark">Zabilježi dijagnozu</button></p>
                </form>
            </div>

            </div>
            @endforeach
            </div>
        </div>

         @else
        <h4>Moji termini</h4>
            <h6>Još nema zakazanih termina</h6>
    @endif

@endsection