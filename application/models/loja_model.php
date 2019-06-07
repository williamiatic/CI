<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loja_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function GetAll($sort = "id_loja", $order = "asc", $limit = null, $offset = null)
    {
        $this->db->order_by($sort, $order);

        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        $this->db->select('*');
        $this->db->from('loja as loj');
        $this->db->join('dadoscadastrais', 'loja_id = id_loja and loj.empresa_id = ' . $this->session->id);
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
        $this->db->from('loja as loj');
        $this->db->join('dadoscadastrais', 'loja_id = id_loja and loj.empresa_id = ' . $this->session->id);
        return $this->db->get()->num_rows();
    }

    public function Setloja($loja, $dados)
    {
        $this->db->insert('loja', $loja);
        $this->db->where('empresa_id = ' . $this->session->id);
        $this->db->where('cnpj = ' . $loja['cnpj']);
        $id_loja = $this->db->get('loja')->result();
        foreach ($id_loja as $loja) {
            $dados['loja_id'] = $loja->id_loja;
        }
        return $this->db->insert('dadoscadastrais', $dados);
    }

    public function DelLoja($id)
    {
        $this->db->where('loja_id', $id);
        $delete = $this->db->delete('dadoscadastrais');
        if ($delete) {
            $this->db->where('id_loja', $id);
            return $this->db->delete('loja');
        } else {
            return 1;
        }
    }

    public function SelectEnvio($id)
    {
        $this->db->where('loja_id', $id);
        $this->db->from('saida');
        return $this->db->get()->result();
    }

    public function GetLojaDetalhes($id)
    {
        $this->db->select('*');
        $this->db->from('loja as loj');
        $this->db->join('dadoscadastrais', 'id_loja = ' . $id . ' and loja_id = ' . $id . ' and loj.empresa_id = ' . $this->session->id);
        $query = $this->db->get();;

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function AlterLoja($loja, $dadoscadastrais, $id)
    {
        $this->db->set($loja);
        $this->db->from('loja');
        $this->db->where('id_loja', $id);
        if ($this->db->update()) {
            $this->db->set($dadoscadastrais);
            $this->db->from('dadoscadastrais');
            $this->db->where('loja_id', $id);
            return $this->db->update();
        } else {
            $this->session->texto = "Erro Ao Alterar Loja! Tente Novamente";
            $this->session->type = $this->session->type = "alert alert-info";
            return false;
        }
    }
}
