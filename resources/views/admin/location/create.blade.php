@extends('master')
<!-- HEAD STARTS-->
  @section('title', 'Admin')
  @section('stylesheets')     
    <link href="{{asset('plugins/bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet">
  @endsection
<!-- HEAD ENDS-->

<!-- HEADER STARTS -->
  <!-- breadcrumbs -->
  @section('breadcrumb')
        <div class="breadcrumb">
          <div class="featured-listing" style="margin:0;">
              <h2 class="page-title animated fadeInLeft" style="margin:0;">New Region / Area Form</h2>
          </div>
        </div>
  @endsection
<!-- HEADER ENDS -->

<!-- CONTENT STARTS -->
@section('content')
  <div id="page-content" class="home-slider-content">
    <div class="container">
      @include('admin.partials.errors')
      <div class="row page-title-row">
        <div class="col-md-12">
          <h3><a href="/admin">Admin</a> » <a href="/admin/location">Locations</a> » <small> Add New Region / Area</small></h3>
        </div>
      </div>

      <div class="row">
        <div class="col-md-9 col-md-push-3">
          <div class="panel panel-default">
            
            <div class="panel-body">
              <form class="form-horizontal" role="form" method="POST"  action="/admin/location">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                         <label for="cat" class="col-md-3 control-label">Business state</label>
                          <div class="col-md-8">
                             {!!Form::select('state', $stateList, null, ['class'=>'form-control','id'=>'stateList',
                            'placeholder'=>'select state']) !!}
                          
                          </div>
                    </div>
                    <div class="form-group">
                      <label for="image_class" class="col-md-3 control-label">
                        Create Region/area</label>
                          <div class="col-md-8">
                            <select id="lga" name="lga[]" class="form-control" multiple="multiple"> </select>  
                          </div>
                    </div>
                  </div>

                <div class="form-group">
                  <div class="col-md-7 col-md-offset-3">
                    <button type="submit" class="btn btn-default btn-md">
                      <i class="fa fa-plus-circle"></i>
                        Add New region
                    </button>
                  </div>
                </div>

            </form>

            </div>
          </div>
        </div>
        <div class="col-md-3 col-md-pull-9 category-toggle">
              <button><i class="fa fa-briefcase"></i></button>
              <div class="post-sidebar">
                    <div class="latest-post-content">
                        <h2>Admin Panel</h2>
                        <div class="single-product"></div>
                    </div>
              </div>
          </div> <!-- end .page-sidebar -->
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{{asset('plugins/bootstrap-3.3.5/js/bootstrap.js')}}"></script>
  <script src="{{asset('js/scripts.js')}}"></script>
  <script>
    $(document).ready(function() {
      $("#stateList").select2({
        placeholder: 'select state',
      });
    });

    $(document).ready(function() {
     $('#stateList').change(function(){
          if($(this).val() !== "select state") {
             var model=$('#lga');
            model.empty();
           $.get('{{ URL::to('api/lga')}}', {z: $(this).val()}, function(result){       
             $.each(result.data,function(){
                              $('#lga').append('<option value="'+this.id+'">'+this.text+'</option>');

                        });
           });
         }
      });
    });

    $(document).ready(function() {
      $("#lga").select2({
        placeholder: 'create areas',
        tags: true,
      });
    });
  </script>
@endsection