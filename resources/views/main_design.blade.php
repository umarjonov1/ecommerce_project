<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Site Metas -->
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <link rel="shortcut icon" href="front_end/images/favicon.png" type="image/x-icon">

    <title>
        Giftos
    </title>

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css"
          href="front_end/https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="front_end/css/bootstrap.css"/>

    <!-- Custom styles for this template -->
    <link href="front_end/css/style.css" rel="stylesheet"/>
    <!-- responsive style -->
    <link href="front_end/css/responsive.css" rel="stylesheet"/>
</head>

<body>
<div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="front_end/index.html">
          <span>
            Giftos
          </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  ">
                    <li class="nav-item active">
                        <a class="nav-link" href="front_end/index.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="front_end/shop.html">
                            Shop
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="front_end/why.html">
                            Why Us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="front_end/testimonial.html">
                            Testimonial
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="front_end/contact.html">Contact Us</a>
                    </li>
                </ul>
                <div class="user_option">
                    @if (Auth::check())
                        <a href="{{ route('dashboard') }}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>
                Dashboard
              </span>
                        </a>
                    @else
                        <a href="{{ route('login') }}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>
                Login
              </span>
                        </a>
                        <a href="{{ route('register') }}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>
                Sign Up
              </span>
                            @endif
                        </a>
                        <a href="front_end/">
                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                        </a>
                        <form class="form-inline ">
                            <button class="btn nav_search-btn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                </div>
            </div>
        </nav>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section">
        <div class="slider_container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="detail-box">
                                        <h1>
                                            Welcome To Our <br>
                                            Gift Shop
                                        </h1>
                                        <p>
                                            Sequi perspiciatis nulla reiciendis, rem, tenetur impedit, eveniet non
                                            necessitatibus error distinctio mollitia suscipit. Nostrum fugit doloribus
                                            consequatur distinctio esse, possimus maiores aliquid repellat beatae cum,
                                            perspiciatis enim, accusantium perferendis.
                                        </p>
                                        <a href="front_end/">
                                            Contact Us
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-5 ">
                                    <div class="img-box">
                                        <img style="width:600px" src="front_end/images/image3.jpeg" alt=""/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- end slider section -->
</div>
<!-- end hero area -->

<!-- shop section -->
<section class="shop_section layout_padding">

    @yield('index')

    @yield('all_products')

    @yield('product_detail')
</section>
<!-- end shop section -->


<!-- contact section -->

<section class="contact_section ">
    <div class="container px-0">
        <div class="heading_container ">
            <h2 class="">
                Contact Us
            </h2>
        </div>
    </div>
    <div class="container container-bg">
        <div class="row">
            <div class="col-lg-7 col-md-6 px-0">
                <div class="map_container">
                    <div class="map-responsive">
                        <iframe
                            src="front_end/https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France"
                            width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-5 px-0">
                <form action="#">
                    <div>
                        <input type="text" placeholder="Name"/>
                    </div>
                    <div>
                        <input type="email" placeholder="Email"/>
                    </div>
                    <div>
                        <input type="text" placeholder="Phone"/>
                    </div>
                    <div>
                        <input type="text" class="message-box" placeholder="Message"/>
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

<br><br><br>

<!-- end contact section -->


<!-- info section -->

<section class="info_section  layout_padding2-top">
    <div class="social_container">
        <div class="social_box">
            <a href="front_end/">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="front_end/">
                <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="front_end/">
                <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
            <a href="front_end/">
                <i class="fa fa-youtube" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <div class="info_container ">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <h6>
                        ABOUT US
                    </h6>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                        consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                    </p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="info_form ">
                        <h5>
                            Newsletter
                        </h5>
                        <form action="#">
                            <input type="email" placeholder="Enter your email">
                            <button>
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <h6>
                        NEED HELP
                    </h6>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                        consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                    </p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <h6>
                        CONTACT US
                    </h6>
                    <div class="info_link-box">
                        <a href="front_end/">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span> Gb road 123 london Uk </span>
                        </a>
                        <a href="front_end/">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>+01 12345678901</span>
                        </a>
                        <a href="front_end/">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span> demo@gmail.com</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer section -->
    <footer class=" footer_section">
        <div class="container">
            <p>
                &copy; <span id="displayYear"></span> All Rights Reserved By
                <a href="front_end/https://html.design/">Web Tech Knowledge</a>
            </p>
        </div>
    </footer>
    <!-- footer section -->

</section>

<!-- end info section -->


<script src="front_end/js/jquery-3.4.1.min.js"></script>
<script src="front_end/js/bootstrap.js"></script>
<script src="front_end/https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
</script>
<script src="front_end/js/custom.js"></script>

</body>

</html>
