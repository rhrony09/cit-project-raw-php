<?php
session_start();
require_once('../../assets/db.php');
require_once('../../assets/functions.php');
if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['message'] = $message;

    if (empty($name) || empty($email) || empty($message)) {
        $_SESSION['error'] = "All fields are required";
        header('location:../../index.php#contact');
    } else {
        $message = mysqli_real_escape_string($conn, $message);
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO messages(name,email,message, time) VALUES('$name','$email','$message','$date')";
        if (mysqli_query($conn, $sql)) {
            unset($_SESSION['name'], $_SESSION['email'], $_SESSION['message']);
            $_SESSION['success'] = "Message Sent Successfully";
            header('location:../../index.php#contact');
        } else {
            $_SESSION['error'] = "Message Not Sent";
            header('location:../../index.php#contact');
        }
    }
}
