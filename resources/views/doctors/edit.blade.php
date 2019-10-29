@extends('layouts.master')

@section('content')

    	<div class="col-sm-8">

            <h1>Uređivanje profila</h1>

        </div>

        <form method="POST" action="/edit_doctor">

                {{ csrf_field() }}

                {{ method_field('patch') }}

                <input type="hidden" name="doctor_id" id="doctor_id" value="{{$doctor->id}}">

                <div class="form-group">
                        <label for="name">Ime i prezime:</label>
                        <input type="text" value="{{$doctor->name}}" class="form-control" id="name" name="name">
                </div>

                <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" value="{{$doctor->email}}" id="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                        <label for="password">Lozinka:</label>
                        <input type="password" id="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                        <label for="password_confirmation">Potvrda lozinke:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                </div>

                <div class="form-group">
                        <label for="phone_number">Broj telefona:</label>
                        <input type="text" value="{{$doctor->phone_number}}" id="phone_number" name="phone_number" class="form-control">
                </div>

                <div class="form-group">
                        <label for="spec">Specijalizacija:</label>
                        <input type="text" value="{{$doctor->spec}}" id="spec" name="spec" class="form-control">
                </div>

                <div class="form-group">
                        <label for="practise_name">Naziv ordinacije:</label>
                        <input type="text" value="{{$doctor->practise_name}}" id="practise_name" name="practise_name" class="form-control">
                </div>

                <div class="form-group">
                        <label for="practise_address">Adresa ordinacije:</label>
                        <input type="text" value="{{$doctor->practise_address}}" id="practise_address" name="practise_address" class="form-control">
                </div>

                <div class="form-group">
                        <label for="zip_code">Poštanski broj:</label>
                        <input type="text" value="{{$doctor->zip_code}}" id="zip_code" name="zip_code" class="form-control">
                </div>

                <div class="form-group">
                        <label for="city">Grad:</label>
                        <input type="text" value="{{$doctor->city}}" id="city" name="city" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Spremi promjene</button>
        </form>

        @include('layouts.errors')

@endsection