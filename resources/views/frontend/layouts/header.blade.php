<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title','Home')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" href="{{asset('frontend/')}}/assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="{{asset('frontend/')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontend/')}}/assets/css/templatemo.css">
    <link rel="stylesheet" href="{{asset('frontend/')}}/assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{asset('frontend/')}}/assets/css/fontawesome.min.css">

@yield('alertify_css')



    @livewireStyles
    @stack('scripts')
  {{--  @yield('toastr_css')--}}
</head>
<body>

