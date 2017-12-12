<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends Base {
	
    public function id($format_id, $sub, $dep_id) 
    {
        $this->render('course/id');
    }

   public function data()
   {
       $this->load->view('course/detail');
   }
    
}
