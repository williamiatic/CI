<body>
  </div>
  <div class="main-content">
    <section class="section">
      <h1 class="section-header">
        <div>Pedido</div>
      </h1>
      <?php if (isset($this->session->texto)) { ?>
        <div class="<?php echo $this->session->type; ?>" role="alert">
          <?php echo $this->session->texto; ?>
        </div>
      <?php }
    $this->session->unset_userdata('texto');
    $this->session->unset_userdata('type'); ?>
      <div class="row mt-5">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="float-right">
                <form>
                </form>
              </div>
              <h4>Historico De Pedidos</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <th>Imagem</th>
                  <th>ID Produto</th>
                  <th>Produto</th>
                  <th>Fornecedor</th>
                  <th>Data Do Pedido</th>
                  <th>Data De Conclusão</th>
                  <th>Quantidade</th>
                  <th>Frete</th>
                  <th>Preço Unidade</th>
                  <th>Preço Total</th>
                  <th>Deletar</th>
                  <th>Detalhes</th>
                  </tr>
                  <?php if ($pedido != null) {
                    foreach ($pedido as $pedido) { ?>
                      <tr>
                        <td>
                          <img alt="image" src="<?php echo base_url('assets/img/produtos/' . $pedido->nm_foto) ?>" class="rounded-circle" width="35" data-toggle="title" title="FotoProduto">
                        </td>
                        <td><?php echo $pedido->produto_id; ?></td>
                        <td><?php echo $pedido->nm_produto; ?></td>
                        <td><?php echo $pedido->nm_fornecedor; ?></td>
                        <td><?php echo $pedido->dateped; ?></td>
                        <td><?php echo $pedido->dateentr; ?></td>
                        <td><?php echo $pedido->num_quantidade; ?></td>
                        <td><?php echo $pedido->num_frete; ?></td>
                        <td><?php echo $pedido->num_precounidade; ?></td>
                        <td><?php echo $pedido->num_precototal; ?></td>
                        <td><a href="<?php echo base_url('index.php/pedido/deletarPedido/' . $pedido->id_entrada) ?>" class="btn btn-action btn-secondary">Deletar</a></td>
                        <td><a href="<?php echo base_url('index.php/pagina/detalhesPedido/' . $pedido->id_entrada) ?>" class="btn btn-action btn-secondary">Detalhes</a></td>
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