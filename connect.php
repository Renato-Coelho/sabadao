<?php
$dbData = json_decode(file_get_contents("db_config.json"));

try
{
    $PDO = new PDO( 'mysql:host=' . $dbData->host . ';dbname=' . $dbData->name, $dbData->user,$dbData->pass);
}
catch ( PDOException $e )
{
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}