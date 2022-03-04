<?php
require_once('../../assets/session.php');

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM logo WHERE id=$id";
    $query = mysqli_query($conn, $sql);
    $old_logo = mysqli_fetch_assoc($query);

    $logo = $_FILES['logo'];
    if (empty($logo['name'])) {
        $_SESSION['error'] = "Please upload a logo first.";
        header("Location: logo_edit.php");
    } else {
        $logo_name = $logo['name'];
        $after_explode = explode('.', $logo_name);
        $logo_extension = end($after_explode);
        $logo_allowed_extension = [''];
        if ($logo_extension != 'png') {
            $_SESSION['picture_error'] = "Only png file format accepted.";
            die(header('location: logo_edit.php'));
        } else {
            if ($logo['size'] > 512000) {
                $_SESSION['picture_error'] = "Picture size too large.";
                die(header('location: logo_edit.php'));
            } else {
                $file_name = 'logo-' . $old_logo['accent'] . '-' . $id . '.' . $logo_extension;
                $location = "../../assets/frontend/img/logo/" . $file_name;
                unlink($location);
                move_uploaded_file($logo['tmp_name'], $location);
                $update_sql = "UPDATE logo SET logo = '$file_name' WHERE id=$id";
                if (mysqli_query($conn, $update_sql)) {
                    $_SESSION['success'] = "Logo updated successfully";
                    header("Location: logo_view.php");
                } else {
                    $_SESSION['error'] = mysqli_error($conn);
                    header("Location: logo_edit.php");
                }
            }
        }
    }
} else {
    $_SESSION['error'] = 'Please select a logo first.';
    header('location: logo_edit.php');
}
