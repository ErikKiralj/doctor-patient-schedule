@extends ('layouts.master')

@section('content')

<div style="text-align:center;">
<h3>Naručivanje termina kod {{$doctor->name}}</h3>
<br>
    <div class="grid-container">

            <form  method="POST" action="/scheduled_appointment">
                {{ csrf_field() }}

                <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
                <input type="hidden" name="doctor_id" id="doctor_id" value="{{$doctor->id}}">
                <input type="hidden" name="service_id" id="service_id" value="{{$service->id}}">

                <div>
                    <h6>Mogući termini za odabir:</h6>
                    <select style="margin: auto"class="select-css" id="date_and_time" name="date_and_time">
                        @foreach($possibleDates as $possibleDates)
                            <option value="{{$possibleDates}}">{{$possibleDates}}</option>
                        @endforeach
                    </select><br>
                </div>
                <div>    
                    <textarea rows="4" required cols="100" id="description" name="description" placeholder="Unesite opis poteškoća..."></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Nastavak</button>
                        
                <div>
                   

                </div>
            </form>
</div>
@endsection

@include('layouts.errors')