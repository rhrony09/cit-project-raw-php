<?php
//site setting
$sql_site_setting = "SELECT * FROM site_setting";
$query_site_setting = mysqli_query($conn, $sql_site_setting);
$setting = mysqli_fetch_assoc($query_site_setting);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= $setting['name'] ?> | Dashboard</title>
    <link rel="shortcut icon" href="<?= url() ?>assets/dashboard/images/site/<?= $setting['icon'] ?>" type="image/x-icon">
    <!-- vendor css -->
    <link href="<?= url() ?>assets/dashboard/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= url() ?>assets/dashboard/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="<?= url() ?>assets/dashboard/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <!-- Starlight CSS -->
    <link rel="stylesheet" href="<?= url() ?>assets/dashboard/css/starlight.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= url() ?>assets/style.css">
</head>

<body>