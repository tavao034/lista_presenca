<?php
  include('./config/connect.php');

  $sql = "SELECT * FROM siblings";
  $result = $conn->query($sql);

  $title="Edição de Usuário";
  $no_home=true;
  include('./config/head_form.php');

  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

  if (empty($id)) {
    echo "O id é obrigatorio para edição.<br>";
    return '';
  }

  $sql = "SELECT name, sex, role, city, sector, church FROM siblings WHERE id ='$id' ";

  $result = $conn->query($sql);
  $show = $result->fetch_assoc();
?>
  <form action="update.php" method="get" class="needs-validation" novalidate>
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">

            <div class="row mb-12">
              <div class="col-sm-5">
                <label for="inputName4" class="form-label">Nome Completo</label>
                <input name="name" type="text" class="form-control" id="inputName4" value="<?php echo $show["name"] ?>" required maxlength="25" minlength="5">
              </div>

              <div class="col-sm-4">
                <label for="inputRole" class="form-label">Cargo ou Ministério</label>
                <select name="role" id="inputRole" class="form-select" required>
                  <option selected value="<?php echo $show["role"] ?>">
                    <?php echo $show["role"] ?>
                  </option>
                  <option value="Ancião">Ancião</option>
                  <option value="Assessor">Assessor</option>
                  <option value="Comprador(a)">Comprador(a)</option>
                  <option value="Coordenador(a) CCLimp">Coordenador(a) CCLimp</option>
                  <option value="Coordenador(a) da Brigada">Coordenador(a) da Brigada</option>
                  <option value="Coordenador(a) de Informática">Coordenador(a) de Informática</option>
                  <option value="Coordenador(a) de Manutenção">Coordenador(a) de Manutenção</option>
                  <option value="Coordenador(a) de Patrimônio Bens Móveis">Coordenador(a) de Patrimônio Bens
                    Móveis</option>
                  <option value="Coordenador(a) de Segurança do Trabalho">Coordenador(a) de Segurança do
                    Trabalho</option>
                  <option value="Coordenador(a) de Trabalhos Voluntários">Coordenador(a) de Trabalhos
                    Voluntários</option>
                  <option value="Coordenador(a) do Anexo">Coordenador(a) do Anexo</option>
                  <option value="Coordenador(a) do Fundo Bíblico">Coordenador(a) do Fundo Bíblico</option>
                  <option value="Coordenador(a) Manutenção de Climatizadores">Coordenador(a) Manutenção de
                    Climatizadores</option>
                  <option value="Jurídico(a)"></option>
                  <option value="Secretário(a)"></option>
                </select>
              </div>

              <div class="col-sm-3">
                <label for="inputGender" class="form-label">Sexo</label>
                <br>
                <input type="radio" class="form-input" id=genderSister name="sex" value="F" <?php if ($show["sex"] == "F") echo "checked" ?> required>
                <label for="irmã">Feminino</label>
                <input type="radio" class="form-input" id=genderBrother name="sex" value="M" <?php if ($show["sex"] == "M") echo "checked" ?> required>
                <label for="irmão">Masculino</label>
              </div>
            </div>

            <div class="row mb-12">
              <div class="col-sm-4">
                <label for="inputCity" class="form-label">Cidade</label>
                <select name="city" id="inputCity" class="form-select" required>
                  <option selected value="<?php echo $show["city"] ?>">
                    <?php echo $show["city"] ?>
                  </option>
                  <option value="Uberlândia-MG">Uberlândia-MG</option>
                </select>
              </div>

              <div class="col-sm-4">
                <label for="inputSector" class="form-label">Setor</label>
                <select name="sector" id="inputSector" class="form-select" required>
                  <option selected value="<?php echo $show["sector"] ?>">
                    <?php echo $show["sector"] ?>
                  </option>
                  <option value="Setor 01">Setor 01</option>
                </select>
              </div>

              <div class="col-sm-4">
                <label for="inputChurch" class="form-label">Comum Congregação</label>
                <select name="church" id="inputChurch" class="form-select" required>
                  <option selected value="<?php echo $show["church"] ?>">
                    <?php echo $show["church"] ?>
                  </option>
                  <option value="Cruzeiro dos Peixotos">Cruzeiro dos Peixotos</option>
                  <option value="Jardim Brasília">Jardim Brasília</option>
                  <option value="Liberdade">Liberdade</option>
                  <option value="Maravilha">Maravilha</option>
                  <option value="Maria Rezende">Maria Rezende</option>
                  <option value="Marta Helena">Marta Helena</option>
                  <option value="Minas Gerais">Minas Gerais</option>
                  <option value="Osvaldo Rezende">Osvaldo Rezende</option>
                  <option value="São José">São José</option>
                </select>
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
}

$conn->close();

include('./config/footer_form.php');
?>  

