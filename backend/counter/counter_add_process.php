<?php
require_once("../../assets/session.php");

if (isset($_POST['add'])) {
    $icon = $_POST['icon'];
    $amount = $_POST['amount'];
    $title = $_POST['title'];
    $_SESSION['icon'] = $icon;
    $_SESSION['icon1'] = $icon;
    $_SESSION['amount'] = $amount;
    $_SESSION['title'] = $title;

    if (empty($icon) || empty($title) || empty($amount)) {
        $_SESSION['error'] = 'All fields are required.';
        header('location: counter_add.php');
    } else {
        $sql = "INSERT INTO counters (icon, amount, title) VALUES('$icon','$amount','$title')";
        $query = mysqli_query($conn, $sql);
        unset($_SESSION['icon'], $_SESSION['icon1'], $_SESSION['title'], $_SESSION['amount']);
        $_SESSION['success'] = 'Counter added successfully.';
        header('location: counter_view.php');
    }
} else {
    $_SESSION['error'] = 'Fill the form first.';
    header('location: counter_add.php');
}
