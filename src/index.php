<?php
require_once 'src/DbConnection.php';

$selectAll = $con->prepare("SELECT * FROM clientes");

function renderTable($selectAll)
{
  if ($selectAll->execute()) {
    $result = $selectAll->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $item)  {
      echo "
          <tr>
            <td>" . $item['name'] . "</td>
            <td>" . $item['email'] . "</td>
          </tr>
          ";
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Simple Crud</title>
  <style>
    table {
      border-collapse: collapse;
      border: 1px solid black;
    }

    td {
      border: 1px solid black;
      padding: 4px;
    }
  </style>
</head>

<body>
  <table>
    <thead>
      <th>NOME</th>
      <th>EMAIL</th>
    </thead>

    <tbody>
      <?php
      renderTable($selectAll);
      ?>
    </tbody>
  </table>

  <button style="margin-top: 10px" class="btn btn-primary" onclick="javascript:window.location.href = 'src/views/createUser.php'">Criar usuário</button>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>