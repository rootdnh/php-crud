<?php
  include __DIR__.'/../pages/styles.css';
  require_once __DIR__.'/../../config/db/DbConnection.php';

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
  <button style="margin-top: 10px" class="btn btn-primary" onclick="javascript:window.location.href = '/createUser.php'">Criar usuário</button>

