@extends('layouts.master')

@section('content')

<div class="card text-black bg-light mb-3"style="text-align:center; width:400px; margin:auto">
<br>
<h1>Prijava - pacijent</h1>
<br>

    <div class="grid-container mojaKlasa">

        <form method="POST" action="/login">

                {{ csrf_field() }}

                
                <div class="form-group">
                        {{-- <label for="mbo">MBO:</label> --}}
                        <input type="text" placeholder="Matični broj osiguranika" id="mbo" name="mbo" class="form-control">
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