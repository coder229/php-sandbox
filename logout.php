<?php
    setcookie('accessToken', ' ', time()-3600);

    $_SESSION['REQUEST_URI'] = $_SERVER['REQUEST_URI'];
    $parts = parse_url($_SERVER['REQUEST_URI']);
    $context = substr($parts["path"], 0, strrpos($parts["path"], "/"));
    header("Location: " . $context . "/login.html");
    exit();
?>