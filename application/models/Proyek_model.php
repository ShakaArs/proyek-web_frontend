<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getProyekData() {
        $url = 'http://localhost:8081/api/proyek/get'; 
        $response = file_get_contents($url);
        return json_decode($response, true);
    }
    public function addProyek($data) {
        $url = 'http://localhost:8081/api/proyek/create'; 
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
    public function getProyekById($id) {
    $url = 'http://localhost:8081/api/proyek/find?id=' . $id;
    echo 'Request URL: ' . $url; // Debugging URL
    $options = [
        'http' => [
            'header'  => "Content-Type: application/json\r\n",
            'method'  => 'GET',
            'ignore_errors' => true,
        ],
    ];
    $context  = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    
    if ($response === FALSE) {
        $error = error_get_last();
        echo 'Error: ' . $error['message'];
        return null;
    }
    
    // Debugging: Cetak hasil respons
    echo 'Response: ' . $response;
    
    return json_decode($response, true);
}

    
    
    

    public function updateProyek($id, $data) {
        $url = $this->apiUrl . '/update/' . $id; 
        $options = [
            'http' => [
                'header'  => "Content-Type: application/json\r\n",
                'method'  => 'PUT',
                'content' => json_encode($data),
            ],
        ];
        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        return json_decode($response, true);
    }
    public function deleteProyek($id) {
        $url = $this->apiUrl . '/delete?id=' . $id; 
        $options = [
            'http' => [
                'method'  => 'DELETE',
            ],
        ];
        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        return json_decode($response, true);
    }

}
