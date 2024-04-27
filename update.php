<?php
  include('./config/connect.php');
  include('./config/head.php');

echo '<center>';


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
        setTimeout(function () {
          window.location.href = "consult.php";
        }, 1500); 
        </script>';
} else {

  echo "voce nao enviou essa requisicao via get";
}

echo '</center>';

include('./config/footer.php');
