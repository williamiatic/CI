<body>
  <div id="app">
    <div class="main-content">
      <section class="section">
        <h1 class="section-header">
          <div>Loja</div>
        </h1>
        <div class="container mt-5">
          <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
              <div class="card card-primary mt-5">
                <div class="card-header">
                  <h4>Cadastrar Loja</h4>
                </div>
                <div class="card-body">
                  <form action="../Loja/LojaCadastrar" method="POST" enctype="multipart/form-data">


                    <div class="row">
                      <div class="form-group col-6">
                        <label for="Loja">Loja</label>
                        <input id="Loja" type="text" class="form-control" name="Loja" autofocus>
                      </div>
                      <div class="form-group col-6">
                        <label for="CNPJ">CNPJ</label>
                        <input id="CNPJ" type="text" class="form-control" name="CNPJ" autofocus>
                      </div>
                    </div>


                    <div class="row">
                      <div class="form-group col-6">
                        <label for="Endereco">Endereço</label>
                        <input id="Endereco" type="text" class="form-control" name="Endereco">
                      </div>
                      <div class="form-group col-6">
                        <label for="Num_Endereco">Numero do Endereço</label>
                        <input id="Num_Endereco" type="number" class="form-control" name="Num_Endereco">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="Bairro">Bairro</label>
                        <input id="Bairro" type="text" class="form-control" name="Bairro">
                      </div>
                      <div class="form-group col-6">
                        <label for="Cep">CEP</label>
                        <input id="Cep" type="number" class="form-control" name="Cep">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="Cidade">Cidade</label>
                        <input id="Cidade" type="text" name="Cidade" class="form-control">
                      </div>
                      <div class="form-group col-6">
                        <label for="UF">UF</label>
                        <input id="UF" type="text" name="UF" class="form-control">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                        <label for="Telefone">Telefone</label>
                        <input id="Telefone" type="number" name="Telefone" class="form-control">
                      </div>
                      <div class="form-group col-6">
                        <label for="nm_imagem">Escolha uma Imagem</label>
                        <input id="nm_imagem" type="file" class="form-control" name="nm_imagem">
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