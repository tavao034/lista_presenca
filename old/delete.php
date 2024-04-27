<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_ccb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("" . $conn->connect_error);
}

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

                                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                                    $id = $_GET["id"];

                                    if (empty($id)) {
                                        echo "O id é obrigatorio para exclusão <br>";
                                        return '';
                                    }
                                    

                                    $sql = "DELETE FROM siblings WHERE id='$id' ";

                                    if ($conn->query($sql)) {
                                        echo "Registro deletado com Sucesso.<br>";
                                    } else {
                                        echo "Erro ao deletar.<br>" . $conn->error;
                                    }

                                    $conn->close();

                                    echo '<script>
                                            setTimeout(function() {
                                                window.location.href = "consult.php";
                                            }, 1500); 
                                            </script>';
                                } else {

                                    echo "voce nao enviou essa requisicao via get";
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