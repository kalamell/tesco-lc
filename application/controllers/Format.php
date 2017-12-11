<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Format extends Base {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		redirect('home');
    }
    
    public function id($format_id) 
    {
        $this->render('format/id');
    }

    public function sub($format_id, $sub) 
    {
        $this->render('format/sub');
    }
    
}
