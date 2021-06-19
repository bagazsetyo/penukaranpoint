
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>

  <!-- General CSS Files -->
  @stack('before-style')
  @include('includes.user.style')
  @stack('after-style')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      @include('includes.user.nav')
      @include('includes.user.side')

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
    </div>
  </div>

  <!-- General JS Scripts -->
  @stack('before-script')
  @include('includes.user.script')
  @stack('after-script')
</body>
</html>
