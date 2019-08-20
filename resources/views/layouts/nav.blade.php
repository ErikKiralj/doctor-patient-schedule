<div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">

      @if(Auth::guard('doctor')->user()==true)
      <a href="{{ URL::to('/logout') }}" class="navbar-brand d-flex align-items-center">Odjava</a>
      <a class="navbar-brand d-flex ml-auto" href="/profile">{{Auth::guard('doctor')->user()->name}}</a>   

      @elseif(Auth::guard('web')->user()==true)
      <a href="{{ URL::to('/') }}" class="navbar-brand d-flex">Naslovnica</a>
      <a href="{{ URL::to('/logout') }}" class="navbar-brand d-flex align-items-center">Odjava</a>
      <a class="navbar-brand d-flex ml-auto" href="/profile">{{Auth::user()->name}}</a>
      
      @else
      <a href="{{ URL::to('/register') }}" class="navbar-brand d-flex align-items-center">Registracija</a>
      <a href="{{ URL::to('/login') }}" class="navbar-brand d-flex align-items-center">Prijava - pacijent</a>
      <a href="{{ URL::to('/dlogin') }}" class="navbar-brand d-flex align-items-center">Prijava - doktor</a>
      @endif

    </div>
  </div>