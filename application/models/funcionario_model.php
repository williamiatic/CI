<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Funcionario_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function SetFuncionario($funcionario, $dados)
    {
        $this->db->insert('funcionario', $funcionario);
        $this->db->where('empresa_id', $this->session->id);
        $this->db->where('cpf', $funcionario['cpf']);
        $idfuncionario = $this->db->get('funcionario')->result();
        foreach ($idfuncionario as $funcionario) {
            $dados['funcionario_id'] = $funcionario->id_funcionario;
        }
        return $this->db->insert('dadoscadastrais', $dados);
    }

    public function GetAll($sort = "id_funcionario", $order = "asc", $limit = null, $offset = null)
    {
        $this->db->order_by($sort, $order);

        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        $this->db->select('*');
        $this->db->from('funcionario as func');
        $this->db->join('dadoscadastrais', 'func.id_funcionario = funcionario_id and func.empresa_id = ' . $this->session->id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function GetDetalhesFuncionario($id)
    {
        $this->db->select('*');
        $this->db->from('funcionario as func');
        $this->db->join('dadoscadastrais', 'funcionario_id = ' . $id . ' and func.id_funcionario = funcionario_id and func.empresa_id = ' . $this->session->id);

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
        $this->db->from('funcionario as func');
        $this->db->join('dadoscadastrais', 'func.id_funcionario = funcionario_id and func.empresa_id = ' . $this->session->id);
        return $this->db->get()->num_rows();
    }

    public function DelFuncionario($id)
    {
        $this->db->where('funcionario_id', $id);
        $delete = $this->db->delete('dadoscadastrais');
        if ($delete) {
            $this->db->where('id_funcionario', $id);
            return $this->db->delete('funcionario');
        }
    }

    public function loginFuncionarioAutenticar($email, $senha)
    {
        $this->db->select('*');
        $this->db->where('email ', $email);
        $this->db->where('senha ', $senha);
        $funcionario = $this->db->get('funcionario')->row();
        if ($funcionario) {
            return $funcionario;
        }
    }

    public function AlterFuncionario($funcionario, $id)
    {
        var_dump($funcionario);
        $this->db->set($funcionario);
        $this->db->from('funcionario');
        $this->db->where('id_funcionario', $id);
        return $this->db->update();
    }

    public function get_email($email)
    {
        $this->db->select('*');
        $this->db->where('email ', $email);
        $email = $this->db->get('funcionario')->row();
        return $email;
    }

    public function get_senha($senha)
    {
        $this->db->select('*');
        $this->db->where('senha ', $senha);
        $senha = $this->db->get('funcionario')->row();
        return $senha;
    }

    public function AlterFoto($usuario)
    {
        $this->db->set($usuario);
        $this->db->from('funcionario');
        $this->db->where('id_funcionario', $this->session->func_id);
        return $this->db->update();
    }

    public function AlterSenha($usuario)
    {
        $this->db->set($usuario);
        $this->db->from('funcionario');
        $this->db->where('id_funcionario', $this->session->func_id);
        return $this->db->update();
    }

    
}
