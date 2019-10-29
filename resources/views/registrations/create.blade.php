@extends('layouts.master')

@section('content')

<div class="card text-black bg-light mb-3" style="text-align:center; width:800px; margin:auto">
<br>
<h1>Registracija</h1>
    <div class="card-deck" style="margin:auto">

        <form method="POST" action="/register">

                {{ csrf_field() }}
                <div class="row" style="width: 700px;">
                <div class="border-light card text-black bg-light mb-3">
                <div class="card-body">

                <div class="form-group">
                        {{-- <label for="name">Ime i prezime:</label> --}}
                        <input type="text" placeholder="Ime i prezime" class="form-control" id="name" name="name">
                </div>

                <div class="form-group">
                        {{-- <label for="oib">OIB:</label> --}}
                        <input type="text" placeholder="Osobni identifikacijski broj" class="form-control" id="oib" name="oib">
                </div>

                <div class="form-group">
                        {{-- <label for="mbo">MBO:</label> --}}
                        <input type="text" placeholder="Matični broj osiguranika" class="form-control" id="mbo" name="mbo">
                </div>

                <div class="form-group">
                        {{-- <label for="email">E-mail:</label> --}}
                        <input type="email" placeholder="E-mail" id="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                        {{-- <label for="password">Lozinka:</label> --}}
                        <input type="password" placeholder="Lozinka" id="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                        {{-- <label for="password_confirmation">Potvrda lozinke:</label> --}}
                        <input type="password" placeholder="Potvrda lozinke" id="password_confirmation" name="password_confirmation" class="form-control">
                </div>

                </div>
                </div>

                <div class="border-light card text-black bg-light mb-3">
                <div class="card-body">

                <div>
                        {{-- <label for="gender">Spol:</label><br> --}}
                        <input type="radio" name="gender" value="muško">Muško
                        <input type="radio" name="gender" value="žensko">Žensko     
                </div>
                <br>

                <div class="form-group">
                        {{-- <label for="date_of_birth">Datum rođenja:</label> --}}
                        <input type="date" id="date_of_birth" name="date_of_birth" class="form-control">
                </div>

                <div class="form-group">
                        {{-- <label for="phone_number">Broj telefona:</label> --}}
                        <input type="text" placeholder="Broj telefona" id="phone_number" name="phone_number" class="form-control">
                </div>

                <div class="form-group">
                        {{-- <label for="zip_code">Poštanski broj:</label> --}}
                        <input type="text" placeholder="Poštanski broj" id="zip_code" name="zip_code" class="form-control">
                </div>

                <div class="form-group">
                        {{-- <label for="address">Adresa:</label> --}}
                        <input type="text" placeholder="Adresa" id="address" name="address" class="form-control">
                </div>

                <div class="form-group">
                        {{-- <label for="city">Grad:</label> --}}
                        <input type="text" placeholder="Grad" id="city" name="city" class="form-control">
                </div>

                </div>
                </div>
                </div>
                <button type="submit" class="btn btn-primary">Registriraj se</button>
                
        </form>

</div>
<br>
        @include('layouts.errors')

@endsection