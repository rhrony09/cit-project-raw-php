<?php
require_once('../../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM counters WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['delete'] = "Counter deleted successfully";
        header("Location: counter_view.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: counter_view.php");
    }
} else {
    $_SESSION['error'] = 'Please select a counter first.';
    header('location: counter_view.php');
}
