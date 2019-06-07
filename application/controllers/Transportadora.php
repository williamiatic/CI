<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transportadora extends CI_Controller
{

        function __construct()
        {
                parent::__construct();
                $this->load->helper('url');
        }

        public function transportadoraCadastrar()
        {
                $transportadora['nm_transportadora'] = $this->input->post('Transportadora');
                $transportadora['cnpj'] = $this->input->post('CNPJ');
                $transportadora['empresa_id'] = $this->session->id;
                $dados['endereco'] = $this->input->post('Endereco');
                $dados['num_endereco'] = $this->input->post('Num_Endereco');
                $dados['bairro'] = $this->input->post('Bairro');
                $dados['cep'] = $this->input->post('Cep');
                $dados['nm_cidade'] = $this->input->post('Cidade');
                $dados['nm_uf'] = $this->input->post('UF');
                $config['upload_path'] = FCPATH . "assets/img/transportadora";
                $config["allowed_types"] = "jpg|jpeg|png";
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('nm_imagem')) {
                        $error = array('error' => $this->upload->display_errors());
                        $errormessage = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $errormessage);
                        redirect('pagina/listartransportadora');
                } else {
                        $info_arquivo = $this->upload->data();
                        $transportadora['nm_foto'] = $info_arquivo['file_name'];
                }
                $this->upload->do_upload('nm_imagem');
                $info_arquivo = $this->upload->data();
                $transportadora['nm_foto'] = $info_arquivo['file_name'];
                $this->load->model('transportadora_model');
                $info = $this->transportadora_model->Settransportadora($transportadora, $dados);

                if (isset($info)) {
                        $this->session->texto = "Transportadora Cadastrado Com Sucesso!!!";
                        $this->session->type = $this->session->type = "alert alert-info";;
                }
                redirect('pagina/listartransportadora');
        }

        public function deletarTransportadora()
        {
                $id = $this->uri->segment(3);
                $this->load->model('transportadora_model');
                $transportadora = $this->transportadora_model->SelectProduto($id);
                if ($transportadora) {
                        $this->session->texto = "Erro Ao Tentar Deletar transportadora! ";
                        $this->session->type = $this->session->type = "alert alert-info";
                        redirect(base_url("index.php/pagina/listartransportadora"));
                } else {
                        $info = $this->transportadora_model->Deltransportadora($id);
                        if (isset($info)) {
                                $this->session->texto = "Transportadora Deletada Com Sucesso";
                                $this->session->type = $this->session->type = "alert alert-info";
                        }
                        redirect(base_url("index.php/pagina/listartransportadora"));
                }
        }

        public function TransportadoraAlterar()
        {
                $id = $this->uri->segment(3);
                $this->load->model('transportadora_model');
                $transportadora['nm_transportadora'] = $this->input->post('transportadora');
                $transportadora['cnpj'] = $this->input->post('cnpj');
                $dadoscadastrais['endereco'] = $this->input->post('endereco');
                $dadoscadastrais['num_endereco'] = $this->input->post('num_endereco');
                $dadoscadastrais['nm_cidade'] = $this->input->post('nm_cidade');
                $dadoscadastrais['nm_uf'] = $this->input->post('nm_uf');
                $dadoscadastrais['bairro'] = $this->input->post('bairro');
                $dadoscadastrais['cep'] = $this->input->post('cep');
                $dadoscadastrais['telefone'] = $this->input->post('telefone');
                $config['upload_path'] = FCPATH . "assets/img/transportadora";
                $config["allowed_types"] = "jpg|jpeg|png";
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                $this->upload->do_upload('nm_imagem');
                $info_arquivo = $this->upload->data();
                if ($info_arquivo['file_name'] == null) {
                        $info = $this->transportadora_model->AlterTransportadora($transportadora, $dadoscadastrais, $id);
                } else {
                        $transportadora['nm_foto'] = $info_arquivo['file_name'];
                        $info = $this->transportadora_model->AlterTransportadora($transportadora, $dadoscadastrais, $id);
                }
                if (isset($info)) {
                        $this->session->texto = "Transportadora Alterada Com Sucesso!!!";
                        $this->session->type = $this->session->type = "alert alert-info";;
                }
                redirect('pagina/listartransportadora');
        }
}
