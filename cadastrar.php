<?php require_once "connect.php";
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

