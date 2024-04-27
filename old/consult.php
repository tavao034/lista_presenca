<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_ccb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("" . $conn->connect_error);
}

$sql = "SELECT * FROM siblings";
$result = $conn->query($sql);

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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-12">
                        <div class="col-sm-6">
                            <h4 class="m-0">Colaboradores</h4>
                        </div>
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-2">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>