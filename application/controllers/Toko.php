<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends MY_Controller {

	protected $base = "toko";

    public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
	}
    
    public function index()
    {
        $data['create_url'] = $this->base . "/create";
        $data['edit_url'] = $this->base . "/edit";
        $data['delete_url'] = $this->base . "/delete";
		$data['title'] = "Managemen Toko";
		$data['data'] = $this->toko->getAll();
		$this->template->admthemes($this->base . '/index',$data);
    } 


	public function delete($id = null)
	{
		$id= base64_decode($id);

		$data = $this->toko->where('id_toko', $id)->get();
        if (!$data) {
            $this->session->set_flashdata('warning', 'Data tidak ada.');
        }

        if ($this->toko->where('id_toko', $id)->delete()) {
			$this->session->set_flashdata('success', '<strong>Success</strong>, Data berhasil dihapus.');
		} else {
            $this->session->set_flashdata('error', '<strong>Error</strong>, Data gagal dihapus.');
        }

		redirect(base_url($this->$base));
	}	

	public function create()
	{
		$data['title'] = "Create Toko";		
		$data['action'] = $this->base . "/insert";

		$this->template->admthemes($this->base . '/create',$data);
	}

	public function insert()
	{
		if (!$_POST) {
			$input = (object) $this->toko->getDefaultValues();
		} else {
			$input = (object) $this->input->post(null, true);
		}  

		if($this->toko->validate()){
			if ($this->toko->insert($input)) { 
				$this->session->set_flashdata('success', '<strong>Success</strong>, Data berhasil disimpan.'); 
				redirect('toko');
        	}else {  
				$this->session->set_flashdata('success', '<strong>Success</strong>, Data gagal disimpan.');  
        	}
		}else{
			$this->create();
		}
	}

}

/* End of file Toko.php */
