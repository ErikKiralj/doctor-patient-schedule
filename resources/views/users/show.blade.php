@extends ('layouts.master')

@section('content')

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/lang-all.js"></script>
    
    <div stlye="background-color: #A0A8A0;">
    {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}
    </div>
    <br>

    @if(count($appointment)!=0)
<h1>Moji termini</h1>
<div class="card-deck">

    @foreach ($appointment as $termin)
    <form method="post" action="">
                {{ csrf_field() }}
            <div style="max-width: 18rem;" class="{{Carbon\Carbon::now()->gt(Carbon\Carbon::parse($termin->date)) ? 'border-dark card text-white bg-success mb-3' : 'border-dark card text-white bg-info mb-3'}}">
            <div class="card-header">{{$termin->service->description}}</div>
            <div class="card-body">
                <p class="card-text">Liječnik: {{$termin->doctor->name}}</p>
                <p class="card-text">Datum: {{$termin->date}}</p>
                <p class="card-text">Početak usluge: {{$termin->start}}h</p>
                <p class="card-text">Kraj usluge: {{$termin->end}}h</p>
                <p class="card-text">Opis poteškoća: {{$termin->description}}</p>
                <p class="card-text">Dijagnoza: {{$termin->diagnose}}</p>
                <p class="card-text">Email: {{$termin->doctor->email}}</p>
                <p class="card-text">Broj telefona: {{$termin->doctor->phone_number}}</p>
                <p class="card-text">Naziv ordinacije: {{$termin->doctor->practise_name}}</p>
                <p class="card-text">Adresa ordinacije: {{$termin->doctor->practise_address}}</p>
            </div>
                    <input type="hidden" name="appointment_id" id="appointment_id" value="{{$termin->id}}">
                    <button type="submit" class="btn btn-primary" formaction="/appointment_delete">Obriši termin</button>
            </div>
        </form>

    @endforeach    
    </div>
    @else
        <h4>Moji termini</h4>
            <h6>Još nema zakazanih termina</h6>
    @endif

@endsection