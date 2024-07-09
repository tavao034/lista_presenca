<?php
include('./private/config/connect.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $username = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE email='$username' and password ='$password'";
  $result = $conn->query($sql);

  if ($result !== false && $result->num_rows > 0) {
    session_start();
    $_SESSION['username'] = $username;
    echo $sql;
    header("Location: ./private/index.php");
    exit();
  } else {
    echo 'Usuário ou senha inválido.';
    echo '<script>
        setTimeout(function () {
          window.location.href = "index.html";
        }, 1500); 
        </script>';
  }
} else {
  echo 'Usuário ou senha inválido.';
  echo '<script>
        setTimeout(function () {
          window.location.href = "index.html";
        }, 1500); 
        </script>';
}
