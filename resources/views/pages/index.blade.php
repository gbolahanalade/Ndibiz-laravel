@extends('master')
<!-- HEAD -->
@section('title', 'Home')
@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('../plugins/text-rotator/jquery.wordrotator.css')}}">
    <link href="{{asset('../plugins/Bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet">
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
              <img src="{{asset('img/content/home-slide-img.jpg')}}" alt="">
              <div class="slide-content">             
                <h1><small><i class="fa fa-search"></i> Search for <br><span id="demo"></span> <br>in <br><span id="demo2"></span></small></h1>
                <h1><small>Connect</small> <span>Brands/Services</span> <small>To</small> <span>Customers</span></h1>
                <h1 class="hidden-xs"><a class="btn btn-default btn-lg" href="/biz/create"><i class="fa fa-plus-square"></i> Add a Business</a> <small>OR</small> 
                <a class="btn btn-default  btn-lg" href="/businesses"><i class="fa fa-plus-square"></i> Explore Businesses</a></h1>
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
              <nav class="hidden-lg hidden-md">
                <button><i class="fa fa-bars"></i></button>
                <ul class="primary-nav list-unstyled">
                  @if (Auth::check())
                    <li class="hidden-lg hidden-md dropdown text-center"> 
                   
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="menu1">
                        <i class="fa fa-user"></i> {{Auth::user()->username}} <span class="caret"></span></a>
                      <ul class="dropdown-menu text-center" role="menu" aria-labelledby="menu1">
                          <li class=""><a href="#">View Profile</a></li>
                          <li class="divider"></li>
                          <li><a class="btn" href="/auth/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                      </ul>
                    </li>
                  @else
                    <li><a class="btn" href="/auth/login" class=""><i class="fa fa-power-off"></i> <span>Login</span></a></li>
                  @endif
                  <!-- HEADER REGISTER -->
                  @if (Auth::guest())
                    <li><a class="btn" href="/auth/register" class=""><i class="fa fa-plus-square"></i> <span>Register</span></a></li>
                  @endif
                  <li class="text-center"><a href="/businesses" class=""><i class="fa fa-building"></i> Explore</a></li>
                  <li class="text-center"><a href="/biz/create" class=""><i class="fa fa-plus"></i> Add a Business</a></li>

                  <li class="divider"></li>
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
        <div class="row homepage">
          <h2><strong>Featured</strong> Business Categories</h2>
          <div class="col-md-9 col-md-push-3">
            <div class="page-content">
              <div class="product-details">              
                <div class="tab-content">    
                @unless ( $cats->isEmpty() )
                @foreach ($cats as $cat)
                    <div class="tab-pane" id="<?php $find = array('&','And','and',' ');$replace = array('');
                     echo str_replace($find, $replace, $cat->name); ?>">                      
                        <div class="row clearfix">    
                        @foreach ($cat->subcats as $sub)
                            <div class="col-md-3 col-sm-4 col-xs-6">
                              <div class="category-item">
                               <a class="btn" href="/biz/subcat/{{$sub->id}}"><span class="">{{$sub->name}}</span>
                               <p class="biz-counter animated slideIn">
                                  <span class="">{{$sub->biz->count()}}</span>
                               </p>
                               </a>
                              </div>
                            </div> 
                          @endforeach                
                        </div> <!-- end .row -->                   
                    </div> <!-- end .tabe-pane -->
                 @endforeach
                 @endunless
                </div> <!-- end .tabe-content -->
             
              </div> <!-- end .product-details -->
            </div> <!-- end .page-content -->
          </div>

          <div class="col-md-3 col-md-pull-9 category-toggle">
            <button><i class="fa fa-bars"></i></button>
            <div class="page-sidebar">
              <!-- Category accordion -->
              <div id="categories">
                <div class="accordion">
                  <ul class="nav nav-tabs home-tab" role="tablist">
                     @foreach ($cats as $cat)
                      <li>
                        <a class="" href="#<?php $find = array('&','And','and',' ');$replace = array('');
                          echo str_replace($find, $replace, $cat->name); ?>" 
                         role="tab" data-toggle="tab"><i class="fa fa-{{$cat->image_class}}"></i>
                        {{ $cat->name }}</a>
                      </li>
                      @endforeach                    
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
        @unless ( $featured->isEmpty() )
                  @foreach ($featured as $feature)
        <div class="item">
          <div class="single-product">
            <figure>
              <img src="{{asset('img/content/post-img-1.jpg')}}" alt="">
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
                  <a href="#"><i class="fa fa-heart-o fa-fw"></i> Bookmark</a>
                </div>
                <div class="read-more">
                  <a href="/review/biz/{{$feature->id}}"><i class="fa fa-angle-right"></i> Read More</a>
                </div>

              </figcaption>
            </figure>
            <h4><a href="/review/biz/{{$feature->id}}">{{$feature->name}}</a></h4>
            <h5 class=""> @foreach($feature->subcats as $sub)
                  <a class="btn btn-border" href="/biz/subcat/{{$sub->id}}">{{ $sub->name }}</a>@endforeach</h5>
          </div> <!-- end .single-product -->
        </div>
        @endforeach
        @endunless
      </div>  <!-- end .row -->
      <div class="discover-more">
        <a class="btn btn-default text-center" href="/businesses"><i class="fa fa-plus-square-o"></i>Discover More Businesses</a>
      </div>
    </div>  <!-- end .container -->
  </div>  <!-- end .featured-listing -->
  
  <div class="register-content">
    <div class="reg-heading">
      <h1>List your business for <strong style="color:#FFD231;">Free</strong> now <span class="btn btn-default"><a href="/biz/create"><i class="fa fa-plus"></i> Add Business</a></span></h1>
    </div>

    <div class="registration-details">
      <div class="container">
        <h2>Registration Benefits</h2>
        <div class="box regular-member">
          <h2><strong>Registered</strong> Users</h2>

          <p><i class="fa fa-check-circle-o"></i> Find local businesses nearby and afar</p>
          <p><i class="fa fa-check-circle-o"></i> View peoples' reviews of businesses service quality</p>
          <p><i class="fa fa-check-circle-o"></i> View uploaded pictures of businesses posted by business owners and customers</p>

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

  <!-- OUR PARTNER SLIDER BEGIN -->
    <div class="our-partners">
      <div class="container">
        <h2>Our Partners</h2>

        <div id="partners-slider" class="owl-carousel owl-theme">
          <div class="item"><a href="#"><img src="img/content/partner1.png" alt=""></a></div>
          <div class="item"><a href="#"><img src="img/content/partner2.png" alt=""></a></div>
          <div class="item"><a href="#"><img src="img/content/partner3.png" alt=""></a></div>
          <div class="item"><a href="#"><img src="img/content/partner4.png" alt=""></a></div>
          <div class="item"><a href="#"><img src="img/content/partner5.png" alt=""></a></div>
          <div class="item"><a href="#"><img src="img/content/partner6.png" alt=""></a></div>
          <div class="item"><a href="#"><img src="img/content/partner1.png" alt=""></a></div>
          <div class="item"><a href="#"><img src="img/content/partner2.png" alt=""></a></div>
          <div class="item"><a href="#"><img src="img/content/partner3.png" alt=""></a></div>
          <div class="item"><a href="#"><img src="img/content/partner4.png" alt=""></a></div>
          <div class="item"><a href="#"><img src="img/content/partner5.png" alt=""></a></div>
          <div class="item"><a href="#"><img src="img/content/partner6.png" alt=""></a></div>
        </div>
      </div>
    </div>
    <!-- END OUR PARTNER SLIDER -->

@endsection


<!-- FOOTER STARTS -->
  @section('footer')
    @include('includes.footer')
  @endsection
<!-- FOOTER ENDS -->

<!-- SCRIPTS STARTS -->
  @section('scripts')

    <script src="{{asset('../plugins/text-rotator/jquery.wordrotator.min.js') }}"></script>
    <script src="{{asset('../plugins/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{asset('../plugins/Bootstrap-3.3.5/js/bootstrap.js')}}"></script>

    <script>
      //Text rotator
      //-------------------------------------------------

          $(document).ready(function () {
              $("#demo").wordsrotator({
              words: ['Local Restaurants (Mama Put)','Hotels','Mechanic Workshops'], 
              randomize: true, 
              animationIn: "flipInY", 
              animationOut: "flipOutY", 
              speed: 3000 
              });

               $("#demo2").wordsrotator({
              words: ['Lagos','Abuja','PortHarcourt'], 
              randomize: true, 
              animationIn: "rotateInUpLeft", 
              animationOut: "flipOutY", 
              speed: 3000 
              });
          });  

          $(document).ready(function() {        
              $('li:first-child').addClass('active');
              $('.tab-pane:first-child ').addClass('active');
          });       
    </script>
    <script src="{{asset('js/scripts.js') }}"></script>
  @stop
<!-- SCRIPTS ENDS -->