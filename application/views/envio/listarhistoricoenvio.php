<body>
  </div>
  <div class="main-content">
    <section class="section">
      <h1 class="section-header">
        <div>Envios</div>
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
              <h4>Lista de Envios</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <th>Imagem</th>
                  <th>Produto</th>
                  <th>Transportadora</th>
                  <th>Data Do Pedido</th>
                  <th>Quantidade Por Lote</th>
                  <th>Quantidade De Lotes</th>
                  <th>Frete</th>
                  <th>Preço Unidade</th>
                  <th>Imposto</th>
                  <th>Nota Fiscal</th>
                  <th>Deletar</th>
                  <th>Detalhes</th>
                  </tr>
                  <?php if ($envio != null) {
                    foreach ($envio as $envio) { ?>
                      <tr>
                        <td>
                          <img alt="image" src="<?php echo base_url('assets/img/produto/' . $envio->nm_foto) ?>" class="rounded-circle" width="35" data-toggle="title" title="FotoFornecedor">
                        </td>
                        <td><?php echo $envio->nm_produto; ?></td>
                        <td><?php echo $envio->nm_transportadora; ?></td>
                        <td><?php echo $envio->dateped; ?></td>
                        <td><?php echo $envio->num_quantidadeporlote; ?></td>
                        <td><?php echo $envio->num_quantidadelote; ?></td>
                        <td><?php echo $envio->num_frete; ?></td>
                        <td><?php echo $envio->num_precounidade; ?></td>
                        <td><?php echo $envio->imposto; ?></td>
                        <td><?php echo $envio->num_notafiscal; ?></td>
                        <td><a href="<?php echo base_url('index.php/envio/deletarenvio/' . $envio->id_saida) ?>" class="btn btn-action btn-secondary">Deletar</a></td>
                        <td><a href="<?php echo base_url('index.php/pagina/detalhesenvio/' . $envio->id_saida) ?>" class="btn btn-action btn-secondary">Detalhes</a></td>
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