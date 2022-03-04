<?php
require_once('../../assets/session.php');

if (isset($_POST['add'])) {
    $sub_title = $_POST['sub_title'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $_SESSION['sub_title'] = $sub_title;
    $_SESSION['title'] = $title;
    $_SESSION['description'] = $description;

    if (empty($sub_title) || empty($title) || empty($description)) {
        $_SESSION['error'] = "All fields are required";
        header("Location: banner_content_add.php");
    } else {
        $sql = "INSERT INTO banner_contents (sub_title, title, description) VALUES ('$sub_title', '$title', '$description')";
        if (mysqli_query($conn, $sql)) {
            unset($_SESSION['sub_title'], $_SESSION['title'], $_SESSION['description']);
            $_SESSION['success'] = "Content added successfully";
            header("Location: banner_content_view.php");
        } else {
            $_SESSION['error'] = mysqli_error($conn);
            header("Location: banner_content_add.php");
        }
    }
} else {
    $_SESSION['error'] = 'Please fill the form first.';
    header('location: banner_content_add.php');
}
