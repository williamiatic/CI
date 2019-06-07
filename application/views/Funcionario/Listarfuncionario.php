<body>
  </div>
  <div class="main-content">
    <section class="section">
      <h1 class="section-header">
        <div>Funcionario</div>
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
              <h4>Funcionario</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <th>Imagem</th>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>CPF</th>
                  <th>Nivel De Acesso</th>
                  <th>Cargo</th>
                  <th>Salario</th>
                  <th>Data De Cadastro</th>
                  <th>Deletar</th>
                  <th>Detalhes</th>
                  </tr>

                  <?php foreach ($funcionario as $funcionario) { ?>
                    <tr>
                      <td>
                        <img alt="image" src="<?php echo base_url('assets/img/avatar/' . $funcionario->nm_foto) ?>" class="rounded-circle" width="35" data-toggle="title" title="FotoProduto">
                      </td>
                      <td><?php echo $funcionario->nm_funcionario; ?></td>
                      <td><?php echo $funcionario->email; ?></td>
                      <td><?php echo $funcionario->cpf; ?></td>
                      <td><?php echo $funcionario->nivelacesso; ?></td>
                      <td><?php echo $funcionario->cargo; ?></td>
                      <td><?php echo $funcionario->salario; ?></td>
                      <td><?php echo $funcionario->data_cadastro; ?></td>
                      <td><a href="<?php echo base_url('index.php/funcionario/deletarFuncionario/' . $funcionario->id_funcionario) ?>" class="btn btn-action btn-secondary">Deletar</a></td>
                      <td><a href="<?php echo base_url('index.php/pagina/detalhesFuncionario/' . $funcionario->id_funcionario) ?>" class="btn btn-action btn-secondary">Detalhes</a></td>
                    <?php } ?>
                  <tr>

                </table>
                <?php echo $pagination ?>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  </section>
  </div>
</body>