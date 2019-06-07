<body>
      </div>
      <div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>Transportadora</div>
          </h1>
            <div class="row mt-5">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="float-right">
                      <form>
                      </form>
                    </div>
                    <h4>Detalhes Transportadora</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped">
                          <th>Imagem</th>
                          <th>ID Transportadora</th>
                          <th>Nome Transportadora</th>
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
                        <?php foreach($transportadora as $transportadora){
                          ?>
                          <tr>
                          <td>
                            <img alt="image" src="<?php echo base_url('assets/img/transportadora/'.$transportadora->nm_foto) ?>" class="rounded-circle" width="35" data-toggle="title" title="FotoProduto">
                          </td>
                          <td><?php echo $transportadora->id_transportadora; ?></td>
                          <td><?php echo $transportadora->nm_transportadora; ?></td>
                          <td><?php echo $transportadora->cnpj; ?></td>
                          <td><?php echo $transportadora->endereco; ?></td>
                          <td><?php echo $transportadora->num_endereco; ?></td>
                          <td><?php echo $transportadora->nm_cidade; ?></td>
                          <td><?php echo $transportadora->nm_uf; ?></td>
                          <td><?php echo $transportadora->bairro; ?></td>
                          <td><?php echo $transportadora->cep; ?></td>
                          <td><?php echo $transportadora->telefone; ?></td>
                          <td><a href=<?php echo base_url('index.php/transportadora/deletarTransportadora/' . $transportadora->id_transportadora) ?> class="btn btn-action btn-secondary">Deletar</a></td>

                          <td><a href=<?php echo "../Alterartransportadora/" . $transportadora->id_transportadora ?> class="btn btn-action btn-secondary">Alterar</a></td>
                          <?php }?>
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