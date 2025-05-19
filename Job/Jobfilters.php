<?php
if (isset($_POST['filter']) && $_POST['filter'] !='' ) {
    $filter = '';
    $filter = $_POST['filter'];
    $sql = "SELECT * FROM jobs WHERE CONCAT(Title,Company,Location,Salary,Function,Experience,Type,Published,Deadline) LIKE '%$filter%'  Order by Title ";
    $result = $SqlConnection->query($sql);
}   
if(isset($_POST['option']) && $_POST['option']!=''){
    $option=$_POST['option'];
    $sql="SELECT * FROM jobs WHERE Experience='$option'  Order by Title";
    $result = $SqlConnection->query($sql);
}

if (isset($_POST['option']) && isset($_POST['filter'])  && $_POST['filter'] !=''&& $_POST['option']!='' ) {
    $filter = $_POST['filter'];
    $option=$_POST['option'];
    $sql = "SELECT * FROM jobs WHERE CONCAT(Title,Company,Location,Salary,Function,Experience,Type,Published,Deadline) LIKE '%$filter%' AND  Experience='$option'  Order by Title ";
    $result = $SqlConnection->query($sql);
}


if(isset($_POST['type']) && $_POST['type']!=''){
    $option=$_POST['type'];
    $sql="SELECT * FROM jobs WHERE Type='$option'  Order by Title" ;
    $result = $SqlConnection->query($sql);
}

if (isset($_POST['type']) && isset($_POST['filter'])  && $_POST['type'] !=''&& $_POST['option']!='' ) {
    $filter = $_POST['type'];
    $option=$_POST['option'];
    $sql = "SELECT * FROM jobs WHERE Type= '$filter' AND  Experience='$option'  Order by Title ";
    $result = $SqlConnection->query($sql);
}

if (isset($_POST['type']) && isset($_POST['filter'])  && $_POST['filter'] !=''&& $_POST['type']!='' ) {
    $filter = $_POST['filter'];
    $option=$_POST['type'];
    $sql = "SELECT * FROM jobs WHERE CONCAT(Title,Company,Location,Salary,Function,Experience,Type,Published,Deadline) LIKE '%$filter%' AND  Type ='$option'  Order by Title ";
    $result = $SqlConnection->query($sql);
}

if (isset($_POST['option']) && isset($_POST['filter'])  && $_POST['filter'] !=''&& $_POST['option']!='' ) {
    $filter = $_POST['filter'];
    $option=$_POST['option'];
    // $type=$_POST['type'];
    $sql = "SELECT * FROM jobs WHERE CONCAT(Title,Company,Location,Salary,Function,Experience,Type,Published,Deadline) LIKE '%$filter%' AND  Experience='$option'  Order by Title ";
    $result = $SqlConnection->query($sql);
}
if (isset($_POST['box'])) {
    
     $box=$_POST['box'];
    // echo $box[0];
    if (isset($box[0])) {

        $sql = "SELECT * FROM jobs WHERE  Function LIKE '%$box[0]%'  Order by Title";
        $result = $SqlConnection->query($sql); 
        } 
    if ($box[0]=='All Functions') {
        $sql = "SELECT * FROM jobs";
         $result = $SqlConnection->query($sql); 
      } 
  
    if (isset($box[1])) {
    $sql = "SELECT * FROM jobs WHERE  Function LIKE '%$box[0]%'UNION SELECT * FROM jobs WHERE  Function LIKE '%$box[1]%'  Order by Title";
    $result = $SqlConnection->query($sql); 
    }
    if (isset($box[2])) {
        $sql = "SELECT * FROM jobs WHERE  Function LIKE '%$box[0]%'UNION SELECT * FROM jobs WHERE  Function LIKE '%$box[1]%'UNION SELECT * FROM jobs WHERE  Function LIKE '%$box[2]%'  Order by Title";
        $result = $SqlConnection->query($sql); 
    }
    if (isset($box[3])) {
         $sql = "SELECT * FROM jobs WHERE  Function LIKE '%$box[0]%'UNION SELECT * FROM jobs WHERE  Function LIKE '%$box[1]%'UNION SELECT * FROM jobs WHERE  Function LIKE '%$box[2]%'UNION SELECT * FROM jobs WHERE  Function LIKE '%$box[3]%'  Order by Title";
        $result = $SqlConnection->query($sql); 
     }
     if (isset($box[4])) {
        $sql = "SELECT * FROM jobs WHERE  Function LIKE '%$box[0]%'UNION SELECT * FROM jobs WHERE  Function LIKE '%$box[1]%'UNION SELECT * FROM jobs WHERE  Function LIKE '%$box[2]%'UNION SELECT * FROM jobs WHERE  Function LIKE '%$box[3]%'UNION SELECT * FROM jobs WHERE  Function LIKE '%$box[4]%'  Order by Title";
       $result = $SqlConnection->query($sql); 
    }
    //  $sql = "SELECT * FROM jobs WHERE  Function LIKE '%$box[0]%'";
    //  $result = $SqlConnection->query($sql); 
   
  
}



if((isset($_POST['option']) && $_POST['option'] =='Any Experience Level') || (isset($_POST['type']) && $_POST['type'] =='Any Type') ){
    $sql="SELECT * FROM jobs Order by Title";
    $result = $SqlConnection->query($sql);
} 

$sql1="SELECT * FROM jobs WHERE Id < 8" ;
$re=$SqlConnection->query($sql1);


?>