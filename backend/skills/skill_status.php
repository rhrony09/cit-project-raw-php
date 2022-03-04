<?php
require_once("../../assets/session.php");

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $check_sql = "SELECT * FROM skills WHERE status=1";
    $check_query = mysqli_query($conn, $check_sql);

    $sql = "SELECT * FROM skills WHERE id=$id";
    $query = mysqli_query($conn, $sql);
    $skill = mysqli_fetch_assoc($query);

    if ($skill['status'] == 0) {
        if (mysqli_num_rows($check_query) < 4) {
            $update_sql = "UPDATE skills SET status=1 WHERE id=$id";
            if (mysqli_query($conn, $update_sql)) {
                $_SESSION['success'] = 'Skill activated successfully.';
                header('location: skill_view.php');
            } else {
                $_SESSION['error'] = mysqli_error($conn);
                header("Location: skill_view.php");
            }
        } else {
            $_SESSION['error'] = 'Maximum activation limit reached.';
            header('location: skill_view.php');
        }
    } else {
        if (mysqli_num_rows($check_query) > 1) {
            $update_sql = "UPDATE skills SET status=0 WHERE id=$id";
            if (mysqli_query($conn, $update_sql)) {
                $_SESSION['success'] = 'Skill deactivated successfully.';
                header('location: skill_view.php');
            } else {
                $_SESSION['error'] = mysqli_error($conn);
                header("Location: skill_view.php");
            }
        } else {
            $_SESSION['error'] = 'Minimum one skill required.';
            header('location: skill_view.php');
        }
    }
} else {
    $_SESSION['error'] = 'Select a skill first.';
    header('location: skill_view.php');
}
