<!DOCTYPE html>
<html lang="en">

<head>
  @include('partials.head')
</head>

<body class="ms-body ms-aside-left-open ms-primary-theme ">
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
  @include('partials.sidebar')
  <!-- Main Content -->
  <main class="body-content">
    @include('partials.header')
    <div class="ms-content-wrapper">
      @yield('content')
    </div>
    @include('partials.footer')
  </main>
</body>
</html>