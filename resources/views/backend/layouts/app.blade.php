<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>The title (will shared from view composer)</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Meta Content (will shared from view)" name="description" />
    <meta content="" name="author" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{!! asset('assets/global/css/gfont.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') !!}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    @section('page-level-style-plugins')
    @show
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{!! asset('assets/global/css/components-rounded.min.css') !!}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{!! asset('assets/global/css/plugins.css') !!}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    @section('page-level-styles')
    @show
    <!-- END PAGE LEVEL STYLES -->

    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{!! asset('assets/layouts/layout/css/layout.min.css"') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('assets/layouts/layout/css/themes/darkblue.min.css"') !!}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{!! asset('assets/layouts/layout/css/custom.min.css"') !!}" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->

    <link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">

<div class="page-wrapper">
    <!-- BEGIN HEADER -->
    @include('backend.partials.header')
    <!-- END HEADER -->

    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"> </div>
    <!-- END HEADER & CONTENT DIVIDER -->

    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar-wrapper">
            @include('backend.partials.sidebar')
        </div>
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            @yield('content')
        </div>
        <!-- END CONTENT -->

    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <div class="page-footer">
        <div class="page-footer-inner"> {!! date('Y') !!} &copy; Jakarta Aquarium Indonesia By
            <a target="_blank" href="#">[K]odekit</a>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- END FOOTER -->
</div>

<!--[if lt IE 9]>
<script src="{!! asset('assets/global/plugins/respond.min.js') !!}"></script>
<script src="{!! asset('assets/global/plugins/excanvas.min.js') !!}"></script>
<script src="{!! asset('assets/global/plugins/ie8.fix.min.js') !!}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{!! asset('assets/global/plugins/jquery.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('assets/global/plugins/js.cookie.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('assets/global/plugins/jquery.blockui.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
@section('page-level-plugins')
@show
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{!! asset('assets/global/scripts/app.js') !!}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
@section('page-level-scripts')
@show
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{!! asset('assets/layouts/layout/scripts/layout.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('assets/layouts/layout/scripts/demo.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('assets/layouts/global/scripts/quick-sidebar.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('assets/layouts/global/scripts/quick-nav.min.js') !!}" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>