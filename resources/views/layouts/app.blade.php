<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css" integrity="sha512-rVZC4rf0Piwtw/LsgwXxKXzWq3L0P6atiQKBNuXYRbg2FoRbSTIY0k2DxuJcs7dk4e/ShtMzglHKBOJxW8EQyQ==" crossorigin="anonymous" />

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css" integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg==" crossorigin="anonymous" />
    <!-- select2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" />
    <!-- flag-icon-css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" integrity="sha512-Cv93isQdFwaKBV+Z4X8kaVBYWHST58Xb/jVOcV9aRsGSArZsgAnFIhMpDoMDcFNoUtday1hdjn0nGp3+KZyyFw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- tempusdominus-bootstrap-4 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @stack('third_party_stylesheets')
    <style>
        .dataTables_wrapper {
            margin: 20px;
        }

        .required:after {
            content: '(*)';
            color: red;
            padding-left: 5px;
        }

    </style>
    @stack('page_css')
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>

<body class="hold-transition sidebar-mini layout-fixed" id="app">
    <div class="wrapper">
        <!-- Main Header -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button class="btn btn-danger" type="submit"><i class="fa fa-sign-out mr-2"></i>ออกจากระบบ</button>
            </form>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="flag-icon flag-icon-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span> {{ Config::get('languages')[App::getLocale()]['display'] }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach (Config::get('languages') as $lang => $language)
                        @if ($lang != App::getLocale())
                        <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span> {{$language['display']}}</a>
                        @endif
                        @endforeach
                    </div>
                </li>
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="data:image/jpeg;base64,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" class="user-image img-circle elevation-2" alt="User Image">
                        <span class="d-none d-md-inline"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="{{url('images/logo.png')}}" class="img-circle elevation-2" alt="User Image">
                            <p>

                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="{{route('users.profile')}}" class="btn btn-default btn-flat">Profile</a>
                            <a href="#" class="btn btn-default btn-flat float-right" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Sign out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content">
                {{-- <welcome></welcome> --}}
                {{-- <textarea cols="80" id="editor1" name="editor1" rows="10">&lt;p&gt;This is some &lt;strong&gt;sample text&lt;/strong&gt;. You are using &lt;a href=&quot;https://ckeditor.com/&quot;&gt;CKEditor&lt;/a&gt;.&lt;/p&gt;</textarea> --}}

                @yield('content')
            </section>
        </div>

        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 0.0.2
            </div>
            <strong>Copyright &copy; 2022 <a href="https://not.com">not.com</a>.</strong> All rights
            reserved.
        </footer>
    </div>


    <script src="{{ mix('js/app.js') }}" defer></script>
    {{-- <script src="{{asset('ckeditor/ckeditor.js')}}"></script> --}}
    {{-- <script>
        CKEDITOR.replace('editor1', {
          height: 400,
          baseFloatZIndex: 10005,
          removeButtons: 'PasteFromWord'
        });
      </script>
     --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>

    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/js/adminlte.min.js" integrity="sha512-++c7zGcm18AhH83pOIETVReg0dr1Yn8XTRw+0bWSIWAVCAwz1s2PwnSj4z/OOyKlwSXc4RLg3nnjR22q0dhEyA==" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js" integrity="sha512-rmZcZsyhe0/MAjquhTgiUcb4d9knaFc7b5xAfju483gbEXTkeJRUMIPk6s3ySZMYUHEcjKbjLjyddGWMrNEvZg==" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js" integrity="sha512-J+763o/bd3r9iW+gFEqTaeyi+uAphmzkE/zU8FxY6iAvD3nQKXa+ZAWkBI9QS9QkYEKddQoiy0I5GDxKf/ORBA==" crossorigin="anonymous"></script>
    <!--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/turbolinks/5.0.0/turbolinks.js" integrity="sha512-P3/SDm/poyPMRBbZ4chns8St8nky2t8aeG09fRjunEaKMNEDKjK3BuAstmLKqM7f6L1j0JBYcIRL4h2G6K6Lew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(function() {
            Turbolinks.start();
        })
    </script>
    -->


    <script type="text/javascript">
        $(function() {
            bsCustomFileInput.init();
        });

        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });
        setInterval(function() {
            $.get("{{url('/checkOnline')}}", function($rs) {
                if ($('#user_online').length)
                    $('#user_online').html($rs);
                console.log($rs);
            })
        }, 10000);
    </script>

    @stack('third_party_scripts')

    @stack('page_scripts')


</body>

</html>
