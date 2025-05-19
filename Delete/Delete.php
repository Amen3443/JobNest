<?php
session_start();
require_once "../Connection/Connection.php";
	

if ($_SERVER["REQUEST_METHOD"]=="POST") {

    $Password=$_POST["Password"];
    $Email=$_POST["Email"];
    $apply=$_POST['apply'];


    $sql = "SELECT * FROM user_db WHERE email='$Email' AND Password='$Password'";
            $Update = mysqli_query( $SqlConnection, $sql);
                if ( $_SESSION['email']== $Email) {
                    
                    if (mysqli_num_rows($Update) === 1) {
                        $row = mysqli_fetch_assoc($Update);
                        if ($row['email'] === $Email && $row['password'] === $Password) {
                            // $_SESSION['user_name'] = $row['user_name'];
                            // $_SESSION['name'] = $row['name'];
                            // $_SESSION['id'] = $row['id'];
                            $SQL_Statement= " DELETE FROM user_db WHERE `user_db`.`email` = '$Email '";
                            mysqli_query( $SqlConnection, $SQL_Statement);
                            $_SESSION['Status']=='You have Successfully Deleted Your Account';
                            header("Location: ../Logout/logout.php");
                            exit();
                        } 
                        
                    } 
                    else{
                        $_SESSION['Status']='Incorrect Password or Email';
                        header("Location:". $apply);
                        exit();
                        }  
                    }
                else{
                    $_SESSION['Status']='Incorrect Password or Email';
                    header("Location:". $apply);
                    exit();
                }
           
                   
}else{
    header("Location: ../Home/Home.php");
}

