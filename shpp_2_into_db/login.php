<?php

session_start();

//get login and password from json { "login": "...", "pass": "..."  }
$body = json_decode(file_get_contents('php://input'));
$login = $body->login;
$pass = $body->pass;

//connect DB
require_once 'db_config.php';
$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

//check user login
$query = "SELECT * FROM users WHERE login = '$login' AND password = '$pass'";
$res = mysqli_query($link, $query) or die(mysqli_error($link));
$user = mysqli_fetch_array($res);

if (!empty($user)) {
    $_SESSION['user_id'] = $user['id'];
    echo '{ "ok": true }';
} else {
    echo '{ "ok": false }';
}
