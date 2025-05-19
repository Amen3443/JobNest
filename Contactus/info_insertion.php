<?php
session_start();
// Process form submission
require_once("../Connection/Connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $url=$_POST["header"];

    // Insert user input into database
    $sql = "INSERT INTO contact_table (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    if (mysqli_query( $SqlConnection, $sql)) {
        // echo "Message sent successfully!";
        $_SESSION['Status']='You have Successfully Inserted Your Comment';
        header("Location:".$url);
    } else {
        $_SESSION['Status']='You have Failed Inserted Your Comment';
        header("Location:".$url);
    }
}


?>