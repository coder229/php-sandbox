<?php
session_start();

// TODO verify accessToken

if ($_COOKIE['accessToken'] == '') {
    $_SESSION['REQUEST_URI'] = $_SERVER['REQUEST_URI'];
    $parts = parse_url($_SERVER['REQUEST_URI']);
    $context = substr($parts["path"], 0, strrpos($parts["path"], "/"));
    header("Location: " . $context . "/login.html");
    // setcookie('accessToken', 'foo', time()+60*60*24);
    exit();
}
?>
