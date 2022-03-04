<?php
require_once('../../assets/session.php');

if (isset($_POST['add'])) {
    $check_sql = "SELECT * FROM site_setting";
    $check_query = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_query) > 0) {
        $_SESSION['error'] = "A setting file already exists. You can edit it.";
        die(header('location: site_setting.php'));
    }

    $name = $_POST['name'];
    $tagline = $_POST['tagline'];

    $_SESSION['name'] = $name;
    $_SESSION['tagline'] = $tagline;

    $image = $_FILES['image'];
    if (empty($name) || empty($tagline) || empty($image['name'])) {
        $_SESSION['error'] = "All fields are required";
        die(header("Location: site_setting_add.php"));
    } else {
        $image_name = $image['name'];
        $after_explode = explode('.', $image_name);
        $image_extension = end($after_explode);
        if ($image_extension != 'png') {
            $_SESSION['picture_error'] = "Please upload a png image.";
            die(header('location: site_setting_add.php'));
        } else {
            if ($image['size'] > 102400) {
                $_SESSION['picture_error'] = "Image size too large.";
                die(header('location: site_setting_add.php'));
            } else {
                $sql = "INSERT INTO site_setting (name,tagline) VALUES ('$name','$tagline')";
                mysqli_query($conn, $sql);
                $id = mysqli_insert_id($conn);
                $file_name = 'icon-' . $id . '.' . $image_extension;
                $location = "../../assets/dashboard/images/site/" . $file_name;
                move_uploaded_file($image['tmp_name'], $location);

                $update_sql = "UPDATE site_setting SET icon = '$file_name' WHERE id=$id";
                if (mysqli_query($conn, $update_sql)) {
                    unset($_SESSION['name'], $_SESSION['tagline']);
                    $_SESSION['success'] = "Setting added successfully";
                    header("Location: site_setting.php");
                } else {
                    $_SESSION['error'] = mysqli_error($conn);
                    header("Location: site_setting_add.php");
                }
            }
        }
    }
} else {
    $_SESSION['error'] = 'Please fill the form first.';
    header('location: site_setting_add.php');
}
