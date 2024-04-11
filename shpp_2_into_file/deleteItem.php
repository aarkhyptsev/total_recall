<?php

// get id from POST body
$body = file_get_contents('php://input');
$id = json_decode($body)->id;


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
}