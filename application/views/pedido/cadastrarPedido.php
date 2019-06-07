<body>
  <div id="app">
    <div class="main-content">
      <section class="section">
        <h1 class="section-header">
          <div>Pedido</div>
        </h1>
        <div class="container m-3">
          <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
              <div class="card card-primary mt-5">
                <div class="card-header">
                  <h4>Cadastrar Pedido</h4>
                </div>
                <div class="card-body">
                  <form action="../pedido/PedidoCadastrar" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="form-group col-6">
                        <label>Produto <-> Fornecedor</label>
                        <select class="form-control" name="Produtos">
                          <?php foreach ($produtos as $produto) { ?>
                            <option value="<?php echo $produto->id_produto; ?>"><?php echo $produto->nm_produto . ' - ' . $produto->nm_fornecedor ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group col-6">
                        <label for="Quantidade">Quantidade</label>
                        <input id="Quantidade" type="text" class="form-control" name="Quantidade" autofocus>
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="Frete">Frete</label>
                        <input id="Frete" type="text" class="form-control" name="Frete">
                      </div>
                      <div class="form-group col-6">
                        <label for="NotaFiscal">Numero Da Nota Fiscal</label>
                        <input id="NotaFiscal" type="number" class="form-control" name="NotaFiscal">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="PrecoUnidade">Preco Unidade</label>
                        <input id="PrecoUnidade" type="text" class="form-control" name="PrecoUnidade">
                      </div>
                      <div class="form-group col-6">
                        <label for="Precototal">Preco Total</label>
                        <input id="Precototal" type="number" class="form-control" name="Precototal">
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