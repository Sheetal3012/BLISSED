<?php
// session_start();
include("connection.php");

function check_login($con)
{
    if(isset($_SESSION['username']))
    {
        $uname = $_SESSION['username'];
        $query = "select * from register where username = '$uname' limit 1";

        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    // redirect to log in/sign up
    header("Location:register.php");
    die;
}