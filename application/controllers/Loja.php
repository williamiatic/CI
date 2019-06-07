<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loja extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function lojaCadastrar()
    {
        $loja['nm_loja'] = $this->input->post('Loja');
        $loja['cnpj'] = $this->input->post('CNPJ');
        $loja['empresa_id'] = $this->session->id;
        $dados['endereco'] = $this->input->post('Endereco');
        $dados['num_endereco'] = $this->input->post('Num_Endereco');
        $dados['bairro'] = $this->input->post('Bairro');
        $dados['cep'] = $this->input->post('Cep');
        $dados['nm_cidade'] = $this->input->post('Cidade');
        $dados['nm_uf'] = $this->input->post('UF');
        $dados['telefone'] = $this->input->post('Telefone');
        $config['upload_path'] = FCPATH . "assets/img/loja";
        $config["allowed_types"] = "jpg|jpeg|png";
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->do_upload('nm_imagem');
        $info_arquivo = $this->upload->data();
        $loja['nm_foto'] = $info_arquivo['file_name'];
        $this->load->model('loja_model');
        $info = $this->loja_model->Setloja($loja, $dados);

        if (isset($info)) {
            $this->session->texto = "Loja Cadastrada Com Sucesso!!!";
            $this->session->type = $this->session->type = "alert alert-info";;
        }
        redirect('pagina/listarloja');
    }
    public function deletarLoja()
    {
        $id = $this->uri->segment(3);
        $this->load->model('loja_model');
        $envio = $this->loja_model->SelectEnvio($id);
        if ($envio) {
            $this->session->texto = "Erro Ao Tentar Deletar Produto. Verifique Pedidos!";
            $this->session->type = $this->session->type = "alert alert-info";
            redirect(base_url("index.php/pagina/listarloja"));
        } else {
            $info = $this->loja_model->DelLoja($id);
            echo "teste";
            echo $id;
            if (isset($info)) {
                $this->session->texto = "Loja Deletada Com Sucesso";
                $this->session->type = $this->session->type = "alert alert-info";;
            }
            redirect(base_url("index.php/pagina/listarloja"));
        }
    }

    public function LojaAlterar()
    {
        $id = $this->uri->segment(3);
        $this->load->model('loja_model');
        $loja['nm_loja'] = $this->input->post('loja');
        $loja['cnpj'] = $this->input->post('cnpj');
        $dadoscadastrais['endereco'] = $this->input->post('endereco');
        $dadoscadastrais['num_endereco'] = $this->input->post('num_endereco');
        $dadoscadastrais['nm_cidade'] = $this->input->post('nm_cidade');
        $dadoscadastrais['nm_uf'] = $this->input->post('nm_uf');
        $dadoscadastrais['bairro'] = $this->input->post('bairro');
        $dadoscadastrais['cep'] = $this->input->post('cep');
        $dadoscadastrais['telefone'] = $this->input->post('telefone');
        $config['upload_path'] = FCPATH . "assets/img/loja";
        $config["allowed_types"] = "jpg|jpeg|png";
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->do_upload('nm_imagem');
        $info_arquivo = $this->upload->data();
        if ($info_arquivo['file_name'] == null) {
            $info = $this->loja_model->Alterloja($loja, $dadoscadastrais, $id);
        } else {
            $loja['nm_foto'] = $info_arquivo['file_name'];
            $info = $this->loja_model->Alterloja($loja, $dadoscadastrais, $id);
        }
        if (isset($info)) {
            $this->session->texto = "Loja Alterada Com Sucesso!!!";
            $this->session->type = $this->session->type = "alert alert-info";;
        }
        redirect('pagina/listarloja');
    }
}
