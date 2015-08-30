@extends('master')
<!-- HEAD -->
@section('title', 'Home')
@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('plugins/text-rotator/jquery.wordrotator.css')}}">
@endsection
<!-- HEADER -->
<!-- search -->
@section('search')
  @include('partials.search')
@endsection
<!-- slider -->
@section('slider')
        <div class="slider-content">
          <div id="home-slider" class="">
            <div class="item">
              <img src="img/content/home-slide-img.jpg" alt="">
              <div class="slide-content">             
                <h1><small><i class="fa fa-search"></i> Search for <br><span id="demo"></span> <br>in <br><span id="demo2"></span></small></h1>
                <h1><small>Connect</small> <span>Businesses</span> <small>To</small> <span>Customers</span></h1>
                <h1 class="hidden-xs"><a class="btn btn-default btn-lg" href=""><i class="fa fa-plus-square"></i> Add a Business</a> <small>OR</small> 
                <a class="btn btn-default  btn-lg" href=""><i class="fa fa-plus-square"></i> Claim Your Business</a></h1>
              </div>
            </div>
          </div>

          <div class="customNavigation hidden">
            <a class="btn prev"><i class="fa fa-angle-left"></i></a>
            <a class="btn next"><i class="fa fa-angle-right"></i></a>
          </div>
        </div> <!-- END .slider-content -->    
@endsection
<!-- navigation -->
@section('header-navbar')
        <div class="header-nav-bar">
            <div class="container">
              <nav>
                <button><i class="fa fa-bars"></i></button>
                <ul class="primary-nav list-unstyled">
                  <li class="bg-color active"><a href="/">Home<i class="fa fa-home"></i></a></li>
                  <li class=""><a href="/categories">Categories</a></li>
                  <li class=""><a href="/businesses">Businesses</a></li>
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="/admin">Admin</a></li>
                </ul>
              </nav>
            </div> <!-- end .container -->
        </div> <!-- end .header-nav-bar -->   
@endsection
<!-- CONTENT -->
@section('content')
  @include('partials.notifications')

  <div id="page-content" class="home-slider-content">
    <div class="container">
      <div class="home-with-slide category-listing">
        <div class="row">
          <h2><strong>Featured</strong> Directory Categories</h2>
          <div class="col-md-9 col-md-push-3">
            <div class="page-content">
              <div class="product-details">
                <div class="tab-content">                  
                  <div class="tab-pane active" id="all-categories">                      
                      <div class="row clearfix">
                        @unless ( $cats->isEmpty() )
                        @foreach ($cats as $cat)
                          <div class="col-md-3 col-sm-4 col-xs-6">
                            <div class="category-item">
                             <a href="#"><i class="fa fa-{{$cat->image_class}}"></i>{{ $cat->name}} </a>
                            </div>
                          </div>
                         @endforeach
                          @endunless
                          <div class="view-more">
                            <a class="btn btn-default text-center" href="#"><i class="fa fa-plus-square-o"></i>View More</a>
                          </div>
                      </div> <!-- end .row -->                   
                  </div> <!-- end .tabe-pane -->


                </div> <!-- end .tabe-content -->
              </div> <!-- end .product-details -->
            </div> <!-- end .page-content -->
          </div>

          <div class="col-md-3 col-md-pull-9 category-toggle">
            <button><i class="fa fa-briefcase"></i></button>
            <div class="page-sidebar">
              <!-- Category accordion -->
              <div id="categories">
                <div class="accordion">
                  <ul class="nav nav-tabs home-tab" role="tablist">
                    <li class="active">
                      <a href="#all-categories"  role="tab" data-toggle="tab">Nightlife
                        <span>Clubs, Bars, Comedy clubs</span>
                      </a>
                    </li>

                    <li>
                      <a href="#entertainment" role="tab" data-toggle="tab">Entertainment
                        <span>Cinemas, Museums, Arcades</span>
                      </a>
                    </li>

                    <li>
                      <a href="#local"  role="tab" data-toggle="tab">Local Services
                        <span>Car Mechanic, Drycleaners, Phone Repair</span>
                      </a>
                    </li>
                    <li>
                      <a href="#local"  role="tab" data-toggle="tab">Property
                        <span>Estate Agents, Shared Office Spaces</span>
                      </a>
                    </li>
                    <li>
                      <a href="#local"  role="tab" data-toggle="tab">Hospitality & Travel
                        <span>Airports, Care Hire, Hotels, Travel Agencies</span>
                      </a>
                    </li>
                  </ul>
                </div> <!-- end .accordion -->
              </div> <!-- end #categories -->

            </div> <!-- end .page-sidebar -->
          </div> <!-- end grid layout-->
        </div> <!-- end .row -->
      </div> <!-- end .home-with-slide -->
    </div> <!-- end .container -->
  </div>  <!-- end #page-content -->
  
  <div class="featured-listing" id= "featured-list">
    <div class="container">
      <h2><strong>Featured</strong> Businesses</h2>
      <div id="businesses-slider" class="owl-carousel owl-theme clearfix">
        
        <div class="item">
          <div class="single-product">
            <figure>
              <img src="img/content/post-img-1.jpg" alt="">
              <div class="rating">
                <ul class="list-inline">
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                </ul>

                <p>Featured</p>

              </div> <!-- end .rating -->

              <figcaption>
                <div class="bookmark">
                  <a href="#"><i class="fa fa-bookmark-o"></i> Bookmark</a>
                </div>
                <div class="read-more">
                  <a href="#"><i class="fa fa-angle-right"></i> Read More</a>
                </div>

              </figcaption>
            </figure>
            <h4><a href="#">Patt's Bar</a></h4>

            <h5 class="fa fa-tags"> <a href="#">Nightlife</a>, <a href="#">Clubs</a></h5> <br>

          </div> <!-- end .single-product -->

        </div>

        <div class="item">

          <div class="single-product">
            <figure>
              <img src="img/content/post-img-2.jpg" alt="">

              <div class="rating">
                <ul class="list-inline">
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                </ul>

                <p>Featured</p>

              </div> <!-- end .rating -->

              <figcaption>
                <div class="bookmark">
                  <a href="#"><i class="fa fa-bookmark-o"></i> Bookmark</a>
                </div>
                <div class="read-more">
                  <a href="#"><i class="fa fa-angle-right"></i> Read More</a>
                </div>

              </figcaption>
            </figure>
            <h4><a href="#">Waheed The Vulcanizer</a></h4>

            <h5 class="fa fa-tags"> <a href="#">car repair</a>, <a href="#">road-side business</a></h5>

          </div> <!-- end .single-product -->

        </div>

        <div class="item">

          <div class="single-product">
            <figure>
              <img src="img/content/post-img-2.jpg" alt="">

              <div class="rating">
                <ul class="list-inline">
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                </ul>

                <p>Featured</p>

              </div> <!-- end .rating -->

              <figcaption>
                <div class="bookmark">
                  <a href="#"><i class="fa fa-bookmark-o"></i> Bookmark</a>
                </div>
                <div class="read-more">
                  <a href="#"><i class="fa fa-angle-right"></i> Read More</a>
                </div>

              </figcaption>
            </figure>
            <h4><a href="#">Waheed The Vulcanizer</a></h4>

            <h5 class="fa fa-tags"> <a href="#">car repair</a>, <a href="#">road-side business</a></h5>

          </div> <!-- end .single-product -->

        </div>

        <div class="item">

          <div class="single-product">
            <figure>
              <img src="img/content/post-img-2.jpg" alt="">

              <div class="rating">
                <ul class="list-inline">
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                </ul>

                <p>Featured</p>

              </div> <!-- end .rating -->

              <figcaption>
                <div class="bookmark">
                  <a href="#"><i class="fa fa-bookmark-o"></i> Bookmark</a>
                </div>
                <div class="read-more">
                  <a href="#"><i class="fa fa-angle-right"></i> Read More</a>
                </div>

              </figcaption>
            </figure>
            <h4><a href="#">Waheed The Vulcanizer</a></h4>

            <h5 class="fa fa-tags"> <a href="#">car repair</a>, <a href="#">road-side business</a></h5>

          </div> <!-- end .single-product -->

        </div>

        <div class="item">

          <div class="single-product">
            <figure>
              <img src="img/content/post-img-2.jpg" alt="">

              <div class="rating">
                <ul class="list-inline">
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                </ul>

                <p>Featured</p>

              </div> <!-- end .rating -->

              <figcaption>
                <div class="bookmark">
                  <a href="#"><i class="fa fa-bookmark-o"></i> Bookmark</a>
                </div>
                <div class="read-more">
                  <a href="#"><i class="fa fa-angle-right"></i> Read More</a>
                </div>

              </figcaption>
            </figure>
            <h4><a href="#">Waheed The Vulcanizer</a></h4>

            <h5 class="fa fa-tags"> <a href="#">car repair</a>, <a href="#">road-side business</a></h5>

          </div> <!-- end .single-product -->

        </div>

        <div class="item">

          <div class="single-product">
            <figure>
              <img src="img/content/post-img-2.jpg" alt="">

              <div class="rating">
                <ul class="list-inline">
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                </ul>

                <p>Featured</p>

              </div> <!-- end .rating -->

              <figcaption>
                <div class="bookmark">
                  <a href="#"><i class="fa fa-bookmark-o"></i> Bookmark</a>
                </div>
                <div class="read-more">
                  <a href="#"><i class="fa fa-angle-right"></i> Read More</a>
                </div>

              </figcaption>
            </figure>
            <h4><a href="#">Waheed The Vulcanizer</a></h4>

            <h5 class="fa fa-tags"> <a href="#">car repair</a>, <a href="#">road-side business</a></h5>

          </div> <!-- end .single-product -->

        </div>

        <div class="item">

          <div class="single-product">
            <figure>
              <img src="img/content/post-img-2.jpg" alt="">

              <div class="rating">
                <ul class="list-inline">
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                </ul>

                <p>Featured</p>

              </div> <!-- end .rating -->

              <figcaption>
                <div class="bookmark">
                  <a href="#"><i class="fa fa-bookmark-o"></i> Bookmark</a>
                </div>
                <div class="read-more">
                  <a href="#"><i class="fa fa-angle-right"></i> Read More</a>
                </div>

              </figcaption>
            </figure>
            <h4><a href="#">Waheed The Vulcanizer</a></h4>

            <h5 class="fa fa-tags"> <a href="#">car repair</a>, <a href="#">road-side business</a></h5>

          </div> <!-- end .single-product -->

        </div>

        <div class="item">

          <div class="single-product">
            <figure>
              <img src="img/content/post-img-2.jpg" alt="">

              <div class="rating">
                <ul class="list-inline">
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                </ul>

                <p>Featured</p>

              </div> <!-- end .rating -->

              <figcaption>
                <div class="bookmark">
                  <a href="#"><i class="fa fa-heart"></i> Favourite</a>
                </div>
                <div class="read-more">
                  <a href="#"><i class="fa fa-angle-right"></i> Read More</a>
                </div>

              </figcaption>
            </figure>
            <h4><a href="#">Waheed The Vulcanizer</a></h4>

            <h5 class="fa fa-tags"> <a href="#">car repair</a>, <a href="#">road-side business</a></h5>

          </div> <!-- end .single-product -->

        </div>

      </div>  <!-- end .row -->

      <div class="discover-more">

        <a class="btn btn-default text-center" href="#"><i class="fa fa-plus-square-o"></i>Discover More</a>
      </div>
    </div>  <!-- end .container -->
  </div>  <!-- end .featured-listing -->
  
  <div class="register-content">
    <div class="reg-heading">
      <h1><strong>Register</strong> now</h1>
    </div>

    <div class="registration-details">
      <div class="container">
        <div class="box regular-member">
          <h2><strong>Registered</strong> Users</h2>

          <p><i class="fa fa-check-circle-o"></i> Search for local business</p>
          <p><i class="fa fa-check-circle-o"></i> Review service quality of patronised businesses</p>
          <p><i class="fa fa-check-circle-o"></i> Upload pictures showing your service experience with the business</p>

          <a href="#" class="btn btn-default-inverse"><i class="fa fa-plus"></i> Register Now</a>
        </div>

        <div class="alternate">
          <h2>OR</h2>
        </div>

        <div class="box business-member">
          <h2><strong>Business</strong> Owners</h2>

          <p><i class="fa fa-check-circle-o"></i> Claim your business page</p>
          <p><i class="fa fa-check-circle-o"></i> Upload pictures of your products and/or services</p>
          <p><i class="fa fa-check-circle-o"></i> Advertise your business to potential and existing customers</p>

          <a href="#" class="btn btn-default-inverse"><i class="fa fa-plus"></i> Register Now</a>
        </div>

      </div>
      <!-- END .CONTAINER -->
    </div>
    <!-- END .REGISTRATION-DETAILS -->
  </div>
  <!-- END REGISTER-CONTENT -->

@endsection

<!-- FOOTER STARTS -->
  @section('footer')
    @include('includes.footer')
  @endsection
<!-- FOOTER ENDS -->

<!-- SCRIPTS STARTS -->
  @section('scripts')
    <script src="{{asset('js/selectize.min.js')}}"></script>
    <script src="{{asset('js/select22.min.js')}}"></script>
    <script src="{{asset('plugins/text-rotator/jquery.wordrotator.min.js') }}"></script>
    <script src="{{asset('js/owl.carousel.js') }}"></script>

    <script src="{{asset('js/scripts.js') }}"></script>

    <script>
      //Text rotator
      //-------------------------------------------------
        
          $(document).ready(function () {
              $("#demo").wordsrotator({
              words: ['Local Restaurants (Mama Put)','Hotels','Mechanic Workshops'], // Array of words, it may contain HTML values
              randomize: true, //show random entries from the words array
              animationIn: "flipInY", //css class for entrace animation
              animationOut: "flipOutY", //css class for exit animation
              speed: 3000 // delay in milliseconds between two words
              });

               $("#demo2").wordsrotator({
              words: ['Lagos','Abuja','PortHarcourt'], // Array of words, it may contain HTML values
              randomize: true, //show random entries from the words array
              animationIn: "rotateInUpLeft", //css class for entrace animation
              animationOut: "flipOutY", //css class for exit animation
              speed: 3000 // delay in milliseconds between two words
              });
          });
         
    </script>
  @stop
<!-- SCRIPTS ENDS -->