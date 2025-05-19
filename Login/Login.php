<?php
 session_start();
require_once "../Connection/Connection.php";
// echo $_SERVER['HTTP_REFERER'];
// echo $_SERVER['REQUEST_URI'];

if ($_SERVER["REQUEST_METHOD"]=="POST") {

$Password=$_POST["Password"];
$Email=$_POST["Email"];
$url=$_POST["header"];
$sql = "SELECT * FROM user_db WHERE email='$Email' AND password='$Password'";
        $Update = mysqli_query( $SqlConnection, $sql);
            if (mysqli_num_rows($Update) === 1) {
                $row = mysqli_fetch_assoc($Update);
                if ($row['email'] === $Email && $row['password'] === $Password) {
                    session_start();
                    $_SESSION['Username'] = $row['firstName'];
                    $_SESSION['User_Id'] = $row['User_Id'];
                    $_SESSION['lastname'] = $row['lastName'];
                    $_SESSION['Password'] = $row['password'];
                    $_SESSION['experience'] = $row['experienceLevel'];
                    $_SESSION['Function']= $row['DesiredFunction'];
                    $_SESSION['Type']= $row['Type'];
                    $_SESSION['email']=$row['email'];
                    $_SESSION['gender']=$row['gender'];
                    $_SESSION['dateOFBirth']= $row['dateOFBirth'];
                    $_SESSION['phoneNumber']=$row['phoneNumber'];
                    $_SESSION['experienceLevel']=$row['experienceLevel'];
                    $_SESSION['location']=$row['location'];
                    $_SESSION['pp']=$row['profilePicture'];
                    if ($row['email']=='admin'&& $row['password']=='admin') {
                        header("Location:../Admin/admin.php");
                    }else {
                        header("Location:".$url); 
                    }
                   
                    
                } 
                
            } 
            else{
                $_SESSION['Status']='Your Email or Password is Incorrect';
                header("Location:".$url);
                
                
                } 
       
               
}

