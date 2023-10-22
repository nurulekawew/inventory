<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_handler {
    protected $_ci;

    public function __construct() {
        $this->_ci = &get_instance();
        $this->_ci->load->library('upload');
    }

    public function do_upload($input_name, $file_name, $folder) {
		$folder_path = FCPATH . "upload/" . $folder;
		if (!is_dir($folder_path)) {
			mkdir($myfolder, 0755, true);
		}
		
        $config = array(
            'upload_path'   => $folder_path,
            'allowed_types' => 'jpg|jpeg|png',
            'file_name'     => $file_name,
            'overwrite'     => true,
            'max_size'      => 1024, // 1MB
            'max_width'     => 1080,
            'max_height'    => 1080
        );

        $this->_ci->upload->initialize($config);

        if ($this->_ci->upload->do_upload($input_name)) {
            $data = $this->_ci->upload->data();
            return $data;
        } else {
            $error = $this->_ci->upload->display_errors();
            return $error;
        }
    }
}
