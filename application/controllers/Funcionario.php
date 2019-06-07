<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Funcionario extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function FuncionarioCadastrar()
    {
        $funcionario['nm_funcionario'] = $this->input->post('Funcionario');
        $funcionario['cpf'] = $this->input->post('CPF');
        $funcionario['email'] = $this->input->post('Email');
        $this->load->model('usuario_model');
        $email = $this->usuario_model->get_email($funcionario['email']);
        if ($email) {
            $this->session->texto = "Email ja Cadastrado!";
            $this->session->type = $this->session->type = "alert alert-info";
            redirect(base_url('index.php/pagina/CadastrarFuncionario'));
        }

        $this->load->model('funcionario_model');
        $email = $this->funcionario_model->get_email($funcionario['email']);
        if ($email) {
            $this->session->texto = "Email ja Cadastrado!";
            $this->session->type = $this->session->type = "alert alert-info";
            redirect(base_url('index.php/pagina/CadastrarFuncionario'));
        }
        $funcionario['cargo'] = $this->input->post('Cargo');
        $funcionario['salario'] = $this->input->post('Salario');
        $funcionario['carteiradetrabalho'] = $this->input->post('CarteiraDeTrabalho');
        $funcionario['nivelacesso'] = $this->input->post('NivelAcesso');
        date_default_timezone_set('America/Sao_Paulo');
        $funcionario['data_cadastro'] = $data = date('Y-m-d H:i:s');
        $funcionario['senha'] = md5($this->input->post('Senha'));
        $funcionario['empresa_id'] = $this->session->id;
        $dados['endereco'] = $this->input->post('Endereco');
        $dados['num_endereco'] = $this->input->post('NumEndereco');
        $dados['bairro'] = $this->input->post('Bairro');
        $dados['cep'] = $this->input->post('Cep');
        $dados['nm_cidade'] = $this->input->post('Cidade');
        $dados['nm_uf'] = $this->input->post('UF');
        $this->load->model('funcionario_model');
        $this->funcionario_model->Setfuncionario($funcionario, $dados);
        redirect('pagina/listarfuncionario');
    }

    public function deletarFuncionario()
    {
        $id = $this->uri->segment(3);
        $this->load->model('funcionario_model');
        $info = $this->funcionario_model->Delfuncionario($id);
        if (isset($info)) {
            $this->session->texto = "Funcionario Deletado Com Sucesso";
            $this->session->type = $this->session->type = "alert alert-info";
        } else {
            $this->session->texto = "Erro Ao Tentar Deletar Funcionario";
            $this->session->type = $this->session->type = "alert alert-info";
        }
        redirect(base_url("index.php/pagina/listarfuncionario"));
    }

    public function funcionarioAlterar()
    {
        $id = $this->uri->segment(3);
        $this->load->model('funcionario_model');
        $funcionario['nivelacesso'] = $this->input->post('nivelacesso');
        $funcionario['salario'] = $this->input->post('salario');
        $funcionario['cargo'] = $this->input->post('cargo');
        $funcionario['carteiradetrabalho'] = $this->input->post('carteiradetrabalho');
        $info = $this->funcionario_model->Alterfuncionario($funcionario, $id);
        if (isset($info)) {
            $this->session->texto = "Funcionario Alterado Com Sucesso!!!";
            $this->session->type = $this->session->type = "alert alert-info";;
        }
        redirect('pagina/listarfuncionario');
    }
}
