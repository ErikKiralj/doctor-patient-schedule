<footer class="text-muted">
  <div class="container">

    @if ($flash = session('message'))
        <div class="alert-poruka alert-success" role="alert">
            {{$flash}}
        </div>
      @endif
    
  </div>
</footer>