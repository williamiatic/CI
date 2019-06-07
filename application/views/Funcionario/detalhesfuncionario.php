<body>
  </div>
  <div class="main-content">
    <section class="section">
      <h1 class="section-header">
        <div>Funcionario</div>
      </h1>
      <div class="row mt-5">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="float-right">
                <form>
                </form>
              </div>
              <h4>Detalhes Funcionario</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <th>Imagem</th>
                  <th>ID Funcionario</th>
                  <th>Nome Funcionario</th>
                  <th>Email</th>
                  <th>CPF</th>
                  <th>Data De Cadastro</th>
                  <th>Nivel De Acesso</th>
                  <th>Salario</th>
                  <th>Cargo</th>
                  <th>Endereço</th>
                  <th>Numero do Endereço</th>
                  <th>Cidade</th>
                  <th>UF</th>
                  <th>Bairro</th>
                  <th>Cep</th>
                  <th>telefone</th>
                  <th>Deletar</th>
                  <th>Alterar</th>
                  </tr>
                  <?php foreach ($funcionario as $funcionario) {
                    ?>
                    <tr>
                      <td>
                        <img alt="image" src="<?php echo base_url('assets/img/avatar/' . $funcionario->nm_foto) ?>" class="rounded-circle" width="35" data-toggle="title" title="FotoProduto">
                      </td>
                      <td><?php echo $funcionario->id_funcionario; ?></td>
                      <td><?php echo $funcionario->nm_funcionario; ?></td>
                      <td><?php echo $funcionario->email; ?></td>
                      <td><?php echo $funcionario->cpf; ?></td>
                      <td><?php echo $funcionario->data_cadastro; ?></td>
                      <td><?php echo $funcionario->nivelacesso; ?></td>
                      <td><?php echo $funcionario->salario; ?></td>
                      <td><?php echo $funcionario->cargo; ?></td>
                      <td><?php echo $funcionario->endereco; ?></td>
                      <td><?php echo $funcionario->num_endereco; ?></td>
                      <td><?php echo $funcionario->nm_cidade; ?></td>
                      <td><?php echo $funcionario->nm_uf; ?></td>
                      <td><?php echo $funcionario->bairro; ?></td>
                      <td><?php echo $funcionario->cep; ?></td>
                      <td><?php echo $funcionario->telefone; ?></td>
                      <td><a href=<?php echo base_url('index.php/funcionario/deletarfuncionario/' . $funcionario->id_funcionario) ?> class="btn btn-action btn-secondary">Deletar</a></td>
                      <td><a href=<?php echo base_url('index.php/pagina/alterarfuncionario/' . $funcionario->id_funcionario) ?> class="btn btn-action btn-secondary">Alterar</a></td>
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