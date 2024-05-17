<style>
    body {
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
  }

</style>



  <!-- Slider section -->
  <section class="slider_section ">
      <div class="slider_bg_box">
        <img src="assets/img/background.jpg"  alt="">
      </div>
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 ">
                  <div class="detail-box">
                    <h1 class="info121">
                    Book Your Ride,  <br>
                    Easy Online Bus Reservations
                    </h1>
                    <p >
                    Discover the convenience of booking your bus ride 
                    online with our user-friendly reservation system. Say goodbye 
                    to long queues and last-minute hassles – secure your seat with 
                    just a few clicks!
                    </p>
                    <div class="btn-box">
                      <?php if(isset($_SESSION['admin_login_id'])): ?>
                        <br><br><br><h1 ><small>Welcome</small>, <span style="color:skyblue;"><?php echo $_SESSION['admin_login_name'] ?></span></h1>

                      <?php elseif(isset($_SESSION['user_login_id'])): ?>

                        <br><br><br><h1 ><small>Welcome</small>, <span style="color:skyblue;"><?php echo $_SESSION['user_login_name'] ?></span></h1>
                        <button class="btn1" type="button" id="book_now">Reserve Your Tickets Now</button>
                      <?php else: ?>
                        <button class="btn1" type="button" disabled id="book_now" style="background-color: gray;">Reserve Your Tickets Now</button>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 ">
                  <div class="detail-box">
                    <h1 class="info121">
                    Seamless Bus Booking, <br>
                    Your Journey Starts Here
                    </h1 >
                    <p>
                    Start your journey on the right foot by reserving your bus tickets effortlessly through 
                    our seamless online platform. Enjoy a stress-free experience as you select your preferred routes, 
                    timings, and seats, all from the comfort of your own home.
                    </p>
                    <div class="btn-box">
                      <?php if(isset($_SESSION['admin_login_id'])): ?>
                        <br><br><br><h1 ><small>Welcome</small>, <span style="color:skyblue;"><?php echo $_SESSION['admin_login_name'] ?></span></h1>

                      <?php elseif(isset($_SESSION['user_login_id'])): ?>

                        <br><br><br><h1 ><small>Welcome</small>, <span style="color:skyblue;"><?php echo $_SESSION['user_login_name'] ?></span></h1>
                        <button class="btn1" type="button" id="book_now">Reserve Your Tickets Now</button>
                      <?php else: ?>
                        <button class="btn1" type="button" disabled id="book_now" style="background-color: gray;">Reserve Your Tickets Now</button>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 ">
                  <div class="detail-box">
                    <h1 class="info121">
                    Travel Smarter <br>
                    Fast and Reliable Bus Reservations
                    </h1 >
                    <p>
                    Travel smarter with our fast and reliable online bus reservation system. Whether you're planning a solo
                     trip or a group excursion, our platform ensures a smooth booking process and guarantees your spot on the bus.
                      Say hello to hassle-free travel planning!
                    </p>
                    <div class="btn-box">
                      <?php if(isset($_SESSION['admin_login_id'])): ?>
                        <br><br><br><h1 ><small>Welcome</small>, <span style="color:skyblue;"><?php echo $_SESSION['admin_login_name'] ?></span></h1>

                      <?php elseif(isset($_SESSION['user_login_id'])): ?>

                        <br><br><br><h1><small>Welcome</small>, <span style="color:skyblue;"><?php echo $_SESSION['user_login_name'] ?></span></h1>
                        <button class="btn1" type="button" id="book_now">Reserve Your Tickets Now</button>
                      <?php else: ?>
                        <button class="btn1" type="button" disabled id="book_now" style="background-color: gray;">Reserve Your Tickets Now</button>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <ol class="carousel-indicators">
          <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
          <li data-target="#customCarousel1" data-slide-to="1"></li>
          <li data-target="#customCarousel1" data-slide-to="2"></li>
        </ol>
      </div>

  </section>








<?php if(!isset($_SESSION['admin_login_id'])): ?>
  <!-- client section -->
  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
           <span> What Our Client Say</span>
        </h2>
      </div>
      <div class="client_container">
        <div class="carousel-wrap ">
            
            <div class="owl-carousel">
              <div class="item">
                <div class="box">
                  <div class="detail-box">
                    <p>
                      <i>I am thoroughly impressed with the online bus reservation system. The layout is clean, and the steps to 
                        book a ticket are straightforward. I particularly liked the ability to choose my seat and see the bus layout 
                        in advance. The confirmation email with all the details was very reassuring. I will definitely recommend this 
                        service to friends and family!</i>
                    </p>
                  </div>
                  <div class="client_id">
                    <div class="img-box">
                      <img src="assets/img/clients/user.png" alt="" class="img-1">
                    </div>
                    <div class="name">
                      <h6>
                      Thandiwe 
                      </h6>
                      <p>
                      Nkosi
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="box">
                  <div class="detail-box">
                    <p>
                    Using the online bus reservation system was a fantastic experience. The search functionality allowed me to find the best routes 
                    and prices quickly. I appreciated the option to filter by departure times 
                    and bus types. The payment process was secure and hassle-free. Great job on making bus travel so accessible and convenient!
                    </p>
                  </div>
                  <div class="client_id">
                    <div class="img-box">
                      <img src="assets/img/clients/user.png" alt="" class="img-1" >
                    </div>
                    <div class="name">
                      <h6>
                      Sipho 
                      </h6>
                      <p>
                      Mokoena
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="box">
                  <div class="detail-box">
                    <p>
                    The bus reservation system exceeded my expectations. It was incredibly easy to navigate, and I loved the
                     detailed information provided for each bus route. The customer support chat feature was a
                     lifesaver when I had a query about my booking. Everything worked flawlessly from start to finish. Thank 
                     you for making travel planning so simple!
                  </div>
                  <div class="client_id">
                    <div class="img-box">
                      <img src="assets/img/clients/user.png" alt="" class="img-1">
                    </div>
                    <div class="name">
                      <h6>
                      Naledi 
                      </h6>
                      <p>
                      Mahlangu
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="box">
                  <div class="detail-box">
                    <p>
                    I had a wonderful experience with the online reservation system. The site is very user-friendly, and the booking process is
                     quick and efficient. I was particularly impressed with the accurate real-time updates on bus availability and schedules.
                     The reminders and notifications sent to my email were very helpful. This service has made my travel planning stress-free and enjoyable!
                    </p>
                  </div>
                  <div class="client_id">
                    <div class="img-box">
                      <img src="assets/img/clients/user.png" alt="" class="img-1" >
                    </div>
                    <div class="name">
                      <h6>
                      Kgosi 
                      </h6>
                      <p>
                      Dlamini
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      <div>
      </div>
    </div>
  </section>

<?php else: ?>
<?php endif; ?> 
  <!-- Info section -->
    <section class="info_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_contact">
            <h4>
              Address
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +27 12 345 6789
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  busreservation.support@gmail.com
                </span>
              </a>
            </div>
          </div>
          <div class="info_social">
            <a href="">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_detail">
            <h4>
              Aim
            </h4>
            <p>
            Bus reservation system that streamlines the booking process, provides real-time information to passengers, and enhances customer satisfaction
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-2 mx-auto info_col">
          <div class="info_link_box">
            <h4>
              Links
            </h4>
            <div class="info_links">
              <a class="active" href="./index.php?page=home">
                <img src="assets/img/nav-bullet.png" alt="">
                Home
              </a>
              <a class="" href="./index.php?page=about">
                <img src="assets/img/nav-bullet.png" alt="">
                About
              </a>
              <a class="" href="./index.php?page=service">
                <img src="assets/img/nav-bullet.png" alt="">
                Services
              </a>
              <a class="" href="./index.php?page=contact">
                <img src="assets/img/nav-bullet.png" alt="">
                Contact Us
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 info_col ">
          <h4>
            Subscribe
          </h4>
          <form action="#">
            <input type="text" placeholder="Enter email" />
            <button type="submit">
              Subscribe
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- footer section -->
  <section class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved 
       
      </p>
    </div>
  </section>

  <script async data-id="8664353639" id="chatling-embed-script" type="text/javascript" src="https://chatling.ai/js/embed.js"></script>
  <!-- jQery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="assets/js/bootstrap.js"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="assets/js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->
  <script>
  	$('#book_now').click(function(){
      uni_modal('Find Schedule','book_filter.php')
  })
  </script>