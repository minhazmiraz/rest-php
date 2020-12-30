<?php

include_once("../../config/init.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$post = new Post;
$result = $post->read();

if(count($result)>0){

    $post_arr = array();
    $post_arr['data'] = $result;

    echo json_encode($post_arr);

} else{
    echo json_encode(
        array("message" => 'No Post Found')
    );
}