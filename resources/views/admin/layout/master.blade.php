<!doctype html>
<html lang="en">

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description"
          content="This is an example dashboard (CodeLean) created using build-in elements and components.">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="dashboard/main.css" rel="stylesheet">
{{--    <link href="dashboard/own_style.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.9.2/css/flag-icons.min.css"/>
</head>

<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    <div class="app-header header-shadow">
        <div class="app-header__content">
            <div class="app-header-right">
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">

                            <div class="widget-content-left  ml-3 mr-3 header-user-info">
                                <div class="widget-heading"> {{Auth::user()->name ?? 'Guest'}} </div>
                                <div class="widget-subheading"> {{Auth::user()->email ?? ''}} </div>
                            </div>
                            <div class="widget-content-right ml-3 mr-3">
                                @if(Auth::user())
                                    <a href="/logout" class="btn-pill btn-shadow btn-shine btn btn-focus">Logout</a>
                                @else
                                    <a href="/login" class="btn-pill btn-shadow btn-shine btn btn-focus">Login</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="app-main">
        <div class="app-main__outer">
            {{--Main--}}
            @yield('body')
        </div>
    </div>

</div>

{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>--}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script type="text/javascript" src="dashboard/assets/scripts/main.js"></script>
<script type="text/javascript" src="dashboard/assets/scripts/update_img.js"></script>

</body>

</html>

