<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produto extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }


    public function ProdutoCadastrar()
    {
        $this->load->model('produto_model');
        $produto['nm_Produto'] = $this->input->post('produto');
        $produto['categoria_id'] = $this->input->post('Categoria');
        $produto['marca'] = $this->input->post('Marca');
        $produto['peso'] = floatval($this->input->post('Peso'));
        $this->produto_model->isfloat($produto['peso'], "texto");
        $produto['controlado'] = $this->input->post('Controlado');
        $produto['fornecedor_id'] = $this->input->post('Fornecedor');
        if ($this->input->post('Quantidade') == null) {
            $produto['quantidade'] = 0;
        } else {
            $produto['quantidade'] = floatval($this->input->post('Quantidade'));
            $this->produto_model->isfloat($produto['quantidade'], "pagina", "texto");
        }
        $produto['quantidademinima'] = floatval($this->input->post('QuantidadeMinima'));
        $this->produto_model->isfloat($produto['quantidademinima'], "pagina", "texto");
        $produto['precounidade'] = floatval($this->input->post('precounidade'));
        $this->produto_model->isfloat($produto['precounidade'], "pagina", "texto");
        $produto['precolote'] = floatval($this->input->post('precolote'));
        $this->produto_model->isfloat($produto['precolote'], "pagina", "texto");
        $produto['empresa_id'] = $this->session->id;
        $config['upload_path'] = FCPATH . "assets/img/produtos";
        $config["allowed_types"] = "jpg|jpeg|png";
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->do_upload('nm_imagem');
        $info_arquivo = $this->upload->data();
        $produto['nm_foto'] = $info_arquivo['file_name'];
        $info = $this->produto_model->SetProdutos($produto);

        if (isset($info)) {
            $this->session->texto = "Produto Cadastrado Com Sucesso!!!";
            $this->session->type = $this->session->type = "alert alert-info";;
        }
        redirect('pagina/listarprodutos');
    }

    public function ProdutoAlterar()
    {
        $this->load->model('produto_model');
        $produto['nm_produto'] = $this->input->post('produto');
        $produto['categoria_id'] = $this->input->post('categoria');
        $produto['marca'] = $this->input->post('marca');
        $produto['peso'] = floatval($this->input->post('peso'));
        $this->produto_model->isfloat($produto['peso'], "texto");
        $produto['controlado'] = $this->input->post('Controlado');
        $produto['fornecedor_id'] = $this->input->post('Fornecedor');
        $produto['transportadora_id'] = $this->input->post('transportadora');
        $produto['descricao'] = $this->input->post('descricao');
        $produto['lote'] = $this->input->post('lote');
        if ($this->input->post('Quantidade') == null) {
            $produto['quantidade'] = 0;
        } else {
            $produto['quantidade'] = floatval($this->input->post('Quantidade'));
            $this->produto_model->isfloat($produto['quantidade'], "pagina", "texto");
        }
        $produto['quantidademinima'] = floatval($this->input->post('QuantidadeMinima'));
        $this->produto_model->isfloat($produto['quantidademinima'], "pagina", "texto");
        $produto['precounidade'] = floatval($this->input->post('precounidade'));
        $this->produto_model->isfloat($produto['precounidade'], "pagina", "texto");
        $produto['precolote'] = floatval($this->input->post('precolote'));
        $this->produto_model->isfloat($produto['precolote'], "pagina", "texto");
        $id = $this->uri->segment(3);
        $config['upload_path'] = FCPATH . "assets/img/produtos";
        $config["allowed_types"] = "jpg|jpeg|png";
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->do_upload('nm_imagem');
        $info_arquivo = $this->upload->data();
        if ($info_arquivo['file_name'] == null) {
            $info = $this->produto_model->AlterProdutos($produto, $id);
        } else {
            $produto['nm_foto'] = $info_arquivo['file_name'];
            $info = $this->produto_model->AlterProdutos($produto, $id);
        }
        echo $info;
        if (isset($info)) {
            $this->session->texto = "Produto Alterado Com Sucesso!!!";
            $this->session->type = $this->session->type = "alert alert-info";;
        }
        redirect('pagina/listarprodutos');
    }

    public function deletarProd()
    {
        $id = $this->uri->segment(3);
        echo "id";
        $this->load->model('produto_model');
        $enviopedido = $this->produto_model->SelectEnvioPedido($id);
        if ($enviopedido == 1) {
            $this->session->texto = "Erro Ao Tentar Deletar Produto. Verifique Pedidos!";
            $this->session->type = $this->session->type = "alert alert-info";
            redirect(base_url("index.php/pagina/listarprodutos"));
        } else if ($enviopedido == 2) {
            $this->session->texto = "Erro Ao Tentar Deletar Produto. Verifique Envios!";
            $this->session->type = $this->session->type = "alert alert-info";;
            redirect(base_url("index.php/pagina/listarprodutos"));
        } else {
            $info = $this->produto_model->DelProdutos($id);
            if (isset($info)) {
                $this->session->texto = "Produto Deletado Com Sucesso";
                $this->session->type = $this->session->type = "alert alert-info";;
            }
            redirect(base_url("index.php/pagina/listarprodutos"));
        }
    }
}
