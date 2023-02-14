<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href={{ asset('css/login.css') }}>
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    {{-- <img class="wave" src={{asset("images/iniwave.png")}}> --}}
    <div class="container">
        <div class="img">
            <img src={{ asset('images/dokter.png') }}>
        </div>
        <div class="login-content">
            <form action="{{ url('proses_login') }}" method="POST">
                @csrf
                {{-- <img src={{asset("images/avatar.svg")}}> --}}
                <h2 class="title">Welcome</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <input type="text" class="input" placeholder="Username" name="username">
                        @if ($errors->has('username'))
                            <span class="error">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <input type="password" class="input" placeholder="Password" name="password">
                        @if ($errors->has('password'))
                            <span class="error">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>
                <a href="#">Forgot Password?</a>
                <input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>
