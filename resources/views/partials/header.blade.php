@include ('partials.head')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand col-md-4" href="#"><img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24"></a>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
      @guest
      <div class="navbar-nav">
        <a href="{{'login'}}" class="nav-link">Login</a>
        <a href="{{'register'}}" class="nav-link">Register</a>
      </div>
      @else
      <div class="navbar-nav text-right">
      <a href="{{'logout'}}" class="nav-link">Logout</a>
      </div>
      @endguest
     
    </div>
  </div>
</nav>