<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// Incluindo arquivos necessários
include_once '../config/database.php';
include_once '../objects/product.php';
 
$database = new Database();
$db = $database->getConnection();
 
// Inicializar o objeto
$product = new Product($db);
 
$stmt = $product->read();
$num = $stmt->rowCount();
 
// Checando se há mais do que zero
if($num>0){
 
    // Array
    $products_arr=array();
    $products_arr["registros"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		
        extract($row);
 
        $product_item=array(
            "id" => $id,
            "nome" => $nome,
            "idade" => $idade,
            "genero" => $genero,
            "senha" => $senha,
			"datanasc" => $datanasc,
			"cnh" => $cnh,
			"email" => $email,
        );
 
        array_push($products_arr["registros"], $product_item);
    }
 
    http_response_code(200);
 
    echo json_encode($products_arr);
}
 
else{
 
    http_response_code(404);
 
    echo json_encode(
        array("message" => "Nenhum produto encontrado.")
    );
}
