@extends ('layouts.master')

@section('content')

        <form method="POST" action="/service">

                {{ csrf_field() }}

                
                <div class="form-group">
                        <label for="service">Usluga:</label>
                        <input type="text" id="service" name="service" class="form-control">
                </div>

                <div>
                <label for="duration">Trajanje usluge:</label>
                <select name="duration">
                        <option value="1">30 minuta</option>
                        <option value="2">60 minuta</option>
                </select>

                <button type="submit" class="btn btn-primary">Dodaj uslugu</button>
        </form>

    

@endsection