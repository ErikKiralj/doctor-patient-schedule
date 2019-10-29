@extends ('layouts.master')

@section('content')

<div style="text-align:center;">
<h3>Naručivanje termina kod {{$doctor->name}}</h3>
<br>

    <div class="grid-container">

            <form  method="POST" action="/scheduled">
                {{ csrf_field() }}

                <input type="hidden" name="user" id="user" value="{{$user->id}}">
                <input type="hidden" name="doctor" id="doctor" value="{{$doctor->id}}">
                <input type="hidden" name="service_id" id="service_id" value="{{$service->id}}">
                <input type="hidden" name="duration" id="duration" value="{{$service->duration}}">
                

                <div style="display:flex; max-width:40%; margin: 0 auto">
                    <input style="margin: 10px" required type="date" id="appointmentstart" name="appointmentstart" class="form-control">
                    <input style="margin: 10px" required type="date" id="appointmentend" name="appointmentend" class="form-control">
                </div>
    
                <button type="submit" class="btn btn-primary">Nastavak</button>
                        
                <div>
                   

                </div>
            </form>
        </div>

@endsection

@include('layouts.errors')