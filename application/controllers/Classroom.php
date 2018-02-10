<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classroom extends Base {
	
    public function id($format_id, $sub, $dep_id, $course_id, $class_id) 
    {
        $this->render('class/id');
    }

  	public function annual($class_id)
  	{
  		$this->render('class/annual');
  	}
    
}
