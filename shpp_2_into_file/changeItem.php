<?php
//get massage for update
$body = file_get_contents('php://input');
$massage = json_decode($body);
$id=$massage->id;

//get PHP array from file
$json = file_get_contents('todo.json');
$php = json_decode($json, true);

$num = false;
foreach ($php['items'] as $key => $value) {
    if ($value['id'] == $id) {
        $num = $key;
        break;
    }
}

//if id exist delete massage and return OK
if ($num!==false) {
    $php['items'][$num]=["id"=>$id, "text"=>$massage->text, "checked"=>$massage->checked];
    $php['items']=array_values($php['items']);
    $json = json_encode($php);
    file_put_contents('todo.json', $json);
    echo '{"ok":true}';
} else {
    echo '{"ok":false}';
}