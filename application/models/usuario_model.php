<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function set_Empresa($empresa, $dados)
    {
        $this->db->insert('empresa', $empresa);
        $dados['empresa_id'] = $empresa->id_empresa;
        $this->db->insert('dadoscadastrais', $dados);
        return "sucess";
    }

    public function get_email($email)
    {
        $this->db->select('*');
        $this->db->where('email ', $email);
        $email = $this->db->get('empresa')->row();
        return $email;
    }

    public function get_senha($senha)
    {
        $this->db->select('*');
        $this->db->where('senha ', $senha);
        $senha = $this->db->get('empresa')->row();
        return $senha;
    }

    public function loginAutenticar($email, $senha)
    {
        $this->db->select('*');
        $this->db->where('email ', $email);
        $this->db->where('senha ', $senha);
        $usuario = $this->db->get('empresa')->row();
        if ($usuario) {
            return $usuario;
        }
    }

    public function GetAll()
    {
        $this->db->select('*');
        $this->db->from('empresa as emp');
        $this->db->join('dadoscadastrais', 'empresa_id = emp.id_empresa and emp.id_empresa = ' . $this->session->id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function AlterUsuario($usuario, $dadoscadastrais)
    {
        $this->db->set($usuario);
        $this->db->from('empresa');
        $this->db->where('id_empresa', $this->session->id);
        if ($this->db->update()) {
            $this->db->set($dadoscadastrais);
            $this->db->from('dadoscadastrais');
            $this->db->where('empresa_id', $this->session->id);
            return $this->db->update();
        } else {
            $this->session->texto = "Erro Ao Alterar Empresa! Tente Novamente";
            $this->session->type = $this->session->type = "alert alert-info";
            return false;
        }
    }

    public function AlterFoto($usuario)
    {
        $this->db->set($usuario);
        $this->db->from('empresa');
        $this->db->where('id_empresa', $this->session->id);
        return $this->db->update();
    }

    public function AlterSenha($usuario)
    {
        $this->db->set($usuario);
        $this->db->from('empresa');
        $this->db->where('id_empresa', $this->session->id);
        return $this->db->update();
    }

    public function GetUsuario()
    {
        $this->db->select('*');
        $this->db->from('empresa');
        $this->db->join('dadoscadastrais', 'id_empresa = '. $this->session->id . ' and empresa_id = ' . $this->session->id);

        $query = $this->db->get();
        return $query->result();
    }
}
