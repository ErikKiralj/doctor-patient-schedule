@extends ('layouts.master')

@section('content')

<div style="text-align:center;">
<h3>Online naručivanje pacijenata</h3>
<br>

@if(count($doctors)!=0)
    <div class="card-deck">

        @foreach($doctors as $doctor)
            <form  method="POST" action="/schedule">

                        {{ csrf_field() }}
                <div class="border-dark card text-black bg-primary mb-3">
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
                    
                    <input type="hidden" name="doctor" id="doctor" value="{{$doctor->id}}">
                        <div style="text-align:center; width:100%">
                            <button style="text-align:center; width:100%" type="submit" class="btn btn-primary">Naruči se</button>
                        </div>
                    </ul>
                
                </div>
            </form>
        @endforeach
        </div>

        @else
            <h6>Ne postoji rezultat za pretragu, povratak <a href="http://dipl.local/home">početnu</a> stranicu.</h6>
        @endif
         </div>

@endsection

@include('layouts.errors')