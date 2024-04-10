<?php

//get login and password from json { "login": "...", "pass": "..."  }
$body = file_get_contents('php://input');
$request = json_decode($body);
$login = $request->login;
$pass = $request->pass;

//connect DB
require_once 'db_config.php';
$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

//check using login and add new user
$query = "SELECT * FROM users WHERE login = '$login'";
$res = mysqli_query($link, $query) or die(mysqli_error($link));

if (mysqli_fetch_assoc($res)) {
    echo '{ "ok": false }';
} else {
    $query = "INSERT INTO users (login, password) VALUES ('$login', '$pass')";
    $res = mysqli_query($link, $query) or die(mysqli_error($link));
    if ($res) {
        echo '{ "ok": true}';
    } else {
        echo '{ "ok": false}';
    }

}

