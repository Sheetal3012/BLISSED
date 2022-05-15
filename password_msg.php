<?php
session_start();
include ('connection.php');
if(isset($_GET['token']))
{
  $token = $_GET['token'];
}
// echo "hello this is the token $token";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    // echo "form posted";
    // if(!empty($token))
    // {
        // $token = $_GET['token'];
		//something was posted
		$passwordNew = $_POST['passwordNew'];
		$passwordConfirm = $_POST['passwordConfirm'];
        // $newPass = password_hash($passwordNew, PASSWORD_BCRYPT);
        // $confirmPass = password_hash($passwordConfirm, PASSWORD_BCRYPT);

		if($passwordNew === $passwordConfirm)
		{
			//read from database
			$update = " UPDATE register set password ='$passwordNew' where token='$token' ";
			$result = mysqli_query($con,$update);
			if($result)
			{
				// if($result && mysqli_num_rows($result) > 0)
				// {
          echo "Your password has been updated";
          echo ' <script> 
          window.alert("Your password has been updated !");
          window.location="register.php";
          </script> ';
          die;
				// }
        // else
        // {
          // echo "Some error occured while updating password !";
        //   echo ' <script> 
        //   window.alert("Some error occured while updating password !");
        //   window.location= "register.php";
        //   </script> ';
        //   die;
        // }
			}
            else
            {
                // echo "Connection cannot be established !";
                echo'<script>
                    alert("Connection cannot be established !");
                    window.location= "register.php";
                    </script>';
                    die;
            }
		}
        else
		{
            // echo "Passwords does not match !";   
            echo'<script>
                 alert("Passwords does not match !");
                 </script>';
                //  die;
		}
    // }
    // else
    // {
    //     echo "not got token";
    // }
}
// else
// {
//     echo "form not posted";
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
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
        height: 345px;
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
          padding-top: 12px;
      }
      p{
          padding: 15px;
          font-size: 20px;
      }
      /* .take 
      {
        width: 280px;
        height: 35px;
        margin: 10px;
        padding-left: 10px;
        border-radius: 8px;
        border-color: transparent;
        font-family: 'Arima Madurai', Times, serif;
        color: white;
        font-size: 15px;
      } */
      input::placeholder
      {
          color: white;
      }
      input
      {
        background:rgba(255, 255, 255, 0.3);
        width: 280px;
        height: 35px;
        margin: 10px;
        padding-left: 10px;
        border-radius: 8px;
        border-color: transparent;
        font-family: 'Arima Madurai', Times, serif;
        color: white;
        font-size: 15px;
      }
      button
      {
          cursor: pointer;
          background:rgba(255, 255, 255, 0.3);
          width: 280px;
        height: 35px;
        margin: 8px;
        padding-left: 10px;
        border-radius: 8px;
        border-color: transparent;
        font-family: 'Arima Madurai', Times, serif;
        color: white;
        font-size: 15px;
      }
      button:hover
      {
        cursor: pointer;
        background:rgba(0,0,0);
      }
      form i{
            position:relative;
            margin-left: -21px;
            right: 8%;
            margin-top: 5px;
            cursor: pointer;
        }
        a{
          color:cornflowerblue;
          text-decoration: none;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class=content id="text">
        <h2>Password Reset</h2>
        <p>Please enter your new password</p>

        <form method="POST" action="">

        <input id="passwordNew" type="password" name="passwordNew" placeholder="Password" required pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$).{6,}$" minlength="6" maxlength="32">
        <i class="bi bi-eye-slash" id="togglePasswordNew"></i>
       
        <input id="passwordConfirm" type="password" name="passwordConfirm" placeholder="Confirm Password" required pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$).{6,}$" maxlength="32" minlength="6">
        <i class="bi bi-eye-slash" id="togglePasswordConfirm"></i>

        <button type="submit" name="submit">Update Password</button>

        </form>
        <p>Have an account?  <a href="register.php">Log In</a> </p>
        <!-- <a href="register.php">Log In</a> -->

    </div>
</div>
</body>
<script>
    const togglePasswordNew = document.querySelector('#togglePasswordNew');
    const passwordNew = document.querySelector('#passwordNew');
    togglePasswordNew.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = passwordNew.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordNew.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
});
   const togglePasswordConfirm = document.querySelector('#togglePasswordConfirm');
    const passwordConfirm = document.querySelector('#passwordConfirm');
    togglePasswordConfirm.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordConfirm.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
});

</script>
</html>