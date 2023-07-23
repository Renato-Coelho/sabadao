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

