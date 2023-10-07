<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create new user</title>
</head>

<body>
  <?php
  require_once "../DbConnection.php";
  $message = "";

  try {

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    if (isset($name, $email)) {
      $sql = $con->prepare("INSERT INTO clientes (name, email) VALUES(:name, :email)");
      $sql->bindValue(":name", $name);
      $sql->bindValue(":email", $email);

      if ($sql->execute()) {
        $message = "Usuário criado com sucesso";
      }else{
        $message = "Erro ao tentar criar usuário";
      }
    }
  } catch (Exception $err) {
    if($err->getCode() == 23000){
      $message = "Este email já está em uso";
    }else{
      echo "Erro ao tentar criar usuário" . $err->getMessage();
    }
  }


  ?>
  <main>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
      <input name="name" type="text" placeholder="Digite o nome" value="<?= $name ? $name : '' ?>" required /><br />
      <input name="email" type="email" placeholder="Digite o email" value="<?= $email ? $email : '' ?>" required /><br />
      <input type="submit" value="Criar">
    </form>
    <?php
    if (!empty($message)) {
      echo "<p>$message</p>";
    }
    ?>
  </main>

  <button style="margin-top: 30px btn" onclick="javascript:window.location.href = '/'">voltar</button>
</body>

</html>