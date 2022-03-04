<?php
require_once("../../assets/session.php");

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $check_sql = "SELECT * FROM counters WHERE status=1";
    $check_query = mysqli_query($conn, $check_sql);

    $sql = "SELECT * FROM counters WHERE id=$id";
    $query = mysqli_query($conn, $sql);
    $counter = mysqli_fetch_assoc($query);

    if ($counter['status'] == 0) {
        if (mysqli_num_rows($check_query) < 4) {
            $update_sql = "UPDATE counters SET status=1 WHERE id=$id";
            if (mysqli_query($conn, $update_sql)) {
                $_SESSION['success'] = 'Counter activated successfully.';
                header('location: counter_view.php');
            } else {
                $_SESSION['error'] = mysqli_error($conn);
                header("Location: counter_view.php");
            }
        } else {
            $_SESSION['error'] = 'Maximum activation limit reached.';
            header('location: counter_view.php');
        }
    } else {
        if (mysqli_num_rows($check_query) > 1) {
            $update_sql = "UPDATE counters SET status=0 WHERE id=$id";
            if (mysqli_query($conn, $update_sql)) {
                $_SESSION['success'] = 'Counter deactivated successfully.';
                header('location: counter_view.php');
            } else {
                $_SESSION['error'] = mysqli_error($conn);
                header("Location: counter_view.php");
            }
        } else {
            $_SESSION['error'] = 'Minimum one counter required.';
            header('location: counter_view.php');
        }
    }
} else {
    $_SESSION['error'] = 'Select a counter first.';
    header('location: counter_view.php');
}
