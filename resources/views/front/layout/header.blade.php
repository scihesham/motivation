<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>

        @yield('title')
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{url('public/design/mandoby')}}/css/animate.css">
    <link rel="stylesheet" href="{{url('public/design/mandoby')}}/css/animate.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="{{url('public/design/mandoby')}}/css/simple-line-icons.css"/>
    
    <link rel="stylesheet" href="{{url('public/design/mandoby')}}/css/simple-line-icons.css"/>
<!--    <link rel="shortcut icon" href="{{url('public/design/mandoby')}}/images/" />-->
    <script src="{{url('public/design/mandoby')}}/query_files/jquery-3.2.1.js"></script>
    <script src="{{url('public/design/mandoby')}}/query_files/jquery-3.2.1.min.js"></script>

    <script type="text/javascript" src="{{url('public/design/mandoby')}}/query_files/coin-slider.min.js"></script>
    <link rel="stylesheet" href="{{url('public/design/mandoby')}}/css/datatable.css" type="text/css" />
    <link rel="stylesheet" href="{{url('public/design/mandoby')}}/css/custom.css" type="text/css" />


    <script src="{{url('public/design/mandoby')}}/query_files/bootstrap.min.js"></script>
    <script src="{{url('public/design/mandoby')}}/query_files/html5shiv.min.js"></script>
    <script src="{{url('public/design/mandoby')}}/query_files/respond.min.js"></script>
    <link rel="stylesheet" href="{{url('public/design/mandoby')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('public/design/mandoby')}}/css/font-awesome.min.css">
    <script src="{{url('public/design/mandoby')}}/query_files/jquery_file.js"></script>
    <link rel="stylesheet" href="{{url('public/design/mandoby')}}/css/styles.css">
    <script src="{{url('public/design/mandoby')}}/query_files/contact.js"></script>
    @yield('header')

     <script>
         var url = "{{url('/')}}";
         var permission = '';
         @if(Auth::user())
           permission = "{{Auth::user()->permission}}";
         @endif
     </script>
</head>