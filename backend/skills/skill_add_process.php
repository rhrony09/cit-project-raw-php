<?php
require_once('../../assets/session.php');

if (isset($_POST['add'])) {
    $technology = $_POST['technology'];
    $description = $_POST['description'];
    $percentage = $_POST['percentage'];

    $_SESSION['technology'] = $technology;
    $_SESSION['description'] = $description;
    $_SESSION['percentage'] = $percentage;

    if (empty($technology) || empty($description) || empty($percentage)) {
        $_SESSION['error'] = "All fields are required";
        header("Location: skill_add.php");
    } else {
        $sql = "INSERT INTO skills (technology, description, percentage) VALUES ('$technology', '$description', '$percentage')";
        if (mysqli_query($conn, $sql)) {
            unset($_SESSION['technology'], $_SESSION['description'], $_SESSION['percentage']);
            $_SESSION['success'] = "Skill added successfully";
            header("Location: skill_view.php");
        } else {
            $_SESSION['error'] = mysqli_error($conn);
            header("Location: skill_add.php");
        }
    }
} else {
    $_SESSION['error'] = 'Fill the form first.';
    header('location: skill_add.php');
}
