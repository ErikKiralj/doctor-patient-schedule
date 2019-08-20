@extends('layouts.master')

@section('content')

    	<div class="col-sm-8">

            <h1>Prijava -doktor</h1>

        </div>

        <form method="POST" action="/dlogin">

                {{ csrf_field() }}

                
                <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                        <label for="password">Lozinka:</label>
                        <input type="password" id="password" name="password" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Prijavi se</button>
        </form>

        @include('layouts.errors')

@endsection