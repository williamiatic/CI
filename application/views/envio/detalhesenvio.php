<body>
  </div>
  <div class="main-content">
    <section class="section">
      <h1 class="section-header">
        <div>Envio</div>
      </h1>
      <div class="row mt-5">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="float-right">
                <form>
                </form>
              </div>
              <h4>Detalhes Envio</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <th>Imagem</th>
                  <th>ID Produto</th>
                  <th>Nome Produto</th>
                  <th>Nome Loja</th>
                  <th>Nome Transportadora</th>
                  <th>Preço Unidade</th>
                  <th>Preço Lote</th>
                  <th>Data Do Envio</th>
                  <th>Data Da Entrega</th>
                  <th>Quantidade Por Lote</th>
                  <th>Quantidade De Lotes</th>
                  <th>Preço Unidade</th>
                  <th>Preço Por Lote</th>
                  <th>Frete</th>
                  <th>Nota Fiscal</th>
                  <th>Imposto</th>
                  <th>Deletar</th>
                  <th>Alterar</th>
                  </tr>
                  <?php foreach ($envio as $envio) {
                    ?>
                    <tr>
                      <td>
                        <img alt="image" src="<?php echo base_url('assets/img/produto/' . $envio->nm_foto) ?>" class="rounded-circle" width="35" data-toggle="title" title="FotoProduto">
                      </td>
                      <td><?php echo $envio->id_produto; ?></td>
                      <td><?php echo $envio->nm_produto; ?></td>
                      <td><?php echo $envio->nm_loja; ?></td>
                      <td><?php echo $envio->nm_transportadora; ?></td>
                      <td><?php echo $envio->num_precounidade; ?></td>
                      <td><?php echo $envio->num_precolote; ?></td>
                      <td><?php echo $envio->dateped; ?></td>
                      <td><?php echo $envio->dateentrega; ?></td>
                      <td><?php echo $envio->num_quantidadeporlote; ?></td>
                      <td><?php echo $envio->num_quantidadelote; ?></td>
                      <td><?php echo $envio->num_precounidade; ?></td>
                      <td><?php echo $envio->num_precolote; ?></td>
                      <td><?php echo $envio->num_frete; ?></td>
                      <td><?php echo $envio->num_notafiscal; ?></td>
                      <td><?php echo $envio->imposto; ?></td>
                      <td><a href="<?php echo base_url('index.php/envio/deletarenvio/' . $envio->id_saida) ?>" class="btn btn-action btn-secondary">Deletar</a></td>
                      <td><a href=<?php echo base_url('index.php/pagina/alterarenvio/' . $envio->id_saida) ?> class="btn btn-action btn-secondary">Alterar</a></td>
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