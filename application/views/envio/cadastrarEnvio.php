<body>
  <div id="app">
    <div class="main-content">
      <section class="section">
        <h1 class="section-header">
          <div>Envios</div>
        </h1>
        <div class="container mt-5">
          <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
              <div class="card card-primary mt-5">
                <div class="card-header">
                  <h4>Cadastrar Envio</h4>
                </div>
                <div class="card-body">
                  <form action="<?php echo base_url('index.php/envio/EnvioCadastrar') ?>" method="POST" enctype="multipart/form-data">


                    <div class="row">
                      <div class="form-group col-6">
                        <label>Produto <-> Fornecedor</label>
                        <select class="form-control" name="produto">
                          <?php foreach ($produtos as $produto) { ?>
                            <option value="<?php echo $produto->id_produto; ?>"><?php echo $produto->nm_produto . ' - ' . $produto->nm_fornecedor ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group col-6">
                        <label>Loja</label>
                        <select class="form-control" name="loja">
                          <?php foreach ($loja as $loja) { ?>
                            <option value="<?php echo $loja->id_loja; ?>"><?php echo $loja->nm_loja ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>


                    <div class="row">
                      <div class="form-group col-6">
                        <label>Transportadora</label>
                        <select class="form-control" name="transportadora">
                          <?php foreach ($transportadora as $transportadora) { ?>
                            <option value="<?php echo $transportadora->id_transportadora; ?>"><?php echo $transportadora->nm_transportadora ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group col-6">
                        <label for="Frete">Frete</label>
                        <input id="Frete" type="number" class="form-control" name="Frete">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="quantidadeporlote">Quantidade Por Lote</label>
                        <input id="quantidadeporlote" type="text" class="form-control" name="quantidadeporlote">
                      </div>
                      <div class="form-group col-6">
                        <label for="quantidadelote">Quantidade De Lotes</label>
                        <input id="quantidadelote" type="number" class="form-control" name="quantidadelote">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="precounidade">Preço Unidade</label>
                        <input id="precounidade" type="text" class="form-control" name="precounidade">
                      </div>
                      <div class="form-group col-6">
                        <label for="precolote">Preço Lote</label>
                        <input id="precolote" type="number" class="form-control" name="precolote">
                      </div>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">
                        Cadastrar
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