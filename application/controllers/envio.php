<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Envio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }


    public function EnvioCadastrar()
    {
        $envio['produto_id'] = $this->input->post('produto');
        $envio['loja_id'] = $this->input->post('loja');
        $envio['transportadora_id'] = $this->input->post('transportadora');
        $envio['num_frete'] = $this->input->post('Frete');
        $envio['num_quantidadeporlote'] = $this->input->post('quantidadeporlote');
        $envio['num_quantidadelote'] = $this->input->post('quantidadelote');
        $envio['num_precounidade'] = $this->input->post('precounidade');
        $envio['num_precounidade'] = $this->input->post('precolote');
        date_default_timezone_set('America/Sao_Paulo');
        $envio['dateped'] = date('Y-m-d H:i:s');
        $envio['concluido'] = 0;
        $envio['empresa_id'] = $this->session->id;
        $this->load->model('envio_model');
        $info = $this->envio_model->Setenvio($envio);
        if (isset($info)) {
            $this->session->texto = "Envio Cadastrada Com Sucesso!!!";
            $this->session->type = $this->session->type = "alert alert-info";;
        }
        redirect(base_url('index.php/pagina/listarenvio'));
    }

    public function deletarenvio()
    {
        $id = $this->uri->segment(3);
        $this->load->model('envio_model');
        $info = $this->envio_model->Delenvio($id);
        if (isset($info)) {
            $this->session->texto = "Envio Deletado Com Sucesso";
            $this->session->type = $this->session->type = "alert alert-info";
        }
        redirect(base_url("index.php/pagina/listarenvio"));
    }

    public function ConcluirEnvio()
    {
        $id = $this->uri->segment(3);
        $this->load->model('envio_model');
        $envio['concluido'] = 1;
        date_default_timezone_set('America/Sao_Paulo');
        $envio['dateentrega'] = date('Y-m-d H:i:s');
        $concluir = $this->envio_model->Concluirenvio($envio, $id);
        if ($concluir) {
            $this->session->texto = "Envio Concluido Com Sucesso!!! ";
            $this->session->type = $this->session->type = "alert alert-info";
            redirect(base_url("index.php/pagina/ListarHistoricoEnvio"));
        }
    }

    public function AlterarEnvio()
    {
        $id = $this->uri->segment(3);
        $this->load->model('envio_model');
        $envio['num_precolote'] = $this->input->post('precolote');
        $envio['num_precounidade'] = $this->input->post('precounidade');
        $envio['num_quantidadeporlote'] = $this->input->post('num_quantidadeporlote');
        $envio['num_quantidadelote'] = $this->input->post('num_quantidadelote');
        $envio['num_frete'] = $this->input->post('frete');
        $envio['imposto'] = $this->input->post('imposto');
        $envio['transportadora_id'] = $this->input->post('transportadora');
        $envio['num_notafiscal'] = $this->input->post('num_notafiscal');
        $concluir = $this->envio_model->AlterarEnvio($envio, $id);
        if ($concluir) {
            $this->session->texto = "Envio Alterado Com Sucesso!!! ";
            $this->session->type = $this->session->type = "alert alert-info";
            redirect(base_url("index.php/pagina/listarenvio"));
        }
    }
}
