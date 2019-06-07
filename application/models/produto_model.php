<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produto_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function GetAll($sort = "id_produto", $order = "asc", $limit = null, $offset = null)
    {
        $this->db->order_by($sort, $order);

        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        $this->db->select('*');
        $this->db->from('produto as prod');
        $this->db->join('categoria', 'id_categoria = prod.categoria_id and prod.empresa_id = ' . $this->session->id);
        $this->db->join('fornecedor', 'id_fornecedor = prod.fornecedor_id');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function CountAll()
    {
        $this->db->select('*');
        $this->db->from('produto as prod');
        $this->db->join('categoria', 'id_categoria = prod.categoria_id and prod.empresa_id = ' . $this->session->id);
        $this->db->join('fornecedor', 'id_fornecedor = prod.fornecedor_id and prod.empresa_id = ' . $this->session->id);
        return $this->db->get()->num_rows();
    }

    public function GetAllEstoque($sort = "id_produto", $order = "asc", $limit = null, $offset = null)
    {
        $this->db->order_by($sort, $order);

        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        $this->db->select('*');
        $this->db->from('produto as prod');
        $this->db->join('categoria', 'id_categoria = prod.categoria_id and prod.empresa_id = ' . $this->session->id);
        $this->db->join('fornecedor', 'id_fornecedor = prod.fornecedor_id and prod.quantidade > 0 and prod.empresa_id = ' . $this->session->id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function CountAllEstoque()
    {
        $this->db->select('*');
        $this->db->from('produto as prod');
        $this->db->join('categoria', 'id_categoria = prod.categoria_id and prod.empresa_id = ' . $this->session->id);
        $this->db->join('fornecedor', 'id_fornecedor = prod.fornecedor_id and prod.quantidade > 0 and prod.empresa_id = ' . $this->session->id);
        return $this->db->get()->num_rows();
    }

    public function SetProdutos($produto)
    {
        return $this->db->insert('produto', $produto);
    }

    public function DelProdutos($id)
    {
        $this->db->where('id_produto', $id);
        return $this->db->delete('produto');
    }

    public function GetProdutosEstoque()
    {
        $this->db->select('*');
        $this->db->from('produto as prod');
        $this->db->join('categoria', 'id_categoria = prod.categoria_id and prod.empresa_id = ' . $this->session->id);
        $this->db->join('fornecedor', 'id_fornecedor = prod.fornecedor_id and prod.quantidade > 0 and prod.empresa_id = ' . $this->session->id);
        $query = $this->db->get();
        return $query->result();
    }

    public function GetProdutosDetalhes($id)
    {
        $this->db->select('*');
        $this->db->from('produto as prod');
        $this->db->join('categoria', 'id_categoria = prod.categoria_id and prod.empresa_id = ' . $this->session->id);
        $this->db->join('fornecedor', 'id_fornecedor = prod.fornecedor_id and id_produto = ' . $id . ' and prod.quantidade > 0 and prod.empresa_id = ' . $this->session->id);
        $query = $this->db->get();
        return $query->result();
    }

    public function GetCategoria()
    {
        $this->db->select('*');
        $this->db->from('categoria');
        $query = $this->db->get();
        return $query->result();
    }



    public function GetProdutosFornecedor()
    {
        $this->db->select('*');
        $this->db->from('produto as prod');
        $this->db->join('fornecedor', 'id_fornecedor = prod.fornecedor_id and prod.empresa_id = ' . $this->session->id);
        $query = $this->db->get();
        return $query->result();
    }

    public function isfloat($valor, $texto)
    {
        if (is_float($valor) and $valor > 0) {
            return true;
            // Passa o proximo valor
        } else {
            $dados['msg'] = $texto;
            redirect('pagina/cadastrarprodutos', $dados);
            // Volta pra tela de cadastro mostrando erro
        }
    }

    public function AlterProdutos($produtos, $id)
    {
        $this->db->set($produtos);
        $this->db->from('produto');
        $this->db->where('id_produto', $id);
        return $this->db->update();
    }

    public function SelectEnvioPedido($id)
    {
        $this->db->where('produto_id', $id);
        $this->db->from('entrada');
        $entrada = $this->db->get()->result();
        $this->db->where('produto_id', $id);
        $this->db->from('saida');
        $saida = $this->db->get()->result();
        if ($entrada != null) {
            return 1;
        } else if ($saida != null) {
            return 2;
        }
    }

    public function GetProdutosAlterar($id)
    {
        $this->db->select('*');
        $this->db->from('produto as prod');
        $this->db->join('categoria', 'id_categoria = prod.categoria_id and prod.empresa_id = ' . $this->session->id);
        $this->db->join('fornecedor', 'id_fornecedor = prod.fornecedor_id and prod.quantidade > 0 and prod.empresa_id = ' . $this->session->id);
        $this->db->join('transportadora', 'id_produto = ' . $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
}
