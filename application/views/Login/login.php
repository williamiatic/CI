<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <title><?php echo $titulo ?></title>

  <link rel="stylesheet" href="<?php echo base_url('assets/modules/bootstrap/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/ionicons/css/ionicons.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') ?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/css/demo.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">
</head>

<body>
  <div id="login">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              E_Web
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h4>Login</h4>
              </div>
              <div class="card-body">

                <?php if (isset($this->session->texto)) { ?>
                  <div class="<?php echo $this->session->type; ?>" role="alert">
                    <?php echo $this->session->texto; ?>
                  </div>
                <?php }
              $this->session->unset_userdata('texto');
              $this->session->unset_userdata('type'); ?>

                <form method="POST" action="<?php echo base_url('index.php/usuario/Autenticar') ?> " class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" tabindex="1" name="email" required autofocus>
                    <div class="invalid-feedback">
                      Por favor Preencha o seu email corretamente
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="senha" class="d-block">Senha
                      <input id="senha" type="password" class="form-control" name="senha" tabindex="2" required>
                      <div class="invalid-feedback">
                        Por favor preencha sua senha
                      </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Lembre me</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="float-right">
                      <a href="forgot">
                        Esqueceu a Senha?
                      </a>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Não tem um cadastro? <a href="<?php echo base_url('index.php/pagina/register') ?>">Crie Aqui</a>
            </div>
            <div class="simple-footer">
              Copyright &copy; E_Web
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>

</html>