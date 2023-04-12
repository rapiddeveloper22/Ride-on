<?php
     $conn=mysqli_connect("localhost","root","");
     mysqli_select_db($conn,"RideOn");


     $err = "Sorry Wrong Password or Username";
     $user=$_POST["user"];
     $pass=$_POST["pass"];
     $query=mysqli_query($conn,"select * from user where email='$user' && password='$pass'");
     if (mysqli_num_rows($query) > 0) 
       {
            // Get the user's information
            $user = mysqli_fetch_assoc($query);

            session_start();
            $email=$_POST["email"];
            $_SESSION['email'] = $email;
            
            // Redirect the user to the dashboard
            header("Location: http://localhost/Ride-On/Frontend/Homepage.html");
            exit;
        }
        else
        {
            $err="sorry wrong username or password";
        }    

?>
