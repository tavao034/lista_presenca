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
                                    $name = $_POST["name"];
                                    $sex = $_POST["sex"];
                                    $role = $_POST["role"];
                                    $city = $_POST["city"];
                                    $sector = $_POST["sector"];
                                    $church = $_POST["church"];
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

                                    $card = rand(00000000, 99999999);

                                    $sql = "INSERT INTO siblings (name, sex, card, role, city, sector, church) 
                                        VALUES ('$name', '$sex', '$card', '$role', '$city', '$sector', '$church')";

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