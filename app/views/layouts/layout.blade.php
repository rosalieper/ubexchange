<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>
          ubexchange
          &middot; 
          @section('title') 
          @show 
    </title>
    <link rel="icon" type="image/png" href="#">
    <!-- CSS  -->
    <link rel="stylesheet" href="{{URL::to('assets')}}/css/bootstrap.css" media="screen">
    <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
    <link rel="stylesheet" href="{{URL::to('assets')}}/css/roboto.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::to('assets')}}/css/material.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::to('assets')}}/css/ripples.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::to('assets')}}/css/mystyle.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
    </script>
    <!--<script>tinymce.init({selector:'#answer', valid_elements : '+*[*]'});</script> -->
    <!--<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script> -->

</head>
<body>
<div class="navbar navbar-default ">
    <div class="container">
        <div class="navbar-header ">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL::to('/')}}">ubexchange</a>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check()==NULL)
                <li><a href="{{URL::to('register')}}">sign up</a></li>
                <li><a href="{{URL::to('login')}}">log in</a></li>
                @endif

                @if(Auth::check())
                <li class="dropdown">
                    <a href="" data-target="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" style="font-size:18px;" ></i>&nbsp;&nbsp;{{Auth::user()->name}} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{URL::to('profile')}}"><i class="fa fa-gear"></i>&nbsp;&nbsp;settings</a></li>
                        <li class="divider"></li>
                        <li><a href="{{URL::to('logout')}}"> <i class="fa fa-sign-out"></i>&nbsp;&nbsp;logout</a></li>
                    </ul>
                </li>
                @endif
                {{Form::open(array('url'=>'search', 'method'=>'get', 'class'=>'navbar-form navbar-right'))}}
                    <input type="text" class="form-control col-lg-8" name="search" placeholder="Search">
                {{Form::close()}}
            </ul>
        </div>
    </div>
</div>

    <!-- Site Content -->
<div class="container">

    @yield('content')


</div> <hr>

<div class="container">
    <footer>
        <div class="row">
          <div class="col-lg-12">
            <p>
            <a href="{{URL::to('contact_us')}}">contact us</a>&nbsp;&nbsp;
            <a href="{{URl::to('privacy_policy')}}">privacy policy</a>&nbsp;&nbsp;
            <a href=""></a>&nbsp;&nbsp;
            <br>
            &copy; {{date('Y')}} ubexchange Powered by <a href="http://nuketeck.com" target="_blank">Nuketeck.com</a>
            </p>
           

          </div>
        </div>
    </footer>
</div>



    <!--  Scripts-->
    <script src="{{URL::to('assets')}}/js/jquery.js"></script>
    <script src="{{URL::to('assets')}}/js/bootstrap.js"></script>

    <script src="{{URL::to('assets')}}/js/ripples.min.js"></script>
    <script src="{{URL::to('assets')}}/js/material.min.js"></script>
        <script>
            $(document).ready(function() {
                // This command is used to initialize some elements and make them work properly
                $.material.init();
            });
        </script>

</body>
</html>