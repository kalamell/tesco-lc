<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends Base {
	
    public function index()
    {
    	$this->render('testing/index');
    }

    public function id($testing_id, $course_id)
    {
    	$this->render('testing/id');
    }

    public function data()
    {
    	$this->load->view('testing/data');
    }
  
    
}
