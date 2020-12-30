<?php

include_once("../../config/init.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$post_id = $_GET['id'] ?? null;

$post = new Post;
$result = $post->readSingle($post_id);

if($result && count($result)>0){

    echo json_encode($result);

} else{
    echo json_encode(
        array("message" => 'No Post Found')
    );
}