<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// Conexão
include_once '../config/database.php';
 
include_once '../objects/product.php';
 
$database = new Database();
$db = $database->getConnection();
 
$product = new Product($db);
 
$data = json_decode(file_get_contents("php://input"));
 
// Validação
if(
    !empty($data->nome) &&
    !empty($data->genero) &&
    !empty($data->idade) &&
    !empty($data->senha)
){
 
    // Setando valores
    $product->nome = $data->nome;
    $product->genero = $data->genero;
    $product->idade = $data->idade;
    $product->senha = $data->senha;
	$product->datanasc = $data->datanasc;
	$product->cnh = $data->cnh;
	$product->email = $data->email;
 
    // Criando o produto
    if($product->create()){
 
        http_response_code(201);
 
        echo json_encode(array("message" => "Produto foi criado."));
    }
 
    // Caso não consiga criar o produto
    else{
 
        http_response_code(503);
 
        echo json_encode(array("message" => "Produto não foi criado."));
    }
}
 
// Caso os dados estejam incompletos ou incorretos
else{
 
    http_response_code(400);
	
 
    echo json_encode(array("message" => "Produto não foi criado. Dados incompletos."));
}
?>