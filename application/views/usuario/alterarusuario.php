<body>
  <div id="app">
    <div class="main-content">
      <section class="section">
        <h1 class="section-header">
          <div>Usuario</div>
        </h1>

        <div class="card card-primary">
          <?php if (isset($this->session->texto)) { ?>
            <div class="alert alert-<?php echo $this->session->type; ?>" role="alert">
              <?php echo $this->session->texto; ?>
            </div>
          <?php }
        $this->session->unset_userdata('texto'); ?>

          <div class="container mt-5">
            <div class="row">
              <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                <div class="card card-primary mt-5">
                  <div class="card-header">
                    <h4>Alterar Usuario</h4>
                  </div>
                  <div class="card-body">
                    <form action="<?php echo  base_url('index.php/usuario/alterarusuario/') . $this->session->id ?>" method="POST" enctype="multipart/form-data">
                      <?php foreach ($usuario as $usuario) {
                        ?>
                        <div class="row">
                          <div class="form-group col-6">
                            <label for="nm_empresa">Nome Usuario</label>
                            <input value="<?php echo $usuario->nm_empresa; ?>" id="nm_empresa" type="text" class="form-control" name="nm_empresa" required autofocus>
                          </div>
                          <div class="form-group col-6">
                            <label for="cpf" class="d-block">CPF</label>
                            <input value="<?php echo $usuario->cpf; ?>" id="cpf" type="text" class="form-control" name="cpf">
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-6">
                            <label for="endereco" class="d-block">Endereço</label>
                            <input value="<?php echo $usuario->endereco; ?>" id="endereco" type="text" class="form-control" name="endereco">
                          </div>
                          <div class="form-group col-6">
                            <label for="num_endereco">Numero de Endereço</label>
                            <input value="<?php echo $usuario->num_endereco; ?>" id="num_endereco" type="text" class="form-control" name="num_endereco">
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-6">
                            <label for="cep" class="d-block">CEP</label>
                            <input value="<?php echo $usuario->cep; ?>" id="cep" type="text" class="form-control" name="cep">
                          </div>
                          <div class="form-group col-6">
                            <label for="bairro">Bairro</label>
                            <input value="<?php echo $usuario->bairro; ?>" id="bairro" type="text" class="form-control" name="bairro">
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-6">
                            <label for="nm_cidade">Cidade</label>
                            <input value="<?php echo $usuario->nm_cidade; ?>" id="nm_cidade" type="text" class="form-control" name="nm_cidade">
                          </div>
                          <div class="form-group col-6">
                            <label for="nm_uf">UF</label>
                            <input value="<?php echo $usuario->nm_uf; ?>" id="nm_uf" type="text" class="form-control" name="nm_uf">
                          </div>
                        </div>
                      <?php } ?>

                      <div class="row">
                        <div class="form-group col-6">
                          <label for="telefone">Telefone</label>
                          <input value="<?php echo $usuario->telefone; ?>" id="telefone" type="text" class="form-control" name="telefone">
                        </div>
                        <div class="form-group col-6">
                          <label for="nm_imagem">Escolha uma Imagem</label>
                          <input id="nm_imagem" type="file" class="form-control" name="nm_imagem">
                        </div>

                      </div>

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