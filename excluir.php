<?php require_once "connect.php";
$sql = "DELETE FROM usuarios WHERE id = :id";

$stmt = $PDO->prepare( $sql );
$data = [
  'id' => $_GET['id']
];

$result = $stmt->execute($data);

if (!$result) {
  var_dump($stmt->errorInfo());
  die('nnnnooowayyy');
}

header('location: index.php');

