<?php
require_once('../../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM banner_contents WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['delete'] = "Content deleted successfully";
        header("Location: banner_content_view.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: banner_content_view.php");
    }
} else {
    $_SESSION['error'] = 'Please select a content first.';
    header('location: banner_content_view.php');
}
