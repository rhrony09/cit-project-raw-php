<?php
require_once('../../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_sql = "DELETE FROM portfolios WHERE id = $id";
    if (mysqli_query($conn, $delete_sql)) {
        $_SESSION['delete'] = "Portfolio deleted successfully";
        header("Location: portfolio_view.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: portfolio_view.php");
    }
} else {
    $_SESSION['error'] = 'Please select a Portfolio first.';
    header('location: portfolio_view.php');
}
