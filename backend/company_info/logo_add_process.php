<?php
require_once('../../assets/session.php');

$light_sql = "SELECT * FROM logo WHERE accent = 'light'";
$light_query = mysqli_query($conn, $light_sql);
$dark_sql = "SELECT * FROM logo WHERE accent = 'dark'";
$dark_query = mysqli_query($conn, $dark_sql);

if (isset($_POST['add'])) {
    $accent = $_POST['accent'];
    if ((mysqli_num_rows($light_query) == 1 && $accent == 'light') || (mysqli_num_rows($dark_query) == 1 && $accent == 'dark')) {
        $_SESSION['error'] = "One Logo already uploaded. You can eddit this.";
        header("Location: logo_view.php");
    } else {
        $logo = $_FILES['logo'];
        if (empty($logo['name'])) {
            $_SESSION['error'] = "Please upload a logo first.";
            header("Location: logo_add.php");
        } else {
            $logo_name = $logo['name'];
            $after_explode = explode('.', $logo_name);
            $logo_extension = end($after_explode);
            $logo_allowed_extension = [''];
            if ($logo_extension != 'png') {
                $_SESSION['picture_error'] = "Only png file format accepted.";
                die(header('location: logo_add.php'));
            } else {
                if ($logo['size'] > 512000) {
                    $_SESSION['picture_error'] = "Picture size too large.";
                    die(header('location: logo_add.php'));
                } else {
                    $sql = "INSERT INTO logo (logo,accent) VALUES ('$logo_name','$accent')";
                    mysqli_query($conn, $sql);
                    $id = mysqli_insert_id($conn);
                    $file_name = 'logo-' . $accent . '-' . $id . '.' . $logo_extension;
                    $location = "../../assets/frontend/img/logo/" . $file_name;
                    move_uploaded_file($logo['tmp_name'], $location);

                    $update_sql = "UPDATE logo SET logo = '$file_name' WHERE id=$id";
                    if (mysqli_query($conn, $update_sql)) {
                        $_SESSION['success'] = "Logo added successfully";
                        header("Location: logo_view.php");
                    } else {
                        $_SESSION['error'] = mysqli_error($conn);
                        header("Location: logo_add.php");
                    }
                }
            }
        }
    }
} else {
    $_SESSION['error'] = 'Please select a logo first.';
    header('location: logo_add.php');
}
