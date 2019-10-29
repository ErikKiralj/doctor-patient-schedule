<div class="navbar navbar-dark bg-primary" style="navbar-height: 50px">
    <div class="container d-flex justify-content-between">

      @if(Auth::guard('doctor')->user()==true)
      <a href="{{ URL::to('/doctor/home') }}" class="navbar-brand d-flex">Naslovnica</a>
      <a href="{{ URL::to('/logout') }}" class="navbar-brand d-flex align-items-center">Odjava</a>
      <a class="navbar-brand d-flex ml-auto" href="javascript:history.go(0)">{{Auth::guard('doctor')->user()->name}}</a>   

      @elseif(Auth::guard('web')->user()==true)
      <a href="{{ URL::to('/home') }}" class="navbar-brand d-flex">Naslovnica</a>
      <a href="{{ URL::to('/logout') }}" class="navbar-brand d-flex align-items-center">Odjava</a>
      <a class="navbar-brand d-flex ml-auto" href="/profile">{{Auth::user()->name}}</a>

      @elseif(Auth::guard('admin')->user()==true)
      <a href="{{ URL::to('/logout') }}" class="navbar-brand d-flex align-items-center">Odjava</a>
      <a class="navbar-brand d-flex ml-auto" href="/admin/show_doc">{{Auth::guard('admin')->user()->name}}</a>
      
      @else
      {{-- <a href="{{ URL::to('/admin/login') }}" class="navbar-brand d-flex align-items-center">Admin</a> --}}
      <a href="{{ URL::to('/') }}"><img src="https://i.ibb.co/LJk5vCd/33.png" width="200"height="40"></a>
      <a href="{{ URL::to('/register') }}" class="navbar-brand align-items-right">Registracija</a>
      <a href="{{ URL::to('/login') }}" class="navbar-brand d-flex align-items-right">Prijava - pacijent</a>
      <a href="{{ URL::to('/dlogin') }}" class="navbar-brand d-flex align-items-right">Prijava - liječnik</a>
      @endif

    </div>
  </div>
  