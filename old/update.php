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
                                    $name = $_GET["name"];
                                    $sex = $_GET["sex"];
                                    $role = $_GET["role"];
                                    $city = $_GET["city"];
                                    $sector = $_GET["sector"];
                                    $church = $_GET["church"];

                                    if (empty($name)) {
                                        echo "é obrigatório o campo <br>";
                                        echo "nome=$name";
                                        return '';
                                    }
                                    if (empty($sex)) {
                                        echo "é obrigatório o campo <br>";
                                        echo "sex=$sex";
                                        return '';
                                    }
                                    if (empty($role)) {
                                        echo "é obrigatório o campo <br>";
                                        echo "role=$role";
                                        return '';
                                    }
                                    if (empty($city)) {
                                        echo "é obrigatório o campo <br>";
                                        echo "city=$city";
                                        return '';
                                    }
                                    if (empty($sector)) {
                                        echo "é obrigatório o campo <br>";
                                        echo "sector=$sector";
                                        return '';
                                    }
                                    if (empty($church)) {
                                        echo "é obrigatório o campo <br>";
                                        echo " church=$church";
                                        return '';
                                    }
                                    if (empty($id)) {
                                        echo "O id é obrigatorio para edição. <br>";
                                        return '';
                                    }

                                    $sql = "UPDATE siblings SET name='$name', sex='$sex',role='$role',city='$city',sector='$sector',church='$church' WHERE id='$id' ";

                                    if ($conn->query($sql)) {
                                        echo "Registro editado com Sucesso.<br>";
                                    } else {
                                        echo "Erro ao editar.<br>" . $conn->error;
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