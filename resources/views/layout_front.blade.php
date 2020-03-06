@component('elements.welcome_header')
@endcomponent

<style>
    .aside-layout-section, .container-fluid{ font-size: 0.8em!important; font-family: "Arial"!important;  }
    .col-md-12, .col-md-6, .col-xs-6, .col-sm-6, .col-md-4, .col-md-8{ text-align: left; }
    .panel-flat{ border-radius: 2px; border-color: #ddd; margin-bottom: 20px;  }
    .col-md-12, .col-md-6, .col-xs-6, .col-sm-6, .col-md-4, .col-md-8 p, .panel-body p{ 
        text-align: left!important;
        font-size: 1em!important;
        font-family: "Arial";
    }
    .row{margin: 5px 0 10px;}
    h4.p-b-10{ text-align: left; }

    .panel .table thead tr .th, .panel .table tbody tr .td{ font-size: 0.8em!important; font-family: "Arial"!important; }
    ul.navigation li a{ text-align: left;  }

    .header{ background-color: #fff; border-bottom: 1px solid #ddd; }
    .header .header-content .breadcrumb{ background-color: #fff!important; text-align: left;  }
    .breadcrumb>li+li:before{ content: ''; }
</style>

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



@yield('content')

@component('elements.welcome_footer')
@endcomponent