<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Pagina';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Telas
$route['forgot'] = 'login/forgot'; // Esqueci a Senha
$route['painel'] = 'Painel'; // Painel de Controle

$route['perfil'] = 'perfil'; // Painel de Controle

//Usuarios
$route['login'] = 'login/login'; // Logar
$route['register/(:num)'] = 'register/$1'; // Tela de Cadastrar
$route['alterarusuario'] = 'alterarusuario';
$route['alterarsenha'] = 'alterarsenha';
$route['alterarfoto'] = 'alterarfoto';

//Produtos
$route['cadastrarprodutos'] = 'cadastrarprodutos'; 
$route['listarprodutos'] = 'listarprodutos';
$route['Produto'] = 'produto';
$route['detalhesprodutos'] = 'detalhesprodutos';
$route['AlterarProdutos'] = 'alterarprodutos';


// Fornecedor

$route['cadastrarfornecedor'] = 'cadastrarfornecedor'; 
$route['listarfornecedor'] = 'listarfornecedor';
$route['detalhesfornecedor'] = 'detalhesfornecedor';
$route['Alterarfornecedor'] = 'alterarfornecedor';

// Transportadora

$route['cadastrartransportadora'] = 'cadastrartransportadora'; 
$route['listartransportadora'] = 'listartransportadora';
$route['detalhestransportadora'] = 'detalhestransportadora';
$route['alterartransportadora'] = 'alterartransportadora';

// Loja

$route['cadastrarloja'] = 'cadastrarloja'; 
$route['listarloja'] = 'listarloja';
$route['detalhesloja'] = 'detalhesloja';
$route['alterarloja'] = 'alterarloja';

// Pedido

$route['cadastrarpedido'] = 'cadastrarpedido'; 
$route['listarpedido'] = 'listarpedido';
$route['listarhistorico'] = 'listarhistorico';
$route['detalhespedido'] = 'detalhespedido';
$route['alterarpedido'] = 'alterarpedido';

// Envio

$route['cadastrarenvio'] = 'cadastrarenvio'; 
$route['listarenvio'] = 'listarenvio';
$route['listarhistoricoenvio'] = 'listarhistoricoenvio';
$route['detalhesenvio'] = 'detalhesenvio';
$route['alterarenvio'] = 'alterarenvio';

// Funcionario

$route['cadastrarfuncionario'] = 'cadastrarfuncionario'; 
$route['listarfuncionario'] = 'listarfuncionario';
$route['detalhesfuncionario'] = 'detalhesfuncionario';
$route['alterarfuncionario'] = 'alterarfuncionario';

