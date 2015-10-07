@extends('master')
<!-- HEAD -->
@section('title', 'Businesses')
@section('stylesheets')
  <link rel="stylesheet" href="{{ asset('../plugins/text-rotator/jquery.wordrotator.css')}}">
  <link href="{{asset('../plugins/Bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet">
@endsection
<!-- HEADER -->
<!-- search -->
@section('search')
  @include('partials.search')
@endsection
<!-- navigation -->
@section('header-navbar')
        <div class="header-nav-bar">
            <div class="container">
              <nav>
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
                    <li class="hidden-lg hidden-md"><a class="btn" href="/auth/login" class=""><i class="fa fa-power-off"></i> <span>Login</span></a></li>
                  @endif
                  <!-- HEADER REGISTER -->
                  @if (Auth::guest())
                    <li class="hidden-lg hidden-md"><a class="btn" href="/auth/register" class=""><i class="fa fa-plus-square"></i> <span>Register</span></a></li>
                  @endif
                  <li class="text-center hidden-lg hidden-md"><a href="/biz/create" class=""><i class="fa fa-plus"></i> Add a Business</a></li>

                  <li class="divider"></li>
                  <li class=""><a href="/">Home<i class="fa fa-home"></i></a></li>
                  <li><a href="/categories">Categories</a></li>
                  <li class="bg-color active"><a href="/businesses">Businesses</a></li>
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
  <div id="page-content">
    <div class="container">
      <div class="home-with-slide category-listing">
        <div class="row">
          <div class="col-md-8">
            <!-- inner breadcrumb -->
            <div class="row page-title-row">
              <div class="col-md-8">
                <h3 class="m0-top"><a href="/"><i class="fa fa-home"></i> </a> » <small>Business Listings</small> </h3>
              </div>
              <div class="col-md-4 text-right">
                
              </div>
            </div>
            <div class="row businesses">
              <div class="col-md-9 col-md-push-3">
                <div class="page-content">
                  <div class="product-details-list view-switch">
                    <div class="tab-content">
                      @unless ( $cats->isEmpty() )
                      @foreach ($cats as $cat)
                      <div class="tab-pane" id="<?php $find = array(' & ',' And ',' and ',' ');$replace = array('');
                   echo str_replace($find, $replace, $cat->name); ?>">
                        <div class="row p0-top">
                          <div class="col-md-8">
                            <h3 class="m0-top">{{$cat->name}}</h3>
                          </div>
                          <div class="col-md-4">
                            <div class="change-view pull-right">
                                <button class="grid-view"><i class="fa fa-th"></i></button>
                                <button class="list-view active"><i class="fa fa-bars"></i></button>
                            </div> 
                          </div>
                        </div>                                         
                        <div class="row clearfix p5-top">
                              @foreach ($cat->biz as $biz) 
                              <div class="col-sm-4 col-xs-6">
                                <div class="single-product">
                                  <figure>
                                    <img src="{{asset('img/content/post-img-10.jpg') }}" alt="">
                                    <div class="rating">
                                      
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
                                  <h4><a href="/review/biz/{{$biz->id}}">
                                    {{$biz->name}}</a></h4>
                                      <ul class="list-inline m5-bttm p10-left">
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li>50 reviews</li>
                                      </ul>
                                  <span class="p0-bttm">@foreach( $biz->subcats as $sub) <span><a class="btn btn-border" href="/biz/subcat/{{$sub->id}}"><i class="fa fa-tags"></i> {{$sub->name}}</a></span> @endforeach</span>
                                  <h5 class="p5-top address-preview"><i class="fa fa-map-marker"></i> <span>{{$biz->address->street}}</span>, <span>{{ $biz-> address->state->name}}</span></h5>
                                </div> <!-- end .single-product -->
                              </div> <!-- end .col-sm-4 grid layout -->   
                                                     

                              {!! $cat->biz()->paginate(6)->render() !!} 
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
                            <a class="" href="#<?php $find = array(' & ',' And ',' and ',' ');$replace = array('');
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
          </div>
          <!-- SIDEBAR RIGHT -->
          <div class="col-md-4">
            <div class="post-sidebar">
                <!-- AD BAR MINI -->
                <div class="recently-added ad-mini">
                    <div class="category-item">
                        <a href=""> <i class="fa fa-newspaper-o"></i> Advert Space (Text) <br><span id="ad1"></span></a>
                    </div>
                </div>
                <!-- FEATURED BUSINESSES -->
                <div class="latest-post-content">
                    <h2>Featured Businesses</h2>
                    @if ( ! $featured-> isEmpty() )
                           @foreach ($featured as $feature)
                    <div class="latest-post clearfix">

                      <div class="post-image">
                        <img src="{{asset('img/content/latest_post_1.jpg') }}" alt="">
                      </div>

                      <h4><a href="/review/biz/{{$feature->id}}">{{$feature->name}}</a></h4>

                      <p>Check out this great business on Ndibiz.</p>

                      <a class="read-more" href="/review/biz/{{$feature->id}}"><i class="fa fa-angle-right"></i>Read More</a>
                    </div> <!-- end .latest-post -->
                    @endforeach
                     @endif
                </div>
                <!-- RECENTLY ADDED BUSINESSES -->
                <div class="recently-added">
                    <h2>Recently Added</h2>
                     @if ( ! $recent-> isEmpty() )
                           @foreach ($recent as $new)
                    <div class="latest-post clearfix">

                      <div class="post-image">
                        <img src="{{asset('img/content/latest_post_1.jpg') }}" alt="">

                        <p><span>12</span>Sep</p>
                      </div>

                      <h4><a href="/review/biz/{{$new->id}}">{{$new->name}}</a></h4>

                      <p>Recent Biz added on Ndibiz</p>

                      <a class="read-more" href="/review/biz/{{$new->id}}"><i class="fa fa-angle-right"></i>Read More</a>
                    </div> <!-- end .latest-post -->
                    @endforeach
                    @endif
                </div>
                <!-- AD BAR MEDIUM -->
                <div class="recently-added">
                  <div class="ad-box"> 
                    <a href="" class=""><span id="ad2"></span></a>   
                  </div>                           
                </div>
                <!-- RECENT REVIEWS -->
                <div class="recently-added">
                    <h2>Recent Reviews</h2>
                    <div class="single-product"></div>
                </div>
            </div>
          </div>
        </div>
      </div> <!-- end .home-with-slide -->
    </div> <!-- end .container -->
  </div>  <!-- end #page-content -->
@endsection
<!-- CONTENT ENDS-->
<!-- FOOTER STARTS -->
@section('footer')
  @include('includes.footer')
@endsection
<!-- FOOTER ENDS -->

@section('scripts')
  <script src="{{asset('../plugins/text-rotator/jquery.wordrotator.min.js') }}"></script>
  <script src="{{asset('../plugins/Bootstrap-3.3.5/js/bootstrap.js')}}"></script>    
  <script type="text/javascript">
    $(document).ready(function() {        
        $('li:first-child').addClass('active');
        $('.tab-pane:first-child ').addClass('active');
    });

      // style switcr for list-grid view
      //--------------------------------------------------
      $(document).ready(function() {
          $('.change-view button').on('click',function(e) {
            
          if ($(this).hasClass('grid-view')) {
            $(this).addClass('active');
            $('.list-view').removeClass('active');
            $('.page-content .view-switch').removeClass('product-details-list').addClass('product-details');

          } else if($(this).hasClass('list-view')) {
            $(this).addClass('active');
            $('.grid-view').removeClass('active');
            $('.page-content .view-switch').removeClass('product-details').addClass('product-details-list');
            }
        });

      });

      //Text rotator
      //-------------------------------------------------

          $(document).ready(function () {
              $("#ad1").wordsrotator({
                words: ['Local Restaurants (Mama Put)','Hotels','Mechanic Workshops'], 
                randomize: true, 
                animationIn: "fadeIn", 
                animationOut: "fadeOut", 
                speed: 5000 
              });
              $("#ad2").wordsrotator({
                words: ['<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=AD1-IMAGE&w=350&h=150">',
                        '<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=AD2-IMAGE&w=350&h=140">',
                        '<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=AD3-IMAGE&w=350&h=130">'],
                randomize: true, 
                animationIn: "fadeIn", 
                animationOut: "fadeOut", 
                speed: 5000 
              });
          });  
      
  </script>
  <script src="{{asset('js/scripts.js')}}"></script>
@endsection
