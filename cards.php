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

                                    $id_user = "SELECT id FROM siblings WHERE card=$card";
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
                                    $row = $result->fetch_assoc();

                                    $data_atual = date('Y-m-d');
                                    $sql_date = "SELECT id FROM cards WHERE DATE(data_hora) = '$data_atual' and card='$card'";
                                    $validation = $conn->query($sql_date);
                                    if ($validation->num_rows > 0) {
                                        echo "Irmão incluso.";
                                        echo '<script>
                                                setTimeout(function() {
                                                    window.location.href = "index.php";
                                                }, 1500); 
                                                </script>';
                                        return '';
                                    }

                                    $sql = "INSERT INTO cards (card, id_user) 
                                    VALUES ('$card','$row[id]')";


                                    if ($conn->query($sql)) {
                                        echo "Registro realizado com Sucesso<br>";
                                    } else {
                                        echo "" . $conn->error;
                                    }

                                    $conn->close();

                                    echo '<script>
                                            setTimeout(function() {
                                                window.location.href = "index.php";
                                            }, 1500); 
                                            </script>';
                                } else {

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