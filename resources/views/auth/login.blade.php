<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>JAI - Backend</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content=""
          name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{!! asset('assets/global/css/gfont.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') !!}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {{--<link href="{!! asset('assets/global/plugins/select2/css/select2.min.css') !!}" rel="stylesheet" type="text/css" />--}}
    {{--<link href="{!! asset('assets/global/plugins/select2/css/select2-bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />--}}
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{!! asset('assets/global/css/components-rounded.min.css') !!}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{!! asset('assets/global/css/plugins.min.css') !!}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{!! asset('assets/pages/css/login.min.css') !!}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->

<body class=" login">

<div class="ja-overlay"></div>

<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGO -->
    <div class="logo">
        {{--<a href="index.html"><img src="{!! asset('assets/pages/img/logo-big.png') !!}" alt="" /> </a>--}}
        <a href="{!! lang_url('') !!}" title="Jakarta Aquarium"><img src="{!! asset('frontend/img/logo.png') !!}" alt="Jakarta Aquarium Indonesia" /></a>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="{{ url('/login') }}" method="post">
        {{ csrf_field() }}
        <h3 class="form-title font-green">Sign In</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> Enter any email and password. </span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
        <div class="form-actions">
            <button type="submit" class="btn green uppercase">Login</button>
            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="remember" value="1" />Remember
                <span></span>
            </label>
            <a href="{{ url('/password/reset') }}"  class="forget-password">Forgot Password?</a>
        </div>
        <div class="copyright"> {!! date('Y') !!} &copy; Jakarta Aquarium Indonesia. </div>
    </form>
    <!-- END LOGIN FORM -->
    {{--<!-- BEGIN FORGOT PASSWORD FORM -->--}}
    {{--<form class="forget-form" action="index.html" method="post">--}}
        {{--<h3 class="font-green">Forget Password ?</h3>--}}
        {{--<p> Enter your e-mail address below to reset your password. </p>--}}
        {{--<div class="form-group">--}}
            {{--<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>--}}
        {{--<div class="form-actions">--}}
            {{--<button type="button" id="back-btn" class="btn green btn-outline">Back</button>--}}
            {{--<button type="submit" class="btn btn-success uppercase pull-right">Submit</button>--}}
        {{--</div>--}}
    {{--</form>--}}
    {{--<!-- END FORGOT PASSWORD FORM -->--}}
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
<script src="{!! asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js') !!}" type="text/javascript"></script>
{{--<script src="{!! asset('assets/global/plugins/select2/js/select2.full.min.js') !!}" type="text/javascript"></script>--}}
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{!! asset('assets/global/scripts/app.min.js') !!}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{!! asset('assets/pages/scripts/login.min.js') !!}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>
