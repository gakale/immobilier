<!DOCTYPE html>
<html lang="fr">
@include('layouts.head')

<body>

@include('layouts.header')
@include('layouts.details-user')

  @yield('content')


  @include('layouts.footer')
</body>
