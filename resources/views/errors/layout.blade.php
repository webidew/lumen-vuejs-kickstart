<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app('translator')->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Styles -->
    <style>
        * {
            -webkit-box-sizing: border-box;
                    box-sizing: border-box;
        }

        body {
            padding: 0;
            margin: 0;
        }

        #errorpage {
            position: relative;
            height: 100vh;
        }

        #errorpage .errorpage {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                    transform: translate(-50%, -50%);
        }

        .errorpage {
            max-width: 920px;
            width: 100%;
            line-height: 1.4;
            text-align: center;
            padding-left: 15px;
            padding-right: 15px;
        }

        .errorpage .errorcode {
            position: absolute;
            height: 100px;
            top: 0;
            left: 50%;
            -webkit-transform: translateX(-50%);
                -ms-transform: translateX(-50%);
                    transform: translateX(-50%);
            z-index: -1;
        }

        .errorpage .errorcode h1 {
            font-family: 'Maven Pro', sans-serif;
            color: #ececec;
            font-weight: 900;
            font-size: 276px;
            margin: 0px;
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                    transform: translate(-50%, -50%);
        }

        .errorpage h2 {
            font-family: 'Maven Pro', sans-serif;
            font-size: 46px;
            color: #000;
            font-weight: 900;
            text-transform: uppercase;
            margin: 0px;
        }

        .errorpage p {
            font-family: 'Maven Pro', sans-serif;
            font-size: 16px;
            color: #000;
            font-weight: 400;
            text-transform: uppercase;
            margin-top: 15px;
        }

        .errorpage a {
            font-family: 'Maven Pro', sans-serif;
            font-size: 14px;
            text-decoration: none;
            text-transform: uppercase;
            background: #189cf0;
            display: inline-block;
            padding: 16px 38px;
            border: 2px solid transparent;
            border-radius: 40px;
            color: #fff;
            font-weight: 400;
            -webkit-transition: 0.2s all;
            transition: 0.2s all;
        }

        .errorpage a:hover {
            background-color: #fff;
            border-color: #189cf0;
            color: #189cf0;
        }

        @media only screen and (max-width: 480px) {
            .errorpage .errorcode h1 {
                font-size: 162px;
            }
            .errorpage h2 {
                font-size: 26px;
            }
        }
    </style>
</head>

<body>
    <div id="errorpage">
        <div class="errorpage">
            <div class="errorcode">
            <h1>{{ $code }}</h1>
            </div>
            <h2>{{ $message }}</h2>
            <p> {{ $desc}} </p>
            <a href="#">Back To Homepage</a>
        </div>
    </div>
</body>
</html>


