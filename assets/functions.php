<?php
date_default_timezone_set('Asia/Dhaka');

function show_session_data($data) {
    if (isset($_SESSION[$data])) {
        echo $_SESSION[$data];
        unset($_SESSION[$data]);
    }
}


function url() {
    $path = realpath(dirname(__FILE__));
    $directory = explode('/', dirname($_SERVER['PHP_SELF']));
    $url = 'http://' . $_SERVER['HTTP_HOST'] . '/' . str_replace('\\', '/', str_replace($path, '', $directory[1]));
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
        $url = str_replace('http://', 'https://', $url);
    }
    return $url . '/';
}

function print_admin_role() {
    global $admin;
    if ($admin['role'] == 1) {
        return 'Moderator';
    } elseif ($admin['role'] == 2) {
        return 'Admin';
    } elseif ($admin['role'] == 3) {
        return 'Super Admin';
    } else {
        return 'User';
    }
}
