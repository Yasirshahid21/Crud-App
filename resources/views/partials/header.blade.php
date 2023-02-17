@include ('partials.head')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand col-md-4" href="#"><img src="/images/app-logo.png" alt="" width="50"></a>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
      @guest
      <div class="navbar-nav">
        <a href="{{'login'}}" class="nav-link">Login</a>
        <a href="{{'register'}}" class="nav-link">Register</a>
      </div>
      @else
      <div class="navbar-nav text-right">
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button"
           id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          @if(auth()->user()->is_admin == 1)
            {{Auth::user()->name}}                
          @endif
          @if(auth()->user()->is_admin == 0)
          {{Auth::user()->name}}                
        @endif
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a href="{{route('logout')}}" class="nav-link">Logout</a>
          </div>
        </div>
      </div>
      @endguest
     
    </div>
  </div>
</nav>