<?php
require_once('../../assets/session.php');

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $content = $_POST['content'];

    $_SESSION['name'] = $name;
    $_SESSION['designation'] = $designation;
    $_SESSION['content'] = $content;

    $image = $_FILES['image'];
    if (empty($name) || empty($designation) || empty($content) || empty($image['name'])) {
        $_SESSION['error'] = "All fields are required";
        die(header("Location: testimonial_add.php"));
    } else {
        $image_name = $image['name'];
        $after_explode = explode('.', $image_name);
        $image_extension = end($after_explode);
        $allowed_extension = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($image_extension, $allowed_extension)) {
            $_SESSION['picture_error'] = "Please upload a valid image.";
            die(header('location: testimonial_add.php'));
        } else {
            if ($image['size'] > 1048576) {
                $_SESSION['picture_error'] = "Image size too large.";
                die(header('location: testimonial_add.php'));
            } else {
                $sql = "INSERT INTO testimonials (name,designation,content) VALUES ('$name','$designation','$content')";
                mysqli_query($conn, $sql);
                $id = mysqli_insert_id($conn);
                $file_name = 'testimonial-' . $id . '.' . $image_extension;
                $location = "../../assets/frontend/img/testimonial/" . $file_name;
                move_uploaded_file($image['tmp_name'], $location);

                $update_sql = "UPDATE testimonials SET image = '$file_name' WHERE id=$id";
                if (mysqli_query($conn, $update_sql)) {
                    unset($_SESSION['name'], $_SESSION['designation'], $_SESSION['content']);
                    $_SESSION['success'] = "Testimonial added successfully";
                    header("Location: testimonial_view.php");
                } else {
                    $_SESSION['error'] = mysqli_error($conn);
                    header("Location: testimonial_add.php");
                }
            }
        }
    }
} else {
    $_SESSION['error'] = 'Please fill the form first.';
    header('location: testimonial_add.php');
}
