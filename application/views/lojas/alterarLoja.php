<body>
  <div id="app">
    <div class="main-content">
      <section class="section">
        <h1 class="section-header">
          <div>Loja</div>
        </h1>

        <div class="container mt-5">
          <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
              <div class="card card-primary mt-5">
                <div class="card-header">
                  <h4>Alterar Loja</h4>
                </div>
                <div class="card-body">
                  <?php foreach ($loja as $loja) {
                    ?>
                    <form action="<?php echo base_url('index.php/loja/lojaAlterar/' . $loja->id_loja) ?> " method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <div class="form-group col-6">
                          <label for="loja">Loja</label>
                          <input value="<?php echo $loja->nm_loja; ?>" id="loja" type="text" class="form-control" name="loja" required autofocus>
                        </div>
                        <div class="form-group col-6">
                          <label for="cnpj">CNPJ</label>
                          <input value="<?php echo $loja->cnpj; ?>" id="cnpj" type="text" class="form-control" name="cnpj" required>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-6">
                          <label for="endereco">Endereço</label>
                          <input value="<?php echo $loja->endereco; ?>" id="endereco" type="text" class="form-control" name="endereco">
                        </div>
                        <div class="form-group col-6">
                          <label for="num_endereco">Numero Do Endereço</label>
                          <input value="<?php echo $loja->num_endereco; ?>" id="num_endereco" type="text" class="form-control" name="num_endereco">
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-6">
                          <label for="nm_cidade">Cidade</label>
                          <input value="<?php echo $loja->nm_cidade; ?>" id="nm_cidade" type="text" class="form-control" name="nm_cidade">
                        </div>
                        <div class="form-group col-6">
                          <label for="nm_uf">UF</label>
                          <input value="<?php echo $loja->nm_uf; ?>" id="nm_uf" type="text" class="form-control" name="nm_uf">
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-6">
                          <label>Bairro</label>
                          <input value="<?php echo $loja->bairro; ?>" type="text" name="bairro" class="form-control">
                        </div>
                        <div class="form-group col-6">
                          <label>CEP</label>
                          <input value="<?php echo $loja->cep; ?>" type="number" name="cep" class="form-control">
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-6">
                          <label for="telefone">Telefone</label>
                          <input value="<?php echo $loja->telefone; ?>" id="telefone" type="number" class="form-control" name="telefone">
                        </div>
                        <div class="form-group col-6">
                          <label for="nm_imagem">Escolha uma Imagem</label>
                          <input id="nm_imagem" type="file" class="form-control" name="nm_imagem">
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