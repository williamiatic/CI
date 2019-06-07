<body>
  </div>
  <div class="main-content">
    <section class="section">
      <h1 class="section-header">
        <div>Transportadora</div>
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
              <h4>Lista de Transportadora</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <th>Imagem</th>
                  <th>Nome</th>
                  <th>CNPJ</th>
                  <th>Endereço</th>
                  <th>Cidade</th>
                  <th>Telefone</th>
                  <th>Deletar</th>
                  <th>Detalhes</th>
                  </tr>
                  <?php if ($transportadora != null) {
                    foreach ($transportadora as $transportadora) { ?>
                      <tr>
                        <td>
                          <img alt="image" src="<?php echo base_url('assets/img/transportadora/' . $transportadora->nm_foto) ?>" class="rounded-circle" width="35" data-toggle="title" title="FotoProduto">
                        </td>
                        <td><?php echo $transportadora->nm_transportadora; ?></td>
                        <td><?php echo $transportadora->cnpj; ?></td>
                        <td><?php echo $transportadora->endereco; ?></td>
                        <td><?php echo $transportadora->nm_cidade; ?></td>
                        <td><?php echo $transportadora->telefone; ?></td>
                        <td><a href=<?php echo base_url('index.php/transportadora/deletarTransportadora/' . $transportadora->id_transportadora) ?> class="btn btn-action btn-secondary">Deletar</a></td>
                        <td><a href=<?php echo base_url('index.php/pagina/detalhesTransportadora/' . $transportadora->id_transportadora) ?> class="btn btn-action btn-secondary">Detalhes</a></td>
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