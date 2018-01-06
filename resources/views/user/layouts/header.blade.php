
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">Dear Blogger</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{route('home')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('home')}}">Posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('home')}}">Sample Post</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="{{route('home')}}">Contact</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>


          </ul>
        </div>
      </div>
</nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{ asset('user/img/home-bg.jpg')}}')">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Dear Blogger</h1>
              <span class="subheading">A Blog Theme by Mr Ofu</span>
            </div>
          </div>
        </div>
      </div>
    </header>