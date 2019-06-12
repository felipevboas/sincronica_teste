<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// Incluindo arquivos necessários
include_once '../config/database.php';
include_once '../objects/product.php';
 
$database = new Database();
$db = $database->getConnection();
 
$product = new Product($db);
 
$data = json_decode(file_get_contents("php://input"));
 
// Setando o id da linha que será excluída
$product->id = $data->id;
 
// Setando valores
$product->nome = $data->nome;
$product->genero = $data->genero;
$product->idade = $data->idade;
$product->senha = $data->senha;
$product->datanasc = $data->datanasc;
$product->cnh = $data->cnh;
$product->email = $data->email;
 
if($product->update()){
 
    http_response_code(200);
 
    echo json_encode(array("message" => "Produto atualizado."));
}
 
//caso não dê para realizar a query
else{
 
    http_response_code(503);
 
    echo json_encode(array("message" => "Produto não atualizado."));
}
?>