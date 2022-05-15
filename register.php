<?php
session_start();
include("connection.php");
include("functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Waterfall&display=swap" rel="stylesheet">
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Waterfall&display=swap" rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Arima+Madurai:wght@300&family=Waterfall&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" />

    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        video {
            width: 100%;
            height: 100%;
            position: absolute;
            object-fit: cover;
            transition: all 1s linear;
            z-index: -10;
        }

        .video1 {
            opacity: 1;
        }

        .video2 {
            opacity: 0;
        }

        .video3 {
            opacity: 0;
        }

        .video4 {
            opacity: 0;
        }

        .container {
            width: 100%;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.5);
        }

        #text {
            animation: slide 1 2s 2s linear forwards;
            position: absolute;
            text-align: center;
            left: 50%;
            /* padding-top: 350px; */
            top: 50%;
            transform: translate(-50%, -50%);
            font-size: 35px;
            font-family: 'Waterfall', Times, serif;
            color: white;
            letter-spacing: 5px;
            width: 50%;
            /* animation: slide 1s ease 0.5s linear ; */
            /* position: relative; */
        }

        @keyframes slide {
            0% {
                left: 50%;
                top: 50%;
            }

            100% {
                left: 28%;
                top: 50%;
            }
        }

        .log-in-sign-up {
            font-family: 'Arima Madurai', Times, serif;
            color: white;
            text-align: center;
            float: right;
            padding-right: 19%;
            padding-left: 81%;
        }

        /* #forms{
            animation: display 15s 0s ease;
        } */
        #register {
            animation: display 8s 0s ease;
        }

        @keyframes display {
            0% {
                visibility: hidden;
            }

            50% {
                visibility: hidden;
            }

            100% {
                visibility: visible;
            }
        }

        h2 {
            color: white;
        }

        p {
            color: white;
        }

        .login-signup {
            color: white;
            text-align: center;
            padding-left: 80%;
            font-size: 30px;
            font-family: 'Arima Madurai', Times, serif;
            font-weight: 100;
        }

        .account {
            text-align: center;
            right: 20px;
            font-size: 25px;
            font-family: 'Arima Madurai', Times, serif;
            font-weight: 100;
        }

        .form-grp {
            color: white;
            text-decoration: none;
            padding: 10px;
        }

        #login {
            float: right;
            right: 200px;
            width: 360px;
        }

        #signup {
            float: right;
            right: 200px;
            width: 360px;
        }

        #usernameLogIn {
            background: rgba(255, 255, 255, 0.3);
            opacity: 1;
            color: white;
            font-size: 15px;
            border-color: transparent;
            border-radius: 25px;
            width: 270px;
            height: 20px;
        }

        #usernameSignUp {
            background: rgba(255, 255, 255, 0.3);
            opacity: 1;
            color: white;
            font-size: 15px;
            border-color: transparent;
            border-radius: 25px;
            width: 270px;
            height: 20px;
        }

        #passwordLogIn {
            background: rgba(255, 255, 255, 0.3);
            opacity: 1;
            color: white;
            font-size: 15px;
            /* margin-right:5px; */
            border-color: transparent;
            border-radius: 25px;
            width: 270px;
            height: 20px;
        }

        #passwordSignUp {
            background: rgba(255, 255, 255, 0.3);
            opacity: 1;
            color: white;
            font-size: 15px;
            /* margin-right:5px; */
            border-color: transparent;
            border-radius: 25px;
            width: 270px;
            height: 20px;
        }

        #emailSignUp {
            background: rgba(255, 255, 255, 0.3);
            opacity: 1;
            color: white;
            font-size: 15px;
            /* margin-right:5px; */
            border-color: transparent;
            border-radius: 25px;
            width: 270px;
            height: 20px;
        }

        input::placeholder {
            color: white;
            opacity: 1;
        }

        .log-in {
            cursor: pointer;
            color: black;
            background-color: white;
            font-size: 15px;
            border-color: transparent;
            border-radius: 25px;
            width: 300px;
            height: 40px;
        }

        .log-in:hover {
            cursor: pointer;
            background-color: #F3C693;
            color: white;
        }

        .sign-up {
            cursor: pointer;
            color: black;
            background-color: white;
            font-size: 15px;
            border-color: transparent;
            border-radius: 25px;
            width: 300px;
            height: 40px;
        }

        .sign-up:hover {
            cursor: pointer;
            background-color: #F3C693;
            color: white;
        }

        p {
            font-size: 20px;
        }

        /* .social{
            text-decoration: none;
            font-size: 20px;
            background-color: white;
        } */
        .checkbox-wrap {
            cursor: pointer;
        }

        checkbox {
            color: blue;
        }

        .google-login {
            cursor: pointer;
            color: black;
            margin: 5px;
            padding: 5px;
            height: 50px;
            padding-top: 8px;
            border-radius: 20px;
            text-decoration: none;
            padding-right: 25px;
            text-align: start;
            padding-left: 25px;
            font-size: 20px;
            background-color: white;
        }

        .facebook-login {
            cursor: pointer;
            color: black;
            margin: 5px;
            padding: 5px;
            height: 50px;
            padding-top: 8px;
            border-radius: 20px;
            text-decoration: none;
            padding-right: 20px;
            text-align: start;
            padding-left: 20px;
            font-size: 20px;
            background-color: white;
        }

        .google-login:hover {
            /* background-color: #F3C693; */
            background-color: brown;
            color: white;
        }

        .facebook-login:hover {
            /* background-color: #F3C693; */
            background-color: dodgerblue;
            color: white;
        }

        a {
            text-decoration: none;
        }

        #main-logo {
            float: inline-start;
            padding: 20px;
            padding-left: 40px;
            width: 100px;
            height: 150px;
        }

        i {
            position: absolute;
            margin-left: -45px;
            margin-top: 5px;
            cursor: pointer;
        }

        .button-box {
            width: 220px;
            margin: 15px auto;
            position: relative;
            box-shadow: 0 0 15px 5px #ff61241f;
            border-radius: 25px;
        }

        .toggle-btn {
            padding: 10px 20px;
            cursor: pointer;
            color: #fff;
            background: transparent;
            font-weight: 500;
            font-family: 'Arima Madurai', Times, serif;
            border: 0;
            font-size: 20px;
            outline: none;
            position: relative;
        }

        #btn {
            top: 0;
            left: 0;
            position: absolute;
            width: 110px;
            height: 100%;
            background: #F3C693;
            border-radius: 30px;
            transition: .5s;
        }

        .signin-form {
            /* top: 150px; */
            position: absolute;
            width: 280px;
            transition: .5s;
        }

        .registration-form {
            /* top: 120px; */
            position: absolute;
            width: 280px;
            transition: .5s;
        }

        #my-signin2 {
            padding: 20px;
        }

        .pause-circle,
        .play-circle {
            float: right;
            padding: 15px;
            background-color: transparent;
            border-color: transparent;
            font-size: 30px;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body">
    <div class="container">
        <video autoplay muted id="video1" class="video1">
            <source src="video-1.mp4" type="video/mp4">
        </video>
        <video autoplay muted id="video2" class="video2">
            <source src="video-2.mp4" type="video/mp4">
        </video>
        <video autoplay muted id="video3" class="video3">
            <source src="video-3.mp4" type="video/mp4">
        </video>
        <video autoplay muted id="video4" class="video4">
            <source src="video-4.mp4" type="video/mp4">
        </video>

        <img id="main-logo" src="BLISSED_.png" alt="~BLISSED~">

        <!-- <div class="music"> -->
        <button class="bi bi-play-circle play-circle" id="play-circle"></button>
        <button class="bi bi-pause-circle pause-circle" id="pause-circle"></button>
        <!-- </div> -->

        <div id="register" class="register">
            <div id="log-in-sign-up" class="log-in-sign-up">

                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" onclick='login()' class="toggle-btn">Log In</button>
                    <button type="button" onclick='signup()' class="toggle-btn">Sign Up</button>
                </div>

                <div id="forms">

                    <form id="login" method="POST" action="login.php" class="signin-form">
                        <h2> <span class="account">Have an account?</span> </h2>
                        <div class="form-grp">
                            <input type="text" id="usernameLogIn" class="form-grp" name="username" placeholder="Username" value="<?php if (isset($_COOKIE['usercookie'])) {
                                                                                     echo $_COOKIE['usercookie'];} ?>" required minlength="4" maxlength="16">
                        </div>
                        <div class="form-grp">
                            <input type="password" class="form-grp" name="password" id="passwordLogIn" placeholder="Password" value="<?php if (isset($_COOKIE['passwordcookie'])) {
                                                                                                                                            echo $_COOKIE['passwordcookie'];
                                                                                                                                        } ?>" required pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$).{6,}$" minlength="6" maxlength="32">
                            <i class="bi bi-eye-slash" id="togglePasswordLogIn"></i>
                        </div>
                        <div class="form-grp">
                            <button type="submit" id="submit" class="log-in">Log In</button>
                        </div>
                        <div class="form-grp">
                            <div class="w-50">
                                <label class="checkbox-wrap ">Remember Me
                                    <input type="checkbox" name="remember_me" checked> &nbsp; &nbsp; &nbsp; &nbsp;
                                    <a href="forgot_password.php" style="color: #fff">Forgot Password ?</a>
                                </label>
                            </div>
                            <br>
                            <div class="form-grp">
                                <p>&mdash; Or Log In With &mdash;</p> <br>
                                <div class="social">
                                    <a href="#" class="google-login">Google</a>
                                    <a href="#" class="facebook-login">Facebook</a>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form id="signup" method="POST" action="SignUp.php" class="registration-form">

                        <h2> <span class="account">Create account</span> </h2>
                        <div class="form-grp">
                            <input type="text" id="usernameSignUp" class="form-grp" name="username" placeholder="Username" required minlength="4" maxlength="16">
                        </div>
                        <div class="form-grp">
                            <input type="email" id="emailSignUp" class="form-grp" name="email" placeholder="Email" required maxlength="64" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,5}$">
                        </div>
                        <div class="form-grp">
                            <input type="password" class="form-grp" name="password" id="passwordSignUp" placeholder="Password" required pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$).{6,}$" maxlength="32" minlength="6">
                            <i class="bi bi-eye-slash" id="togglePasswordSignUp"></i>
                        </div>
                        <div class="form-grp">
                            <button type="submit" id="submit" class="sign-up" name="submit">Sign-in</button>
                        </div>
                        <div class="form-grp">
                            <!-- <div class="w-50">
                            <label class="checkbox-wrap ">Remember Me
                                <input type="checkbox" checked>  
                                <a href="#" style="color: #fff">Forgot Password</a>
                            </label>
                        </div> -->
                            <!-- <br> -->
                            <div class="form-grp">
                                <p>&mdash; Or Sign In With &mdash;</p> <br>
                                <div class="social">
                                    <a href="#" class="google-login">Google</a>
                                    <a href="#" class="facebook-login">Facebook</a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
        <div id="text">
            <h1>Where Music <br> is everything 🤍</h1>
        </div>

    </div>


    </body>
    <script>
        var video1 = document.getElementById('video1');
        var video2 = document.getElementById('video2');
        var video3 = document.getElementById('video3');
        var video4 = document.getElementById('video4');
        video1.onended = function() {
            video1.style.opacity = 0;
            video2.play();
            video2.style.opacity = 1;
        }
        video2.onended = function() {
            video2.style.opacity = 0;
            video3.play();
            video3.style.opacity = 1;
        }
        video3.onended = function() {
            video3.style.opacity = 0;
            video4.play();
            video4.style.opacity = 1;
        }
        video4.onended = function() {
            video4.style.opacity = 0;
            video1.play();
            video1.style.opacity = 1;
        }
        const togglePasswordLogIn = document.querySelector('#togglePasswordLogIn');
        const passwordLogIn = document.querySelector('#passwordLogIn');
        togglePasswordLogIn.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = passwordLogIn.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordLogIn.setAttribute('type', type);
            // toggle the eye / eye slash icon
            this.classList.toggle('bi-eye');
        });
        const togglePasswordSignUp = document.querySelector('#togglePasswordSignUp');
        const passwordSignUp = document.querySelector('#passwordSignUp');
        togglePasswordSignUp.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = passwordSignUp.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordSignUp.setAttribute('type', type);
            // toggle the eye / eye slash icon
            this.classList.toggle('bi-eye');
        });
        var x = document.getElementById('login');
        var y = document.getElementById('signup');
        var z = document.getElementById('btn');

        function signup() {
            x.style.display = "none";
            x.style.left = '61%';
            // y.style.left='450px';
            y.style.display = 'block';
            z.style.left = '110px';
        }

        function login() {
            x.style.display = "block";
            // x.style.left='-400px';
            y.style.display = "none";
            y.style.left = '61%';
            z.style.left = '0px';
        }
        setTimeout(login(), 15000);

        var play = document.querySelector('#play-circle');
        var pause = document.querySelector('#pause-circle');
        const music = new Audio('music.mp3');
        music.play();
        music.loop = true;
        play.style.display = 'none';
        pause.style.display = 'block';
        // music.play();
        // music.loop=true;
        play.addEventListener('click', function() {
            // play.style.opacity=0;
            // pause.style.opacity=1;
            music.play();
            music.loop = true;
            play.style.display = 'none';
            pause.style.display = 'block';
        });
        pause.addEventListener('click', function() {
            // play.style.opacity=1;
            // pause.style.opacity=0;
            music.pause();
            play.style.display = 'block';
            pause.style.display = 'none';
        });
        window.onload = function() {
            music.play();
            music.loop = true;
            play.style.display = 'none';
            pause.style.display = 'block';
        }
    </script>

</html>