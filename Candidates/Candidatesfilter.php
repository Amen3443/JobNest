<?php
if (isset($_POST['filter']) && $_POST['filter'] !='' ) {
    $filter = '';
    $filter = $_POST['filter'];
    $sql = "SELECT * FROM user_db WHERE CONCAT(firstName,lastName,email,dateOFBirth,gender,location,phoneNumber,DesiredFunction,experienceLevel,Type) LIKE '%$filter%' ORDER BY firstName ";
    $result = $SqlConnection->query($sql);
}   
if(isset($_POST['option']) && $_POST['option']!=''){
    $option=$_POST['option'];
    $sql="SELECT * FROM user_db WHERE experienceLevel='$option' ORDER BY firstName";
    $result = $SqlConnection->query($sql);
}

if (isset($_POST['option']) && isset($_POST['filter'])  && $_POST['filter'] !=''&& $_POST['option']!='' ) {
    $filter = $_POST['filter'];
    $option=$_POST['option'];
    $sql = "SELECT * FROM user_db WHERE CONCAT(firstName,lastName,email,dateOFBirth,gender,location,phoneNumber,DesiredFunction,experienceLevel,Type) LIKE '%$filter%' AND  experienceLevel='$option' ORDER BY firstName ";
    $result = $SqlConnection->query($sql);
}


if(isset($_POST['type']) && $_POST['type']!=''){
    $option=$_POST['type'];
    $sql="SELECT * FROM user_db WHERE Type='$option' ORDER BY firstName";
    $result = $SqlConnection->query($sql);
}

if (isset($_POST['type']) && isset($_POST['filter'])  && $_POST['type'] !=''&& $_POST['option']!='' ) {
    $filter = $_POST['type'];
    $option=$_POST['option'];
    $sql = "SELECT * FROM user_db WHERE Type= '$filter' AND  experienceLevel='$option' ORDER BY firstName ";
    $result = $SqlConnection->query($sql);
}

if (isset($_POST['type']) && isset($_POST['filter'])  && $_POST['filter'] !=''&& $_POST['type']!='' ) {
    $filter = $_POST['filter'];
    $option=$_POST['type'];
    $sql = "SELECT * FROM  user_db WHERE CONCAT(firstName,lastName,email,dateOFBirth,gender,location,phoneNumber,DesiredFunction,experienceLevel,Type) LIKE '%$filter%' AND  Type ='$option' ORDER BY firstName ";
    $result = $SqlConnection->query($sql);
}

if (isset($_POST['option']) && isset($_POST['filter'])  && $_POST['filter'] !=''&& $_POST['option']!='' ) {
    $filter = $_POST['filter'];
    $option=$_POST['option'];
    // $type=$_POST['type'];
    $sql = "SELECT * FROM user_db WHERE CONCAT(firstName,lastName,email,dateOFBirth,gender,location,phoneNumber,DesiredFunction,experienceLevel,Type) LIKE '%$filter%' AND  experienceLevel='$option' ORDER BY firstName ";
    $result = $SqlConnection->query($sql);
}
if (isset($_POST['box'])) {
    
     $box=$_POST['box'];
    // echo $box[0];
    if (isset($box[0])) {

        $sql = "SELECT * FROM user_db WHERE  DesiredFunction LIKE '%$box[0]%' ORDER BY firstName";
        $result = $SqlConnection->query($sql); 
        } 
    if ($box[0]=='All Functions') {
        $sql = "SELECT * FROM user_db ORDER BY firstName";
         $result = $SqlConnection->query($sql); 
      } 
  
    if (isset($box[1])) {
    $sql = "SELECT * FROM user_db WHERE  DesiredFunction LIKE '%$box[0]%'UNION SELECT * FROM user_db WHERE DesiredFunction LIKE '%$box[1]%' ORDER BY firstName";
    $result = $SqlConnection->query($sql); 
    }
    if (isset($box[2])) {
        $sql = "SELECT * FROM user_db WHERE  DesiredFunction LIKE '%$box[0]%'UNION SELECT * FROM user_db WHERE  DesiredFunction LIKE '%$box[1]%'UNION SELECT * FROM user_db WHERE DesiredFunction LIKE '%$box[2]%' ORDER BY firstName";
        $result = $SqlConnection->query($sql); 
    }
    if (isset($box[3])) {
         $sql = "SELECT * FROM user_db WHERE  DesiredFunction LIKE '%$box[0]%'UNION SELECT * FROM user_db WHERE  DesiredFunction LIKE '%$box[1]%'UNION SELECT * FROM user_db WHERE  DesiredFunction LIKE '%$box[2]%'UNION SELECT * FROM user_db WHERE  DesiredFunction LIKE '%$box[3]%' ORDER BY firstName";
        $result = $SqlConnection->query($sql); 
     }
     if (isset($box[4])) {
        $sql = "SELECT * FROM user_db WHERE DesiredFunction LIKE '%$box[0]%'UNION SELECT * FROM user_db WHERE  DesiredFunction LIKE '%$box[1]%'UNION SELECT * FROM user_db WHERE  DesiredFunction LIKE '%$box[2]%'UNION SELECT * FROM user_db WHERE  DesiredFunction LIKE '%$box[3]%'UNION SELECT * FROM user_db WHERE  DesiredFunction LIKE '%$box[4]%' ORDER BY firstName";
       $result = $SqlConnection->query($sql); 
    }
    //  $sql = "SELECT * FROM jobs WHERE  Function LIKE '%$box[0]%'";
    //  $result = $SqlConnection->query($sql); 
   
  
}



if((isset($_POST['option']) && $_POST['option'] =='Any Experience Level') || (isset($_POST['type']) && $_POST['type'] =='Any Type') ){
    $sql="SELECT * FROM user_db ORDER BY firstName";
    $result = $SqlConnection->query($sql);
}

$sql1="SELECT * FROM user_db WHERE experienceLevel LIKE 'Senior Level' ORDER BY firstName" ;
$re=$SqlConnection->query($sql1);


?>