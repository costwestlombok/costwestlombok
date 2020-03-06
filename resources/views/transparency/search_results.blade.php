@extends('layout_front')

@push('styles')
  <link type="text/css" rel="stylesheet" href="{{ asset('css/plugins.css') }}">
@endpush


@section('content')

<style>
body {
  font-family: "Open Sans", sans-serif;
  line-height: 1.25;
}
table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
  /*text-transform: lowercase !important;*/
  font-size: 13px !important;
}
table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}
table tr {
  background: #f8f8f8;
  border: 1px solid #ddd;
  padding: .35em;
}
table th,
table td {
  padding: .625em;
  text-align: center;
}
table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}
@media screen and (max-width: 600px) {
  table {
    border: 0;
  }
  table caption {
    font-size: 1.3em;
  }
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  table td:before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  table td:last-child {
    border-bottom: 0;
  }
}
 table thead {background: yellow;}
 tbody tr:nth-child(odd) {
  background: lightgray;
}
.entry-wrap .entry-content .entry-readmore {margin-top: 0px !important}
</style>

@component('elements.welcome_search')
@endcomponent

<?php   
$instituciones = array(
    "HONDUTEL"=>"hondutel",
    "ENP"=>"enp",
    //"COALIANZA"=>"coalianza",
    "Fondo Vial"=>"fondovial",
    "INSEP" => "insep",
    //"SAPP" => "sapp",
    "InvestH" => "invest",
    "ENEE" => "enee",
    "IDECOAS" => "idecoas",
    "SESAL" => "sesal",
    "SEDUC" => "seduc"
);
?>

<!--================================PAGE TITLE==========================================-->
        <div class="page-title-wrap bgamarillo padding-top-30 padding-bottom-30"><!-- section title -->
            <!-- <h4 class="white">Resultados de Busqueda </h4> -->
            <?php //echo $registros; ?>
        </div><!-- section title end -->
        
        <!--================================listing SECTION==========================================-->
        
        <section class="aside-layout-section padding-top-70 padding-bottom-40">
            <div class="container"><!-- section container -->
                <div class="row"><!-- row -->
                    

                    <div class="col-md-9 col-sm-8 col-xs-12 main-wrap"><!-- content area column -->
                        <div class="listing-single padding-bottom-40">
                            <div class="entry-wrap shadow-1">
                                <div class="entry-content">
                                    <table class="table datatable-button-init-basic">
                                      <!--<caption>Resultados de Búsqueda</caption>-->
                                      <thead>
                                        <tr>
                                          <th scope="col">No.</th>
                                          <th scope="col">Código Proyecto</th>
                                          <th scope="col">Descripción</th>
                                          <th scope="col">Departamento</th>
                                          <th scope="col">Entidad</th>
                                          <th scope="col">Enlace</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php //echo $texto; ?>
                                        <?php
                                        if ( count($rows) > 0 ):
                                            foreach ( $rows as $row):
                                        ?>
                                        <tr>
                                            <td><?= $row->id ?></td>
                                            <td><?= $row->project_code ?></td>
                                            <td><?= $row->project_name ?></td>
                                            <td><?= $row->state_name ?></td>
                                            <td><?= $row->organization_name ?></td>
                                            <td><a href="{{ route('transparency.project', $row->id) }}">VER</a></td>
                                        </tr>
                                        <?php
                                            endforeach;
                                        endif; 
                                        ?>
                                      </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- content area end -->
                    

                    <!-- rightbar -->
                    @component('elements.welcome_rightbar', ['instituciones' => $instituciones])
                    @endcomponent



                </div>
            </div><!-- section container end -->
        </section>

        

@endsection


@push('scripts')
<script src="{{ asset('js/forms/uniform.min.js') }}"></script>
<!-- Page scripts -->
<script src="{{ asset('js/tables/datatables/datatables.min.js') }}"></script>
<!--<script src="{{ asset('js/pages/datatable_basic.js') }}"></script>-->
<!-- /page scripts -->

<!-- Page scripts -->
<script src="{{ asset('js/forms/select2.min.js') }}"></script>  
<script src="{{ asset('js/extensions/sweetalert.js') }}"></script>
<!--<script src="js/tables/datatables/datatables.min.js"></script>-->
<script src="{{ asset('js/tables/datatables/extensions/buttons.min.js') }}"></script>
<script src="{{ asset('js/pages/datatable_extension_export_options.js') }}"></script>
<!-- /page scripts -->


@endpush