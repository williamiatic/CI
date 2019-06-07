<body>
  <div id="app">
    <div class="main-content">
      <section class="section">
        <h1 class="section-header">
          <div>Transportadora</div>
        </h1>
        <div class="container mt-5">
          <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
              <div class="card card-primary mt-5">
                <div class="card-header">
                  <h4>Alterar Transportadora</h4>
                </div>
                <div class="card-body">
                  <?php foreach ($transportadora as $transportadora) {
                    ?>
                    <form action="<?php echo base_url('index.php/transportadora/TransportadoraAlterar/' . $transportadora->id_transportadora) ?> " method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <div class="form-group col-6">
                          <label for="transportadora">Transportadora</label>
                          <input value="<?php echo $transportadora->nm_transportadora; ?>" id="transportadora" type="text" class="form-control" name="transportadora" required autofocus>
                        </div>
                        <div class="form-group col-6">
                          <label for="cnpj">CNPJ</label>
                          <input value="<?php echo $transportadora->cnpj; ?>" id="cnpj" type="text" class="form-control" name="cnpj" required>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-6">
                          <label for="endereco">Endereço</label>
                          <input value="<?php echo $transportadora->endereco; ?>" id="endereco" type="text" class="form-control" name="endereco">
                        </div>
                        <div class="form-group col-6">
                          <label for="num_endereco">Numero Do Endereço</label>
                          <input value="<?php echo $transportadora->num_endereco; ?>" id="num_endereco" type="text" class="form-control" name="num_endereco">
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-6">
                          <label for="nm_cidade">Cidade</label>
                          <input value="<?php echo $transportadora->nm_cidade; ?>" id="nm_cidade" type="text" class="form-control" name="nm_cidade">
                        </div>
                        <div class="form-group col-6">
                          <label for="nm_uf">UF</label>
                          <input value="<?php echo $transportadora->nm_uf; ?>" id="nm_uf" type="text" class="form-control" name="nm_uf">
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-6">
                          <label>Bairro</label>
                          <input value="<?php echo $transportadora->bairro; ?>" type="text" name="bairro" class="form-control">
                        </div>
                        <div class="form-group col-6">
                          <label>CEP</label>
                          <input value="<?php echo $transportadora->cep; ?>" type="number" name="cep" class="form-control">
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-6">
                          <label for="telefone">Telefone</label>
                          <input value="<?php echo $transportadora->telefone; ?>" id="telefone" type="number" class="form-control" name="telefone">
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