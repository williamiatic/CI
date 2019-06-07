<body>
  </div>
  <div class="main-content">
    <section class="section">
      <h1 class="section-header">
        <div>Pedido</div>
      </h1>
      <div class="row mt-5">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="float-right">
                <form>
                </form>
              </div>
              <h4>Detalhes Pedido</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <th>Imagem</th>
                  <th>ID Produto</th>
                  <th>Nome Produto</th>
                  <th>Nome Fornecedor</th>
                  <th>Preço Unidade</th>
                  <th>Preço Lote</th>
                  <th>Preço Total</th>
                  <th>Data Do Pedido</th>
                  <th>Data Da Conclusão</th>
                  <th>Quantidade</th>
                  <th>Frete</th>
                  <th>Nota Fiscal</th>
                  <th>Imposto</th>
                  <th>Deletar</th>
                  <th>Alterar</th>
                  </tr>
                  <?php foreach ($pedido as $pedido) {
                    ?>
                    <tr>
                      <td>
                        <img alt="image" src="<?php echo base_url('assets/img/produto/' . $pedido->nm_foto) ?>" class="rounded-circle" width="35" data-toggle="title" title="FotoProduto">
                      </td>
                      <td><?php echo $pedido->id_produto; ?></td>
                      <td><?php echo $pedido->nm_produto; ?></td>
                      <td><?php echo $pedido->nm_fornecedor; ?></td>
                      <td><?php echo $pedido->num_precounidade; ?></td>
                      <td><?php echo $pedido->num_precolote; ?></td>
                      <td><?php echo $pedido->num_precototal; ?></td>
                      <td><?php echo $pedido->dateped; ?></td>
                      <td><?php echo $pedido->dateentr; ?></td>
                      <td><?php echo $pedido->num_quantidade; ?></td>
                      <td><?php echo $pedido->num_frete; ?></td>
                      <td><?php echo $pedido->num_notafiscal; ?></td>
                      <td><?php echo $pedido->imposto; ?></td>
                      <td><a href="<?php echo base_url('index.php/pedido/deletarPedido/' . $pedido->id_entrada) ?>" class="btn btn-action btn-secondary">Deletar</a></td>
                      <td><a href=<?php echo base_url('index.php/pagina/alterarpedido/' . $pedido->id_entrada) ?> class="btn btn-action btn-secondary">Alterar</a></td>
                    <?php } ?>
                  <tr>
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