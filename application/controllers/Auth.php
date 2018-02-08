<?php 
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
    }

    public function login()
    {
        if ($this->session->userdata('id')) redirect('');
        $this->load->view('auth/login');
    }

    public function getcaptcha()
    {
        $vals = array(
            'img_path'      => './assets/captcha/',
            'img_url'       => base_url('assets/captcha'),
            'font_path'     => base_url(). 'system/fonts/texb.ttf',
            'img_width'     => '150',
            'img_height'    => '30',
            'expiration'    => 300,
            'word_length'   => 4,
            'font_size'     => 16,
            'img_id'        => 'Imageid',
            'pool'          => '0123456789',
    
            // White background and border, black text and red grid
            'colors'        => array(
                    'background' => array(255, 255, 255),
                    'border' => array(255, 255, 255),
                    'text' => array(0, 0, 0),
                    'grid' => array(177, 177, 177)
            )
        );
        $cap = create_captcha($vals);

        $this->session->set_userdata('captcha', array(
            'word' => $cap['word'],
            'time' => $cap['time'],
        ));
        echo $cap['time'];
    }

    function checkotp()
    {
        $ar = array(
            'status' => false
        );
        $config = array(
            array(
                'field' => 'captcha',
                'label' => 'Captcha',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $sess = $this->session->userdata('captcha');
            if ($this->input->post('captcha') == $sess['word']) {
                $ar = array(
                    'status' => true
                );
            }
        } 
        echo json_encode($ar);

    }

    function setaccount()
    {
        $config = array(
            array(
                'field' => 'user_id',
                'label' => 'ID',
                'rules' => 'required',
            ),
            array(
                'field' => 'firstname',
                'label' => 'name',
                'rules' => 'required',
            ),
            array(
                'field' => 'lastname',
                'label' => 'lastname',
                'rules' => 'required',
            ),
            array(
                'field' => 'token',
                'label' => 'token',
                'rules' => 'required',
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->session->set_userdata(array(
                'id' => $this->input->post('user_id'),
                'employee_id' => $this->input->post('employee_id'),
                'fullname' => $this->input->post('fullname'),
                'name' => $this->input->post('firstname').' '.$this->input->post('lastname'),
                'token' => $this->input->post('token')
            ));
            
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('');
    }

}