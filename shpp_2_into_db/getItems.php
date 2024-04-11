<?php
session_start();
require_once 'db_config.php';

$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$query = "SELECT id, text,checked FROM todo WHERE user_id='$_SESSION[user_id]'";
$res = mysqli_query($link, $query) or die(mysqli_error($link));

$php=["items"=>[]];
while ($row = mysqli_fetch_assoc($res)){
    $row['checked']=$row['checked']?true:false;
    $php["items"][] = $row;
}

echo json_encode($php);