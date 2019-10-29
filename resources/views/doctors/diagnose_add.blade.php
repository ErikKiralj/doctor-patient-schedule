@extends ('layouts.master')

@section('content')

<div style="text-align:center;">

<h3>Dodavanje dijagnoze</h3>
<br>
    <div class="grid-container mojaKlasa">

        <form class="item4" method="POST" action="/diagnose_add">

                {{ csrf_field() }}

                <div style="margin: auto">    
                    <textarea rows="4" required cols="30" id="diagnose" name="diagnose" placeholder="Unesite dijagnozu..."></textarea>
                </div>

                <input type="hidden" name="appointment_id" id="appointment_id" value="{{$appointment_id}}">
                <button type="submit" class="btn btn-primary">Zabilježi dijagnozu</button>
        </form>
    </div>
</div>

@endsection