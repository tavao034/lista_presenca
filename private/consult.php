<?php
  include('./config/connect.php');

  $sql = "SELECT * FROM siblings";
  $result = $conn->query($sql);

  include('./config/head.php');
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Carteirinha</th>
      <th scope="col">Sexo</th>
      <th scope="col">Cargo</th>
      <th scope="col">Editar | Excluir</th>
    </tr>
  </thead>
  <tbody>
    <?php

    if ($result) {
      while ($row = $result->fetch_assoc()) {

        echo "<tr>
              <th scope='row'>" . $row["id"] . "</th>
              <td>" . $row["name"] . "</td>
              <td>" . $row["card"] . "</td>
              <td>" . $row["sex"] . "</td>
              <td>" . $row["role"] . "</td>
              </td>";

        echo "<td>";
        echo "<a href= 'http://localhost/projeto/edit.php?id=" . $row['id'] . "'>Editar</a> | ";
        echo "<a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Tem certeza que deseja excluir este registro?\")'>Excluir</a>";
        echo "</td>";
        echo "</tr>";
      }
    } else {
      echo "Erro na consulta SQL: " . $conn->error;
    }

    $conn->close();

    ?>
  </tbody>
</table>

<?php
  include('./config/footer.php');
?>