<body>
  <div id="app">
    <div class="main-content">
      <section class="section">
        <h1 class="section-header">
          <div>Perfil</div>
        </h1>
        <div class="row">
          <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><a class="navbar-brand" href="<?php echo base_url("index.php/pagina/alterarusuario") ?>"><span>Alterar Dados</span></a></div>
                  </div>
                  <div class="col-auto">
                    <i class="ion ion-navicon-round fa-3x"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><a class="navbar-brand" href="<?php echo base_url('index.php/pagina/alterarsenha') ?>"><span>Alterar Senha</span></a></div>
                  </div>
                  <div class="col-auto">
                    <i class="ion ion-locked fa-3x"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><a class="navbar-brand" href="<?php echo base_url('index.php/pagina/alterarfoto') ?>"><span>Alterar Foto</span></a></div>
                  </div>
                  <div class="col-auto">
                    <i class="ion ion-social-instagram fa-3x"></i>
                  </div>

                </div>

              </div>
            </div>

          </div>

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="float-right">
                  <form>
                  </form>
                </div>
                <h4>Dados Usuario</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped">
                    <th>Imagem</th>
                    <th>Nome Usuario</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Data De Cadastro</th>
                    <th>Cargo</th>
                    <th>Endereço</th>
                    <th>Numero Do Endereço</th>
                    <th>Bairro</th>
                    <th>CEP</th>
                    <th>Cidade</th>
                    <th>UF</th>
                    <th>Telefone</th>
                    </tr>
                    <?php if ($usuario != null) {
                    foreach ($usuario as $usario) { ?>
                      <tr>
                        <td>
                          <img alt="image" src="<?php echo base_url('assets/img/avatar/' . $usario->nm_foto) ?>" class="rounded-circle" width="35" data-toggle="title" title="FotoProduto">
                        </td>
                        <td><?php echo $usario->nm_empresa; ?></td>
                        <td><?php echo $usario->email; ?></td>
                        <td><?php echo $usario->cpf; ?></td>
                        <td><?php echo $usario->data_cadastro; ?></td>
                        <td><?php echo $usario->cargo; ?></td>
                        <td><?php echo $usario->endereco; ?></td>
                        <td><?php echo $usario->num_endereco; ?></td>
                        <td><?php echo $usario->bairro; ?></td>
                        <td><?php echo $usario->cep; ?></td>
                        <td><?php echo $usario->nm_cidade; ?></td>
                        <td><?php echo $usario->nm_uf; ?></td>
                        <td><?php echo $usario->telefone; ?></td>


                      <?php }
                  } ?>
                  <tr>
                  </table>
                </div>


              </div>
            </div>
          </div>
        </div>

    </div>

  </div>

  </div>

  </div>

  </section>

  </div>
  </div>
</body>