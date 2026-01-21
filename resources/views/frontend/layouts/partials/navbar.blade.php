  <nav class="navbar navbar-expand-lg custom-navbar">
      <div class="container">

          <!-- Logo (Left) -->
          <a class="navbar-brand nav-logo-wrap" href="#">
              <img src="{{ asset('frontend/images/navbar-logo.png') }}" alt="Logo" class="nav-logo">

          </a>


          <!-- Toggle Button (Right on MD/Mobile) -->
          <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
              <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Navbar Content -->
          <div class="collapse navbar-collapse" id="mainNavbar">

              <!-- Center Menu -->
              <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                  <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
              </ul>

              <!-- Contact Button (Right Desktop) -->
              <div class="d-none d-lg-block">
                  <a href="#" class="btn btn-contact">Contact</a>
              </div>

          </div>
      </div>
  </nav>
