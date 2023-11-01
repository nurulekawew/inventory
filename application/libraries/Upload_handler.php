<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_handler {
    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->library('upload');
    }

    public function do_upload($file_name, $folder) {
		$folder_path = FCPATH . "upload/" . $folder;
		if (!is_dir($folder_path)) {
			mkdir($folder_path, 0755, true);
		}
		
        $config = array(
            'upload_path'   => $folder_path,
            'allowed_types' => 'jpg|jpeg|png',
            'file_name'     => $file_name,
            'overwrite'     => true,
            'max_size'      => 2024, // 1MB
            // 'max_width'     => 1080,
            // 'max_height'    => 1080
        ); 

        $this->CI->upload->initialize($config);
		
		if ($this->CI->upload->do_upload('foto_barang')) {
			$data = $this->CI->upload->data(); 
			$res = (object)[
				'status' => true,
				'message' => 'success',
				'data' => $data
			];
			return $res;
		} else {
			$error = $this->CI->upload->display_errors(); 
			$res = (object)[
				'status' => false,
				'message' => $error,
				'data' => []
			];
			return $res;
			// return $error;
		}
    }
}
