<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            max-width: 1072px;
        }

        .navbar {
            background-color: #343536;
        }

        .navbar-brand {
            color: #FDE12C;
        }

        .text-logo {
            margin-top: 10px;
            font-size: 40px;
            color: #FDE12C;
            font-family: 'Paytone One', sans-serif;
        }

        .title {
            color: #FDE12C;
            margin-top: 100px;
            width: 100%;
            font-family: 'Paytone One', sans-serif;
            text-shadow: 1px 1px 10px #343536;
            font-size: 60px;
            text-align: center;
        }

        .subtitle {
            font-family: 'Paytone One', sans-serif;
            font-size: 100px;
            text-align: center;
            text-shadow: 3px 2px rgb(117, 73, 117);
        }

        .mailBox {
            margin-top: 100px;
        }

        .firma {
            margin-top: 100px;
            text-align: end;
            font-weight: bold;
        }

        .message {
            font-style: oblique;
            font-weight: 100;
        }

        .my-Button-workwithus,
        .my-Button-workwithus:hover {
            color: #343536;
            border: solid 1px #343536);
            background-color: #fbdf46;
            /* font-weight: bold; */
            border-radius: 10px;
            padding: 8px;
            font-size: 26px;
            margin-bottom: 18px;
            text-align: center;
            width: 268px;
            height: 60px;
            text-decoration: none;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="container-fluid justify-content-center">
            <a class="navbar-brand" href="/index.html"><i class="fa-solid fa-basket-shopping fa-2x"></i></i></a>
            <p class="text-logo">PrestoShop</p>
            </a>
        </div>
    </nav>
    <header>
        <div class="container boxTitle">
            <h1 class="title"><span><i class="fa-solid fa-basket-shopping"></i></span> PrestoShop</h1>
        </div>
    </header>
    <div class="container mailBox">
        <div class="row justify-content-center">
            <div class="col-8">
                <p>Congratulazioni, <br>{{ $person['name'] }} {{$person['surname']}}, da ora fai parte dello STAFF revisori di PrestoShop<br>
                <p class="message"></p><br>Clicca sul bottone per confermare</p>
                <a href="{{route('makeRevisor',['user'=>$person['mail']])}}">
                    <button class="btn my-Button-workwithus">
                        Conferma Revisore
                    </button>
                </a>
            </div>
            <p class="firma">PrestoShop | Assistenza</p>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
