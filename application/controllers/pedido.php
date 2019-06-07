<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pedido extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }


    public function PedidoCadastrar()
    {
        $pedido['produto_id'] = $this->input->post('Produtos');
        $pedido['num_quantidade'] = $this->input->post('Quantidade');
        $pedido['num_frete'] = $this->input->post('Frete');
        $pedido['num_notafiscal'] = $this->input->post('NotaFiscal');
        $pedido['num_precounidade'] = $this->input->post('PrecoUnidade');
        $pedido['num_Precototal'] = $this->input->post('Precototal');
        date_default_timezone_set('America/Sao_Paulo');
        $pedido['dateped'] = date('Y-m-d H:i:s');
        $pedido['concluido'] = 0;
        $pedido['empresa_id'] = $this->session->id;
        $this->load->model('pedido_model');
        $info = $this->pedido_model->Setpedido($pedido);
        if (isset($info)) {
            $this->session->texto = "Pedido Cadastrada Com Sucesso!!!";
            $this->session->type = $this->session->type = "alert alert-info";;
        }
        redirect(base_url("index.php/pagina/listarpedido"));
    }

    public function deletarPedido()
    {
        $id = $this->uri->segment(3);
        $this->load->model('pedido_model');
        $info = $this->pedido_model->Delpedido($id);
        if (isset($info)) {
            $this->session->texto = "Pedido Deletado Com Sucesso";
            $this->session->type = $this->session->type = "alert alert-info";
            redirect(base_url("index.php/pagina/listarpedido"));
        }
    }

    public function ConcluirPedido()
    {
        $id = $this->uri->segment(3);
        $this->load->model('pedido_model');
        $pedido['concluido'] = 1;
        date_default_timezone_set('America/Sao_Paulo');
        $pedido['dateentr'] = date('Y-m-d H:i:s');
        $concluir = $this->pedido_model->ConcluirPedido($pedido, $id);
        if ($concluir) {
            $this->session->texto = "Pedido Concluido Com Sucesso!!! ";
            $this->session->type = $this->session->type = "alert alert-info";
            redirect(base_url("index.php/pagina/ListarHistoricoPedido"));
        }
    }

    public function AlterarPedido()
    {
        $id = $this->uri->segment(3);
        $this->load->model('pedido_model');
        $pedido['num_precolote'] = $this->input->post('precolote');
        $pedido['num_precounidade'] = $this->input->post('precounidade');
        $pedido['num_quantidade'] = $this->input->post('num_quantidade');
        $pedido['num_quantidadelote'] = $this->input->post('num_quantidadelote');
        $pedido['num_frete'] = $this->input->post('frete');
        $pedido['imposto'] = $this->input->post('imposto');
        $pedido['num_notafiscal'] = $this->input->post('notafiscal');
        $pedido['num_precototal'] = $this->input->post('num_precototal');

        $concluir = $this->pedido_model->AlterarPedido($pedido, $id);
        if ($concluir) {
            $this->session->texto = "Pedido Alterado Com Sucesso!!! ";
            $this->session->type = $this->session->type = "alert alert-info";
            redirect(base_url("index.php/pagina/listarpedido"));
        }
    }
}
