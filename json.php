<?php
    header("Content-Type: application/json");
    $data = json_decode(file_get_contents("php://input"));
    $filename = 'data.json';
    $file = file_get_contents('data.json');
    $taskList = json_decode($file, true);
    $taskList[] = array($data);
    file_put_contents('data.json', json_encode($taskList));
    unset($file);
    unset($taskList);
?>