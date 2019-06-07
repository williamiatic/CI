<body>
  <div id="app">
    <div class="main-content">
      <section class="section">
        <h1 class="section-header">
          <div>Funcionario</div>
        </h1>

        <div class="container mt-5">
          <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
              <div class="card card-primary mt-5">
                <div class="card-header">
                  <h4>Alterar Funcionario</h4>
                </div>
                <div class="card-body">
                  <?php foreach ($funcionario as $funcionario) {
                    ?>
                    <form action="<?php echo base_url('index.php/funcionario/funcionarioAlterar/' . $funcionario->id_funcionario) ?> " method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <div class="form-group col-6">
                          <label for="nivelacesso">Nivel De Acesso</label>
                          <input value="<?php echo $funcionario->nivelacesso; ?>" id="nivelacesso" type="text" class="form-control" name="nivelacesso" required autofocus>
                        </div>
                        <div class="form-group col-6">
                          <label for="salario">Salario</label>
                          <input value="<?php echo $funcionario->salario; ?>" id="salario" type="text" class="form-control" name="salario" required>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-6">
                          <label for="cargo">Cargo</label>
                          <input value="<?php echo $funcionario->cargo; ?>" id="cargo" type="text" class="form-control" name="cargo">
                        </div>
                        <div class="form-group col-6">
                          <label for="carteiradetrabalho">Carteira De Trabalho</label>
                          <input value="<?php echo $funcionario->carteiradetrabalho; ?>" id="carteiradetrabalho" type="text" class="form-control" name="carteiradetrabalho">
                        </div>
                      </div>

                    <?php } ?>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">
                        Alterar
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>