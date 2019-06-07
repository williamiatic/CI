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
              <h4>Produtos Em Estoque</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <th>Imagem</th>
                  <th>ID</th>
                  <th>Nome<br>Produto</th>
                  <th>Nome<br>Fornecedor</th>
                  <th>Categoria</th>
                  <th>Marca</th>
                  <th>Preço<br>Unidade</th>
                  <th>Preço Lote</th>
                  <th>Controlado</th>
                  <th>Quantidade</th>
                  <th>Deletar</th>
                  <th>Detalhes</th>
                  </tr>
                  <?php if ($produtos != null) {
                    foreach ($produtos as $produto) {
                      ?>
                      <tr>
                        <td>
                          <img alt="image" src="<?php echo base_url('assets/img/produtos/' . $produto->nm_foto) ?>" class="rounded-circle" width="35" data-toggle="title" title="FotoProduto">
                        </td>
                        <td><?php echo $produto->id_produto; ?></td>
                        <td><?php echo $produto->nm_produto; ?></td>
                        <td><?php echo $produto->nm_fornecedor; ?></td>
                        <td><?php echo $produto->nm_categoria; ?></td>
                        <td><?php echo $produto->marca; ?></td>
                        <td><?php echo $produto->precounidade . 'R$'; ?></td>
                        <td><?php echo $produto->precolote . 'R$'; ?></td>
                        <td><?php echo $produto->controlado; ?></td>
                        <td><?php echo $produto->quantidade; ?></td>
                        <td><a href=<?php echo base_url('index.php/produto/deletarProd/') . $produto->id_produto ?> class="btn btn-action btn-secondary">Deletar</a></td>
                        <td><a href=<?php echo base_url('index.php/pagina/detalhesprodutos/') . $produto->id_produto ?> class="btn btn-action btn-secondary">Detalhes</a></td>
                      <?php }
                  } ?>
                  <tr>

                </table>
                <?php echo $pagination; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  </section>
  </div>
</body>