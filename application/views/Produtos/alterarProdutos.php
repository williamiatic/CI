<body>
  <div id="app">
    <div class="main-content">
      <section class="section">
        <h1 class="section-header">
          <div>Produtos</div>
        </h1>

        <div class="container mt-5">
          <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
              <div class="card card-primary mt-5">
                <div class="card-header">
                  <h4>Alterar Produto</h4>
                </div>
                <div class="card-body">
                  <form action="<?php echo  base_url('index.php/produto/ProdutoAlterar/') . $id ?>" method="POST" enctype="multipart/form-data">
                    <?php foreach ($produtos as $produto) {
                      ?>
                      <div class="row">
                        <div class="form-group col-6">
                          <label for="produto">Produto</label>
                          <input value="<?php echo $produto->nm_produto; ?>" id="produto" type="text" class="form-control" name="produto" required autofocus>
                        </div>
                        <div class="form-group col-6">
                          <label>Categoria</label>
                          <select class="form-control" name="categoria">
                            <?php foreach ($categoria as $categoria) { ?>
                              <option value="<?php echo $categoria->id_categoria; ?>"> <?php echo $categoria->nm_categoria; ?> </option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-6">
                          <label for="marca" class="d-block">Marca</label>
                          <input value="<?php echo $produto->marca; ?>" id="Marca" type="text" class="form-control" name="marca">
                        </div>
                        <div class="form-group col-6">
                          <label for="peso">peso</label>
                          <input value="<?php echo $produto->peso; ?>" id="Peso" type="text" class="form-control" name="peso">
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-6">
                          <label>Controlado</label>
                          <select class="form-control" name="Controlado">
                            <option value="True">True</option>
                            <option value="False" selected>False</option>
                          </select>
                        </div>
                        <div class="form-group col-6">
                          <label>Fornecedor</label>
                          <select class="form-control" name="Fornecedor">
                            <?php foreach ($fornecedor as $fornecedor) { ?>
                              <option value="<?php echo $fornecedor->id_fornecedor; ?>"> <?php echo $fornecedor->nm_fornecedor; ?> </option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-6">
                          <label>Quantidade Minima</label>
                          <input value="<?php echo $produto->quantidademinima; ?>" type="number" name="QuantidadeMinima" class="form-control">
                        </div>
                        <div class="form-group col-6">
                          <label>Quantidade</label>
                          <input value="<?php echo $produto->quantidade; ?>" type="number" name="Quantidade" class="form-control">
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-6">
                          <label for="precounidade">Preço Unidade</label>
                          <input value="<?php echo $produto->precounidade; ?>" id="precounidade" type="number" class="form-control" name="precounidade" placeholder="Preço Unidade">
                        </div>
                        <div class="form-group col-6">
                          <label for="precolote">Preço Lote</label>
                          <input value="<?php echo $produto->precolote; ?>" id="precolote" type="number" class="form-control" name="precolote" placeholder="Preço Lote">
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-6">
                          <label for="lote">Lote</label>
                          <input value="<?php echo $produto->lote; ?>" id="lote" type="number" class="form-control" name="lote" placeholder="Lote">
                        </div>
                        <div class="form-group col-6">
                          <label for="quantidadelote">Quantidade Por Lote</label>
                          <input value="<?php echo $produto->quantidadelote; ?>" id="descricao" type="number" class="form-control" name="quantidadelote" placeholder="Quantidade Por Lote">
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-6">
                          <label for="descricao">Descrição</label>
                          <input value="<?php echo $produto->descricao; ?>" id="descricao" type="text" class="form-control" name="descricao" placeholder="Descrição">
                        </div>
                        <div class="form-group col-6">
                          <label>Transportadora</label>
                          <select class="form-control" name="transportadora">
                            <?php foreach ($transportadora as $transportadora) { ?>
                              <option value="<?php echo $transportadora->id_transportadora; ?>"> <?php echo $transportadora->nm_transportadora; ?> </option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    <?php } ?>

                    <div class="form-group">
                      <label for="nm_imagem">Escolha uma Imagem</label>
                      <input id="nm_imagem" type="file" class="form-control" name="nm_imagem">
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