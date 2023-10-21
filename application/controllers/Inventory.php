<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends MY_Controller {


    public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
	}
    
    public function index()
    {
        
		$data['title'] = "Managemen Toko";
		$data['data'] = $this->inventory->getAll();
		$this->template->admthemes('inventory/index',$data);
    } 

}

/* End of file Inventory.php */