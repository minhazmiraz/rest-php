<?php

include_once("../../config/init.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));

$category = new Category;
$result = $category->create($data->title);

if($result){

    echo json_encode(
        array("message" => 'Category created')
    );

} else{
    echo json_encode(
        array("message" => 'Category not created')
    );
}