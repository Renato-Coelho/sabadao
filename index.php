
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

$sql = "SELECT * FROM usuarios";
$result = $PDO->query( $sql );
// $rows = $result->fetchAll();
$allRows = $result->fetchAll(PDO::FETCH_OBJ); 



?>




<!doctype html>
<html>
  <head>
    <title>siteeee</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>

  <table class="table table-striped text-center">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nome</th>
      <th scope="col">eMail</th>
      <th scope="col">Senha</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($allRows as $usuario) { ?>
    <tr>
      <th scope="row"><?php echo $usuario->id; ?></th>
      <td><?php echo $usuario->nome; ?></td>
      <td><?php echo $usuario->email; ?></td>
      <td><?php echo $usuario->senha; ?></td>
      <td>
        <form style="display:inline-block" action="user_form.php" method="post">
          <input type="hidden" name="id" value="<?=$usuario->id?>"  >
          <input type="submit" class="btn btn-warning" value="Editar">
        </form>
        <a class="btn btn-danger mx-2" href="excluir.php?id=<?= $usuario->id; ?>">Excluir</a>
      </td>
    </tr>
    <?php } ?>
</table>

<a class="btn btn-primary text-center " href="user_form.php">ADCIONAR USUARIO</a>
    
  </body>
</html>