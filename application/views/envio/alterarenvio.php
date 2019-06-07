<body>
  <div id="app">
    <div class="main-content">
      <section class="section">
        <h1 class="section-header">
          <div>Envio</div>
        </h1>

        <div class="container mt-5">
          <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
              <div class="card card-primary mt-5">
                <div class="card-header">
                  <h4>Alterar Envio</h4>
                </div>
                <div class="card-body">
                  <?php foreach ($envio as $envio) { ?>
                    <form action="<?php echo base_url('index.php/envio/Alterarenvio/' . $envio->id_saida) ?> " method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <div class="form-group col-6">
                          <label for="precolote">Preço Lote</label>
                          <input value="<?php echo $envio->num_precolote; ?>" id="precolote" type="text" class="form-control" name="precolote">
                        </div>
                        <div class="form-group col-6">
                          <label for="precounidade">Preço Unidade</label>
                          <input value="<?php echo $envio->num_precounidade; ?>" id="precounidade" type="text" class="form-control" name="precounidade" required>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-6">
                          <label for="num_quantidadeporlote">Quantidade Por Lote</label>
                          <input value="<?php echo $envio->num_quantidadeporlote; ?>" id="num_quantidadeporlote" type="text" class="form-control" name="num_quantidadeporlote">
                        </div>
                        <div class="form-group col-6">
                          <label for="num_quantidadelote">Quantidade De Lotes</label>
                          <input value="<?php echo $envio->num_quantidadelote; ?>" id="num_quantidadelote" type="text" class="form-control" name="num_quantidadelote">
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-6">
                          <label for="nm_frete">Frete</label>
                          <input value="<?php echo $envio->num_frete; ?>" id="frete" type="text" class="form-control" name="frete">
                        </div>
                        <div class="form-group col-6">
                          <label for="imposto">Imposto</label>
                          <input value="<?php echo $envio->imposto; ?>" id="imposto" type="text" class="form-control" name="imposto">
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
                          <label for="num_notafiscal">Nota Fiscal</label>
                          <input value="<?php echo $envio->num_notafiscal; ?>" id="num_notafiscal" type="text" class="form-control" name="num_notafiscal">
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