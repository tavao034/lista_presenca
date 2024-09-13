<?php

include('./config/connect.php');

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./CSS/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./img/local-na-rede-internet.png">
    <title>CCB | Reunião de Departamento</title>
    <script src="./JS/bootstrap.bundle.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper content-wrapper">
        <div class="container jumbotron">
            <br>
            <center><img src="./img/logo-ccb-light.png" width="200" height="100" /></center>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <center>
                                <?php

                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    $card = $_POST["card"];
                                    if (empty($card)) {
                                        echo "é obrigatório o campo <br>";
                                        echo "card=$card";
                                        return '';
                                    }

                                    $id_user = "SELECT * FROM siblings WHERE card=$card";
                                    $result = $conn->query($id_user);
                                    if ($result->num_rows < 1) {
                                        echo "Carteira não encontrada.";
                                        echo '<script>
                                                setTimeout(function() {
                                                    window.location.href = "index.php";
                                                }, 1500); 
                                                </script>';
                                        return '';
                                    }

                                    $present = "SELECT * FROM presents WHERE card=$card and DATE(date_time) = CURDATE()";
                                    $result_present = $conn->query($present);
                                    if ($result_present->num_rows > 0) {
                                        echo "Presença já registrada";
                                        echo '<script>
                                                setTimeout(function() {
                                                    window.location.href = "index.php";
                                                }, 1500); 
                                                </script>';
                                        return '';
                                    }

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
                                                <div class="text"><?php echo $row["city"] ?></div>
                                            </div>
                                        </div>

                                <?php

                                        $sql = "INSERT INTO presents (name, card, role, sector, church, city) 
                                        VALUES ('$row[name]', '$row[card]' ,'$row[role]', '$row[sector]', '$row[church]', '$row[city]')";

                                        if ($conn->query($sql)) {
                                            echo "Presença confirmada<br>";
                                            echo '<script>
                                                setTimeout(function() {
                                                    window.location.href = "index.php";
                                                }, 2000); 
                                                </script>';
                                        return '';
                                        } else {
                                            echo "" . $conn->error;
                                        }
                                    }
                                } else {

                                    $conn->close();
                                    echo "voce nao enviou essa requisicao via post";
                                }

                                ?>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>