<?php

// get id from POST body
$body = file_get_contents('php://input');
$id = json_decode($body)->id;

require_once 'db_config.php';
$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$query = "DELETE FROM todo WHERE id='$id'";
$res = mysqli_query($link, $query) or die(mysqli_error($link));
echo ($res) ? '{"ok":true}' : '{"ok":false}';

/*
//get PHP array from todo.json
$json = file_get_contents('todo.json');
$php = json_decode($json, true);

//searching id
$num = false;
foreach ($php['items'] as $key => $value) {
    if ($value['id'] == $id) {
        $num = $key;
        break;
    }
}

//if id exist delete massage and return OK
if ($num!==false) {
    unset($php['items'][$num]);
    $php['items']=array_values($php['items']);
    $json = json_encode($php);
    file_put_contents('todo.json', $json);
    echo '{"ok":true}';
} else {
    echo '{"ok":false}';
}*/