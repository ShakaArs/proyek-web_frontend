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
}