<!DOCTYPE html>
<html>

<head>
  <title>Bread Box | Contact Us</title>
  @include('home.css')
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->



    <section class="contact_section ">
      <div class="container px-0">
        <div class="heading_container ">
          <h2 class="pt-4 text-center">
            Contact Us
          </h2>
        </div>
      </div>
      <div class="container container-bg">
        <div class="row">
          <div class="col-md-12 col-lg-12 px-0">
            <form action="{{url('send_message')}}" method="POST">
              @csrf
              <div>
                <input type="text" name="name" value="{{$user->name}}" placeholder="Name" />
              </div>
              <div>
                <input type="email" name="email" value="{{$user->email}}" placeholder="Email" />
              </div>
              <div>
                <input type="text" name="phone" value="{{$user->phone}}" placeholder="Phone" />
              </div>
              <div>
                <textarea name="message" class="form-control" placeholder="Message" rows="10"></textarea>
              </div>
              <div class="d-flex ">
                <button>
                  SEND
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>




   

  <!-- info section -->

  @include('home.footer')

  <!-- end info section -->




</body>

</html>