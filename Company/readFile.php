<?php
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limit = 10; // Number of entries per page
$offset = ($page - 1) * $limit;

$filter = '';

if (isset($_POST['filter'])) {
    $filter = $_POST['filter'];
    if ($filter === 'All') {
        $sql = "SELECT * FROM companies";
    }
     else {
        $sql = "SELECT * FROM companies WHERE Name LIKE '$filter%'";
    }
} else {
    $sql = "SELECT * FROM companies ORDER by Company_id";
}
$result =  $SqlConnection->query($sql);
if (isset($_POST['Title'])) {


    $title=$_POST['Title'];
    if ($title=='Apple') {

        $sql = "SELECT * FROM companies WHERE Name LIKE '$title%' ";
        $result =  $SqlConnection->query($sql);
        
    } if ($title=='Tesla') {

        $sql = "SELECT * FROM companies WHERE Name  LIKE '$title%' ";
        $result =  $SqlConnection->query($sql);
        
    } if ($title=='Google') {

        $sql = "SELECT * FROM companies WHERE Name  LIKE '$title%' ";
        $result =  $SqlConnection->query($sql);
        
    } 
    if ($title=='Amazon') {

        $sql = "SELECT * FROM companies WHERE Name  LIKE '$title%' ";
        $result =  $SqlConnection->query($sql);
        
    } 
    if ($title=='Samsung') {

        $sql = "SELECT * FROM companies WHERE Name  LIKE '$title%' ";
        $result =  $SqlConnection->query($sql);
        
    } 
}

$total_sql = "SELECT COUNT(*) as count FROM companies";
if ($filter && $filter !== 'All') {
    $total_sql .= " WHERE Name LIKE '$filter%'";
}
$total_result =  $SqlConnection->query($total_sql);
$total_row = $total_result->fetch_assoc();
$total_records = $total_row['count'];
$total_pages = ceil($total_records / $limit);



?>