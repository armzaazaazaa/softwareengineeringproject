<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> SE Project Information System</title>

    <link rel="shortcut  icon" href="../dist/img/top1.png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/app.css">

    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />

    <!-- Bootstrap styles -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="/css/jquery.fileupload.css">


</head>
{{--<body class="hold-transition skin-blue sidebar-mini">--}}{{--ปิดแทบข้าง--}}

<body class="skin-blue layout-top-nav">

<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="/Index/home" class="logo">
            <span class="logo-mini"><b>SEP</b></span>
            <span class="logo-lg"><b>SoftwareProject</b></span>
        </a>


        <!-- เริ่มท๊อปบาร์ -->
        <nav class="navbar navbar-static-top">

            {{-- <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                 <span class="sr-only">Toggle navigation</span>
             </a>--}}

            <div class="navbar-custom-menu">
                {{-- <a href="/Index/home" class="logo">
                     <span class="logo-mini"><b>SEP</b></span>
                     <span class="logo-lg"><b>SoftwareProject</b></span>
                 </a>--}}
                <ul class="nav navbar-nav">

                    @if(isset(Auth::user()->id))
                        <li class="dropdown messages-menu">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user">จัดการระบบโครงงาน</i>

                            </a>
                            <ul class="dropdown-menu" style="background:#222d32">

                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">

                                        <!-- end message -->

                                        <ul class="treeview-menu">
                                            </br>
                                            <li class="active"><a href="/Index/home"><i class="fa  fa-archive"></i>HOME</a>
                                            </li>
                                            </br>
                                            <li class="active"><a href="/Manage_project/create_project"><i
                                                            class="fa  fa-archive"></i>จัดการโครงงาน</a></li>
                                            </br>
                                            <li class="active"><a href="/admin/project/create"><i
                                                            class="fa  fa-archive"></i>เพิ่มโครงงาน</a></li>
                                            </br>
                                            <li class="active"><a href="/admin/type"><i class="fa  fa-server"></i>จัดการประเภทโครงงาน</a>
                                            </li>
                                            </br>
                                            <li class="active"><a href="/admin/advisor"><i class="fa  fa-users"></i>จัดการอาจารย์ที่ปรึกษา</a>
                                            </li>
                                            </br>
                                            <li class="active"><a href="/admin/award"><i class="fa fa-trophy"></i>จัดการรางวัล</a>
                                            </li>
                                            </br>
                                            <li class="active"><a href="/admin/year"><i class="fa fa-trophy"></i>จัดการปี</a>
                                            </li>
                                            </br>

                                            {{-- <li><a href="/Index/home"><i class="fa fa-circle-o"></i> HOME </a></li>--}}

                                            {{-- <li><a href="/admin/user/create"><i class="fa fa-circle-o"></i> create นะแจ๊ะ</a></li>--}}

                                        </ul>

                                    </ul>
                                </li>

                            </ul>


                        </li>
                        <li>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{Auth::user()->name}} Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="get"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>

                    @else
                    <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                <span class="glyphicon glyphicon-log-in"> เข้าสู่ระบบ</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">


                                    <p>
                                    <p align="center"><img class="img-responsive pad" src="../dist/img/log.png"
                                                           alt="Photo">
                                    </p>
                                    <small>เข้าระบบด้วย รหัสมหาวิทยาลัยพะเยา</small>

                                    <div class="login-box-body">
                                        {{--<form class="form-horizontal" role="form" method="POST"--}}
                                        {{--action="{{ url('/register/up') }}">--}}
                                        <form class="form-horizontal" role="form" method="POST"
                                              action="{{ url('/login') }}">
                                            {{ csrf_field() }}
                                            <div class="form-group has-feedback">
                                                <input id="email" type="text" class="form-control" name="email"
                                                       value="{{ old('email') }}" required>
                                                <span class="glyphicon fa fa-user form-control-feedback"></span>
                                                @if ($errors->has('email'))
                                                    <span class="help-block" style="color: red">
                                                       <strong>{{ $errors->first('email') }}</strong>
                                                   </span>
                                                @endif
                                            </div>
                                            <div class="form-group has-feedback">
                                                <input id="password" type="password" class="form-control"
                                                       name="password" required>
                                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                                @if ($errors->has('password'))
                                                    <span class="help-block" style="color: red">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="pull-right">
                                                <button type="submit" class="btn btn-primary">
                                                    เข้าสู่ระบบ
                                                </button>
                                            </div>

                                        </form>


                                    </div>
                                    {{--จย--}}

                                    </p>
                                </li>

                                <li class="user-footer">

                                </li>
                            </ul>
                        </li>
                        {{-- สิ่นสุดโปรไฟล์ท๊อปบาร์--}}
                    @endif

                </ul>
            </div>
        </nav>
    </header>

{{--<aside class="main-sidebar">

    <section class="sidebar">


        --}}{{-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      เริ่มเมณู--}}{{--
        <ul class="sidebar-menu">


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>จัดการโครงงาน</span>
                    <span class="pull-right-container">
     <i class="fa fa-angle-left pull-right"></i>
   </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="/Manage_project/create_project"><i class="fa fa-circle-o"></i>
                            เพิ่มโครงงาน</a></li>
                    <li><a href="/Manage_project/edit"><i class="fa fa-circle-o"></i>แก้ไข</a></li>
                    <li><a href="/Index/home"><i class="fa fa-circle-o"></i> HOME </a></li>
                    <li><a href="/seproject"><i class="fa fa-circle-o"></i>แสดงโครงงาน</a>
                    </li>
                    <li><a href="/admin/user/create"><i class="fa fa-circle-o"></i> create นะแจ๊ะ</a></li>

                </ul>
            </li>

        --}}{{--
                    ENDMANU
                      /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////--}}{{--


    </section>
    <!-- /.sidebar -->
</aside>--}}

<!-- Content Wrapper. Contains page content -->

    @yield('content'){{--2/2/2560--}}

</div>
<script src="/js/app.js"></script>
<script src="/js/select2.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>

<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="/js/vendor/jquery.ui.widget.js"></script>

<script src="/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="/js/jquery.fileupload-validate.js"></script>

@yield('javascript')
@yield('scripts')
@stack('scripts')
</body>
</html>
