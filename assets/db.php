<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'rony');
define('DB_PASS', '@rh@rony@009');
define('DB_NAME', 'cit');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$conn) {
    die('Connection Failed: ' . mysqli_connect_error());
}
