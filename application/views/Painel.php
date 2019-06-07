<body>
  <div id="app">
    <div class="main-content">
      <section class="section">
        <h1 class="section-header">
          <div>Painel De Controle</div>
        </h1>
        <div class="row">
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Produtos Em Estoque</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $produtos; ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Gastos Totais</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo 'R$' . $gastos; ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Funcionarios</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $funcionario; ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="ion ion-ios-people fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pendencias</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pendencias ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Grafico Mensal</h6>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  Em Breve
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Novidades</h6>
              </div>
              <ul>
                <li>
                  <h6>Produtos</h6>
                </li>
                </h6>
                <ul>
                  <li>Cadastrar Produtos</li>
                  <li>Listar Produtos</li>
                  <li>Detalhes Produtos</li>
                  <li>Deletar Produtos</li>
                  <li>Alterar Produtos</li>
                </ul>
                <li>
                  <h6>Fornecedor</h6>
                </li>
                <ul>
                  <li>Cadastrar Fornecedor</li>
                  <li>Listar Fornecedor</li>
                  <li>Detalhes Fornecedor</li>
                  <li>Deletar Fornecedor</li>
                  <li>Alterar Fornecedor</li>
                </ul>
                <li>
                  <h6>Transportadora</h6>
                </li>
                <ul>
                  <li>Cadastrar Transportadora</li>
                  <li>Listar Transportadora</li>
                  <li>Detalhes Transportadora</li>
                  <li>Deletar Transportadora</li>
                  <li>Alterar Transportadora</li>
                </ul>
                <li>
                  <h6>Lojas</h6>
                </li>
                <ul>
                  <li>Cadastrar Lojas</li>
                  <li>Listar Lojas</li>
                  <li>Detalhes Lojas</li>
                  <li>Deletar Lojas</li>
                  <li>Alterar Lojas</li>
                </ul>
                <li>
                  <h6>Pedidos</h6>
                </li>
                <ul>
                  <li>Cadastrar Pedidos</li>
                  <li>Listar Pedidos</li>
                  <li>Concluir Pedidos</li>
                  <li>Listar Historico De Pedidos</li>
                  <li>Detalhes Pedidos</li>
                  <li>Deletar Pedidos</li>
                  <li>Alterar Pedidos</li>
                </ul>
                <h6>Envios</h6>
                </li>
                <ul>
                  <li>Cadastrar Envios</li>
                  <li>Listar Envios</li>
                  <li>Concluir Envios</li>
                  <li>Listar Historico De Envios</li>
                  <li>Detalhes Envios</li>
                  <li>Deletar Envios</li>
                  <li>Alterar Envios</li>
                </ul>
                <li>
                  <h6>Funcionarios</h6>
                </li>
                <ul>
                  <li>Cadastrar Funcionarios</li>
                  <li>Listar Funcionarios</li>
                  <li>Detalhes Funcionarios</li>
                  <li>Deletar Funcionarios</li>
                  <li>Alterar Funcionarios</li>
                </ul>
                <li>
                  <h6>Usuarios</h6>
                </li>
                <ul>
                  <li>Alterar Dados</li>
                  <li>Alterar Senha</li>
                  <li>Alterar Foto</li>
                </ul>
              </ul>
            </div>
          </div>
        </div>
    </div>

  </div>
  </div>
</body>