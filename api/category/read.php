<?php

include_once("../../config/init.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$category = new Category;
$result = $category->read();

if(count($result)>0){

    $post_arr = array();
    $post_arr['data'] = $result;

    echo json_encode($post_arr);

} else{
    echo json_encode(
        array("message" => 'No Category Found')
    );
}