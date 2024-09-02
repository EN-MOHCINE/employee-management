@extends("welcome")
@section("content")
<!-- Section: Design Block -->

<section class="vh-100" style="background-color: #7257fa;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <form method="POST" action="{{ route('login.store') }}">
              @csrf
              <h3 class="mb-5">Sign in</h3>
          
              
          
              <div data-mdb-input-init class="form-outline mb-4">
                  <input type="email" id="typeEmailX-2" name="email" class="form-control form-control-lg" placeholder="Email" value="{{ old('email') }}" required />
              </div>
          
              <div data-mdb-input-init class="form-outline mb-4">
                  <input type="password" id="typePasswordX-2" name="password" class="form-control form-control-lg" placeholder="Password" required />
              </div>
          
              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-start mb-4">
                  <input class="form-check-input" type="checkbox" name="remember" id="form1Example3" />
                  <label class="form-check-label" for="form1Example3"> Remember password </label>
              </div>
              @if($errors->any())
                  <div class="alert alert-danger">
                      
                          @foreach ($errors->all() as $error)
                              {{ $error }}
                          @endforeach
                      </ul>
                  </div>
              @endif
          
              <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" style="background-color: #7257fa;" type="submit">
                  <i class="fas fa-sign-in-alt"></i> Login
              </button>
          
              <hr class="my-4">
          
              {{-- <button data-mdb-button-init data-mdb-ripple-init class="btn btn-lg btn-block btn-success mb-2" type="submit">
                  <i class="fas fa-user-plus me-2"></i>Sign Up
              </button> --}}
          </form>
          
        </div>
      </div>
    </div>
  </div>
</section>


@endsection