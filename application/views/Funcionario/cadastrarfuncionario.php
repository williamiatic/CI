<body>
  <div id="app">
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

        <div class="container mt-5">
          <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
              <div class="card card-primary mt-5">
                <div class="card-header">
                  <h4>Cadastrar Funcionario</h4>
                </div>
                <div class="card-body">
                  <form action="<?php echo base_url('index.php/funcionario/FuncionarioCadastrar') ?>" method="POST" enctype="multipart/form-data">


                    <div class="row">
                      <div class="form-group col-6">
                        <label for="Funcionario">Nome Do Funcionario</label>
                        <input id="Funcionario" type="text" class="form-control" name="Funcionario" placeholder="Nome Do Funcionario" autofocus>
                      </div>
                      <div class="form-group col-6">
                        <label for="CPF">CPF</label>
                        <input id="CPF" type="text" class="form-control" name="CPF" placeholder="CPF">
                      </div>
                    </div>


                    <div class="row">
                      <div class="form-group col-6">
                        <label for="Email">Email</label>
                        <input id="Email" type="text" class="form-control" name="Email" placeholder="Email">
                      </div>
                      <div class="form-group col-6">
                        <label for="Senha">Senha</label>
                        <input id="Senha" type="password" class="form-control" name="Senha" placeholder="Senha">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="NivelAcesso">Nivel De Acesso</label>
                        <input id="NivelAcesso" type="text" class="form-control" name="NivelAcesso" placeholder="Nivel De Acesso">
                      </div>
                      <div class="form-group col-6">
                        <label for="Cargo">Cargo</label>
                        <input id="Cargo" type="text" class="form-control" name="Cargo" placeholder="Cargo">
                      </div>
                    </div>


                    <div class="row">
                      <div class="form-group col-6">
                        <label for="Salario">Salario</label>
                        <input id="Salario" type="number" class="form-control" name="Salario" placeholder="Salario">
                      </div>
                      <div class="form-group col-6">
                        <label for="CarteiraDeTrabalho">Carteira De Trabalho</label>
                        <input id="CarteiraDeTrabalho" type="text" class="form-control" name="CarteiraDeTrabalho" placeholder="CarteiraDeTrabalho" required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="Endereco">Endereço</label>
                        <input id="Endereco" type="text" class="form-control" name="Endereco" placeholder="Endereço" required>
                      </div>
                      <div class="form-group col-6">
                        <label for="NumEndereco">Numero de Endereço</label>
                        <input id="NumEndereco" type="text" class="form-control" name="NumEndereco" placeholder="Numero de Endereço">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="Cidade">Cidade</label>
                        <input id="Cidade" type="text" class="form-control" name="Cidade" placeholder="Cidade">
                      </div>
                      <div class="form-group col-6">
                        <label for="UF">UF</label>
                        <input id="UF" type="text" class="form-control" name="UF" placeholder="UF">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="Bairro">Bairro</label>
                        <input id="Bairro" type="text" class="form-control" name="Bairro" placeholder="Bairro">
                      </div>
                      <div class="form-group col-6">
                        <label for="Cep">CEP</label>
                        <input id="Cep" type="text" class="form-control" name="Cep" placeholder="CEP">
                      </div>
                    </div>


                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">
                        Cadastrar
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>