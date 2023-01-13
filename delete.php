<?php
    header("Content-Type: application/json");
    $data = file_get_contents("php://input");
    $file = file_get_contents('data.json');  
    file_put_contents('data.json',$data);  
    unset($file);        
?>