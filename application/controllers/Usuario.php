<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    // Cadastrar Usuario e Voltar pra tela de Cadastrar Usuario
    public function Cadastrar()
    {
        $empresa['nm_empresa'] = $this->input->post('Nome');
        $empresa['cpf'] = $this->input->post('CPF');
        $empresa['email'] = $this->input->post('Email');

        $this->load->model('usuario_model');
        $email = $this->usuario_model->get_email($empresa['email']);
        if ($email) {
            $this->session->texto = "Email ja Cadastrado!";
            $this->session->type = $this->session->type = "alert alert-info";
            redirect(base_url('index.php/pagina/register'));
        }

        $this->load->model('funcionario_model');
        $email = $this->funcionario_model->get_email($empresa['email']);
        if ($email) {
            $this->session->texto = "Email ja Cadastrado!";
            $this->session->type = $this->session->type = "alert alert-info";
            redirect(base_url('index.php/pagina/register'));
        }

        $senha1 = $this->input->post('senha');
        $senha2 = $this->input->post('senha2');
        if ($senha1 == $senha2) {
            $empresa['senha'] = $senha1;
        } else {
            $this->session->texto = "As Senhas Devem Ser Iguais!";
            $this->session->type = $this->session->type = "alert alert-info";
            redirect(base_url('index.php/pagina/register'));
        }
        $dados['endereco'] = $this->input->post('Endereco');
        $dados['num_endereco'] = $this->input->post('NumEndereco');
        $dados['nm_cidade'] = $this->input->post('Cidade');
        $dados['nm_uf'] = $this->input->post('UF');
        $dados['bairro'] = $this->input->post('Bairro');
        $dados['cep'] = $this->input->post('cep');
        $this->load->model('usuario_model');
        $info = $this->usuario_model->set_Empresa($empresa, $dados);
        if (isset($info)) {
            $this->session->texto = "Usuario Cadastrado Com Sucesso";
            $this->session->type = $this->session->type = "alert alert-info";;
        }
        redirect(base_url('index.php/pagina/login'));
    }

    public function Autenticar()
    {
        $this->load->model("usuario_model");
        $this->load->model("funcionario_model");
        $email = $this->input->post("email");
        $senha = md5($this->input->post("senha"));
        $empresa = $this->usuario_model->loginAutenticar($email, $senha);
        if ($empresa) { // Ainda Falta Terminar
            $this->session->id = $empresa->id_empresa;
            $this->session->set_nome = $empresa->nm_empresa;
            $this->session->set_cargo = $empresa->cargo;
            $this->session->set_foto = $empresa->nm_foto;
            echo "empresa";
            redirect(base_url('index.php/pagina/painel'));
        } else {
            $funcionario = $this->funcionario_model->loginFuncionarioAutenticar($email, $senha);
            if ($funcionario) {
                $this->session->func_id = $funcionario->id_funcionario;
                $this->session->id = $funcionario->empresa_id;
                $this->session->set_nome = $funcionario->nm_funcionario;
                $this->session->set_cargo = $funcionario->cargo;
                $this->session->set_foto = $funcionario->nm_foto;
                $this->session->set_funcionario = True;
                echo "funcionario";
                redirect(base_url('index.php/pagina/painel'));
            } else {
                #Erro; (Fazer Verificação Depois!);
                $this->session->type = "alert alert-danger";
                $this->session->texto = "Email Ou Senha Incorreto!!!";
                redirect(base_url('index.php/pagina/login'));
            }
        }
    }

    public function logout()
    {
        session_destroy();
        redirect('pagina/login');
    }

    public function AlterarUsuario()
    {
        $this->load->model('usuario_model');
        $usuario['nm_empresa'] = $this->input->post('nm_empresa');
        $usuario['cpf'] = $this->input->post('cpf');
        $dadoscadastrais['endereco'] = $this->input->post('endereco');
        $dadoscadastrais['num_endereco'] = $this->input->post('num_endereco');
        $dadoscadastrais['nm_cidade'] = $this->input->post('nm_cidade');
        $dadoscadastrais['nm_uf'] = $this->input->post('nm_uf');
        $dadoscadastrais['bairro'] = $this->input->post('bairro');
        $dadoscadastrais['cep'] = $this->input->post('cep');
        $dadoscadastrais['telefone'] = $this->input->post('telefone');
        $config['upload_path'] = FCPATH . "assets/img/avatar";
        $config["allowed_types"] = "jpg|jpeg|png";
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->do_upload('nm_imagem');
        $info_arquivo = $this->upload->data();
        if ($info_arquivo['file_name'] == null) {
            $info = $this->usuario_model->Alterusuario($usuario, $dadoscadastrais);
        } else {
            $usuario['nm_foto'] = $info_arquivo['file_name'];
            $info = $this->usuario_model->Alterusuario($usuario, $dadoscadastrais);
        }
        if (isset($info)) {
            $this->session->texto = "Usuario Alterado Com Sucesso!!!";
            $this->session->type = $this->session->type = "alert alert-info";;
        }
        redirect('pagina/alterarusuario');
    }

    public function alterarFoto()
    {
        $this->load->model('usuario_model');
        $this->load->model('funcionario_model');
        $config['upload_path'] = FCPATH . "assets/img/avatar";
        $config["allowed_types"] = "jpg|jpeg|png";
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->do_upload('nm_imagem');
        $info_arquivo = $this->upload->data();
        $usuario['nm_foto'] = $info_arquivo['file_name'];
        if ($this->session->set_funcionario) {
            $info = $this->funcionario_model->Alterfoto($usuario);
        } else {
            $info = $this->usuario_model->Alterfoto($usuario);
        }
        if (isset($info)) {
            $this->session->texto = "Foto Alterada Com Sucesso!!!";
            $this->session->type = $this->session->type = "alert alert-info";;
        }
        redirect('pagina/alterarfoto');
    }

    public function AlterarSenha()
    {
        $this->load->model('usuario_model');
        $this->load->model('funcionario_model');
        $usuarioemail = $this->input->post('email');
        $senha1 = md5($this->input->post('senha1')); // Senha Atual
        $usuario['senha'] = md5($this->input->post('senha2')); // Nova Senha
        $confirmarsenha = md5($this->input->post('senha3')); // Confirmar Nova Senha
        if ($this->session->set_funcionario) { // Alterar Senha Funcionario
            $email = $this->funcionario_model->get_email($usuarioemail);
            if ($email) {
                $senha = $this->funcionario_model->get_senha($senha1); //Senha vinda do Banco de Dados
                if ($senha) {
                    if ($usuario['senha'] == $confirmarsenha) {
                        $info1 = $this->funcionario_model->Altersenha($usuario);
                    } else {
                        $this->session->texto = "As Senhas Não São Iguais!!!";
                        $this->session->type = $this->session->type = "alert alert-info";
                        redirect('pagina/alterarsenha');
                    }
                } else {
                    $this->session->texto = "Senha Incorreto!!!";
                    $this->session->type = $this->session->type = "alert alert-info";
                    redirect('pagina/alterarsenha');
                }
            } else {
                $this->session->texto = "Email Incorreto!!!";
                $this->session->type = $this->session->type = "alert alert-info";
                redirect('pagina/alterarsenha');
            }
        } else { // Alterar Senha Empresa
            $email = $this->usuario_model->get_email("$usuarioemail"); //Confirmação Do BD Para Email
            if ($email) {
                $senha = $this->usuario_model->get_senha($senha1); //Confirmação Do BD Para Senha
                if ($senha) {
                    if ($usuario['senha'] == $confirmarsenha) {
                        $info2 = $this->usuario_model->Altersenha($usuario);
                    } else {
                        $this->session->texto = "As Senhas Não São Iguais!!!";
                        $this->session->type = $this->session->type = "alert alert-info";
                        redirect('pagina/alterarsenha');
                    }
                } else {
                    $this->session->texto = "Senha Incorreto!!!";
                    $this->session->type = $this->session->type = "alert alert-info";
                    redirect('pagina/alterarsenha');
                }
            } else {
                $this->session->texto = "Email Incorreto!!!";
                $this->session->type = $this->session->type = "alert alert-info";
                redirect('pagina/alterarsenha');
            }
        }
        if (isset($info1)) {
            $this->session->texto = "Senha Alterada Com Sucesso!!!";
            $this->session->type = $this->session->type = "alert alert-info";;
        }
        if (isset($info2)) {
            $this->session->texto = "Senha Alterada Com Sucesso!!!";
            $this->session->type = $this->session->type = "alert alert-info";;
        }
        redirect('pagina/alterarsenha');
    }
}
