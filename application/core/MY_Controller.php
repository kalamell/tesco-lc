<?php 
class Base extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id')) redirect('auth/login');
    }

    public function render($view, $data = array()) 
    {
        $this->load->view('header');
        $this->load->view($view, $data);
        $this->load->view('footer');
    }

}
