<!DOCTYPE html>
<html>

<head>
  <title>Bread Box | Shop</title>
  @include('home.css')
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->

  <!-- shop section -->

  @include('home.product')

  <!-- end shop section -->



 




</body>

</html>