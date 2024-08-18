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
        $id = intval($id);
        $url = 'http://localhost:8081/api/proyek/find?id=' . $id;
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
            return ['data' => null, 'message' => 'Error saat mengambil data.'];
        }
        $data = json_decode($response, true);
        error_log('API Response: ' . var_export($data, true));
        if (json_last_error() !== JSON_ERROR_NONE) {
            return ['data' => null, 'message' => 'JSON decode error: ' . json_last_error_msg()];
        }
        if (isset($data['data'])) {
            return $data;
        } else {
            return ['data' => null, 'message' => 'Proyek tidak ditemukan'];
        }
    }

    public function updateProyek($id, $data) {
        $url = 'http://localhost:8081/api/proyek/update/' . $id;  // Tentukan URL endpoint secara langsung

        // Setup cURL
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen(json_encode($data))
        ]);

        // Execute cURL request
        $response = curl_exec($ch);

        // Check for errors
        if ($response === false) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new Exception('cURL Error: ' . $error);
        }

        // Close cURL resource
        curl_close($ch);

        // Decode JSON response
        $result = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Error decoding JSON response: ' . json_last_error_msg());
        }

        return $result;
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
