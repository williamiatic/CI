<body>
  </div>
  <div class="main-content">
    <section class="section">
      <h1 class="section-header">
        <div>Loja</div>
      </h1>
      <div class="row mt-5">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="float-right">
                <form>
                </form>
              </div>
              <h4>Detalhes Loja</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <th>Imagem</th>
                  <th>ID Loja</th>
                  <th>Nome Loja</th>
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
                  <?php foreach ($loja as $loja) {
                    ?>
                    <tr>
                      <td>
                        <img alt="image" src="<?php echo base_url('assets/img/loja/' . $loja->nm_foto) ?>" class="rounded-circle" width="35" data-toggle="title" title="FotoProduto">
                      </td>
                      <td><?php echo $loja->id_loja; ?></td>
                      <td><?php echo $loja->nm_loja; ?></td>
                      <td><?php echo $loja->cnpj; ?></td>
                      <td><?php echo $loja->endereco; ?></td>
                      <td><?php echo $loja->num_endereco; ?></td>
                      <td><?php echo $loja->nm_cidade; ?></td>
                      <td><?php echo $loja->nm_uf; ?></td>
                      <td><?php echo $loja->bairro; ?></td>
                      <td><?php echo $loja->cep; ?></td>
                      <td><?php echo $loja->telefone; ?></td>
                      <td><a href=<?php echo base_url('index.php/loja/deletarloja/' . $loja->id_loja) ?> class="btn btn-action btn-secondary">Deletar</a></td>

                      <td><a href=<?php echo base_url('index.php/pagina/alterarloja/' . $loja->id_loja) ?> class="btn btn-action btn-secondary">Alterar</a></td>
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