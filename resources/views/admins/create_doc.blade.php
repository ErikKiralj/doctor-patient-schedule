@extends('layouts.master')

@section('content')

    	<div class="col-sm-8">

            <h1>Registracija liječnika</h1>

        </div>

        <form method="POST" action="/admin/add_doc">

                {{ csrf_field() }}

                <div class="form-group">
                        <label for="name">Ime i prezime:</label>
                        <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" id="email" name="email" class="form-control">
                </div>

                {{-- <div class="form-group">
                        <label for="password">Lozinka:</label>
                        <input type="password" id="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                        <label for="password_confirmation">Potvrda lozinke:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                </div> --}}

                <div class="form-group">
                        <label for="phone_number">Broj telefona:</label>
                        <input type="text" id="phone_number" name="phone_number" class="form-control">
                </div>

                <div class="form-group">
                        <label for="spec">Specijalizacija:</label>
                        <input type="text" id="spec" name="spec" class="form-control">
                </div>

                <div class="form-group">
                        <label for="practise_name">Naziv ordinacije:</label>
                        <input type="text" id="practise_name" name="practise_name" class="form-control">
                </div>

                <div class="form-group">
                        <label for="practise_address">Adresa ordinacije:</label>
                        <input type="text" id="practise_address" name="practise_address" class="form-control">
                </div>

                <div class="form-group">
                        <label for="zip_code">Poštanski broj:</label>
                        <input type="text" id="zip_code" name="zip_code" class="form-control">
                </div>

                <div class="form-group">
                        <label for="city">Grad:</label>
                        <input type="text" id="city" name="city" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Registriraj liječnika</button>
        </form>

        @include('layouts.errors')

@endsection