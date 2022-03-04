<?php
require_once('../../assets/session.php');

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $sub_title = $_POST['sub_title'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $check_sql = "SELECT * FROM about_contents WHERE id=$id";
    $check_query = mysqli_query($conn, $check_sql);
    $about_content = mysqli_fetch_assoc($check_query);

    if (empty($sub_title)) {
        $sub_title = $about_content['sub_title'];
    }
    if (empty($title)) {
        $title = $about_content['title'];
    }
    if (empty($description)) {
        $description = $about_content['description'];
    }

    $sql = "UPDATE about_contents SET sub_title='$sub_title', title='$title', description='$description' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Content updated successfully";
        header("Location: about_content_view.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: about_content_edit.php");
    }
} else {
    $_SESSION['error'] = 'Please fill the form first.';
    header('location: about_content_view.php');
}
