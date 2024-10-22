<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title' ?? 'My App')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

</head>
<style>
    .navbar-icon {
    position: relative; /* Positioning context for the badge */
}

.badge {
    position: absolute;
    top: -1px; /* Adjust this value as needed */
    right: 8px; /* Adjust this value as needed */
    background-color: red; /* Badge color */
    color: white; /* Text color */
    border-radius: 50%; /* Circular shape */
    padding: 2px 6px; /* Padding */
    font-size: 12px; /* Font size */
}

</style>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>


        <header class="site-navbar py-4 js-sticky-header on-hover site-navbar-target bg-none" role="banner">

            <div class="container-fluid">
                <div class="d-flex align-items-center">
                    @if (auth()->check())
                        <div class="site-logo mr-auto w-25">
                            <a href="{{route('home')}}">{{auth()->user()->name}}</a>
                        </div>
                    @else
                        <div class="site-logo mr-auto w-25">
                            <a href="{{route('home')}}">My App</a>
                        </div>
                    @endif
                    <div class="mx-auto text-center">
                        <nav class="site-navigation position-relative text-right" role="navigation">
                            <ul class="site-menu" style="width: 700px; padding: 0;">
                                <li><a href="{{ route('home') }}" class="nav-link">Bosh Sahifa</a></li>
                                @if (!auth()->check())
                                    <li><a href="{{ route('registerForm') }}" class="nav-link">Ro'yxatdan O'tish</a>
                                    </li>
                                    <li><a href="{{ route('loginForm') }}" class="nav-link">Kirish</a></li>
                                @else
                                    <li><a href="{{ route('users.index') }}" class="nav-link">Foydalanuvchilar</a></li>
                                    <li>
                                        <a href="{{ route('notify') }}" class="nav-link">
                                            <i class="bi bi-bell-fill"></i>
                                            @if(Auth::user()->unReadNotifications->count() > 0)
                                                <span class="badge">{{ Auth::user()->unReadNotifications->count()}}</span>
                                            @endif
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                    @if (auth()->check())
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="ml-auto w-25">
                                <nav class="site-navigation position-relative text-right" role="navigation">
                                    <ul
                                        class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                                        <li class="cta"><button type="submit"
                                                class="btn btn-primary btn-pill"><span>Chiqish</span></button></li>
                                    </ul>
                                </nav>
                        </form>
                    @endif
                    <a href="#"
                        class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span
                            class="icon-menu h3"></span></a>
                </div>
            </div>
    </div>

    </header>
