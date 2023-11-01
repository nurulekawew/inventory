<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends MY_Controller {

	protected $base = "toko";

    public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->library('Pdflib');
	}
    
    public function index()
    {
		$data = [
			'data' => $this->toko->getAll(),
			'title' => 'Managemen Toko',
			'tanggal_sekarang' => $this->toko->CurrentDate,
			'by' => $this->toko->CurrentUser,
			// 'create_url' => $this->base . "-create",
			// 'edit_url' => $this->base . "-edit",
			// 'delete_url' => $this->base . "-delete",
			'urls' => [
				'create' => $this->base . '-create',
				'edit' => $this->base . '-edit',
				'delete' => $this->base . '-delete',
			]
		];
		// var_dump($data); exit;
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
		$data = [
			'title' => "Create Toko", 
			'action' => $this->base . "-store"
		]; 

		$this->template->admthemes($this->base . '/create',$data);
	}

	public function edit($id = null)
	{ 
		$id= base64_decode($id);
		$data = [
			'title' => "Edit Toko",
			'data' => $this->toko->where('id_toko', $id)->get(),
			'action' => $this->base . "-update"
		]; 
		// var_dump($data['data']); exit;
		$this->template->admthemes($this->base . '/edit',$data);
	}

	public function store()
	{
		if (!$_POST) {
			$input = (object) $this->toko->getDefaultValues();
		} else {
			$input = (object) $this->input->post(null, true);
		}  

		if($this->toko->validate()){
			if ($this->toko->insert($input)) { 
				$this->session->set_flashdata('success', '<strong>Success</strong>, Data berhasil disimpan.'); 
				redirect(base_url($this->base));
        	}else {  
				$this->session->set_flashdata('error', '<strong>Error</strong>, Data gagal disimpan.'); 
        	}
		}else{
			$this->create();
		} 
	}

	public function update()
	{
		$id = $this->input->post('id_toko');

		if (!$_POST) {
			$input = (object) $this->toko->getDefaultValues();
		} else {
			$input = (object) $this->input->post(null, true);
			$input->id_toko = base64_decode($id);
		} 

		if($this->toko->validate()){
			$existing = $this->toko->where('id_toko', $input->id_toko)->get(); 
			if($existing == null || $existing->id_toko == "" || $existing->id_toko == null){
				$this->session->set_flashdata('error', '<strong>Not Found</strong>, Data tidak ditemukan.');
				$this->edit($id);
			}else{
				if ($this->toko->where('id_toko', $input->id_toko)->update($input)) {
					$this->session->set_flashdata('success', '<strong>Success</strong>, Data berhasil diupdate.');
					redirect(base_url($this->base));
				} else {
					$this->session->set_flashdata('error', '<strong>Failed</strong>, Data gagal diupdate.');
					$this->edit($id);
				}
			}
		}else{
			$this->edit($id);
		} 
	}

	public function faker($jumlah = 5)
	{
		for ($i=0; $i < $jumlah; $i++) {			
			$data = $this->toko->FakeToko(); 
			$this->toko->insert($data);
		}
		$this->session->set_flashdata('success', '<strong>Success</strong>, Data berhasil digenerate.'); 
		redirect(base_url($this->base));
	}

	public function pdf()
	{
		$data = [
			'data' =>  $this->toko->getAll(),
			'title' => 'Managemen Toko',
			'tanggal_sekarang' => $this->toko->CurrentDate,
			'by' => $this->toko->CurrentUser
		];
		$this->pdflib->setPaper('A4', 'landscape');
		$this->pdflib->filename = "laporan-" . $this->base . ".pdf";
		$this->pdflib->load_view($this->base . '/pdf', $data);
		// $this->load->view($this->base . '/pdf', $data);
		
	}

}

/* End of file Toko.php */
