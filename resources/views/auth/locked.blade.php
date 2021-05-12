<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
  <style>
    .invalid-feedback, .valid-feedback {
      bottom: calc(100% + 0px);
      right: 0;
      text-align: center;
      position: absolute;
      color: red;
    }
  </style>
</head>
<body class="ms-body ms-primary-theme">
  <!-- Preloader -->
  <div id="preloader-wrap">
    <div class="spinner spinner-9">
      <div class="ms-cube ms-cube1"></div>
      <div class="ms-cube ms-cube2"></div>
      <div class="ms-cube ms-cube3"></div>
      <div class="ms-cube ms-cube4"></div>
      <div class="ms-cube ms-cube5"></div>
      <div class="ms-cube ms-cube6"></div>
      <div class="ms-cube ms-cube7"></div>
      <div class="ms-cube ms-cube8"></div>
      <div class="ms-cube ms-cube9"></div>
    </div>
  </div>

  <!-- Main Content -->
  <main class="body-content ms-lock-screen">
    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <img class="ms-user-img ms-img-round ms-lock-screen-user" @if(isset(Auth::User()->avatar)) src="{{URL::asset('/uploads/profile-pictures').'/'.Auth::User()->avatar}}" @else src="{{asset('assets/images/sample-user.png')}}" @endif alt="people">
      <h1>{{ Auth::User()->name }}</h1>
      <form method="POST" action="{{ route('login.unlock') }}" aria-label="{{ __('Locked') }}">
        @csrf
        <div class="ms-form-group my-0 mb-0 has-icon fs-14">
          <input id="password" type="password" class="ms-form-input" name="password" placeholder="Enter Password to Unlock"required/>
          <i class="material-icons">security</i>
          @if(Session::has('error'))
          <div class="invalid-feedback">
           <p class="text-danger"> {{ Session::get('error') }}</p>
         </div>
         @endif
       </div>
       <button type="submit" class="btn btn-success">
        {{ __('Unlock') }}
      </button>
    </form>
  </div>
</main>
@include('partials.footer')
</body>
</html>
