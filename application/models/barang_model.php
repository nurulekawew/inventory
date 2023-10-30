<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_Model extends MY_Model {
 

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'nama_barang',
                'label' => 'Nama Barang',
                'rules' => 'trim|required|min_length[3]|max_length[100]'
            ],
            // [
            //     'field' => 'kode_barang',
            //     'label' => 'Kode Barang',
            //     'rules' => 'trim|required|min_length[4]|max_length[100]'
            // ],
            [
                'field' => 'unit',
                'label' => 'Unit',
                'rules' => 'trim|required|min_length[1]|max_length[10]'
            ],
            // [
            //     'field' => 'stock_barang',
            //     'label' => 'Stock Barang',
            //     'rules' => 'trim|required|min_length[11]|max_length[12]'
            // ],
            // [
            //     'field' => 'foto_barang',
            //     'label' => 'Foto Barang',
            //     'rules' => 'trim|required|min_length[11]|max_length[12]'
            // ],
        ];

        return $validationRules;
    }
    public function getDefaultValues()
    {
        return [
            'nama_barang'    => '',
            'kode_barang'  => '',
            'unit'      => '', 
            'stock_barang'      => 0,         
        ];
    }

	public function Fake()
	{
		$data = [
			'nama_barang' => $this->faker->realText(rand(10,20)),
			'kode_barang' => $this->faker->realText(rand(10,20)),
			'unit' => "lusin",
            'foto_barang' => image(FCPATH . "upload/barang", 500, 500, 'cats', true, true, 'Faker')
		];

		return (object)$data; 

    }
}

/* End of file ModelName.php */
