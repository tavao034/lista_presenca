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
        echo "<a href= 'http://localhost/php/edit.php?id=" . $row['id'] . "'>Editar</a> | ";
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

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>QR Code Cards</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      .card {
        width: 90mm;
        height: 50mm;
        padding: 10px; 
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 20px;
        border: 1px solid #999898;
        border-radius: 10px;
      }

    </style>
  </head>
  <body>
    <div class="a4">
      <?php

      function generateQRCode($id) {
        $dir = './qrcode/';

        if (!file_exists($dir)) {
          mkdir($dir);
        }

        $filename = $dir . '' . $id . '';

        $text = $id;

        QRcode::png($text, $filename);

        return $filename;
      }

      if ($result) {
        while ($row = $result->fetch_assoc()) {
          $id = uniqid();

          $qr_code_path = generateQRCode($id);
          ?>
          <div class="card">
            <img class="qr-code" src="<?php echo $qr_code_path; ?>" width="79" height="78" alt="QR Code <?php echo $id; ?>" />
            <div class="info">
              <div class="code"><?php echo $id; ?></div>
              <div class="name"><?php echo $row["name"]; ?></div>
              <div class="text"><?php echo $row["sector"]; ?></div>
              <div class="text"><?php echo $row["church"]; ?></div>
            </div>
          </div>
          <?php
        }
      }
      ?>
    </div>
  </body>
</html>
