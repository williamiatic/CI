<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paginacao_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function paginacao($paginacao)
    {
        $this->load->model($paginacao['model']);
        $config['base_url'] = base_url($paginacao['url']);
        $config['per_page'] = 7;
        $config['num_links'] = 2;
        $config['uri_segment'] = 3;
        $config['total_rows'] = $paginacao['totalrows'];
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = ['class' => 'page-link'];
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Anterior';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Proximo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        return $config;
    }
}
