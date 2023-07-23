<?php
define( 'MYSQL_HOST', 'localhost' );
define( 'MYSQL_USER', 'root' );
define( 'MYSQL_PASSWORD', 'pempem18' );
define( 'MYSQL_DB_NAME', 'maisfm_db' );

try
{
    $PDO = new PDO( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD );
}
catch ( PDOException $e )
{
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$data = [
  'nome' => $nome,
  'email' => $email,
  'senha' => $senha
];
if ($id == '') {
  $sql = "INSERT INTO usuarios (nome, email, senha) values (:nome, :email, :senha)";
} else {
  $data['id'] = $id;
  $sql = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = :id";  
}
$stmt = $PDO->prepare($sql);
$stmt->execute($data);

header('location: index.php');

