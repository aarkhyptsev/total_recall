<?php

//get json { text: "..." }
$body = file_get_contents('php://input');
//get text
$massage = json_decode($body)->text;
//get id for massage
function getId(): int
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