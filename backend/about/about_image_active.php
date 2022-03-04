<?php
require_once('../../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_1 = "UPDATE about_image SET status = '0'";
    $sql_2 = "UPDATE about_image SET status = '1' WHERE id = $id";
    mysqli_query($conn, $sql_1);

    if (mysqli_query($conn, $sql_2)) {
        $_SESSION['success'] = "About Image activated successfully";
        header("Location: about_image_view.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: about_image_view.php");
    }
} else {
    $_SESSION['error'] = 'Please select a image first.';
    header('location: about_image_view.php');
}
