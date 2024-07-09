<?php
  $title="";
  $no_home=false;
  include('./config/head_form.php');
?>

<form action="cards.php" method="post" class="needs-validation" novalidate>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">

          <div class="row mb-12">
            <div class="col-sm-5">
              <label for="inputName4" class="form-label">Número da Carteira</label>
              <input name="card" type="text" class="form-control" id="inputName4" required maxlength="8" minlength="8">
            </div>
          </div>
          <br>
          <input type="submit" name="submit" class="btn btn-info" id="submit">
        </div>
      </div>
    </div>
  </div>
</form>

<?php
  include('./config/footer_form.php');
?>