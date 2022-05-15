<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Arima+Madurai:wght@300&family=Waterfall&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        * 
        {
            margin: 0;
            padding: 0;
        }
        body,html 
        {
            height: 100vh;
        }
        body {
        background-image: url("black.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .wrapper {
        height: 320px;
        width: 400px;
        left: 15%;
        top: 30%;
        background: inherit;
        border-radius: 15px;
        border: 1px solid rgba(43, 43, 43, 0.5);
        position: absolute;
        overflow: hidden;
      }
    .wrapper:before {
        position: absolute;
        content: '';
        background: inherit;
        height: 370px;
        width: 650px;
        left: -25px;
        right: 0;
        top: -25px;
        bottom: 0;
        box-shadow: inset 0 0 0 3000px rgba(150, 150, 150, 0.1);
        filter: blur(5px);
        border-radius: 15px;
      }
      .content
      {
        position: relative;
        color: white;
        text-align: center;
      }
      h2
      {
          padding-top: 30px;
          font-family: 'Arima Madurai', Times, serif;
      }
      p{
          padding: 10px;
          font-size: 22px;
          font-family: 'Arima Madurai', Times, serif;
      }
      #take 
      {
        width: 280px;
        height: 35px;
        margin: 15px;
        padding-left: 10px;
        border-radius: 8px;
        border-color: transparent;
        font-family: 'Arima Madurai', Times, serif;
        color: white;
        font-size: 15px;
      }
      input::placeholder
      {
          color: white;
      }
      input
      {
        background:rgba(255, 255, 255, 0.3);
      }
      button
      {
          cursor: pointer;
          background:rgba(255, 255, 255, 0.3);
      }
      button:hover
      {
        cursor: pointer;
        background:rgba(0,0,0);
      }
    </style>
</head>
<body>
<div class="wrapper">
    <div class=content id="text">
        <h2>Trouble Logging In?</h2>
        <p>Enter your email address and we will send you a link to reset password.</p>
        <form method="POST" action="authController.php">
        <input id="take" type="email" name="email" placeholder="Email"> <br>
        <button id="take" name="forgot_password" type="submit">Reset Password</button>
        </form>
    </div>
</div>
</body>
</html>