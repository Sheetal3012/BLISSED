<?php

        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $token = bin2hex(random_bytes(15));
        
        if(isset($_POST["submit"]))
        {
    
            if (!empty($username) || !empty($email) ||  !empty ($password)) 
            {
                $host = "localhost";
                $dbUsername = "root";
                $dbPassword = "";
                $dbname = "BLISSED";
    
                //create connection                                                                   
                $conn = mysqli_connect($host,$dbUsername,$dbPassword,$dbname);
                if(mysqli_connect_error()){
                    die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
                    } else{
                    $SELECT = "SELECT email From register Where email = ? Limit 1";
                    $INSERT = "INSERT into register(`username`,`email`,`password`,`token`) values(?,?,?,?)";
                    //prepare statement
                    $stmt = $conn->prepare($SELECT);
                    $stmt->bind_param("s",$email);
                    $stmt->execute();
                    $stmt->bind_result($email);
                    $stmt->store_result();
                    $rnum = $stmt->num_rows;
    
                    if($rnum==0) {
                        $stmt->close();
    
                        $stmt = $conn->prepare($INSERT);
                        $stmt->bind_param("ssss", $username, $email, $password, $token);
                        $stmt->execute();  
                        // echo '<h1>' ."New record inserted successfully !!". '</h1>';
                        header("Location:register.php");
                    die;

                    } 
                    else
                    {
                        // echo '<h1>' ."Someone already registered using this email !!". '</h1>';
                        echo'<script>
                        alert("Someone already registered using this email !!");
                        window.location= "register.php";
                        </script>';
                        die;
    
                    }
                    $stmt->close();
                    $conn->close();
                }
            } 
            else {
                echo'<script>
                alert("All field are required!");
                window.location= "register.php";
                </script>';
            // echo "All field are required";
            die();
            }
        }
        else
        {
            echo'<script>
            alert("Form has some error in being submitted !!");
            
            </script>';
            // echo "All field are required";
            die();
        // echo "POST not working.";
        }

?>