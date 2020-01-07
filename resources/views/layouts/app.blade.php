<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



    <style>
        .flex__container {
            display: flex;
            height: 100%;
            width: 100%;
            flex-direction: column;


        }
        .nav_Top{
            margin-top: -20px;
        }
        .main_content_container{
            display: flex;
            height: 80vh;
            width: 90%;
            flex-direction: row;
            margin: 40px;
            /*background: #E5E5E5;*/
        }
        .left_flex{
            width: 15vw;
            /*background: #f5f5f5;*/
            display: flex;
            justify-content: center;
            align-items: center;
            /*box-shadow: .5px .5px 5px 1px #CFCFCF;*/
            /*border: #161616;*/
            /*border-radius: 2px;*/
            margin-top: -30px;

        }
        .left_flex div{
            height: 100%;
            /*margin-top: -90px;*/
            display: flex;
            width: 2px;
            /*border-right: 5px;*/
            background-color: #bcbcbc;
            box-shadow: .5px .5px 5px 1px #CFCFCF;
        }
        .left_flex span{
            width: 1px;
        }
        .right_flex{
            width: 80vw;
        }
        .side_list{
            height: 100%;
            display: flex;
            align-items: center;
            flex-direction: column;
            list-style: none;
            margin-top: 60px;
            margin-right: 40px;
            font-weight: bold;
        }
        .List_item{
            width: 100%;
            margin: 20px 20px -10px 20px;
            font-size: 12px;
        }
        .list_link{
            width: 100%;
            cursor: pointer;
            text-decoration: none !important;
            color: rgba(0, 20, 73, 0.67);
        }
        /*//table fontsize*/
        .table-condensed{
            font-size: 12px !important;
        }
        .button{
            font-size: 12px;
            /*size: ;*/
        }
        .marginTop{
            margin-top: -30px;
        }
        .extraSmall{
            font-size: 12px;
        }
        input {
            font-size: 12px !important;
        }
        form button , select {
            font-size: 10px !important;
        }

        </style>

</head>
<body>

    <div id="app">
        <main class="py-4">
            <div class="flex__container">
                @if (Route::has('login'))
                    @auth
                    <div class="nav_Top">
                        @include('nav')
                    </div>
                    @endauth
                @endif

                <div class="main_content_container  table-condensed">
                    @if (Route::has('login'))
                        @auth
                    <div class="left_flex">
                        <ul class="side_list">
                            <li class="List_item"><a href="{{route('add.repo')}}" class="list_link">Add Repository</a></li>
                            <li class="List_item"><a href="{{route('home')}}" class="list_link">View Goods</a></li>
                            <li class="List_item"><a href="{{route('all.customers')}}" class="list_link">Customers</a></li>
                            <li class="List_item"><a href="{{route('all.orders')}}" class="list_link">View Orders</a></li>
{{--                            <li class="List_item"><a href="{{route('order.taken')}}" class="list_link">Orders Taken</a></li>--}}
                            <li class="List_item"><a href="{{route('all.employees')}}" class="list_link">All Persons</a></li>

                        </ul>
                        <div><span></span></div>

                    </div>
                        @endauth
                    @endif
                    <div class="right_flex">
                        @if (session()->has('message'))
                            <div class="alert alert-info row justify-content-center">
                                {{ session('message') }}
                            </div>
                        @endif
                        @yield('content')
                    </div>
                </div>

            </div>
        </main>
    </div>
</body>
</html>
