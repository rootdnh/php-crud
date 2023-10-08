<?php
require_once 'DbConnection.php';

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

  <?php 
    include __DIR__.'/includes/header.php';
  ?>
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
  <button style="margin-top: 10px" class="btn btn-primary" onclick="javascript:window.location.href = 'views/pages/createUser.php'">Criar usuário</button>

  <?php 
    include __DIR__.'/includes/footer.php';
  ?>