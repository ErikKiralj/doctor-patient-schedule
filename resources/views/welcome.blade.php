@extends ('layouts.master')

@section('content')

<div style="text-align:center;">

<h3>Online naručivanje pacijenata</h3>
<br>
    <div class="grid-container mojaKlasa">

        <form class="item4" method="POST" action="/search">

                {{ csrf_field() }}

            <div>
                <select required class="select-css" id="spec" name="spec">
                    <option value="" selected disabled hidden>Odabir zavoda</option>
                    <option value="infektolog">Infektologija</option>
                    <option value="zubar">Dentalna medicina</option>
                    <option value="neurokirurg">Neurokirurgija</option>
                    <option value="dermatolog">Dermatologija</option>
                    <option value="ortoped">Ortopedija</option>
                    <option value="kirurg">Kirurgija</option>
                    <option value="pedijatar">Pedijatrija</option>
                    <option value="neurolog">Neurologija<option>       
                </select><br>
            </div>

            <div>
                <select required class="select-css" id="city" name="city">
                    <option value="" selected disabled hidden>Odabir grada</option>
                    <option value="Osijek">Osijek</option>
                    <option value="Zagreb">Zagreb</option>
                    <option value="Split">Split</option>
                    <option value="Rijeka">Rijeka</option>
                </select><br>
            </div>
            

            <div>
                <button type="submit" class="btn btn-primary">Pretraži</button>
            </div>

            </div>
            </form> 
    </div>
    <br>
    <br>

    <div class="row justify-content-between">

<div class="col">
<div class="card-deck border-light card text-black">
<div class="card-body">
        <h4><img src="https://i.ibb.co/4SrRyzb/1.png" width="70"height="50">0800 0000</h4>
</div>
</div>
</div>

<div class="col">
<div class="card-deck border-light card text-black  ml-auto mr-auto">
<div class="card-body">
        <h4><img src="https://i.ibb.co/12qBdz3/2.png" width="70"height="50">info@example.com</h4>
</div>
</div>
</div>

<div class="col">
<div class="card-deck border-light card text-black">
<div class="card-body">
        <h4><img src="https://i.ibb.co/X4BDN4t/3.png" width="70"height="50">08:00h - 16:00h</h4>
</div>
</div>
</div>

</div>

</div>

@endsection