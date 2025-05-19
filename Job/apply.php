<?php
session_start();
require_once "../Connection/Connection.php";

if ($_SERVER["REQUEST_METHOD"]=="POST") {

    if ( isset($_SESSION['Username'])) {
        $id= $_POST['job_id'];
        $user_id= $_SESSION['User_Id'];
        $level= $_POST['level'];
        $apply=$_POST['apply'];
        $ver="SELECT COUNT(*) FROM applied_jobs WHERE Job_Id = $id AND U_Id = $user_id ;";
        $result = $SqlConnection->query($ver);
        $row = mysqli_fetch_row($result);
        $count = $row[0];

        if ($row[0]!=0)
        {
            $_SESSION['Status']="You have already Applied to these job";
            header("Location:".$apply);
            exit();
        }


       if ($level=="Senior Level") 
       {
            if($_SESSION['experienceLevel']=='Senior Level'){
                $sql="INSERT INTO applied_jobs(Job_Id,U_Id,Status) VALUES ($id, $user_id,'Pending');";
                $result = $SqlConnection->query($sql);
                $_SESSION['Status']="You have Successfully Applied to these Job";
                header("Location:". $apply);
                exit();

            }else {
                $_SESSION['Status']="You are Underqualified for these Job";
                header("Location:". $apply);
            }
       }
       if ($level=="Mid Level") 
       {
            if($_SESSION['experienceLevel']=='Mid Level' || $_SESSION['experienceLevel']=='Senior Level' ){
                $sql="INSERT INTO applied_jobs(Job_Id,U_Id,Status) VALUES ($id, $user_id,'Pending');";
                $result = $SqlConnection->query($sql);
                $_SESSION['Status']="You have Successfully Applied to these Job";
                header("Location:". $apply);
                exit();
            }else {
                $_SESSION['Status']="You are underqualified job";
                header("Location:". $apply);
            }
       }
       if ($level=="Entry Level") 
       {
            if($_SESSION['experienceLevel']=='Entry Level' || $_SESSION['experienceLevel']=='Mid Level' || $_SESSION['experienceLevel']=='Senior Level'){
                $sql="INSERT INTO applied_jobs(Job_Id,U_Id,Status) VALUES ($id, $user_id,'Pending');";
                $result = $SqlConnection->query($sql);
                $_SESSION['Status']="You have Successfully Applied to these Job";
                header("Location:". $apply);
                exit();

            }else {
                $_SESSION['Status']="You are underqualified job";
                header("Location:". $apply);
            }
       }
       if ($level=="Internship & Graduate") 
       {
            if($_SESSION['experienceLevel']!='No Experience'){

                $sql="INSERT INTO applied_jobs(Job_Id,U_Id,Status) VALUES ($id, $user_id,'Pending');";
                $result = $SqlConnection->query($sql);
                $_SESSION['Status']="You have Successfully Applied to these Job";
                header("Location:". $apply);
                exit();

            }else {
                $_SESSION['Status']="You are underqualified job";
                header("Location:". $apply);
            }
       }
       if ($level=="No Experience") 
       {     
                $sql="INSERT INTO applied_jobs(Job_Id,U_Id,Status) VALUES ($id, $user_id,'Pending');";
                $result = $SqlConnection->query($sql);
                $_SESSION['Status']="You Successfully applied to these job";
                header("Location:". $apply);
                exit();

            }
       
        

    }else{
        $_SESSION['Status']="You have to Log in to Apply";
        header("Location:Job.php");
        exit();
    }

}

?>