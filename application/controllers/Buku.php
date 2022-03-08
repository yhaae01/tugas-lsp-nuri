<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model', 'buku');
        $this->load->model('Kategori_model', 'kategori');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $data['title'] = 'Daftar Buku';
        $data['buku'] = $this->buku->getAllData();
        if ($this->input->post('cari')) {
            $data['buku'] = $this->buku->cariBuku();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('buku/index');
        $this->load->view('templates/footer');
    }

    public function tambahBuku()
    {
        $data['title'] = 'Tambah Buku';
        $data['kategori'] = $this->kategori->getAllData();

        $this->form_validation->set_rules('judul', 'Judul', 'trim|required', [
            'required' => 'Judul harus diisi!'
        ]);
        $this->form_validation->set_rules('isbn', 'ISBN', 'trim|required|numeric|is_unique[buku.isbn]', [
            'required' => 'ISBN harus diisi!',
            'numeric'  => 'ISBN harus angka!',
            'is_unique'=> 'ISBN sudah digunakan!'
        ]);
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required', [
            'required' => 'Kategori harus diisi!'
        ]);
        $this->form_validation->set_rules('pengarang', 'Pengarang', 'trim|required', [
            'required' => 'Pengarang harus diisi!'
        ]);
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'trim|required', [
            'required' => 'Penerbit harus diisi!'
        ]);

        $nama = 'BK_' . time();
        $config['upload_path']   = './assets/img/buku/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|JPEG|jpeg';
        $config['max_size']      = '2000';
        $config['max_width']     = '2000';
        $config['max_height']    = '2000';
        $config['file_name']     = $nama;

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('buku/tambahBuku');
            $this->load->view('templates/footer');
        } else {
            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata(
                    'message',
                    'Oops! Terjadi suatu kesalahan'
                );
            } else {
                $this->buku->tambah();
            }
        }
    }

    public function hapus($id_buku)
    {
        $prevImage  = $this->db->get_where('buku', ['id_buku' => $id_buku])->row_array()['image'];

        // delete previous image
        if ($prevImage != 'default.jpg') {
            unlink(FCPATH . 'assets/img/buku/' . $prevImage);
        }
        $this->buku->hapus($id_buku);
    }

    public function ubahBuku($id_buku)
    {
        $data['title']    = 'Ubah Buku';
        $data['buku']     = $this->buku->getBukuById($id_buku);
        $data['kategori'] = $this->kategori->getAllData();
        $id_buku = $this->input->post('id_buku');

        $this->form_validation->set_rules('judul', 'Judul', 'trim|required', [
            'required' => 'Judul harus diisi!'
        ]);
        $this->form_validation->set_rules('isbn', 'ISBN', 'trim|required|numeric', [
            'required' => 'ISBN harus diisi!',
            'numeric'  => 'ISBN harus angka!',
        ]);
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required', [
            'required' => 'Kategori harus diisi!'
        ]);
        $this->form_validation->set_rules('pengarang', 'Pengarang', 'trim|required', [
            'required' => 'Pengarang harus diisi!'
        ]);
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'trim|required', [
            'required' => 'Penerbit harus diisi!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('buku/ubahBuku');
            $this->load->view('templates/footer');
        } else {
            $uploadImage = $_FILES['image']['name'];

            if ($uploadImage) {
                $nama = 'BK_' . time();
                $config['upload_path']   = './assets/img/buku/';
                $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|JPEG|jpeg';
                $config['max_size']      = '2000';
                $config['max_width']     = '2000';
                $config['max_height']    = '2000';
                $config['file_name']     = $nama;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $prevImage  = $this->db->get_where('buku', ['id_buku' => $id_buku])->row_array()['image'];
                    // Hapus gambar lama
                    if ($prevImage != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/buku/' . $prevImage);
                    }
                    $new_image = $this->upload->data('file_name');

                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            // Jika ubah selain gambar
            $this->buku->ubah($id_buku);
        }
    }

    public function detailBuku($id_buku)
    {
        $data['title']    = 'Detail Buku';
        $data['buku']     = $this->buku->getBukuById($id_buku);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('buku/detailBuku');
        $this->load->view('templates/footer');
    }

}

/* End of file Buku.php */

?>