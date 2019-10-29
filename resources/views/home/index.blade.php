@extends('layouts.master')

@section('content')
<br>
<div class="row">
<div class="card-deck border-dark card text-white bg-primary mb-3">
<div class="card-body">
        <h1 class="homeText"><strong>Dobrodošli u aplikaciju za online rezervaciju termina</strong></h1>
        <h4 class="homeText"> Internetska aplikacija za rezervaciju termina prilagođena korisnicima, koja čini postupak rezerviranja 
        termina i upravljanja rasporedom jednostavnim za pacijente i liječnike</h4>
</div>
</div>
</div>

<div class="row justify-content-between">

<div class="col">
<div class="card-deck border-dark card text-white bg-primary">
<div class="card-body">
        <h1 class="homeText"><img src="https://i.ibb.co/gDtWrcw/ambulance.png" width="100"height="100"></h1>
        <h4 class="homeText">Jednostavna i brza pretraga zdravstvenih pregleda, usluga i liječnika</h4>
</div>
</div>
</div>

<div class="col">
<div class="card-deck border-dark card text-white bg-primary ml-auto mr-auto">
<div class="card-body">
        <h1 class="homeText"><img src="https://i.ibb.co/ZWtdJ18/clock.png" width="100"height="100"></h1>
        <h4 class="homeText">Zakazivanje slobodnih termina prema zahtjevima korisnika</h4>
</div>
</div>
</div>

<div class="col">
<div class="card-deck border-dark card text-white bg-primary">
<div class="card-body">
        <h1 class="homeText"><img src="https://i.ibb.co/h7R8bRX/calendar.png" width="100"height="100"></h1>
        <h4 class="homeText">Pregled informacija i kalendara zakazanih usluga jednostavan za korištenje</h4>
</div>
</div>
</div>

</div>

        @include('layouts.errors')

@endsection


  
  