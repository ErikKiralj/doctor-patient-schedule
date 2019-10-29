@extends('layouts.master')

@section('content')

<div class="card text-black bg-light mb-3"style="text-align:center; width:400px; margin:auto">
<br>
<h1>Prijava - Admin</h1>
<br>
        <div class="grid-container mojaKlasa">

        <form method="POST" action="/admin/login">

                {{ csrf_field() }}

                
                <div class="form-group">
                        {{-- <label for="email">E-mail</label> --}}
                        <input type="email" placeholder="E-mail" id="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                        {{-- <label for="password">Lozinka:</label> --}}
                        <input type="password" placeholder="Lozinka" id="password" name="password" class="form-control">
                </div>

           <button type="submit" class="btn btn-primary">Prijavi se</button>
        </form>
<br>
</div>

        @include('layouts.errors')

@endsection