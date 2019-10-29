@extends ('layouts.master')

@section('content')

<div style="text-align:center;">
<h3>Naručivanje termina kod {{$doctor->name}}</h3>
<br>
            <div class="card-deck" style="display:flex;">
                <div class="border-dark card text-black bg-primary mb-3" style="max-width:40%;">
                    <div class="card-body text-white">
                        <h3>{{$doctor->name}}</h3>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Email: {{$doctor->email}}</li>
                        <li class="list-group-item">Broj telefona: {{$doctor->phone_number}}</li>
                        <li class="list-group-item">Specijalizacija: {{$doctor->spec}}</li>
                        <li class="list-group-item">Naziv ordinacije: {{$doctor->practise_name}}</li>
                        <li class="list-group-item">Adresa ordinacije: {{$doctor->practise_address}}</li>
                        <li class="list-group-item">Poštanski broj: {{$doctor->zip_code}}</li>
                        <li class="list-group-item">Grad: {{$doctor->city}}</li>
                    </ul>  
                </div>
                <div style="width: 500px; height: 400px; margin:auto">
	                    {!! Mapper::render() !!}
                </div>
            </div>

    <div class="card-deck">
               @if(count($services)!=0)
                            @foreach($services as $service)
                                <form  method="GET" action="/scheduled">
                                                {{ csrf_field() }}
                                        <div >
                                            <input type="hidden" name="user" id="user" value="{{$user->id}}">
                                            <input type="hidden" name="doctor" id="doctor" value="{{$doctor->id}}">
                                            <input type="hidden" name="service_id" id="service_id" value="{{$service->id}}">
                                            <input type="hidden" name="duration" id="duration" value="{{$service->duration}}"> 
                                            <button style="margin: 10px;" type="submit" class="btn btn-primary">Odaberi termin za {{$service->description}} </button>
                                        </div>
                                    </form>
                            @endforeach
                @else
                  <h6>Liječnik još nema ponuđenih usluga,povratak <a href="http://dipl.local/home">početnu</a> stranicu.</h6>
                @endif
            </div>

@endsection

@include('layouts.errors')