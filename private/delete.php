<?php
include('./config/connect.php');
include('./config/head.php');
?>

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
          setTimeout(function () {
            window.location.href = "consult.php";
          }, 1500); 
          </script>';
  } else {

    echo "voce nao enviou essa requisicao via get";
  }

  ?>
</center>

<?php
  include('./config/footer.php');
?>