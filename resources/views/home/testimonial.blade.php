<!DOCTYPE html>
<html>

<head>
  <title>Bread Box | Testimonial</title>
  @include('home.css')
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->




    <section class="client_section layout_padding">
        <div class="container">
          <div class="heading_container heading_center">
            <h2>
              Testimonial
            </h2>
          </div>
        </div>
        <div class="container px-0">
          <div id="customCarousel2" class="carousel  carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="box">
                  <div class="client_info">
                    <div class="client_name">
                      <h5>
                        Veronica M.
                      </h5>
                      <h6>
                        Deliciously Satisfied!
                      </h6>
                    </div>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </div>
                  <p>
                    I’ve tried bread from all over, but Bread Box Shop takes the cake—well, the baguette! Their sourdough is like a warm hug for your taste buds. Plus, lightning-fast delivery means I never have to wait long for my carb fix.
                  </p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="box">
                  <div class="client_info">
                    <div class="client_name">
                      <h5>
                        Ethan B.
                      </h5>
                      <h6>
                        Bread Heaven!
                      </h6>
                    </div>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </div>
                  <p>
                    As a self-proclaimed bread enthusiast, I’m picky about quality. Bread Box Shop delivers every time. The crusty ciabatta? Divine. And free shipping? Yes, please! My mornings just got a whole lot better.
                  </p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="box">
                  <div class="client_info">
                    <div class="client_name">
                      <h5>
                        Sophia L.
                      </h5>
                      <h6>
                        Artisanal Bliss
                      </h6>
                    </div>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </div>
                  <p>
                    When I want bread that’s more than just sustenance, I turn to Bread Box Shop. Their attention to detail and commitment to freshness make each loaf an experience. It’s like they sprinkle magic flour on every order!
                  </p>
                </div>
              </div>
            </div>
            <div class="carousel_btn-box">
              <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </section>



   

  <!-- info section -->

  @include('home.footer')

  <!-- end info section -->




</body>

</html>