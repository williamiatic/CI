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

  <script src="<?php echo base_url('assets/modules/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/modules/popper.js') ?> "></script>
  <script src="<?php echo base_url('assets/modules/tooltip.js') ?> "></script>
  <script src="<?php echo base_url('assets/modules/bootstrap/js/bootstrap.min.js') ?> "></script>
  <script src="<?php echo base_url('assets/modules/nicescroll/jquery.nicescroll.min.js') ?> "></script>
  <script src="<?php echo base_url('assets/modules/moment.min.js') ?> "></script>
  <script src="<?php echo base_url('assets/modules/scroll-up-bar/dist/scroll-up-bar.min.js') ?> "></script>
  <script src="<?php echo base_url('assets/js/sa-functions.js') ?> "></script>
  <script src="<?php echo base_url('assets/js/scripts.js') ?> "></script>

</head>
<div class="main-wrapper">
  <div class="navbar-bg"></div>
  <nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="ion ion-navicon-round"></i></a>
        </li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="ion ion-search"></i></a></li>
      </ul>
      <div class="search-element">
        <input class="form-control" type="search" placeholder="Pesquisar">
        <button class="btn" type="submit"><i class="ion ion-search"></i></button>
      </div>
    </form>
    <ul class="navbar-nav navbar-right">
      <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="ion ion-ios-bell-outline"></i></a>
        <div class="dropdown-menu dropdown-list dropdown-menu-right">
          <div class="dropdown-header">Notificações
            <div class="float-right">
              <a href="#">Ver Todos</a>
            </div>
          </div>
          <div class="dropdown-list-content">
            <a href="#" class="dropdown-item dropdown-item-unread">
              <img alt="image" src="<?php echo base_url('assets/img/avatar/eweb.jpg') ?>" class="rounded-circle dropdown-item-img">
              <div class="dropdown-item-desc">
                <b>William</b> Atualizou <b>O Pedido</b> de <b>Produtos</b>
                <div class="time">10 Horas Atras</div>
              </div>
            </a>
            <a href="#" class="dropdown-item dropdown-item-unread">
              <img alt="image" src="<?php echo base_url('assets/img/avatar/eweb.jpg') ?>" class="rounded-circle dropdown-item-img">
              <div class="dropdown-item-desc">
                <b>William</b> Atualizou <b>O Pedido</b> de <b>Produtos</b>
                <div class="time">10 Horas Atras</div>
              </div>
            </a>
            <a href="#" class="dropdown-item">
              <img alt="image" src="<?php echo base_url('assets/img/avatar/eweb.jpg') ?>" class="rounded-circle dropdown-item-img">
              <div class="dropdown-item-desc">
                <b>William</b> Atualizou <b>O Pedido</b> de <b>Produtos</b>
                <div class="time">10 Horas Atras</div>
              </div>
            </a>
            <a href="#" class="dropdown-item">
              <img alt="image" src="<?php echo base_url('assets/img/avatar/eweb.jpg') ?>" class="rounded-circle dropdown-item-img">
              <div class="dropdown-item-desc">
                <b>William</b> Atualizou <b>O Pedido</b> de <b>Produtos</b>
                <div class="time">10 Horas Atras</div>
              </div>
            </a>
            <a href="#" class="dropdown-item">
              <img alt="image" src="<?php echo base_url('assets/img/avatar/eweb.jpg') ?>" class="rounded-circle dropdown-item-img">
              <div class="dropdown-item-desc">
                <b>William</b> Atualizou <b>O Pedido</b> de <b>Produtos</b>
                <div class="time">10 Horas Atras</div>
              </div>
            </a>
          </div>
        </div>
      </li>
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
          <i class="ion ion-android-person d-lg-none"></i>
          <div class="d-sm-none d-lg-inline-block">Olá, <?php echo $this->session->set_nome ?></div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="<?php echo base_url("index.php/pagina/perfil") ?>" class="dropdown-item has-icon">
            <i class="ion ion-android-person"></i> Perfil
          </a>
          <a href="<?php echo base_url("index.php/usuario/logout") ?>" class="dropdown-item has-icon">
            <i class="ion ion-log-out"></i> Sair
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <div class="main-sidebar ">
    <aside id="sidebar-wrapper">
      <div class="sidebar-user">
        <div class="sidebar-user-picture">
          <a href="<?php echo base_url("index.php/pagina/alterarfoto") ?>"> <img alt="image" src="<?php echo base_url('assets/img/avatar/' . $this->session->set_foto) ?>"></a>
        </div>
        <div class="sidebar-user-details">
          <div class="user-name"><?php echo $this->session->set_nome ?></div>
          <div class="user-role">
            <?php echo $this->session->set_cargo ?>
          </div>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Painel de Controle</li>
        <li>
          <a href="<?php echo base_url("index.php/pagina/painel") ?>"><i class="ion ion-stats-bars"></i><span>Painel de Controle</span></a>
        </li>

        <li class="menu-header">Paginas</li>
        <li>
          <a href="#" class="has-dropdown"><i class="ion ion-bag"></i><span>Produtos</span></a>
          <ul class="menu-dropdown">
            <li><a href=<?php echo base_url("index.php/pagina/cadastrarprodutos") ?>><i class="ion ion-ios-circle-outline"></i> Cadastrar Produtos</a></li>
            <li><a href=<?php echo base_url("index.php/pagina/listarprodutos") ?>><i class="ion ion-ios-circle-outline"></i>Produtos Cadastrados</a></li>
            <li><a href=<?php echo base_url("index.php/pagina/listarprodutosestoque") ?>><i class="ion ion-ios-circle-outline"></i>Produtos Em Estoque</a></li>
          </ul>
        </li>

        <li>
          <a href="#" class="has-dropdown"><i class="ion ion-bag"></i><span>Fornecedores</span></a>
          <ul class="menu-dropdown">
            <li><a href=<?php echo base_url("index.php/pagina/cadastrarfornecedor") ?>><i class="ion ion-ios-circle-outline"></i> Cadastrar Fornecedor</a></li>
            <li><a href=<?php echo base_url("index.php/pagina/listarfornecedor") ?>><i class="ion ion-ios-circle-outline"></i> Listar Fornecedor</a></li>
          </ul>
        </li>

        <li>
          <a href="#" class="has-dropdown"><i class="ion ion-ios-albums-outline"></i><span>Transportadoras</span></a>
          <ul class="menu-dropdown">
            <li><a href="<?php echo base_url("index.php/pagina/cadastrartransportadora") ?>"><i class="ion ion-ios-circle-outline"></i> Cadastrar Transportadora</a></li>
            <li><a href=<?php echo base_url("index.php/pagina/listartransportadora") ?>><i class="ion ion-ios-circle-outline"></i> Listar Transportadoras</a></li>
          </ul>
        </li>

        <li>
          <a href="#" class="has-dropdown"><i class="ion ion-ios-albums-outline"></i><span>Lojas</span></a>
          <ul class="menu-dropdown">
            <li><a href="<?php echo base_url("index.php/pagina/cadastrarloja") ?>"><i class="ion ion-ios-circle-outline"></i> Cadastrar Loja</a></li>
            <li><a href="<?php echo base_url("index.php/pagina/listarloja") ?>"><i class="ion ion-ios-circle-outline"></i> Listar Lojas</a></li>
          </ul>
        </li>

        <li>
          <a href="#" class="has-dropdown"><i class="ion ion-ios-albums-outline"></i><span>Pedidos</span></a>
          <ul class="menu-dropdown">
            <li><a href="<?php echo base_url("index.php/pagina/cadastrarpedido") ?>"><i class="ion ion-ios-circle-outline"></i> Cadastrar Pedidos</a></li>
            <li><a href="<?php echo base_url("index.php/pagina/listarpedido") ?>"><i class="ion ion-ios-circle-outline"></i> Listar Pedidos</a></li>
            <li><a href="<?php echo base_url("index.php/pagina/listarhistoricopedido") ?>"><i class="ion ion-ios-circle-outline"></i> Historico Pedidos</a></li>
          </ul>
        </li>
        <li>
          <a href="#" class="has-dropdown"><i class="ion ion-ios-albums-outline"></i><span>Envios</span></a>
          <ul class="menu-dropdown">
            <li><a href="<?php echo base_url("index.php/pagina/cadastrarenvio") ?>"><i class="ion ion-ios-circle-outline"></i> Cadastrar Envio</a></li>
            <li><a href="<?php echo base_url("index.php/pagina/listarenvio") ?>"><i class="ion ion-ios-circle-outline"></i> Listar Envios</a></li>
            <li><a href="<?php echo base_url("index.php/pagina/listarhistoricoenvio") ?>"><i class="ion ion-ios-circle-outline"></i> Listar Historico</a></li>
          </ul>
        </li>
        <li>
          <a href="#" class="has-dropdown"><i class="ion ion-ios-people"></i><span>Funcionarios</span></a>
          <span class="oi oi-person"></span>
          <ul class="menu-dropdown">
            <li><a href="<?php echo base_url("index.php/pagina/cadastrarfuncionario") ?>"><i class="ion ion-ios-circle-outline"></i> Cadastrar Funcionario</a></li>
            <li><a href="<?php echo base_url("index.php/pagina/listarfuncionario") ?>"><i class="ion ion-ios-circle-outline"></i> Listar Funcionarios</a></li>
          </ul>
        </li>

        <li class="menu-header">Mais</li>
        <li>
          <a href="#"><i class="ion ion-ios-albums-outline"></i> Fale Conosco</a>
          <a href="#"><i class="ion ion-ios-albums-outline"></i> Sobre Nós</a>
      </ul>
    </aside>
  </div>
</div>
</div>
</body>

</html>