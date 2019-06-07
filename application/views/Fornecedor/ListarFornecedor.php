<body>
  </div>
  <div class="main-content">
    <section class="section">
      <h1 class="section-header">
        <div>Fornecedor</div>
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
              <h4>Lista de Fornecedores</h4>
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
                  <?php if ($fornecedor != null) {
                    foreach ($fornecedor as $fornecedor) { ?>
                      <tr>
                        <td>
                          <img alt="image" src="<?php echo base_url('assets/img/fornecedor/' . $fornecedor->nm_fornecedorfoto) ?>" class="rounded-circle" width="35" data-toggle="title" title="FotoFornecedor">
                        </td>
                        <td><?php echo $fornecedor->nm_fornecedor; ?></td>
                        <td><?php echo $fornecedor->cnpj; ?></td>
                        <td><?php echo $fornecedor->endereco; ?></td>
                        <td><?php echo $fornecedor->nm_cidade; ?></td>
                        <td><?php echo $fornecedor->telefone; ?></td>
                        <td><a href=<?php echo base_url('index.php/fornecedor/deletarFornecedor/') . $fornecedor->id_fornecedor ?> class="btn btn-action btn-secondary">Deletar</a></td>
                        <td><a href="<?php echo base_url('index.php/pagina/detalhesFornecedor/') . $fornecedor->id_fornecedor ?>" class="btn btn-action btn-secondary">Detalhes</a></td>
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