<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {


    public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
	}
    
    public function index()
    {
        
		$data['title'] = "Managemen Toko";
		$data['data'] = $this->users->getAll();
		$this->template->admthemes('users/index',$data);
    } 

}

/* End of file Users.php */