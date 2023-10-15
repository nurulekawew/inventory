<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends MY_Controller {


    public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
	}
    
    public function index()
    {
        
		$data['title'] = "Managemen Toko";
		$data['data'] = $this->toko->getAll();
		$this->template->admthemes('toko/index',$data);
    } 

}

/* End of file Toko.php */
