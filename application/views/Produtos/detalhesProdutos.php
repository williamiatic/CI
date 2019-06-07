<body>
  </div>
  <div class="main-content">
    <section class="section">
      <h1 class="section-header">
        <div>Produtos</div>
      </h1>
      <div class="row mt-5">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="float-right">
                <form>
                </form>
              </div>
              <h4>Detalhes Produto</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <th>Imagem</th>
                  <th>ID Produto</th>
                  <th>Nome Produto</th>
                  <th>Categoria</th>
                  <th>Marca</th>
                  <th>Descrição</th>
                  <th>Peso</th>
                  <th>Controlado</th>
                  <th>Alterar</th>

                  </tr>
                  <?php foreach ($produtos as $produto) {
                    ?>
                    <tr>
                      <td>
                        <img alt="image" src="<?php echo base_url('assets/img/produtos/' . $produto->nm_foto) ?>" class="rounded-circle" width="35" data-toggle="title" title="FotoProduto">
                      </td>
                      <td><?php echo $produto->id_produto; ?></td>
                      <td><?php echo $produto->nm_produto; ?></td>
                      <td><?php echo $produto->nm_categoria; ?></td>
                      <td><?php echo $produto->marca; ?></td>
                      <td><?php echo $produto->descricao; ?></td>
                      <td><?php echo $produto->peso; ?></td>
                      <td><?php echo $produto->controlado; ?></td>
                      <td><a href=<?php echo  base_url('index.php/pagina/alterarprodutos/') . $produto->id_produto ?> class="btn btn-action btn-secondary">Alterar</a></td>
                    <?php } ?>
                  <tr>


                    <th>Quantidade</th>
                    <th>Quantidade Minima</th>
                    <th>Lote</th>
                    <th>Quantidade Por Lote</th>
                    <th>Preço Unidade</th>
                    <th>Preço Lote</th>
                    <th>ID Transportadora</th>
                    <th>ID Fornecedor</th>
                    <th>Deletar</th>
                  </tr>
                  <?php foreach ($produtos as $produto) {
                    ?>
                    <tr>

                      <td><?php echo $produto->quantidade; ?></td>
                      <td><?php echo $produto->quantidademinima; ?></td>
                      <td><?php echo $produto->lote; ?></td>
                      <td><?php echo $produto->nm_produto; ?></td>
                      <td><?php echo $produto->precounidade; ?></td>
                      <td><?php echo $produto->precolote; ?></td>
                      <td><?php echo $produto->transportadora_id; ?></td>
                      <td><?php echo $produto->fornecedor_id; ?></td>
                      <td><a href=<?php echo base_url('index.php/produto/deletarProd/') . $produto->id_produto ?> class="btn btn-action btn-secondary">Deletar</a></td>

                    <?php } ?>

                  <tr>



                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  </section>
  </div>
</body>