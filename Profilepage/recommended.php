<?php


if (isset( $_SESSION['Username'])) {
    $type=$_SESSION['Type'];
    $function=$_SESSION['Function'];
    $sql="SELECT * FROM jobs WHERE  Experience  LIKE 'Senior Levelssss;'";
    $result1 = $SqlConnection->query($sql);
if ( $_SESSION['experienceLevel']=='Senior Level') {
    $sql="SELECT * FROM jobs WHERE  (Experience  LIKE 'Senior Level' OR Experience LIKE 'Mid Level') AND (Function LIKE '%$function%') AND (Type = '$type') ORDER BY Title;" ;
    $result1 = $SqlConnection->query($sql);
  
}elseif ($_SESSION['experienceLevel']=='Mid Level') {
    $sql="SELECT * FROM jobs WHERE  (Experience  LIKE 'Entry Level' OR Experience LIKE 'Mid Level') AND (Function LIKE '%$function%') AND (Type = '$type') ORDER BY Title;" ;
    $result1 = $SqlConnection->query($sql);
   
}
elseif ($_SESSION['experienceLevel']=='Entry Level') {
    $sql="SELECT * FROM jobs WHERE  (Experience  LIKE 'Entry Level') AND (Function LIKE '%$function%') AND (Type = '$type') ORDER BY Title ;" ;
    $result1 = $SqlConnection->query($sql);
   
}
elseif ($_SESSION['experienceLevel']=='No Experience') {
    $sql="SELECT * FROM jobs WHERE  (Experience  LIKE 'No Experience') AND (Function LIKE '%$function%') AND (Type = '$type') ORDER BY Title;" ;
    $result1 = $SqlConnection->query($sql);
   
}

}



?>