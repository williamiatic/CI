<body>
  </div>
  <div class="main-content">
    <section class="section">
      <h1 class="section-header">
        <div>Fornecedor</div>
      </h1>
      <div class="row mt-5">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="float-right">
                <form>
                </form>
              </div>
              <h4>Detalhes Fornecedor</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <th>Imagem</th>
                  <th>ID Fornecedor</th>
                  <th>Nome Fornecedor</th>
                  <th>CNPJ</th>
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
                  <?php foreach ($fornecedor as $fornecedor) {
                    ?>
                    <tr>
                      <td>
                        <img alt="image" src="<?php echo base_url('assets/img/fornecedor/' . $fornecedor->nm_fornecedorfoto) ?>" class="rounded-circle" width="35" data-toggle="title" title="FotoProduto">
                      </td>
                      <td><?php echo $fornecedor->id_fornecedor; ?></td>
                      <td><?php echo $fornecedor->nm_fornecedor; ?></td>
                      <td><?php echo $fornecedor->cnpj; ?></td>
                      <td><?php echo $fornecedor->endereco; ?></td>
                      <td><?php echo $fornecedor->num_endereco; ?></td>
                      <td><?php echo $fornecedor->nm_cidade; ?></td>
                      <td><?php echo $fornecedor->nm_uf; ?></td>
                      <td><?php echo $fornecedor->bairro; ?></td>
                      <td><?php echo $fornecedor->cep; ?></td>
                      <td><?php echo $fornecedor->telefone; ?></td>
                      <td><a href=<?php echo base_url('index.php/fornecedor/deletarfornecedor/' . $fornecedor->id_fornecedor) ?> class="btn btn-action btn-secondary">Deletar</a></td>

                      <td><a href=<?php echo base_url('index.php/pagina/alterarfornecedor/' . $fornecedor->id_fornecedor) ?> class="btn btn-action btn-secondary">Alterar</a></td>
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