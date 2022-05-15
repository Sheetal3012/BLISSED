<?php
session_start();

include('connection.php');
include('functions.php');
// include('login.php');
$user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Arima+Madurai:wght@300&family=Waterfall&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <title>Home Page</title>
    <style>
        /* .blissed_logo
        {
            width: 50px;
            height: 90px;
        } */
        /* Google Font Import - Poppins */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        :root {
            /* ===== Colors ===== */
            --body-color: #121217;
            --sidebar-color: #0d0d11;
            --primary-color: #dd5544;
            --primary-color-light: #121217;
            --toggle-color: #fff;
            --text-color: #ccc;
            --bottom-color: #000000;

            /* ====== Transition ====== */
            --tran-03: all 0.2s ease;
            --tran-03: all 0.3s ease;
            --tran-04: all 0.3s ease;
            --tran-05: all 0.3s ease;
        }

        body {
            min-height: 100vh;
            background-color: var(--body-color);
            transition: var(--tran-05);
        }

        ::selection {
            background-color: var(--primary-color);
            color: #fff;
        }

        body.light {
            --body-color: #E4E9F7;
            --sidebar-color: #FFF;
            --primary-color: #dd5544;
            --primary-color-light: #F6F5FF;
            --toggle-color: #DDD;
            --text-color: #707070;
            --bottom-color: #F6F5FF;
        }

        /* ===== Sidebar ===== */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 200px;
            padding: 10px 14px;
            background: var(--sidebar-color);
            transition: var(--tran-05);
            z-index: 100;
        }

        .sidebar.close {
            width: 75px;
        }

        /* ===== Reusable code - Here ===== */
        .sidebar li {
            height: 45px;
            list-style: none;
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .sidebar header .image,
        .sidebar .icon {
            min-width: 55px;
            border-radius: 6px;
        }

        .sidebar .icon {
            min-width: 50px;
            border-radius: 6px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
        }

        .sidebar .text,
        .sidebar .icon {
            color: var(--text-color);
            transition: var(--tran-03);
        }

        .sidebar .text {
            font-size: 14px;
            font-weight: 500;
            white-space: nowrap;
            opacity: 1;
        }

        .sidebar.close .text {
            opacity: 0;
        }

        /* =========================== */

        .sidebar header {
            position: relative;
        }

        .sidebar header .image-text {
            display: flex;
            align-items: center;
        }

        .sidebar header .logo-text {
            display: flex;
            flex-direction: column;
        }

        header .image-text .name {
            margin-top: 2px;
            font-size: 15px;
            font-weight: 600;
        }

        header .image-text .profession {
            font-size: 16px;
            margin-top: -2px;
            display: block;
        }

        .sidebar header .image {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar header .image img {
            width: 50px;
            border-radius: 6px;
        }

        .sidebar header .toggle {
            position: absolute;
            top: 120%;
            right: -25px;
            transform: translateY(-50%) rotate(180deg);
            height: 25px;
            width: 25px;
            background-color: var(--primary-color);
            color: var(--sidebar-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            cursor: pointer;
            transition: var(--tran-05);
        }

        body.light .sidebar header .toggle {
            color: white;
        }

        .sidebar.close .toggle {
            transform: translateY(-50%) rotate(0deg);
        }

        .sidebar .menu {
            margin-top: 5px;
        }

        .sidebar li.search-box {
            border-radius: 6px;
            background-color: transparent;
            cursor: pointer;
            transition: var(--tran-05);
        }

        .sidebar li.search-box input {
            height: 100%;
            width: 100%;
            outline: none;
            border: none;
            background-color: transparent;
            color: var(--text-color);
            border-radius: 6px;
            font-size: 15px;
            font-weight: 500;
            transition: var(--tran-05);
        }

        .sidebar li.search-box:hover input {
            background-color: var(--primary-color);
        }

        .sidebar li a {
            list-style: none;
            height: 100%;
            background-color: transparent;
            display: flex;
            align-items: center;
            height: 100%;
            width: 100%;
            border-radius: 6px;
            text-decoration: none;
            transition: var(--tran-03);
        }

        .sidebar li a:hover {
            background-color: var(--primary-color);
        }

        .sidebar li a:hover .icon,
        .sidebar li a:hover .text {
            color: var(--sidebar-color);
        }

        body.dark .sidebar li a:hover .icon,
        body.dark .sidebar li a:hover .text {
            color: var(--text-color);
        }

        .sidebar .menu-bar {
            height: calc(100% - 85px);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow-y: scroll;
        }

        .menu-bar::-webkit-scrollbar {
            display: none;
        }

        .sidebar .menu-bar .mode {
            border-radius: 6px;
            background-color: var(--primary-color-light);
            position: relative;
            transition: var(--tran-05);
        }

        .menu-bar .mode .sun-moon {
            height: 50px;
            width: 50px;
        }

        .mode .sun-moon i {
            position: absolute;
        }

        .mode .sun-moon i.sun {
            opacity: 0;
        }

        body.dark .mode .sun-moon i.sun {
            opacity: 1;
        }

        body.dark .mode .sun-moon i.moon {
            opacity: 0;
        }

        .menu-bar .bottom-content .toggle-switch {
            position: absolute;
            right: 0;
            height: 100%;
            min-width: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            cursor: pointer;
        }

        .toggle-switch .switch {
            position: relative;
            height: 21px;
            width: 30px;
            bottom: 7%;
            border-radius: 25px;
            background-color: var(--toggle-color);
            transition: var(--tran-05);
        }

        .switch::before {
            content: '';
            position: absolute;
            height: 10px;
            width: 10px;
            border-radius: 50%;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            background-color: var(--sidebar-color);
            transition: var(--tran-04);
        }

        body.light .switch::before {
            left: 17px;
        }

        .home {
            position: absolute;
            top: 0;
            top: 0;
            left: 200px;
            height: 100vh;
            width: calc(103.4% - 250px);
            background-color: var(--body-color);
            transition: var(--tran-05);
        }

        .home .text {
            font-size: 50px;
            font-weight: 500;
            font-family: 'Waterfall', Times, serif;
            color: var(--text-color);
            padding: 5px 30px;
        }

        .headings {
            font-size: 20px;
            /* font-weight: 500; */
            /* font-family: 'Waterfall', Times, serif; */
            color: var(--text-color);
            padding: 3px 10px;
        }

        .sidebar.close~.home {
            left: 75px;
            height: 100vh;
            width: calc(100% - 75px);
        }

        body.light .home .text {
            color: var(--text-color);
        }

        .slides {
            height: 41%;
            background-color: var(--sidebar-color);
            border-radius: 20px;
            margin: 15px;
        }

        video {
            width: 98%;
            height: 41%;
            border-radius: 20px;
            position: absolute;
            object-fit: cover;
            transition: all 1s linear;
            /* z-index: -10; */
        }

        .video0 {
            opacity: 1;
        }

        .video1 {
            opacity: 0;
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

        .slots {
            display: block;
            height: 42%;
            position: initial;
            width: 98%;
            overflow-x: scroll;
            border-radius: 25px;
            margin: 5px;
            background-color: var(--body-color);
            color: #dd5544;
        }
        .slots::-webkit-scrollbar {
            width: 0px;
            background: transparent;
        }
        .container {
            display: block;
            white-space: nowrap;
            position: relative;
            padding: 20px;
            height: 40%;
            /* width: 600px; */
            /* top: 62%; */
            /* left: calc(50% - 300px); */
            /* overflow-x: hidden; */
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: flex-start;
            align-items: baseline;
        }

        .card {
            display: inline-block;
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content:flex-start;
            align-items: center;
            position: relative;
            height: 270px;
            width: 201px;
            background-color: var(--sidebar-color);
            border-radius: 10px;
            /* box-shadow: 0rem 0 0.5rem #dd5544; */
            /*   margin-left: -50px; */
            transition: 0.4s ease-out;
            position: relative;
            left: 0px;
        }

        .card:not(:first-child) {
            margin-left: 20px;
        }

        .card:hover {
            background-color: var(--sidebar-color);
            border-radius: 10px;
            box-shadow: 0rem 0 2rem #dd5544;
            transform: translateY(-15px);
            transition: 0.4s ease-out;
        }

        .card:hover~.card {
            position: relative;
            /* left: 10px; */
            transition: 0.4s ease-out;
        }

        .title {
            float: inline-start;
            color: white;
            font-weight: 500;
            position: absolute;
            left: 20px;
            top: 10px;
        }

        .artist{
            float: inline-start;
            color: white;
            font-weight: 500;
            position:absolute;
            left: 20px;
            top: 35px;
        }

        .bar {
            position: absolute;
            top: 62px;
            left: 20px;
            height: 5px;
            width: 162px;
        }

        .emptybar {
            background-color:transparent;
            width: 100%;
            height: 100%;
        }

        .filledbar {
            position: absolute;
            top: 0px;
            z-index: 3;
            width: 0px;
            height: 100%;
            background: rgb(0, 154, 217);
            background: #dd5544;
            transition: 0.6s ease-out;
        }

        .card:hover .filledbar {
            width: 162px;
            transition: 0.4s ease-out;
        }

        .images{
            /* height: 270px; */
            height: 270px;
            width: 201px;
            border-radius: 10px;
            object-fit: cover;
            opacity: 0.9;
        }
        .boxed{
            bottom: 75%;
            height: 70px;
            width: 100%;
            /* backdrop-filter: blur(10px); */
            border-radius: 10px;
            position: absolute;
        }
        .pause-circle,.play-circle{
            float: right;
            padding-right: 20px;
            background-color: transparent;
            border-color: transparent;
            font-size: 30px;
            margin-top: 7.2%;
            color: white;
            cursor: pointer;
        }
        .bottom-player{
            width: 100%;
            height: 8%;
            bottom: 0px;
            position: sticky;
            border-radius: 5px;
            background-image: linear-gradient(90deg, var(--bottom-color), #dd5544 , var(--bottom-color));
            background-size: cover;
            backdrop-filter: blur(20px); 
            border-color: white;
            display: flex;
            flex-direction:column-reverse;
            justify-content: center;
            align-items: center;
            color: white;
        }
        #myProgressBar{
            width: 40vw;
            text-align: center;
            cursor: pointer;
        }
        .icons{
            cursor: pointer;
        }
        .fa-play{
            /* content: "\f04b"; */
            margin-left: 5px;
            margin-right: 5px;
        }
        .fa-pause:before {
            /* content: "\f04c"; */
            margin-left: 5px;
            margin-right: 5px;
        }
        .songInfo{
            color: var(--text-color);
            position: absolute;
            left: 5vw;
            font-size: 15px;
            font-family: 'serif', Times New Roman, Times;
        }
    </style>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="BLISSED_.png" alt="">
                </span>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="nav-link">
                    <i class='bx bx-headphone icon'></i>
                    <span class="text nav-text"> <?php echo $user_data['username']; ?></span>
                </li>


                <li class="search-box">
                    <a href="search.php">
                        <i class='bx bx-search icon'></i>
                        <span class="text nav-text">Search...</span>
                    </a>
                </li>

                <ul class="menu-links">

                    <li class="nav-link">
                        <a href="main.php">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Home</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="browse.php">
                            <i class='bx bxl-soundcloud icon'></i>
                            <span class="text nav-text">Browse</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="liked.php">
                            <i class='bx bx-book-heart icon'></i>
                            <span class="text nav-text">Liked</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="playlist.php">
                            <i class='bx bxs-playlist icon'></i>
                            <span class="text nav-text">Playlist</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="contact.php">
                        <i class='bx bx-chat icon'></i>
                            <span class="text nav-text">Contact Us</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="logout.php">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Light mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>

            </div>
        </div>
    </nav>
    <section class="home">
        <div class="text">Where music is everything!</div>
        <div class="slides">
            <video autoplay muted id="video0" class="video0">
                <source src="video-0.mp4" type="video/mp4">
            </video>
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
        </div>
        <section class="slots"> 
                <div class="headings">Trending now</div>
            <div class="container">
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="0" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="1" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="2" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="3" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="4" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="5" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="6" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="7" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="8" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="9" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
            </div>
        </section>
        <section class="slots">
        <div class="headings">Top charts</div>
            <div class="container">
            <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="10" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="11" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="12" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="13" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="14" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="15" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="16" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="17" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="18" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="19" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
            </div>
        </section>
        <section class="slots">
        <div class="headings">Popular hits</div>
            <div class="container">
            <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="20" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="21" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="22" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="23" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="24" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="25" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="26" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="27" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="28" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="29" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
            </div>
            </div>
        </section>
        <section class="slots">
        <div class="headings">Soul soothers</div>
            <div class="container">
            <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="30" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="31" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="32" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="33" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="34" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="35" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="36" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="37" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="38" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="39" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
            </div>
            </div>
        </section>
        <section class="slots">
        <div class="headings">Suggestions</div>
            <div class="container">
            <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="40" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="41" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="42" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="43" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="44" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="45" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="46" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="47" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="48" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
                <div class="card">
                    <img class="images" src="covers/10.webp" alt="1">
                    <section class="boxed">
                        <h4 class="title songName">Song</h4> 
                        <i id="49" class="bi bi-play-circle songItemPlay play-circle"></i>
                        <h5 class="artist artistName">Artist Name</h5>
                    </section>
                        <div class="bar">
                            <div class="emptybar"></div>
                            <div class="filledbar"></div>
                        </div>
                </div>
            </div>
            </div>
        </section>
        <section class="bottom-player">

            <input type="range" name="range" id="myProgressBar" value="0" min="0" max="100">
            <div class="icons">
            <!-- fontawesome icons -->
            <i class="fa-solid fa-backward" id="previous"></i>
            <i class="fa-solid fa-play" id="masterPlay" ></i>
            <i class="fa-solid fa-forward" id="next"></i>
            </div>
            <div class="songInfo">
                <span id="masterSongName">Sulthan</span> ~
                <span id="masterArtistName">Brijesh Shandilya</span>
            </div>
        </section>
    </section>
    <script>
        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".search-box"),
            modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");


        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        })

        searchBtn.addEventListener("click", () => {
            sidebar.classList.remove("close");
        })

        modeSwitch.addEventListener("click", () => {
            body.classList.toggle("light");

            if (body.classList.contains("light")) {
                modeText.innerText = "Dark mode";
            } else {
                modeText.innerText = "Light mode";
            }
        });

        var video0 = document.getElementById('video0');
        var video1 = document.getElementById('video1');
        var video2 = document.getElementById('video2');
        var video3 = document.getElementById('video3');
        var video4 = document.getElementById('video4');
        video0.onended = function() {
            video0.style.opacity = 0;
            video1.play();
            video1.style.opacity = 1;
        }
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
            video0.play();
            video0.style.opacity = 1;
        }
    </script>
    <script src="https://kit.fontawesome.com/cab91f9ceb.js" crossorigin="anonymous"></script>
    <script src="blissed.js"></script>
</body>

</html>