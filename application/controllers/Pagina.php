<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pagina extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    // Load da Tela Inicial(HomePage)
    public function index()
    {
        $dados['titulo'] = "Home &mdash; E_Web";
        $this->load->view('Home', $dados);
    }

    // Load Da Tela de Login
    public function login()
    {
        if ($this->session->id) {
            redirect('pagina/painel');
        } else {
            $dados['titulo'] = "Login &mdash; E_Web";
            $this->load->view('login/login', $dados);
        }
    }

    // Load da Tela de Cadastrar

    public function register()
    {
        $dados['titulo'] = "Registrar &mdash; E_Web";
        $this->load->view('login/Register', $dados);
    }

    // Load da Tela de Esqueceu a Senha
    public function Forgot()
    {
        $dados['titulo'] = "Esqueci A Senha &mdash; E_Web";
        $this->load->view('login/forgot', $dados);
    }

    // Load da Tela de Perfil
    public function Perfil()
    {
        if ($this->session->id) {
            $this->load->model('painel_model');
            $this->load->model('usuario_model');
            $dados['usuario'] = $this->usuario_model->GetUsuario();
            $dados['titulo'] = "Perfil &mdash; E_Web";
            $this->load->view('include/header', $dados);
            $this->load->view('perfil');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    // Load da Tela de Alterarsenha
    public function AlterarSenha()
    {
        if ($this->session->id) {
            $dados['titulo'] = "Alterar Senha &mdash; E_Web";
            $this->load->view('include/header', $dados);
            $this->load->view('usuario/alterarsenha');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    // Load da Tela de Painel
    public function Painel()
    {
        if ($this->session->id) {
            $this->load->model('painel_model');
            $dados['titulo'] = "Painel &mdash; E_Web";
            $dados['funcionario'] = $this->painel_model->CountAllFuncionarios();
            $dados['produtos'] = $this->painel_model->CountQuantidadeProdutos();
            $dados['pendencias'] = $this->painel_model->CountPendencias();
            $dados['gastos'] = $this->painel_model->CountGastos();
            $this->load->view('include/header', $dados);
            $this->load->view('painel');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    public function AlterarUsuario()
    {
        if ($this->session->id) {
            $id = $this->uri->segment(3);
            $this->load->model('usuario_model');
            $dados['titulo'] = "Usuario &mdash; E_Web";
            $dados['id'] = $id;
            $dados['usuario'] = $this->usuario_model->GetAll();
            $this->load->view('include/header', $dados);
            if ($this->session->set_funcionario) { } else {
                $this->load->view('usuario/alterarusuario');
            }
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    public function AlterarFoto()
    {
        if ($this->session->id) {
            $id = $this->uri->segment(3);
            $this->load->model('usuario_model');
            $dados['titulo'] = "Usuario &mdash; E_Web";
            $dados['id'] = $id;
            $dados['usuario'] = $this->usuario_model->GetAll();
            $this->load->view('include/header', $dados);
            $this->load->view('usuario/alterarfoto');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    // Load da Tela de Listar Produtos
    public function ListarProdutos()
    {
        if ($this->session->id) {
            $this->load->model('produto_model');
            $this->load->model('paginacao_model');
            $dados['titulo'] = "Produtos &mdash; E_Web";
            // Paginação com CodeIgniter e BootStrap
            $paginacao = array(
                'model' => 'produto_model',
                'url' => 'index.php/pagina/ListarProdutos',
                'totalrows' => $this->produto_model->CountAll()
            );
            $config = $this->paginacao_model->paginacao($paginacao);
            $this->pagination->initialize($config);
            $dados['pagination'] = $this->pagination->create_links();
            $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $dados['produtos'] = $this->produto_model->GetAll("id_produto", "asc", $config['per_page'], $offset);
            $this->load->view('include/header', $dados);
            $this->load->view('produtos/listarprodutos');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    public function ListarProdutosEstoque()
    {
        if ($this->session->id) {
            $this->load->model('produto_model');
            $this->load->model('paginacao_model');
            $dados['titulo'] = "Produtos &mdash; E_Web";
            // Paginação com CodeIgniter e BootStrap
            $paginacao = array(
                'model' => 'produto_model',
                'url' => 'index.php/pagina/ListarProdutosEstoque',
                'totalrows' => $this->produto_model->CountAllEstoque()
            );
            $config = $this->paginacao_model->paginacao($paginacao);
            $this->pagination->initialize($config);
            $dados['pagination'] = $this->pagination->create_links();
            $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $dados['produtos'] = $this->produto_model->GetAllEstoque("id_produto", "asc", $config['per_page'], $offset);
            $this->load->view('include/header', $dados);
            $this->load->view('produtos/listarprodutosestoque');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    // Load Da Tela de Cadastrar Produtos
    public function CadastrarProdutos()
    {
        if ($this->session->id) {
            $this->load->model('produto_model');
            $this->load->model('fornecedor_model');
            $dados['fornecedor'] = $this->fornecedor_model->GetFornecedor();
            $dados['categoria'] = $this->produto_model->GetCategoria();
            $dados['titulo'] = "Cadastrar Produtos &mdash; E_Web";
            $this->load->view('include/header', $dados);
            $this->load->view('produtos/Cadastrarprodutos');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    public function DetalhesProdutos()
    {
        if ($this->session->id) {
            $id = $this->uri->segment(3);
            $this->load->model('produto_model');
            $dados['titulo'] = "Produtos &mdash; E_Web";
            $dados['produtos'] = $this->produto_model->GetProdutosDetalhes($id);
            $this->load->view('include/header', $dados);
            $this->load->view('produtos/detalhesprodutos');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    public function AlterarProdutos()
    {
        if ($this->session->id) {
            $id = $this->uri->segment(3);
            $this->load->model('produto_model');
            $this->load->model('fornecedor_model');
            $this->load->model('transportadora_model');
            $dados['titulo'] = "Produtos &mdash; E_Web";
            $dados['id'] = $id;
            $dados['produtos'] = $this->produto_model->GetProdutosDetalhes($id);
            $dados['categoria'] = $this->produto_model->GetCategoria();
            $dados['fornecedor'] = $this->fornecedor_model->GetAll();
            $dados['transportadora'] = $this->transportadora_model->GetAll();
            $this->load->view('include/header', $dados);
            $this->load->view('produtos/alterarprodutos');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    // Load Da Tela de Cadastrar Transportadora
    public function CadastrarTransportadora()
    {
        if ($this->session->id) {
            $dados['titulo'] = "Cadastrar Transportadora &mdash; E_Web";
            $this->load->view('include/header', $dados);
            $this->load->view('transportadora/Cadastrartransportadora');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    // Load Da Tela de Listar Transportadora
    public function ListarTransportadora()
    {
        if ($this->session->id) {
            $this->load->model('transportadora_model');
            $dados['titulo'] = "Cadastrar Transportadora &mdash; E_Web";
            $this->load->model('paginacao_model');
            // Paginação com CodeIgniter e BootStrap
            $paginacao = array(
                'model' => 'transportadora_model',
                'url' => 'index.php/pagina/listartransportadora',
                'totalrows' => $this->transportadora_model->CountAll()
            );
            $config = $this->paginacao_model->paginacao($paginacao);
            $this->pagination->initialize($config);
            $dados['pagination'] = $this->pagination->create_links();
            $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $dados['transportadora'] = $this->transportadora_model->GetAll("id_transportadora", "asc", $config['per_page'], $offset);
            $this->load->view('include/header', $dados);
            $this->load->view('Transportadora/listarTransportadora');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    public function DetalhesTransportadora()
    {
        if ($this->session->id) {
            $id = $this->uri->segment(3);
            $this->load->model('transportadora_model');
            $dados['titulo'] = "Transportadora &mdash; E_Web";
            $dados['transportadora'] = $this->transportadora_model->GetTransportadoraDetalhes($id);
            $this->load->view('include/header', $dados);
            $this->load->view('transportadora/detalhestransportadora');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    public function AlterarTransportadora()
    {
        if ($this->session->id) {
            $id = $this->uri->segment(3);
            $this->load->model('transportadora_model');
            $dados['titulo'] = "Transportadora &mdash; E_Web";
            $dados['transportadora'] = $this->transportadora_model->GetTransportadoraDetalhes($id);
            $this->load->view('include/header', $dados);
            $this->load->view('transportadora/alterartransportadora');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    // Load da Tela de Cadastrar Fornecedor
    public function CadastrarFornecedor()
    {
        if ($this->session->id) {
            $dados['titulo'] = "Cadastrar Fornecedor &mdash; E_Web";
            $this->load->view('include/header', $dados);
            $this->load->view('fornecedor/Cadastrarfornecedor');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }
    // Load Da Tela de Listar Fornecedor
    public function ListarFornecedor()
    {
        if ($this->session->id) {
            $this->load->model('fornecedor_model');
            $dados['titulo'] = "Fornecedores &mdash; E_Web";
            $this->load->model('paginacao_model');
            // Paginação com CodeIgniter e BootStrap
            $paginacao = array(
                'model' => 'fornecedor_model',
                'url' => 'index.php/pagina/listarfornecedor',
                'totalrows' => $this->fornecedor_model->CountAll()
            );
            $config = $this->paginacao_model->paginacao($paginacao);
            $this->pagination->initialize($config);
            $dados['pagination'] = $this->pagination->create_links();
            $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $dados['fornecedor'] = $this->fornecedor_model->GetAll("id_fornecedor", "asc", $config['per_page'], $offset);
            $this->load->view('include/header', $dados);
            $this->load->view('fornecedor/listarfornecedor');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    public function DetalhesFornecedor()
    {
        if ($this->session->id) {
            $id = $this->uri->segment(3);
            $this->load->model('fornecedor_model');
            $dados['titulo'] = "Fornecedor &mdash; E_Web";
            $dados['fornecedor'] = $this->fornecedor_model->GetfornecedorDetalhes($id);
            $this->load->view('include/header', $dados);
            $this->load->view('fornecedor/detalhesfornecedor');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    public function AlterarFornecedor()
    {
        if ($this->session->id) {
            $id = $this->uri->segment(3);
            $this->load->model('fornecedor_model');
            $dados['titulo'] = "fornecedor &mdash; E_Web";
            $dados['fornecedor'] = $this->fornecedor_model->GetFornecedorDetalhes($id);
            $this->load->view('include/header', $dados);
            $this->load->view('fornecedor/alterarfornecedor');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    // Load da Tela de Cadastrar Loja
    public function CadastrarLoja()
    {
        if ($this->session->id) {
            $dados['titulo'] = "Cadastrar Loja &mdash; E_Web";
            $this->load->view('include/header', $dados);
            $this->load->view('lojas/cadastrarloja');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    //Load da Tela de Listar Loja
    public function ListarLoja()
    {
        if ($this->session->id) {
            $this->load->model('loja_model');
            $dados['titulo'] = "Loja &mdash; E_Web";
            $this->load->model('paginacao_model');
            // Paginação com CodeIgniter e BootStrap
            $paginacao = array(
                'model' => 'loja_model',
                'url' => 'index.php/pagina/listarloja',
                'totalrows' => $this->loja_model->CountAll()
            );
            $config = $this->paginacao_model->paginacao($paginacao);
            $this->pagination->initialize($config);
            $dados['pagination'] = $this->pagination->create_links();
            $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $dados['loja'] = $this->loja_model->GetAll("id_loja", "asc", $config['per_page'], $offset);
            $this->load->view('include/header', $dados);
            $this->load->view('lojas/listarloja');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    public function DetalhesLoja()
    {
        if ($this->session->id) {
            $id = $this->uri->segment(3);
            $this->load->model('loja_model');
            $dados['titulo'] = "Loja &mdash; E_Web";
            $dados['loja'] = $this->loja_model->GetLojaDetalhes($id);
            $this->load->view('include/header', $dados);
            $this->load->view('lojas/detalhesloja');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    public function Alterarloja()
    {
        if ($this->session->id) {
            $id = $this->uri->segment(3);
            $this->load->model('loja_model');
            $dados['titulo'] = "loja &mdash; E_Web";
            $dados['loja'] = $this->loja_model->GetlojaDetalhes($id);
            $this->load->view('include/header', $dados);
            $this->load->view('lojas/alterarloja');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    // Load da Tela de Cadastrar Pedido
    public function CadastrarPedido()
    {
        if ($this->session->id) {
            $this->load->model('pedido_model');
            $dados['produtos'] = $this->pedido_model->GetProdutoFornecedor();
            $dados['titulo'] = "Cadastrar Pedido &mdash; E_Web";
            $this->load->view('include/header', $dados);
            $this->load->view('pedido/cadastrarpedido');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    //Load da Tela de Listar Pedido
    public function ListarPedido()
    {
        if ($this->session->id) {
            $this->load->model('pedido_model');
            $dados['titulo'] = "pedido &mdash; E_Web";
            $this->load->model('paginacao_model');
            // Paginação com CodeIgniter e BootStrap
            $paginacao = array(
                'model' => 'pedido_model',
                'url' => 'index.php/pagina/listarpedido',
                'totalrows' => $this->pedido_model->CountAll()
            );
            $config = $this->paginacao_model->paginacao($paginacao);
            $this->pagination->initialize($config);
            $dados['pagination'] = $this->pagination->create_links();
            $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $dados['pedido'] = $this->pedido_model->GetAll("id_entrada", "asc", $config['per_page'], $offset);
            $this->load->view('include/header', $dados);
            $this->load->view('pedido/listarpedido');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    public function ListarHistoricopedido()
    { // Historico de Pedidos Concluidos
        if ($this->session->id) {
            $this->load->model('pedido_model');
            $dados['titulo'] = "pedido &mdash; E_Web";
            $this->load->model('paginacao_model');
            // Paginação com CodeIgniter e BootStrap
            $paginacao = array(
                'model' => 'pedido_model',
                'url' => 'index.php/pagina/listarHistoricopedido',
                'totalrows' => $this->pedido_model->CountAllHistorico()
            );
            $config = $this->paginacao_model->paginacao($paginacao);
            $this->pagination->initialize($config);
            $dados['pagination'] = $this->pagination->create_links();
            $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $dados['pedido'] = $this->pedido_model->GetAllHistorico("id_entrada", "asc", $config['per_page'], $offset);
            $this->load->view('include/header', $dados);
            $this->load->view('pedido/listarhistorico');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    public function DetalhesPedido()
    {
        if ($this->session->id) {
            $id = $this->uri->segment(3);
            $this->load->model('pedido_model');
            $dados['titulo'] = "Pedido &mdash; E_Web";
            $dados['pedido'] = $this->pedido_model->GetPedidoDetalhes($id);
            $this->load->view('include/header', $dados);
            $this->load->view('pedido/detalhespedido');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    public function AlterarPedido()
    {
        if ($this->session->id) {
            $id = $this->uri->segment(3);
            $this->load->model('pedido_model');
            $this->load->model('transportadora_model');
            $dados['titulo'] = "Pedidos &mdash; E_Web";
            $dados['pedido'] = $this->pedido_model->GetPedidoDetalhes($id);
            $dados['transportadora'] = $this->transportadora_model->Getall($id);
            $this->load->view('include/header', $dados);
            $this->load->view('pedido/alterarpedido');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    // Load da Tela de Cadastrar Envio
    public function CadastrarEnvio()
    {
        if ($this->session->id) {
            $this->load->model('envio_model');
            $this->load->model('loja_model');
            $this->load->model('transportadora_model');
            $dados['transportadora'] = $this->transportadora_model->Getall();
            $dados['produtos'] = $this->envio_model->GetProdutoFornecedor();
            $dados['loja'] = $this->loja_model->Getall();
            $dados['titulo'] = "Cadastrar Envio &mdash; E_Web";
            $this->load->view('include/header', $dados);
            $this->load->view('envio/cadastrarenvio');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    //Load da Tela de Listar Envio
    public function ListarEnvio()
    {
        if ($this->session->id) {
            $this->load->model('envio_model');
            $dados['titulo'] = "Envio &mdash; E_Web";
            $this->load->model('paginacao_model');
            // Paginação com CodeIgniter e BootStrap
            $paginacao = array(
                'model' => 'envio_model',
                'url' => 'index.php/pagina/listarenvio',
                'totalrows' => $this->envio_model->CountAll()
            );
            $config = $this->paginacao_model->paginacao($paginacao);
            $this->pagination->initialize($config);
            $dados['pagination'] = $this->pagination->create_links();
            $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $dados['envio'] = $this->envio_model->GetAll("id_saida", "asc", $config['per_page'], $offset);
            $this->load->view('include/header', $dados);
            $this->load->view('envio/listarenvio');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    public function ListarHistoricoEnvio()
    {
        if ($this->session->id) {
            $this->load->model('envio_model');
            $dados['titulo'] = "Envio &mdash; E_Web";
            $this->load->model('paginacao_model');
            // Paginação com CodeIgniter e BootStrap
            $paginacao = array(
                'model' => 'envio_model',
                'url' => 'index.php/pagina/listarenvio',
                'totalrows' => $this->envio_model->CountAllHistorico()
            );
            $config = $this->paginacao_model->paginacao($paginacao);
            $this->pagination->initialize($config);
            $dados['pagination'] = $this->pagination->create_links();
            $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $dados['envio'] = $this->envio_model->GetAllHistorico("id_saida", "asc", $config['per_page'], $offset);
            $this->load->view('include/header', $dados);
            $this->load->view('envio/listarhistoricoenvio');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    public function DetalhesEnvio()
    {
        if ($this->session->id) {
            $id = $this->uri->segment(3);
            $this->load->model('envio_model');
            $dados['titulo'] = "Envio &mdash; E_Web";
            $dados['envio'] = $this->envio_model->GetDetalhesEnvio($id);
            $this->load->view('include/header', $dados);
            $this->load->view('envio/detalhesenvio');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    public function AlterarEnvio()
    {
        if ($this->session->id) {
            $id = $this->uri->segment(3);
            $this->load->model('envio_model');
            $this->load->model('transportadora_model');
            $dados['titulo'] = "Envio &mdash; E_Web";
            $dados['envio'] = $this->envio_model->GetDetalhesEnvio($id);
            $dados['transportadora'] = $this->transportadora_model->Getall();
            $this->load->view('include/header', $dados);
            $this->load->view('envio/alterarenvio');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    // Load da Tela de Cadastrar Usuario
    public function CadastrarFuncionario()
    {
        if ($this->session->id) {
            $dados['titulo'] = "Cadastrar Funcionario &mdash; E_Web";
            $this->load->view('include/header', $dados);
            $this->load->view('funcionario/cadastrarfuncionario');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    //Load da Tela de Listar Usuario
    public function ListarFuncionario()
    {
        if ($this->session->id) {
            $this->load->model('funcionario_model');
            $dados['titulo'] = "Funcionario &mdash; E_Web";
            $this->load->model('paginacao_model');
            // Paginação com CodeIgniter e BootStrap
            $paginacao = array(
                'model' => 'funcionario_model',
                'url' => 'index.php/pagina/listarfuncionario',
                'totalrows' => $this->funcionario_model->CountAll()
            );
            $config = $this->paginacao_model->paginacao($paginacao);
            $this->pagination->initialize($config);
            $dados['pagination'] = $this->pagination->create_links();
            $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $dados['funcionario'] = $this->funcionario_model->GetAll("id_funcionario", "asc", $config['per_page'], $offset);
            $this->load->view('include/header', $dados);
            $this->load->view('funcionario/listarfuncionario', $dados);
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    public function DetalhesFuncionario()
    {
        if ($this->session->id) {
            $id = $this->uri->segment(3);
            $this->load->model('funcionario_model');
            $dados['titulo'] = "Funcionario &mdash; E_Web";
            $dados['funcionario'] = $this->funcionario_model->GetDetalhesFuncionario($id);
            $this->load->view('include/header', $dados);
            $this->load->view('funcionario/detalhesfuncionario');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }

    public function AlterarFuncionario()
    {
        if ($this->session->id) {
            $id = $this->uri->segment(3);
            $this->load->model('funcionario_model');
            $this->load->model('funcionario_model');
            $dados['titulo'] = "Funcionario &mdash; E_Web";
            $dados['funcionario'] = $this->funcionario_model->GetDetalhesfuncionario($id);
            $this->load->view('include/header', $dados);
            $this->load->view('funcionario/alterarfuncionario');
            $this->load->view('include/footer');
        } else {
            redirect(base_url('index.php/pagina/login'));
        }
    }
}
