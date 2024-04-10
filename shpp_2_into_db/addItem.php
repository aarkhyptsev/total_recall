<?php
session_start();
//get json { text: "..." }
$body = file_get_contents('php://input');
//get new task text
$massage = json_decode($body)->text;
$user_id = $_SESSION['user_id'];

require_once 'db_config.php';
$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$query = "INSERT INTO todo (text, checked, user_id) VALUES ('$massage', 0, '$user_id')";
mysqli_query($link, $query) or die(mysqli_error($link));
$last_insert_id = mysqli_insert_id($link);
echo '{"id":' . $last_insert_id . '}';
/*function getId(): int
{
    $last_id = file_get_contents('id.txt');
    $last_id++;
    file_put_contents('id.txt', (string)$last_id);
    return $last_id;
}

//get array from file
$json = file_get_contents('todo.json');
$php = json_decode($json, true);

//add massage to array
$id = getId();
$php['items'][] = ["id" => $id, "text" => $massage, "checked" => false];
// encode array to json
$json = json_encode($php);

//rewrite json
file_put_contents('todo.json', $json);
//return response
echo '{"id":' . $id . '}';
*/