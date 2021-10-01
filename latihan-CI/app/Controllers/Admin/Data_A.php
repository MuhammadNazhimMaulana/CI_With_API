<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Data_A extends BaseController
{
    public function __construct()
    {
        // Memanggil Helper
        helper('form');

        // Load Validasi
        $this->validation = \Config\Services::validation();

        // Load Session
        $this->session = session();
    }
    
    // Menggunakan CURLRequest Class dari CI
    public function pertama()
    {
		$curl = service('curlrequest');
		// OR $curl = \Config\Services::curlrequest();

		$posts_data = $curl->request("get", "https://jsonplaceholder.typicode.com/posts", [
			"headers" => [
				"Accept" => "application/json"
			]
		]);

        $hasil = json_decode($posts_data->getBody());
		echo "<pre>";

		// Mencari yang spesifik
        // print_r($hasil[1]->title);
        
        // Untuk Semua
		// print_r($hasil);

        print_r($hasil);
    }

    // Menggunakan Cara Yang Biasa
    public function kedua()
    {
        // Get cURL resource
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://jsonplaceholder.typicode.com/posts',
            CURLOPT_USERAGENT => 'Codular Sample cURL Request'
        ));
        // Send the request & save response to $resp
        $resp = curl_exec($curl);

        // Json Decode
        $decode = json_decode($resp);

        // Close request to clear up some resources
        curl_close($curl);

        $data = [
            'datas' => $decode,
            'title' => 'View Data API'
        ];

        return view('View_Data/view_all.php', $data);

    }
}
