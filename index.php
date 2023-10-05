<?php
require_once 'DbConnection.php';

$con = (new DataBaseConnection("root", "your_pass", "localhost", "blog"))->connection();
$selectAll = $con->prepare("SELECT * FROM clientes");


function renderTable($selectAll)
{
  if ($selectAll->execute()) {
    $result = $selectAll->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $item) {
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
  <title>Document</title>
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
</body>

</html>