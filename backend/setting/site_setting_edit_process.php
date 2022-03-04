<?php
require_once('../../assets/session.php');

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $tagline = $_POST['tagline'];
    $image = $_FILES['image'];

    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name;
    $_SESSION['tagline'] = $tagline;

    $check_sql = "SELECT * FROM site_setting WHERE id = $id";
    $check_query = mysqli_query($conn, $check_sql);
    $setting = mysqli_fetch_assoc($check_query);

    if (empty($name)) {
        $name = $setting['name'];
    }
    if (empty($tagline)) {
        $tagline = $setting['tagline'];
    }
    if (empty($image['name'])) {
        $file_name = $setting['icon'];
    } else {
        $image_name = $image['name'];
        $after_explode = explode('.', $image_name);
        $image_extension = end($after_explode);
        if ($image_extension != 'png') {
            $_SESSION['picture_error'] = "Please upload a png image.";
            die(header('location: site_setting_edit.php'));
        } else {
            if ($image['size'] > 102400) {
                $_SESSION['picture_error'] = "Image size too large.";
                die(header('location: site_setting_edit.php'));
            } else {
                $file_name = 'icon-' . $id . '.' . $image_extension;
                $location = "../../assets/dashboard/images/site/" . $file_name;
                unlink($location);
                move_uploaded_file($image['tmp_name'], $location);
            }
        }
    }
    $update_sql = "UPDATE site_setting SET name = '$name', tagline = '$tagline', icon = '$file_name' WHERE id=$id";
    if (mysqli_query($conn, $update_sql)) {
        unset($_SESSION['name'], $_SESSION['tagline'], $_SESSION['id']);
        $_SESSION['success'] = "Setting updated successfully";
        header("Location: site_setting.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: site_setting_edit.php");
    }
} else {
    $_SESSION['error'] = 'Please fill the form first.';
    header('location: site_setting_edit.php');
}
