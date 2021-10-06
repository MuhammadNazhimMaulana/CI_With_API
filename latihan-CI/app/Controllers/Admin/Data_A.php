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

        return view('View_Data/view_all', $data);

    }

    public function ketiga()
    {
        // Get cURL resource
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://jsonplaceholder.typicode.com/posts?userId=1',
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

        return view('View_Data/view_all', $data);

    }

    public function view()
    {
        $id = $this->request->uri->getSegment(4);

        // Get cURL resource
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://jsonplaceholder.typicode.com/posts/'.$id,
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
            'title' => 'View Data Spesifik API'
        ];

        return view('View_Data/view_specific', $data);

    }

    public function insert()
    {
        $data_insert = [
            'title' => 'Insert Data Using Curl'
        ];


        if($this->request->getPost())
        {
            $url = "https://jsonplaceholder.typicode.com/posts";
            
            $data_array = array(    
                'title' => $this->request->getPost('title'),
                'body' => $this->request->getPost('body'),
                'userId' => $this->request->getPost('userId')
            );
            
            $data = http_build_query($data_array);
            
            $curl = curl_init();
            
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            
            $resp = curl_exec($curl);

            $respon = [
                'title' => 'Hasil Input',
                'datas' => $resp
            ];

        }

        return view('View_Data/insert_data', $data_insert);
    }
}
