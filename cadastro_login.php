<?php
include('.private/config/connect.php');
  $title="Cadastro de Usuário";
  $no_home=true;
include('./private/config/head_form.php');
?>

<form action="forms.php" method="post" class="needs-validation" novalidate>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">

          <div class="row mb-12">
            <div class="col-sm-5">
              <label for="inputName4" class="form-label">Nome Completo</label>
              <input name="name" type="text" class="form-control" id="inputName4" required maxlength="25" minlength="5">
            </div>

            <div class="row mb-12">
            <div class="col-sm-5">
              <label for="inputEmail4" class="form-label">Email</label>
              <input name="name" type="text" class="form-control" id="inputEmail" required maxlength="70" minlength="10">
            </div>

            <div class="row mb-12">
            <div class="col-sm-5">
              <label for="inputPassword4" class="form-label">Password</label>
              <input name="name" type="text" class="form-control" id="inputPassword" required maxlength="20" minlength="8">
            </div>

            </div>
          </div>
          <br>
          <input type="submit" name="submit" class="btn btn-info" id="submit">
        </div>
      </div>
    </div>
  </div>
</form>
<?php include('./private/config/footer_form.php'); ?>