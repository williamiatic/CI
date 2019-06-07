<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Painel_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function CountAllFuncionarios()
    {
        $this->db->select('*');
        $this->db->from('funcionario as func');
        $this->db->join('dadoscadastrais', 'func.id_funcionario = funcionario_id and func.empresa_id = ' . $this->session->id);
        return $this->db->get()->num_rows();
    }

    public function CountQuantidadeProdutos()
    {
        $quantidade = 0;
        $this->db->select('*');
        $this->db->from('produto');
        $this->db->where('empresa_id', $this->session->id);
        $produtos = $this->db->get()->result();
        foreach ($produtos as $produto) {
            $quantidade += $produto->quantidade;
        }
        return $quantidade;
    }

    public function CountPendencias()
    {
        $this->db->select('*');
        $this->db->from('entrada');
        $this->db->where('empresa_id', $this->session->id);
        $this->db->where('concluido', 0);

        $pedido = $this->db->get()->num_rows();

        $this->db->select('*');
        $this->db->from('saida');
        $this->db->where('empresa_id', $this->session->id);
        $this->db->where('concluido', 0);

        $envio = $this->db->get()->num_rows();

        return $envio + $pedido;
    }

    public function CountGastos()
    {
        $quantidade = 0;
        $this->db->select('*');
        $this->db->from('entrada');
        $this->db->where('empresa_id', $this->session->id);
        $pedidos = $this->db->get()->result();
        foreach ($pedidos as $pedido) {
            $quantidade += $pedido->num_precototal;
        }
        $this->db->select('*');
        $this->db->from('funcionario');
        $this->db->where('empresa_id', $this->session->id);
        $funcionarios = $this->db->get()->result();
        foreach ($funcionarios as $funcionario) {
            $quantidade += $funcionario->salario;
        }
        return $quantidade;
    }
}
