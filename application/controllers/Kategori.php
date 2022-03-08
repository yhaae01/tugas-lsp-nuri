<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model', 'kategori');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $data['title']    = 'Daftar Kategori';
        $data['kategori'] = $this->kategori->getAllData();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('kategori/index');
        $this->load->view('templates/footer');
    }

    public function tambahKategori()
    {
        $data['title']    = 'Tambah Kategori';
        $data['kategori'] = $this->kategori->getAllData();

        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required', [
            'required' => 'Nama Kategori harus diisi!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('kategori/tambahKategori');
            $this->load->view('templates/footer');
        } else {
            $this->kategori->tambah();
        }
    }

    public function hapusKategori($id_kategori)
    {
        $this->kategori->hapus($id_kategori);
    }

    public function ubahKategori($id_kategori)
    {
        $data['title']    = 'Ubah kategori';
        $data['kategori'] = $this->kategori->getKategoriById($id_kategori);
        $id_kategori = $this->input->post('id_kategori');

        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required', [
            'required' => 'Nama Kategori harus diisi!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('kategori/ubahKategori');
            $this->load->view('templates/footer');
        } else {
            $this->kategori->ubah($id_kategori);
        }
    }
}

/* End of file Kategori.php */

?>