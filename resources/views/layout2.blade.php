<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'BeautyWine') }}</title>
        <!-- Bootstrap -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <!-- Font Awsome -->
        <script src="https://kit.fontawesome.com/807899bdcd.js" crossorigin="anonymous"></script>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
        <style>
        *, ::before, ::after{
            box-sizing: border-box;
            padding: 0px;
            margin: 0px;
            font-family: 'Roboto', sans-serif;
        }
        /* rule */
        .ro-flex{
            display: flex;
            justify-content: center;
            position: relative;
        }
        .display-none{
            display: none;
        }
        .display-grid{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
        }
        .display-flex{
            display: flex;
        }
        .justify-content-between{
            justify-content: space-between;
        }
        .align-items-center{
            align-items: center;
        }
        .mt-40{
            margin-top: 40px;
        }
        /* //// */
        .ro-container{
            width: 90%;
            max-width: 992px;
            margin: auto;
        }
        .payment-btn{
            color: white; 
            background: rgb(240,116,57); 
            border: none; 
            border-radius: 5px;
            padding: 18px 35px; 
            transition: all 200ms linear;
        }
        .payment-btn:hover{
            background-color: #f05540;
        }
        ul{
            color: rgb(163,163,163);
            position: relative;
            margin-top: 50px;
            display: flex;
            flex-direction: row;
            justify-content: space-between; 
            list-style: none;
        }
        ul::after{
            background-color: rgb(193,193,193);
            content: "";
            position: absolute;
            left: 3%;
            top: -20px;
            width: 94%;
            height: 4px;
            z-index: -1;
        }
        ul li{
            position: relative;
            font-size: .8rem;
            font-weight: 400;
            cursor: default;
        }
        ul li:nth-child(1)::before{
            content: "1"
        }
        ul li:nth-child(2)::before{
            content: "2";
        }
        ul li:nth-child(3)::before{
            content: "3";
        }
        li::before{
            position: absolute;
            font-size: 1.4rem;
            background-color: white;
            border: rgb(193,193,193) 4px solid;
            border-radius: 50%;
            top: -40px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            width: 40px;
            line-height: 2rem;
        }
        li a {
            color: rgb(193,193,193);
            text-decoration: inherit;
        }
        li a:hover {
            color: rgb(200,200,200);
            text-decoration: inherit;
        }
        .ro-grid__1-4{
            grid-column: 1/4;
        }
        .ro-grid__4-7{
            grid-column: 4/7;
        }
        .ro-grid__1-7{
            grid-column: 1/7;
        }
        .ro-grid__1-3{
            grid-column: 1/3;
        }
        .ro-grid__3-5{
            grid-column: 3/5;
        }
        .ro-grid__5-7{
            grid-column: 5/7;
        }
        </style>
        @yield('extra-header')
    </head>
    <body>
        <div class="ro-container">
            <a href="{{ route('home') }}">
                <img src="https://www.woodcraftsaustralia.com/wp-content/uploads/2020/08/Woodcrafts-Australia-Logo-2-1.png" style="width: 170px; height: 100px; object-fit: cover;">
            </a> 
            @yield('content')
        </div>
        @yield('extra-footer')   
    </body>
</html>