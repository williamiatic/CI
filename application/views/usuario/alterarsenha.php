<body>
    <div id="app">
        <div class="main-content">
            <section class="section">
                <h1 class="section-header">
                    <div>Usuario</div>
                </h1>
                <div class="card card-primary">
                    <?php if (isset($this->session->texto)) { ?>
                        <div class="alert alert-<?php echo $this->session->type; ?>" role="alert">
                            <?php echo $this->session->texto; ?>
                        </div>
                    <?php }
                $this->session->unset_userdata('texto'); ?>

                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                                <form action="<?php echo base_url('index.php/usuario/AlterarSenha') ?>" method="POST" enctype="multipart/form-data">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4>Alterar Senha</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input id="email" type="email" class="form-control" name="email" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label for="senha1">Senha Atual</label>
                                                <input id="senha1" type="password" class="form-control" name="senha1" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label for="senha2">Nova Senha</label>
                                                <input id="senha2" type="password" class="form-control" name="senha2" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label for="senha3">Confirmar Nova Senha</label>
                                                <input id="senha3" type="password" class="form-control" name="senha3" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block">
                                                    Confirmar
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