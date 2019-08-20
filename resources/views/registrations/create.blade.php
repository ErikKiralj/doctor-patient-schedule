@extends('layouts.master')

@section('content')

    	<div class="col-sm-8">

            <h1>Registracija</h1>

        </div>

        <form method="POST" action="/register">

                {{ csrf_field() }}

                <div class="form-group">
                        <label for="name">Ime i prezime:</label>
                        <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="form-group">
                        <label for="oib">OIB:</label>
                        <input type="text" class="form-control" id="oib" name="oib">
                </div>

                <div class="form-group">
                        <label for="mbo">MBO:</label>
                        <input type="text" class="form-control" id="mbo" name="mbo">
                </div>

                <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" id="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                        <label for="password">Lozinka:</label>
                        <input type="password" id="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                        <label for="password_confirmation">Potvrda lozinke:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                </div>

                <div>
                        <label for="gender">Spol:</label>
                            
                        <input type="radio" name="gender" value="muško">Muško<br>
                        <input type="radio" name="gender" value="žensko">Žensko<br>     
                </div>

                <div class="form-group">
                        <label for="date_of_birth">Datum rođenja:</label>
                        <input type="date" id="date_of_birth" name="date_of_birth" class="form-control">
                </div>

                <div class="form-group">
                        <label for="phone_number">Broj telefona:</label>
                        <input type="text" id="phone_number" name="phone_number" class="form-control">
                </div>

                <div class="form-group">
                        <label for="zip_code">Poštanski broj:</label>
                        <input type="text" id="zip_code" name="zip_code" class="form-control">
                </div>

                <div class="form-group">
                        <label for="address">Adresa:</label>
                        <input type="text" id="address" name="address" class="form-control">
                </div>

                <div class="form-group">
                        <label for="city">Grad:</label>
                        <input type="text" id="city" name="city" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Registriraj se</button>
        </form>

        @include('layouts.errors')

@endsection