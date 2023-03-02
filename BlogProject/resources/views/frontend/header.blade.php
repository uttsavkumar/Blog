<header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class=" h5 d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            Blog
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto ms-5 mb-2 justify-content-center mb-md-0">
          <li><a href="{{ route('home') }}" class="nav-link px-2 text-white">Home</a></li>
          <li><a href="{{ route('profile') }}" class="nav-link px-2 text-white">Profile</a></li>
      
        </ul>

     

        <div class="text-end">
          <a href="{{ route('logout') }}" type="button" class="btn btn-outline-light me-2">Logout</a>
        </div>
      </div>
    </div>
  </header>