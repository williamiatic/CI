<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fornecedor extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function FornecedorCadastrar()
    {
        $fornecedor['nm_fornecedor'] = $this->input->post('fornecedor');
        $fornecedor['cnpj'] = $this->input->post('CNPJ');
        $fornecedor['empresa_id'] = $this->session->id;
        $dados['endereco'] = $this->input->post('Endereco');
        $dados['num_endereco'] = $this->input->post('Num_Endereco');
        $dados['bairro'] = $this->input->post('Bairro');
        $dados['cep'] = $this->input->post('Cep');
        $dados['nm_cidade'] = $this->input->post('Cidade');
        $dados['nm_uf'] = $this->input->post('UF');
        $config['upload_path'] = FCPATH . "assets/img/fornecedor";
        $config["allowed_types"] = "jpg|jpeg|png";
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->do_upload('nm_imagem');
        $info_arquivo = $this->upload->data();
        $fornecedor['nm_fornecedorfoto'] = $info_arquivo['file_name'];
        $this->load->model('fornecedor_model');
        $info = $this->fornecedor_model->SetFornecedor($fornecedor, $dados);

        if (isset($info)) {
            $this->session->texto = "Fornecedor Cadastrado Com Sucesso!!!";
            $this->session->type = $this->session->type = "alert alert-info";;
        }

        redirect('pagina/listarfornecedor');
    }

    public function deletarFornecedor()
    {
        $id = $this->uri->segment(3);
        $this->load->model('fornecedor_model');
        $fornecedor = $this->fornecedor_model->SelectProduto($id);
        if ($fornecedor) {
            $this->session->texto = "Erro Ao Tentar Deletar Fornecedor. Verifique Pedidos!";
            $this->session->type = $this->session->type = "alert alert-info";
            redirect(base_url("index.php/pagina/listarfornecedor"));
        } else {
            $info = $this->fornecedor_model->Delfornecedor($id);
            if (isset($info)) {
                $this->session->texto = "Fornecedor Deletado Com Sucesso";
                $this->session->type = $this->session->type = "alert alert-info";
            }
            redirect(base_url("index.php/pagina/listarfornecedor"));
        }
    }

    public function fornecedorAlterar()
    {
        $id = $this->uri->segment(3);
        $this->load->model('fornecedor_model');
        $fornecedor['nm_fornecedor'] = $this->input->post('fornecedor');
        $fornecedor['cnpj'] = $this->input->post('cnpj');
        $dadoscadastrais['endereco'] = $this->input->post('endereco');
        $dadoscadastrais['num_endereco'] = $this->input->post('num_endereco');
        $dadoscadastrais['nm_cidade'] = $this->input->post('nm_cidade');
        $dadoscadastrais['nm_uf'] = $this->input->post('nm_uf');
        $dadoscadastrais['bairro'] = $this->input->post('bairro');
        $dadoscadastrais['cep'] = $this->input->post('cep');
        $dadoscadastrais['telefone'] = $this->input->post('telefone');
        $config['upload_path'] = FCPATH . "assets/img/fornecedor";
        $config["allowed_types"] = "jpg|jpeg|png";
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->do_upload('nm_imagem');
        $info_arquivo = $this->upload->data();
        if ($info_arquivo['file_name'] == null) {
            $info = $this->fornecedor_model->Alterfornecedor($fornecedor, $dadoscadastrais, $id);
        } else {
            $fornecedor['nm_fornecedorfoto'] = $info_arquivo['file_name'];
            $info = $this->fornecedor_model->Alterfornecedor($fornecedor, $dadoscadastrais, $id);
        }
        if (isset($info)) {
            $this->session->texto = "Fornecedor Alterado Com Sucesso!!!";
            $this->session->type = $this->session->type = "alert alert-info";;
        }
        redirect('pagina/listarfornecedor');
    }
}
