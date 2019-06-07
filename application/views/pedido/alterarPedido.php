<body>
  <div id="app">
    <div class="main-content">
      <section class="section">
        <h1 class="section-header">
          <div>Pedido</div>
        </h1>
        <div class="container mt-5">
          <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
              <div class="card card-primary mt-5">
                <div class="card-header">
                  <h4>Alterar Pedido</h4>
                </div>
                <div class="card-body">
                  <?php foreach ($pedido as $pedido) { ?>
                    <form action="<?php echo base_url('index.php/pedido/AlterarPedido/' . $pedido->id_entrada) ?> " method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <div class="form-group col-6">
                          <label for="precolote">Preço Lote</label>
                          <input value="<?php echo $pedido->num_precolote; ?>" id="precolote" type="text" class="form-control" name="precolote">
                        </div>
                        <div class="form-group col-6">
                          <label for="precounidade">Preço Unidade</label>
                          <input value="<?php echo $pedido->num_precounidade; ?>" id="precounidade" type="text" class="form-control" name="precounidade" required>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-6">
                          <label for="num_quantidade">Quantidade</label>
                          <input value="<?php echo $pedido->num_quantidade; ?>" id="num_quantidade" type="text" class="form-control" name="num_quantidade">
                        </div>
                        <div class="form-group col-6">
                          <label for="num_quantidadelote">Quantidade Lote</label>
                          <input value="<?php echo $pedido->num_quantidadelote; ?>" id="num_quantidadelote" type="text" class="form-control" name="num_quantidadelote">
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-6">
                          <label for="nm_frete">Frete</label>
                          <input value="<?php echo $pedido->num_frete; ?>" id="frete" type="text" class="form-control" name="frete">
                        </div>
                        <div class="form-group col-6">
                          <label for="imposto">Imposto</label>
                          <input value="<?php echo $pedido->imposto; ?>" id="imposto" type="text" class="form-control" name="imposto">
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-6">
                          <label for="nm_notafiscal">Nota Fiscal</label>
                          <input value="<?php echo $pedido->num_notafiscal; ?>" id="notafiscal" type="text" class="form-control" name="notafiscal">
                        </div>
                        <div class="form-group col-6">
                          <label for="num_precototal">Preço Total</label>
                          <input value="<?php echo $pedido->num_precototal; ?>" id="imposto" type="text" class="form-control" name="num_precototal">
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