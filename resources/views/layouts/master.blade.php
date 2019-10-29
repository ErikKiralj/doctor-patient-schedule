
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Online naručivanje pacijenata</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/album/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <!-- <link href="{{ URL::to('/css/app.css') }}" rel="stylesheet"> -->
    <link href="/css/app.css" rel="stylesheet">

  </head>

  @include('layouts.nav')
  <br>

  @if (\Request::is('/'))
      <body style="background-image: url('storage/55.jpg')"> 
  @endif

      <div class="container-fluid">
      <div class="row ">

    @if(Auth::guard('web')->user()==true)
      <nav class="col-md-2 d-none d-md-block sidebar">
        <div class="sidebar-sticky" >
           @if(Auth::check())
                <div class="border-dark card text-black bg-primary mb-3" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title text-white">{{$user->name}}</h5>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">OIB: {{$user->oib}}</li>
                    <li class="list-group-item">MBO: {{$user->mbo}}</li>
                    <li class="list-group-item">Email: {{$user->email}}</li>
                    <li class="list-group-item">Spol: {{$user->gender}}</li>
                    <li class="list-group-item">Datum rođenja: {{$user->date_of_birth}}</li>
                    <li class="list-group-item">Broj telefona: {{$user->phone_number}}</li>
                    <li class="list-group-item">Poštanski broj: {{$user->zip_code}}</li>
                    <li class="list-group-item">Adresa: {{$user->address}}</li>
                    <li class="list-group-item">Grad: {{$user->city}}</li>
                  </ul>
                </div>
              @else

              @endif
        
        @if(Auth::guard('web')->user()==true and (\Request::is('profile') or \Request::is('edit_user'))) 
       <div>
          <form method="GET" action="">
            <button  type="submit" class="btn btn-primary" formaction="/edit_user">Uredi profil</button>
          </form>
       </div>
       
       @endif
       </div>
    </nav>
@endif

    @if(Auth::guard('doctor')->user()==true)
      <nav class="col-md-2 d-none d-md-block sidebar">
        <div class="sidebar-sticky" >
                <div class="border-dark card text-black bg-primary mb-3" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title text-white">{{$doctor->name}}</h5>
                  </div>
                  <ul class="list-group list-group-flush">
                        <li class="list-group-item">Email: {{$doctor->email}}</li>
                        <li class="list-group-item">Broj telefona: {{$doctor->phone_number}}</li>
                        <li class="list-group-item">Specijalizacija: {{$doctor->spec}}</li>
                        <li class="list-group-item">Naziv ordinacije: {{$doctor->practise_name}}</li>
                        <li class="list-group-item">Adresa ordinacije: {{$doctor->practise_address}}</li>
                        <li class="list-group-item">Poštanski broj: {{$doctor->zip_code}}</li>
                        <li class="list-group-item">Grad: {{$doctor->city}}</li>
                  </ul>
                </div>
        @endif

        @if(Auth::guard('doctor')->user()==true and (\Request::is('dlogin') or \Request::is('edit_doctor') or \Request::is('service_delete') or \Request::is('doctor/home') or \Request::is('service_add') or \Request::is('diagnose_add'))) 
       <div>
          <form method="GET" action="">
            <button type="submit" class="btn btn-primary" formaction="/edit_doctor">Uredi profil</button>
          </form>
       </div>

       </nav>
       @endif
  
        <div class="container">

            @yield('content')
           
        </div> 

  </div>
</div>
{{-- 
      @if($errors->any())
        <div class="alert-poruka alert-success" role="alert">{{$errors->first()}}</div>
      @endif --}}

    @include('layouts.foot')
    

</html>
