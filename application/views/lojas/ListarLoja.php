<body>
  </div>
  <div class="main-content">
    <section class="section">
      <h1 class="section-header">
        <div>Loja</div>
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
              <h4>Lista de Lojas</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <th>Imagem</th>
                  <th>Nome</th>
                  <th>CNPJ</th>
                  <th>Endereço</th>
                  <th>CEP</th>
                  <th>Telefone</th>
                  <th>Deletar
                  <th>Detalhes</th>
                  </tr>
                  <?php if ($loja != null) {
                    foreach ($loja as $loja) { ?>
                      <tr>
                        <td>
                          <img alt="image" src="<?php echo base_url('assets/img/loja/' . $loja->nm_foto) ?>" class="rounded-circle" width="35" data-toggle="title" title="FotoProduto">
                        </td>
                        <td><?php echo $loja->nm_loja; ?></td>
                        <td><?php echo $loja->cnpj; ?></td>
                        <td><?php echo $loja->endereco; ?></td>
                        <td><?php echo $loja->cep; ?></td>
                        <td><?php echo $loja->telefone; ?></td>
                        <td><a href="<?php echo base_url('index.php/loja/deletarLoja/' . $loja->id_loja) ?>" class="btn btn-action btn-secondary">Deletar</a></td>
                        <td><a href="<?php echo base_url('index.php/pagina/detalhesloja/' . $loja->id_loja) ?>" class="btn btn-action btn-secondary">Detalhes</a></td>
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