<?php
    session_start();
	include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password))
		{
			//read from database
			$readquery = "SELECT * from register where username = '$username' limit 1";
			$result = mysqli_query($con,$readquery);
            $user_data = mysqli_fetch_assoc($result);
			if($result && $user_data['password'] === $password)
			{
				if($result && mysqli_num_rows($result) > 0)
				{
					// $user_data = mysqli_fetch_assoc($result);
					
					// if($user_data['password'] === $password)
					// {
						$_SESSION['username'] = $user_data['username'];
                        if(isset($_POST['remember_me']))
                        {
                            setcookie('usercookie',$username,time()+86400);
                            setcookie('passwordcookie',$password,time()+86400);
                            header("Location:main.php");
                            die;
                        }
                        else
                        {
                            header("Location: main.php");
						    die;
                        }
					// }
				}
                else
                {
                    echo ' <script> 
                    window.alert("wrong username or password!");
                    window.location= "register.php";
                    </script> ';
                    die;
                    // header("Location:register.php");
                    // die;
                    // echo "wrong username or password!";
                }
			}
            else
            {
                echo'<script>
                    alert("There is no such account !");
                    window.location= "register.php";
                    </script>';
                    die;
                // header("Location:register.php");
                // die;
                // echo "wrong username or password!";
            }
		}
        else
		{
            echo'<script>
                 alert("Provide valid information!");
                 window.location= "register.php";
                 </script>';
                 die;
		}
	}