<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // Mendapatkan data lokasi dari API
    public function getLocationData()
    {
        $url = 'http://localhost:8081/api/lokasi/get'; // Ganti dengan endpoint API lokasi Anda
        $response = file_get_contents($url);
        return json_decode($response, true);
    }
    //post
    public function addProyek($data) {
        $url = 'http://localhost:8081/api/lokasi/create'; 
        $options = [
            'http' => [
                'header'  => "Content-Type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($data),
            ],
        ];
        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        return json_decode($response, true);
    }
}