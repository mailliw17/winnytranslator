<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <title>@yield('title')</title>

  {{-- Style --}}
  @include('includes.style')

</head>

<body class="bg-abu">
  {{-- Navbar --}}
  @include('includes.navbar')

  <div class="container-fluid ">
    <div class="row ">

      {{-- Sidebar --}}
      @include('includes.sidebar')

      {{-- Content --}}
      @yield('content')
    </div>
  </div>


  {{-- Script --}}
  @include('includes.script')

</body>

</html>