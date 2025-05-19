<?php
require_once "../Connection/Connection.php";
if ($_SERVER["REQUEST_METHOD"]=="POST") {

    $approve=$_POST['approval'];
    $user_id=$_POST['userid'];
    $job_id=$_POST['jobid'];

    $sql="UPDATE applied_jobs SET Status ='$approve' WHERE Job_Id =$job_id AND U_Id=$user_id;";
    $result = $SqlConnection->query($sql);
    header("Location: admin.php");
}



?>