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
        $this->load->library('form_validation');
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
    public function createlokasi() {
        $this->load->view('lokasi_form');
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
    public function storelokasi() {
        $data = [
            'nama_lokasi' => $this->input->post('nama_lokasi'),
            'negara' => $this->input->post('negara'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota'),
        ];

        $this->Lokasi_model->addProyek($data);
        redirect('hal_admin');
    }

    public function edit($id) {
        if ($id) {
            $data = $this->Proyek_model->getProyekById($id);
            if ($data && isset($data['data'])) {
                $this->load->view('editproyek_form', ['data' => $data['data']]);
            } else {
                $message = isset($data['message']) ? $data['message'] : 'Data tidak ditemukan';
                show_error("Data tidak ditemukan untuk id: $id. Response Data: $message");
            }
        } else {
            show_error('ID proyek tidak valid.');
        }
    }
    public function update($id) {
        $this->form_validation->set_rules('namaProyek', 'Nama Proyek', 'required');
        $this->form_validation->set_rules('client', 'Client', 'required');
        $this->form_validation->set_rules('tanggalMulai', 'Tanggal Mulai', 'required|callback_valid_date');
        $this->form_validation->set_rules('tanggalSelesai', 'Tanggal Selesai', 'required|callback_valid_date');
        $this->form_validation->set_rules('pimpinanProyek', 'Pimpinan Proyek', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('editproyek_form', ['error' => validation_errors(), 'data' => $this->input->post()]);
        } else {
            $data = [
                'namaProyek' => $this->input->post('namaProyek'),
                'client' => $this->input->post('client'),
                'tanggalMulai' => $this->input->post('tanggalMulai'),
                'tanggalSelesai' => $this->input->post('tanggalSelesai'),
                'pimpinanProyek' => $this->input->post('pimpinanProyek'),
                'keterangan' => $this->input->post('keterangan')
            ];
            $this->Proyek_model->updateProyek($id, $data);
            redirect('hal_admin');
        }
    }
    
    public function valid_date($date) {
        $d = DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
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
