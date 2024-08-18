<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';

use GuzzleHttp\Client;

class hal_admin extends CI_Controller {

    private $apiUrl = 'http://localhost:8081/api/proyek'; 

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->client = new Client();
        $this->load->model('Proyek_model');
        $this->load->model('Lokasi_model');
    }

    public function index() {
        $response_proyek = $this->Proyek_model->getProyekData();
        $data_proyek = $response_proyek['data'] ?? [];
        $response_location = $this->Lokasi_model->getLocationData();
        $data_location = $response_location['data'] ?? [];
        $this->load->view('Home', [
            'data_proyek' => $data_proyek,
            'data_location' => $data_location
        ]);
    }

    public function create() {
        $this->load->view('proyek_form');
    }

    public function store() {
        $data = [
            'namaProyek' => $this->input->post('namaProyek'),
            'client' => $this->input->post('client'),
            'tanggalMulai' => $this->input->post('tanggalMulai'),
            'tanggalSelesai' => $this->input->post('tanggalSelesai'),
            'pimpinanProyek' => $this->input->post('pimpinanProyek'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->Proyek_model->addProyek($data);
        redirect('hal_admin');
    }

    public function edit($id) {
        $data = $this->Proyek_model->getProyekById($id);
        if (isset($data['data'])) {
            $this->load->view('proyek_edit', ['data' => $data['data']]);
        } else {
            show_error('Data tidak ditemukan untuk id: ' . $id);
        }
    }
    

    public function update($id) {
        // Mengambil data dari form
        $data = [
            'namaProyek' => $this->input->post('namaProyek'),
            'client' => $this->input->post('client'),
            'tanggalMulai' => $this->input->post('tanggalMulai'),
            'tanggalSelesai' => $this->input->post('tanggalSelesai'),
            'pimpinanProyek' => $this->input->post('pimpinanProyek'),
            'keterangan' => $this->input->post('keterangan')
        ];
        try {
            $response = $this->client->request('PUT', $this->apiUrl . '/update/' . $id, [
                'json' => $data
            ]);
            if ($response->getStatusCode() == 200) {
                redirect('hal_admin');
            } else {
                show_error('Gagal mengupdate data. Status code: ' . $response->getStatusCode());
            }
        } catch (\Exception $e) {
            show_error('Gagal mengupdate data ke API: ' . $e->getMessage());
        }
    }
    
    

    public function delete($id) {
        try {
            $response = $this->client->request('DELETE', $this->apiUrl . '/delete', [
                'query' => ['id' => $id]
            ]);
    
            if ($response->getStatusCode() == 200) {
                redirect('hal_admin');
            } else {
                show_error('Gagal menghapus data. Status code: ' . $response->getStatusCode());
            }
        } catch (\Exception $e) {
            show_error('Gagal menghapus data dari API: ' . $e->getMessage());
        }
    }
    
}
