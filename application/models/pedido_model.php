<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pedido_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function Getpedido()
    {
        $this->db->select('*');
        $this->db->from('entrada as entr');
        $this->db->join('produto as prod', 'id_produto = entr.produto_id');
        $this->db->join('fornecedor', 'id_fornecedor = prod.fornecedor_id and prod.empresa_id = ' . $this->session->id);
        $query = $this->db->get();
        return $query->result();
    }

    public function Setpedido($pedido)
    {
        return $this->db->insert('entrada', $pedido);
    }

    public function GetProdutoFornecedor()
    {
        $this->db->select('id_produto, nm_produto, nm_fornecedor');
        $this->db->from('produto as prod');
        $this->db->join('fornecedor', 'id_fornecedor = prod.fornecedor_id and prod.empresa_id = ' . $this->session->id);
        $query = $this->db->get();
        return $query->result();
    }

    public function SelectItemPedido($id)
    {
        $this->db->where('concluido', 1);
        $this->db->from('entrada');
        return $this->db->get()->result();
    }

    public function DelPedido($id)
    {
        $this->db->where('id_entrada', $id);
        return $this->db->delete('entrada');
    }

    public function GetAll($sort = "id_entrada", $order = "asc", $limit = null, $offset = null)
    {
        $this->db->order_by($sort, $order);

        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        $this->db->select('*');
        $this->db->from('entrada as entr');
        $this->db->join('produto as prod', 'id_produto = entr.produto_id and entr.empresa_id = ' . $this->session->id);
        $this->db->join('fornecedor', 'concluido = 0 and id_fornecedor = prod.fornecedor_id and entr.empresa_id = ' . $this->session->id);
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
        $this->db->from('entrada as entr');
        $this->db->join('produto as prod', 'id_produto = entr.produto_id and entr.empresa_id = ' . $this->session->id);
        $this->db->join('fornecedor', 'concluido = 0 and id_fornecedor = prod.fornecedor_id and entr.empresa_id = ' . $this->session->id);
        return $this->db->get()->num_rows();
    }

    public function GetAllHistorico($sort = "id_produto", $order = "asc", $limit = null, $offset = null)
    {
        $this->db->order_by($sort, $order);

        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        $this->db->select('*');
        $this->db->from('entrada as entr');
        $this->db->join('produto as prod', 'id_produto = entr.produto_id and entr.empresa_id = ' . $this->session->id);
        $this->db->join('fornecedor', 'concluido = 1 and id_fornecedor = prod.fornecedor_id and entr.empresa_id = ' . $this->session->id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function CountAllHistorico()
    {
        $this->db->select('*');
        $this->db->from('entrada as entr');
        $this->db->join('produto as prod', 'id_produto = entr.produto_id and entr.empresa_id = ' . $this->session->id);
        $this->db->join('fornecedor', 'concluido = 1 and id_fornecedor = prod.fornecedor_id and entr.empresa_id = ' . $this->session->id);
        return $this->db->get()->num_rows();
    }

    public function GetPedidoDetalhes($id)
    {
        $this->db->select('*');
        $this->db->from('entrada as entr');
        $this->db->join('produto as prod', 'id_entrada = ' . $id . ' and id_produto = produto_id and entr.empresa_id = ' . $this->session->id);
        $this->db->join('fornecedor', 'id_fornecedor = prod.fornecedor_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function ConcluirPedido($pedido, $id)
    {
        $this->db->set($pedido);
        $this->db->from('entrada');
        $this->db->where('id_entrada', $id);
        return $this->db->update();
    }

    public function AlterarPedido($pedido, $id)
    {
        $this->db->set($pedido);
        $this->db->from('entrada');
        $this->db->where('id_entrada', $id);
        return $this->db->update();
    }
}
