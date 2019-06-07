<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fornecedor_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function GetFornecedor()
    {
        $this->db->where('empresa_id = ' . $this->session->id . ' or empresa_id = 1');
        return $dados['fornecedor'] = $this->db->get('fornecedor')->result();
    }

    public function GetAll($sort = "id_fornecedor", $order = "asc", $limit = null, $offset = null)
    {
        $this->db->order_by($sort, $order);

        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        $this->db->select('*');
        $this->db->from('fornecedor as forn');
        $this->db->join('dadoscadastrais', 'forn.id_fornecedor = fornecedor_id and forn.empresa_id = ' . $this->session->id);

        $query = $this->db->get();;

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function CountAll()
    {
        $this->db->select('*');
        $this->db->from('fornecedor');
        $this->db->where('empresa_id', $this->session->id);
        return $this->db->get()->num_rows();
    }

    public function SetFornecedor($fornecedor, $dados)
    {
        $this->db->insert('fornecedor', $fornecedor);
        $this->db->where('empresa_id', $this->session->id);
        $this->db->where('cnpj', $fornecedor['cnpj']);
        $idfornecedor = $this->db->get('fornecedor')->result();
        foreach ($idfornecedor as $fornecedor) {
            $dados['fornecedor_id'] = $fornecedor->id_fornecedor;
        }
        return $this->db->insert('dadoscadastrais', $dados);
    }

    public function DelFornecedor($id)
    {
        $this->db->where('fornecedor_id', $id);
        $delete = $this->db->delete('dadoscadastrais');
        if ($delete) {
            $this->db->where('id_fornecedor', $id);
            return $this->db->delete('fornecedor');
        }
    }

    public function SelectProduto($id)
    {
        $this->db->where('fornecedor_id', $id);
        $this->db->from('produto');
        return $this->db->get()->result();
    }

    public function GetFornecedorDetalhes($id)
    {
        $this->db->select('*');
        $this->db->from('fornecedor');
        $this->db->join('dadoscadastrais', 'fornecedor_id = ' . $id . ' and id_fornecedor = ' . $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function AlterFornecedor($fornecedor, $dadoscadastrais, $id)
    {
        $this->db->set($fornecedor);
        $this->db->from('fornecedor');
        $this->db->where('id_fornecedor', $id);
        if ($this->db->update()) {
            $this->db->set($dadoscadastrais);
            $this->db->from('dadoscadastrais');
            $this->db->where('fornecedor_id', $id);
            return $this->db->update();
        } else {
            $this->session->texto = "Erro Ao Alterar Fornecedor! Tente Novamente";
            $this->session->type = $this->session->type = "alert alert-info";
            return false;
        }
    }
}
