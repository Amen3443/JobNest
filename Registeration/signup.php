<?php
   session_start();
require_once "../Connection/Connection.php";

if ($_SERVER["REQUEST_METHOD"]=="POST") 
{
    $firstname= $_POST['firstName'];
    $lastname= $_POST['lastName'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $date= date('Y-m-d', strtotime($_POST['date']));
    $gender= $_POST['gender'];
    $location= $_POST['location'];
    $phoneNumber= $_POST['phoneNumber'];
    $Experience= $_POST['Experience'];
    $type= $_POST['type'];
    $Function= $_POST['Function'];
    

    // echo $Function .$type .$phoneNumber. $location.  $gender.  $date.  $password.  $email. $lastname. $firstname;
    $ver="SELECT * FROM user_db WHERE email='$email'";
    $select = $SqlConnection->query($ver);
    // $row = mysqli_fetch_row($select);
    // $count = $row[0];
    if(mysqli_num_rows($select)>0){
    $_SESSION['Status']='These User has already been Registered';
      header("Location: practice.php");
    }
    else
     {
        
        if ($_FILES['picture']['size']!=0) 
        {
            $pic_name= $_FILES['picture']['name'];
            $pic_size= $_FILES['picture']['size'];
            $pic_tmp= $_FILES['picture']['tmp_name'];
            $pic_error= $_FILES['picture']['error'];
            echo $pic_tmp;
            if ($pic_size >130000) {
                $_SESSION['Status']='Your Profile Picture is Too Big';
                header("Location: practice.php");
                exit();
            }

            $pic_ex= pathinfo($pic_name, PATHINFO_EXTENSION);
            $pic_exl=strtolower($pic_ex);
            $allowed_ex= array("jpg","png","jpeg");

            if (in_array($pic_exl, $allowed_ex))
            {
            $newpic=uniqid("IMG-",true).'.'.$pic_exl;
            $uploadpath='../propics/' .$newpic;
            move_uploaded_file($pic_tmp,$uploadpath);
            }
            else
            {
                $_SESSION['Status']='Change the Extension Of your Profile Picture';
                header("Location: practice.php");
                exit();
                
            }

            $insert = "INSERT into user_db (`firstName`,
            `lastName`,
            `email`,
            `password`,
            `dateOFBirth`,
            `gender`,
            `location`,
            `phoneNumber`,
            `DesiredFunction`,
            `experienceLevel`,
            `Type`,
            `profilePicture`)  
            values ('$firstname',
            '$lastname',
            '$email',
            '$password',
            '$date',
            '$gender',
            '$location',
            '$phoneNumber',
            '$Function',
            '$Experience',
            '$type',
            '$newpic')";

            $result = $SqlConnection->query( $insert);
            session_start();
            $sql = "SELECT * FROM user_db WHERE email='$email' AND password='$password'";
             $Update = mysqli_query( $SqlConnection, $sql);
             $row = mysqli_fetch_assoc($Update);
             $_SESSION['User_Id'] = $row['User_Id'];
            $_SESSION['Username'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['Password'] = $password;
            $_SESSION['experience'] = $Experience;
            $_SESSION['Function']= $Function;
            $_SESSION['Type']= $type;
            $_SESSION['email']=$email;
            $_SESSION['gender']=$gender;
            $datez= $date;
            $_SESSION['dateOFBirth']= date('Y-m-d', strtotime($datez)); 
            $_SESSION['phoneNumber']=$phoneNumber;
            $_SESSION['experienceLevel']=$Experience;
            $_SESSION['location']=$location;
            $_SESSION['pp']= 'profile.png';
           
            header("Location: ../Profilepage/Profile.php");
           

            
        }
        else 
        {

            $insert = "INSERT into user_db (`firstName`,
            `lastName`,
            `email`,
            `password`,
            `dateOFBirth`,
            `gender`,
            `location`,
            `phoneNumber`,
            `DesiredFunction`,
            `experienceLevel`,
            `Type`)  
            values ('$firstname',
            '$lastname',
            '$email',
            '$password',
            '$date',
            '$gender',
            '$location',
            '$phoneNumber',
            '$Function',
            '$Experience',
            '$type')";
            
            $result = $SqlConnection->query( $insert);
            session_start();
            $sql = "SELECT * FROM user_db WHERE email='$email' AND password='$password'";
            $Update = mysqli_query( $SqlConnection, $sql);
            $row = mysqli_fetch_assoc($Update);
            $_SESSION['User_Id'] = $row['User_Id'];
            $_SESSION['Username'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['Password'] = $password;
            $_SESSION['experience'] = $Experience;
            $_SESSION['Function']= $Function;
            $_SESSION['Type']= $type;
            $_SESSION['email']=$email;
            $_SESSION['gender']=$gender;
            $datez= $date;
            $_SESSION['dateOFBirth']= date('Y-m-d', strtotime($datez)); 
            $_SESSION['phoneNumber']=$phoneNumber;
            $_SESSION['experienceLevel']=$Experience;
            $_SESSION['location']=$location;
            $_SESSION['pp']= 'profile.png';
           

            header("Location: ../Profilepage/Profile.php");
        
        }
    }

}


