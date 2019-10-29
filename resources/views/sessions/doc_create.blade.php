@extends('layouts.master')

@section('content')

<div class="card text-black bg-light mb-3"style="text-align:center; width:400px; margin:auto">
<br>
<h1>Prijava - liječnik</h1>
<br>
    <div class="grid-container mojaKlasa">

        <form method="POST" action="/dlogin">

                {{ csrf_field() }}

                
                <div class="form-group">
                        {{-- <label for="email">Email:</label> --}}
                        <input type="email" placeholder="E-mail" id="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                        {{-- <label for="password">Lozinka:</label> --}}
                        <input type="password" placeholder="Lozinka" id="password" name="password" class="form-control">
                </div>
               
                <button type="submit" class="btn btn-primary">Prijavi se</button>
                {{-- <br>
                <a href="http://dipl.local/">Ponovno postavljanje lozinke</a> --}}
        </form>
<br>
</div>

        @include('layouts.errors')

@endsection