<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transportadora_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function SetTransportadora($transportadora, $dados)
    {
        $this->db->insert('transportadora', $transportadora);
        $this->db->where('empresa_id = ' . $this->session->id);
        $this->db->where('cnpj = ' . $transportadora['cnpj']);
        $idtransportadora = $this->db->get('transportadora')->result();
        foreach ($idtransportadora as $transportadora) {
            $dados['transportadora_id'] = $transportadora->id_transportadora;
        }
        return $this->db->insert('dadoscadastrais', $dados);
    }

    public function GetAll($sort = "id_transportadora", $order = "asc", $limit = null, $offset = null)
    {
        $this->db->order_by($sort, $order);

        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        $this->db->select('*');
        $this->db->from('transportadora as tran');
        $this->db->join('dadoscadastrais', 'transportadora_id = id_transportadora and tran.empresa_id = ' . $this->session->id);
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
        $this->db->from('transportadora');
        $this->db->where('empresa_id', $this->session->id);
        return $this->db->get()->num_rows();
    }

    public function SelectProduto($id)
    {
        $this->db->where('transportadora_id', $id);
        $this->db->from('produto');
        return $this->db->get()->result();
    }

    public function DelTransportadora($id)
    {
        $this->db->where('transportadora_id', $id);
        $delete = $this->db->delete('dadoscadastrais');
        if ($delete) {
            $this->db->where('id_transportadora', $id);
            return $this->db->delete('transportadora');
        }
    }

    public function GetTransportadoraDetalhes($id)
    {
        $this->db->select('*');
        $this->db->from('transportadora as tran');
        $this->db->join('dadoscadastrais', 'transportadora_id = ' . $id . ' and id_transportadora = ' . $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function AlterTransportadora($transportadora, $dadoscadastrais, $id)
    {
        $this->db->set($transportadora);
        $this->db->from('transportadora');
        $this->db->where('id_transportadora', $id);
        if ($this->db->update()) {
            $this->db->set($dadoscadastrais);
            $this->db->from('dadoscadastrais');
            $this->db->where('transportadora_id', $id);
            return $this->db->update();
        } else {
            $this->session->texto = "Erro Ao Alterar Transportadora! Tente Novamente";
            $this->session->type = $this->session->type = "alert alert-info";
            return false;
        }
    }
}
