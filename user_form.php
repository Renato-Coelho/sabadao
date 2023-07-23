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

$usuario = null;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $sql = "SELECT * from usuarios WHERE id = :id";
  $stmt = $PDO->prepare( $sql );
  $data = [
    'id' => $_POST['id']
  ];
$stmt->execute($data);
$rows = $stmt->fetchAll(PDO::FETCH_OBJ);
if (count($rows) > 0) $usuario = $rows[0];

}
?>
<!doctype html>
<html>
  <head>
    <title>siteeee</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>

  <div class="mt-4" style="max-width: 700px; display:block;margin: 0 auto">
    <h4 class="text-center"><?= $usuario ? "Edite o usuário" : "Cadastre um Novo usuário" ?></h4>
    <form action="cadastrar.php" method="post">
      <div class="form-group">
        <input type="hidden" name="id" value="<?= $usuario->id ?? "" ?>">
        <label for="nome">Nome</label>
        <input id="nome" class="form-control" type="text" name="nome" value="<?= $usuario->nome ?? "" ?>">
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input id="email" class="form-control" type="text" name="email" value="<?= $usuario->email ?? "" ?>">
      </div>

      <div class="form-group">
        <label for="senha">Senha</label>
        <input id="senha" class="form-control" type="text" name="senha" value="<?= $usuario->senha ?? "" ?>">
      </div>

      <input class="btn btn-primary mt-4" style="display:block;margin: 0 auto" class="mt-3" type="submit" value="<?= $usuario ? "SALVAR" : "CADASTRAR" ?>">

    </form>
  </div>
    
  </body>
</html>  