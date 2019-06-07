<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title><?php echo $titulo ?></title>

  <link rel="stylesheet" href="<?php echo base_url('assets/modules/bootstrap/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/ionicons/css/ionicons.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/demo.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              E_Web
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h4>Esqueci a Senha</h4>
              </div>

              <div class="card-body">
                <p class="text-muted">Vamos enviar um link para redefinir sua senha</p>
                <form method="POST">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" required autofocus>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                      Esqueci a Senha
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