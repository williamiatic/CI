<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Envio_model extends CI_Model
{


    public function GetAll($sort = "id_saida", $order = "asc", $limit = null, $offset = null)
    {
        $this->db->order_by($sort, $order);

        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        $this->db->select('*');
        $this->db->from('saida as said');
        $this->db->join('produto', 'id_produto = produto_id and said.empresa_id = ' . $this->session->id);
        $this->db->join('transportadora', 'said.concluido = 0 and id_transportadora = said.transportadora_id');
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
        $this->db->from('saida as said');
        $this->db->join('produto', 'id_produto = produto_id and said.empresa_id = ' . $this->session->id);
        $this->db->join('transportadora', 'said.concluido = 0 and id_transportadora = said.transportadora_id');
        return $this->db->get()->num_rows();
    }

    public function GetAllHistorico($sort = "id_saida", $order = "asc", $limit = null, $offset = null)
    {
        $this->db->order_by($sort, $order);

        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        $this->db->select('*');
        $this->db->from('saida as said');
        $this->db->join('produto', 'id_produto = produto_id and said.empresa_id = ' . $this->session->id);
        $this->db->join('transportadora', 'said.concluido = 1 and id_transportadora = said.transportadora_id');
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
        $this->db->from('saida as said');
        $this->db->join('produto', 'id_produto = produto_id and said.empresa_id = ' . $this->session->id);
        $this->db->join('transportadora', 'said.concluido = 1 and id_transportadora = said.transportadora_id');
        return $this->db->get()->num_rows();
    }

    public function GetProdutoFornecedor()
    {
        $this->db->select('id_produto, nm_produto, nm_fornecedor');
        $this->db->from('produto as prod');
        $this->db->join('fornecedor', 'id_fornecedor = prod.fornecedor_id and prod.empresa_id = ' . $this->session->id);
        $query = $this->db->get();
        return $query->result();
    }

    public function SetEnvio($envio)
    {
        return $this->db->insert('saida', $envio);
    }

    public function DelEnvio($id)
    {
        $this->db->where('id_saida', $id);
        return $this->db->delete('saida');
    }

    public function ConcluirEnvio($envio, $id)
    {
        $this->db->set($envio);
        $this->db->from('saida');
        $this->db->where('id_saida', $id);
        return $this->db->update();
    }

    public function GetDetalhesEnvio($id)
    {
        $this->db->select('*');
        $this->db->from('saida as said');
        $this->db->join('produto', 'id_produto = said.produto_id and said.empresa_id = ' . $this->session->id);
        $this->db->join('transportadora', 'id_transportadora = said.transportadora_id and id_saida = ' . $id);
        $this->db->join('loja', 'id_loja = said.loja_id');
        $query = $this->db->get();
        return $query->result();
    }
    public function AlterarEnvio($envio, $id)
    {
        $this->db->set($envio);
        $this->db->from('saida');
        $this->db->where('id_saida', $id);
        return $this->db->update();
    }
}
