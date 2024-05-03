<?php
include('./config/connect.php');
$sql = "SELECT * FROM siblings";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>QR Code Cards</title>
  <!-- <link rel="stylesheet" href="seu.css" /> -->
  <style>
 /* Definindo as dimensões da página A4 no modo retrato */
@page {
  size: A4 portrait;
  margin: 0;
}

/* Estilos gerais para toda a página */
body {
  font-family: Montserrat;
  margin: 0;
  padding: 20px;
}

/* Estilos para os cartões */
.card {
  width: 45%; /* Ajustado para caber dois cartões em uma linha */
  margin: 2.5%; /* Espaço entre os cartões */
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 8px;
  box-sizing: border-box;
  background-color: #f9f9f9;
  display: inline-block;
  vertical-align: top; /* Alinha os cartões no topo */
}

/* Estilos de texto para os cartões */
.card h2 {
  font-size: 18px;
  margin-bottom: 10px;
}

.card p {
  font-size: 14px;
  line-height: 1.5;
  color: #666;
}

/* Estilos para o QR code */
.qr-code {
  float: right; /* Coloca o QR code à direita */
  margin-left: 15px; /* Espaço entre o texto e o QR code */
}

/* Estilos para o número do cartão */
.card-number {
  float: right; /* Coloca o número à direita */
  font-size: 14px;
  color: #666;
}


  </style>
</head>

<body>

  <div class="a4">
    <?php

    if ($result) {
      while ($row = $result->fetch_assoc()) {
        $card = htmlspecialchars($row["card"]);
        $qr_url = "https://api.qrserver.com/v1/create-qr-code/?data=" . $row["card"];
    ?>
        <div class="card">
          <b class="title">Congregação Cristã no Brasil </b>
          <img class="qr-code" src=<?php echo "$qr_url"; ?> width="76" height="76" alt="QR Code 1" />
          <div class="info">
            <div class="code"><?php echo $row["name"] ?></div>
            <div class="name"><?php echo $row["card"] ?></div>
            <div class="text"><?php echo $row["role"] ?></div>
            <div class="text"><?php echo $row["sector"] . "/" . $row["church"] ?></div>
          </div>
        </div>

    <?php
      }
    } else {
      echo "Erro na consulta SQL: " . $conn->error;
    }

    $conn->close();

    ?>

</html>