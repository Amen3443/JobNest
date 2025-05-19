<?php
$ServerName='localhost';
$DatabaseName='jobnest';
$UserName='root';
$Password='';
try {
    $SqlConnection= mysqli_connect($ServerName,$UserName,$Password,$DatabaseName);
} catch (mysqli_sql_exception) {
 echo "asdasdasd";
}

// if ($SqlConnection) {
//     echo 'Sucessfull';
// }else{
//     echo 'Not Sucessfull'. mysqli_connect();
// }