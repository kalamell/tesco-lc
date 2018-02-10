<?php 
class Base extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->uri->segment(1) == 'course' && $this->uri->segment(2) == 'annual') {
            $this->session->set_userdata('current_url', current_url());
        }
        if (!$this->session->userdata('id')) redirect('auth/login');
    }

    public function render($view, $data = array()) 
    {
        $this->load->view('header');
        $this->load->view($view, $data);
        $this->load->view('footer');
    }

}
