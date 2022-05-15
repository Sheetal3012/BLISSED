<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// require 'PHPMailer/get_oauth_token.php';
// require 'PHPMailer/src';
// require 'PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer/src/OAuth.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/POP3.php';
require 'PHPMailer/src/SMTP.php';
session_start();
include("connection.php");
// include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $email = $_POST['email'];
    if(!empty($email))
    {
        //read from database
        $queryyy = "SELECT * from register where email = '$email' limit 1";
        $result = mysqli_query($con,$queryyy);
        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['email'] === $email)
                {
                    
                    // $_SESSION['username'] = $user_data['username'];
                    if(isset($_POST['forgot_password']))
                    {
                        $username = $user_data['username'];
                        // $token = $user_data['token'];
                        $token= $user_data['token'];
                        // $token=bin2hex($token);
                        // $subject = "Password Reset";
                        // $body = "Hi $username, \n Click here to reset your password";
                        // http://localhost/BLISSED/password_msg.php";
                        // $sender_email = "From : blissed3210@gmail.com";

                        $mail = new PHPMailer();
                        try {
                            //Server settings
                            $mail->SMTPDebug = 0;                      //Enable verbose debug output
                            $mail->isSMTP();                                            //Send using SMTP
                            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                            $mail->SMTPKeepAlive = true; //SMTP connection will not close after each email sent, reduces SMTP overhead
                            $mail->SMTPSecure='tls';
                            $mail->Username   = 'blissed3210@gmail.com';                     //SMTP username
                            $mail->Password   = 'Blissed@3012';                               //SMTP password
                            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                        
                            //Recipients
                            $mail->setFrom('blissed3210@gmail.com','Blissed');
                            $mail->addAddress($email,$username);     //Add a recipient
                            // $mail->addAddress('sheetalsingh7388@gmail.com');               //Name is optional
                            $mail->addReplyTo('no-reply@gmail.com', 'no-reply');
                            // $mail->addCC('sheetalsingh7388@gmail.com');
                            // $mail->addBCC('sheetalsingh7388@gmail.com');
                        
                            //Attachments
                            // $mail->addAttachment('');         //Add attachments
                            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                        
                            //Content
                            $mail->isHTML(true);                                  //Set email format to HTML
                            $mail->Subject = 'Password Reset';
                            $mail->Body    = "Hi $username, We have received a request to reset your password. Click on the given link reset your password http://localhost/BLISSED/password_msg.php?token=$token";
                            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                            $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';

                            $mail->send();
                            // echo "Message has been sent , token=$token";
                            echo '<script> 
                            window.alert("Check your mail to reset your password.");
                            window.location= "register.php";
                            </script> ';

                            // $_SESSION['msg'] = "Check your mail to reset your password $email";
                            // header("Location:register.php");
                            // die;
                           } 
                           catch (Exception $e) 
                           { 
                            // echo "Message could not be sent. Mailer Error : {$mail->ErrorInfo}";

                            echo '<script> 
                            window.alert("Some error occured while sending the mail !");
                            window.location= "forgot_password.php";
                            </script> ';
                           }
                        // $mail->isSMTP();                                  //Send using SMTP
                        // $mail->Host       = 'smtp.gmail.com';             //Set the SMTP server to send through
                        // $mail->SMTPAuth   = true;                         //Enable SMTP authentication
                        // $mail->Username   = 'blissed310@gmail.com';       //SMTP username
                        // $mail->Password   = 'Blissed@3012';              //SMTP password
                        // $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                        // $mail->Port       = 587;                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                        // $mail->CharSet = 'UTF-8';
                        // $mail->setFrom('$email','$username');
                        // $mail->addAddress('blissed310@gmail.com', 'Blissed');     //Add a recipient
                        // // $mail->addAddress('ellen@example.com');               //Name is optional
                        // $mail->addReplyTo('no-reply@gmail.com', 'No-reply');
                        // $mail->addCC('sheetalsingh7388@gmail.com');
                        // $mail->addBCC('sheetalsingh7388@gmail.com');
                        // $mail->addAttachment('');         //Add attachments
                        // $mail->isHTML(true);                                  //Set email format to HTML
                        // $mail->Subject = 'Password Reset';
                        // $mail->Body    = 'Hi $username, \n Click here to reset your password';

                        // if($mail->send())
                        // {
                        //     echo '<script> 
                        //     window.alert("Check your mail to reset your password.");
                        //     window.location= "register.php";
                        //     </script> ';
                        //     // $_SESSION['msg'] = "Check your mail to reset your password $email";
                        //     // header("Location:register.php");
                        //     // die;
                        // } 
                        // else
                        // {
                        //     echo ' <script> 
                        //     window.alert("Some error occured while sending the mail !");
                        //     window.location= "forgot_password.php";
                        //     </script> ';
                        // }
                    }
                    // else
                    // {
                    //     header("Location: main.php");
                    //     die;
                    // }
                }
            }
            else
            {
                echo ' <script> 
                window.alert("No such registered email found!");
                window.location= "forgot_password.php";
                </script> ';
                die;
                // header("Location:register.php");
                // die;
                // echo "wrong username or password!";
            }
        }
        else
        {
            echo ' <script> 
                window.alert("No such registered email found!");
                window.location= "forgot_password.php";
                </script> ';
                die;
            // header("Location:register.php");
            // die;
            // echo "wrong username or password!";
        }
    }
    else
    {
        // echo " $email provide valid email id";
        echo'<script>
             alert("Provide valid email!");
             window.location= "forgot_password.php";
             </script>';
             die;
    }
}