@extends('layout_front')

@push('styles')
<link rel="stylesheets" href="{{ asset('frontend/map/ammap.css') }}" />
  <link type="text/css" rel="stylesheet" href="{{ asset('css/plugins.css') }}">
<style>
  #project-summary{  }
  /*#project-list{ visibility: hidden; }*/
  #data-container{ visibility: hidden; position: relative; top: -540px; }
</style>
@endpush

@section('content')

@component('elements.welcome_search')
@endcomponent

<!--================================PAGE TITLE==========================================-->
  <div class="page-title-wrap bgamarillo padding-top-150 padding-bottom-30"><!-- section title -->
    <h4 class="white">
      <a href="#" id="btn-show-search">
        <i class="icon-circle-down2 position-left"></i>
      </a>
      Módulo ciudadano
    </h4>
  </div><!-- section title end -->
  <!--Page Header-->
  <div class="header">
    <div class="header-content">
      <!--<div class="page-title"><i class="icon-display4"></i> Dashboard</div>-->
      <ul class="breadcrumb">
        <li><a href="{{ route('welcome') }}"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="">/ Módulo Ciudadano</a></li>
        <li><a href="">/ {{ $organization }}</a></li>
      </ul>         
    </div>
  </div>    
  <!--/Page Header-->

  <!--<section class="aside-layout-section padding-top-70 padding-bottom-40">-->
      <div class="container-fluid"><!-- section container -->
      	<!-- World map -->
      	<div class="row">
          <!-- start showing map -->
      		<div class="col-md-12 col-sm-12" id="map-container">
      			<div class="panel panel-flat">
      				<div class="panel-heading">
      					<h5 class="panel-title">Mapa de Proyectos</h5>				
      				</div>

      				<div class="panel-body">				
      					<!--<div class="map-container map-world"></div>-->
      					<div id="mapdiv" style="width:100%; height: 500px;"></div>
      				</div>
      			</div>
      		</div>
          <!-- end of map -->

          <!-- start showing data -->
      		<div class="col-md-12 col-sm-12" id="data-container">
      			<div class="panel panel-flat">
      				<div class="panel-heading">
      					<h5 class="panel-title"></h5>				
      				</div>

      				<div class="panel-body">				
      					<div class="map-data-project" style="height: 520px; overflow-y: scroll; ">


                  <!--<div id="project-summary">
                    <div class="row" style="margin-bottom: 10px;">
                      <div class="col-md-6">
                        Proyectos: <span>986</span>
                      </div>
                      <div class="col-md-6 text-right">
                        Inversión: <span>L 999,999.00</span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <table class="table table-striped">
                          <thead>
                            <th>Departamento</th>
                            <th>Inversión</th>
                          </thead>
                          <tbody>
                            <?php 
                            if (count($data) > 0):
                              foreach ($data as $row):
                              ?>
                              <tr>
                                <td><?= $row->state_name ?></td>
                                <td>L. <?= number_format($row->invest) ?></td>
                              </tr>
                              <?php
                              endforeach;
                            endif; 
                            ?>
                          </tbody>
                        </table> 
                      </div>
                    </div>
                  </div>-->
                  
                  <div id="project-list">
                    <h5 id="showState"></h5>

                    <div class="row" style="margin-bottom: 10px;">
                      <div class="col-md-6 text-right"></div>
                      <div class="col-md-6 text-right" style="text-align: right!important;">
                        <a href="#" id="btn-back" class="btn btn-primary">Volver al Mapa</a>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <table id="project-data" class="table datatable-button-init-basic">
                          <thead>
                            <th>Código</th>
                            <th>Proyecto</th>
                            <th></th>
                          </thead>
                          <tbody>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                          </tbody>
                        </table> 
                      </div>
                    </div>
                  </div>    
                </div>
      				</div>
      			</div>
      		</div>
          <!-- end of data -->
      	</div>
      	<!-- /world map -->

      </div>
    <!--</section>-->
@endsection

@push('scripts')
<script src="{{ asset('frontend/map/ammap.js') }}"></script>
<script src="{{ asset('frontend/map/hondurasLow.js') }}"></script>

<script src="{{ asset('js/forms/uniform.min.js') }}"></script>
<!-- Page scripts -->
<script src="{{ asset('js/tables/datatables/datatables.min.js') }}"></script>

<script src="{{ asset('js/forms/select2.min.js') }}"></script>  
<script src="{{ asset('js/extensions/sweetalert.js') }}"></script>
<script src="{{ asset('js/tables/datatables/extensions/buttons.min.js') }}"></script>
<script src="{{ asset('js/pages/datatable_extension_export_options.js') }}"></script>
<!-- /page scripts -->

<script type="text/javascript">

      $('.project-list').hide();

      $("#btn-back").on('click', function(){
        /*$('#project-list').css('visibility', 'hidden').slideUp();
        $('#project-summary').css('visibility', 'visible').slideDown();*/
        $('#data-container').css('visibility', 'hidden').slideUp().fadeOut();
        $('#map-container').css('visibility', 'visible').slideDown();
      });

			var map = AmCharts.makeChart("mapdiv", {
				type: "map",

				pathToImages: "",

				balloon: {
					color: "#000000"
				},

				dataProvider: {
					map: "hondurasLow",
					getAreasFromMap: true
				},

				areasSettings: {
					autoZoom: true,
					selectedColor: "#CC0000"
				},

				smallMap: {}
			});

      var states = [];
      states['HN-AT'] = 1;
      states['HN-CL'] = 2;
      states['HN-CM'] = 3;
      states['HN-CP'] = 4;
      states['HN-CR'] = 5;
      states['HN-CH'] = 6;
      states['HN-EP'] = 7;
      states['HN-FM'] = 8;
      states['HN-GD'] = 9;
      states['HN-IN'] = 10;
      states['HN-IB'] = 11;
      states['HN-LP'] = 12;
      states['HN-LE'] = 13; 
      states['HN-OC'] = 14;
      states['HN-OL'] = 15;
      states['HN-SB'] = 16;
      states['HN-VA'] = 17;
      states['HN-YO'] = 18;

      map.addListener("clickMapObject", function (event) {


          //$('#project-summary').css('visibility', 'hidden').slideUp();
          $('#map-container').css('visibility', 'hidden').slideUp().fadeIn();
          $('#data-container').css('visibility', 'visible').slideDown();

          var id = event.mapObject.id;
          var title = event.mapObject.title;

          $("#showState").html( "DEPARTAMENTO DE " + title );
          //alert("Clicked on: " + title + " (" + id + ")");
          
          
          //ClickMap('Atlántida');
          jQuery.ajax({
            'type':'POST',
            'data':{'id':states[id]},
            'url':'{{ route('transparency.project_states') }}',
            'cache':false,
            'success':function(data){fillData(data)}
          });
          return false;
          
          
          
        });

        
        function fillData( data ){
          var html = '';
          $.each(data, function(key, val){
            var url = '{{ route('transparency.project', 'PROJECT') }}'.replace('PROJECT', val.id);
            html += '<tr>'+
                    '<td>'+val.project_code+'</td>'+
                    '<td>'+val.project_name+'</td>'+
                    '<td><a href="'+ url +'" class="btn btn-warning">-></a></td>'+
                    '</tr>';
            $('#project-data > tbody').html(html);
          });
        }

        // Search
        var showSearch = false;
        $(document).ready(function(){
          $("#section-search").slideUp();

          $("#btn-show-search").on('click', function(){
            if ( !showSearch ){
              $("#btn-show-search > i").removeClass('icon-circle-down2').addClass('icon-circle-up2');
              $("#section-title").removeClass('padding-top-150').addClass('padding-top-30');
              $("#section-search").slideDown();
              showSearch = true;
            }else{
              $("#btn-show-search > i").removeClass('icon-circle-up2').addClass('icon-circle-down2');
              $("#section-title").removeClass('padding-top-30').addClass('padding-top-150');
              $("#section-search").slideUp();
              showSearch = false;
            }

          });
        });

        </script>
@endpush