<?php
class Product{
 
    // Conexão e nome da tabela
    private $conn;
    private $table_name = "cadastro";
 
    // Objetos
    public $id;
    public $nome;
    public $idade;
    public $genero;
    public $senha;
    public $datanasc;
	public $cnh;
	public $email;
 
    public function __construct($db){
        $this->conn = $db;
    }
	
	// Função Ler (R)
	function read(){
 
    // Query
    $query = "SELECT
                id, nome, idade, genero, senha, datanasc, cnh, email, datanasc
            FROM
                " . $this->table_name;
 
    $stmt = $this->conn->prepare($query);
 
    $stmt->execute();
 
    return $stmt;
}

	// Função Criar (C)
	function create(){
 
    // Query
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                nome=:nome, genero=:genero, idade=:idade, senha=:senha, datanasc=:datanasc, cnh=:cnh, email=:email";
 
    $stmt = $this->conn->prepare($query);
 
    // Preparando os dados
    $this->nome=htmlspecialchars(strip_tags($this->nome));
    $this->genero=htmlspecialchars(strip_tags($this->genero));
    $this->idade=htmlspecialchars(strip_tags($this->idade));
    $this->senha=htmlspecialchars(strip_tags($this->senha));
    $this->datanasc=htmlspecialchars(strip_tags($this->datanasc));
	$this->cnh=htmlspecialchars(strip_tags($this->cnh));
	$this->email=htmlspecialchars(strip_tags($this->email));
 
    // Atribuindo valores
    $stmt->bindParam(":nome", $this->nome);
    $stmt->bindParam(":genero", $this->genero);
    $stmt->bindParam(":idade", $this->idade);
    $stmt->bindParam(":senha", $this->senha);
    $stmt->bindParam(":datanasc", $this->datanasc);
	$stmt->bindParam(":cnh", $this->cnh);
	$stmt->bindParam(":email", $this->email);
 
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}

	// Função Atualizar (U)
	function update(){
 
    // Query
    $query = "UPDATE
                " . $this->table_name . "
            SET
                nome = :nome,
                genero = :genero,
                idade = :idade,
                senha = :senha,
				datanasc = :datanasc,
				cnh = :cnh,
				email = :email
            WHERE
                id = :id";

 
    $stmt = $this->conn->prepare($query);
 
    // Preparando os dados
    $this->nome=htmlspecialchars(strip_tags($this->nome));
    $this->genero=htmlspecialchars(strip_tags($this->genero));
    $this->idade=htmlspecialchars(strip_tags($this->idade));
    $this->senha=htmlspecialchars(strip_tags($this->senha));
	$this->datanasc=htmlspecialchars(strip_tags($this->datanasc));
	$this->cnh=htmlspecialchars(strip_tags($this->cnh));
	$this->email=htmlspecialchars(strip_tags($this->email));
    $this->id=htmlspecialchars(strip_tags($this->id));
 
    // Atribuindo valores
    $stmt->bindParam(':nome', $this->nome);
    $stmt->bindParam(':genero', $this->genero);
    $stmt->bindParam(':idade', $this->idade);
    $stmt->bindParam(':senha', $this->senha);
	$stmt->bindParam(':datanasc', $this->datanasc);
	$stmt->bindParam(':cnh', $this->cnh);
	$stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':id', $this->id);
 
    if($stmt->execute()){
        return true;
    }
 
    return false;
}

	// Função Delete (D)
	function delete(){
 
    // Query
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
 
    $stmt = $this->conn->prepare($query);
 
    // Preparando os dados
    $this->id=htmlspecialchars(strip_tags($this->id));
 
    // Atribuindo o id a ser deletado
    $stmt->bindParam(1, $this->id);
 
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}
}