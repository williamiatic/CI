<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title> <?php echo $titulo ?> </title>
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/bootstrap/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/ionicons/css/ionicons.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') ?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/css/demo.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">

</head>

<body>
  <div id="register">
    <section class="section">
      <div class="container mt-5">
        <div class="row">

          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              E_Web
            </div>

            <div class="card card-primary">
              <?php if (isset($this->session->texto)) { ?>
                <div class="alert alert-<?php echo $this->session->type; ?>" role="alert">
                  <?php echo $this->session->texto; ?>
                </div>
              <?php }
            $this->session->unset_userdata('texto'); ?>

              <div class="card-header">
                <h4>CRIAR UMA NOVA CONTA</h4>
              </div>
              <div class="card-body">
                <form action="../usuario/Cadastrar" method="POST">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="nome">Nome</label>
                      <input id="nome" type="text" class="form-control" name="Nome" placeholder="Nome" autofocus required>
                    </div>
                    <div class="form-group col-6">
                      <label for="cpf">CPF</label>
                      <input id="cpf" type="text" class="form-control" name="CPF" placeholder="CPF" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="Email" placeholder="e_web@eweb.com" required>
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="senha" class="d-block">Senha</label>
                      <input id="senha" type="password" class="form-control" name="senha" required>
                    </div>

                    <div class="form-group col-6">
                      <label for="senha2" class="d-block">Confirme a Senha</label>
                      <input id="senha2" type="password" class="form-control" name="senha2" required>
                    </div>
                  </div>

                  <div class="form-divider">
                    Seu Endereço
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
                      <label for="cep">CEP</label>
                      <input id="cep" type="text" class="form-control" name="cep" placeholder="CEP">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="confirmar" class="custom-control-input" id="confirmar">
                      <label class="custom-control-label" for="confirmar">Ao clicar em Inscreva-se, você concorda com nossos Termos, Política de Dados e Política de Cookies.</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                      Inscreva-se
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; E_Web 2019
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>

</html>