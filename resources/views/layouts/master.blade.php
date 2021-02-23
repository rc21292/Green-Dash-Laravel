<!DOCTYPE html>
<html lang="en">

<head>
  @include('partials.head')
</head>

<body class="ms-body ms-aside-left-open ms-primary-theme ">
  <!-- Preloader -->
  <div id="preloader-wrap">
    <div class="spinner spinner-8">
      <div class="ms-circle1 ms-child"></div>
      <div class="ms-circle2 ms-child"></div>
      <div class="ms-circle3 ms-child"></div>
      <div class="ms-circle4 ms-child"></div>
      <div class="ms-circle5 ms-child"></div>
      <div class="ms-circle6 ms-child"></div>
      <div class="ms-circle7 ms-child"></div>
      <div class="ms-circle8 ms-child"></div>
      <div class="ms-circle9 ms-child"></div>
      <div class="ms-circle10 ms-child"></div>
      <div class="ms-circle11 ms-child"></div>
      <div class="ms-circle12 ms-child"></div>
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