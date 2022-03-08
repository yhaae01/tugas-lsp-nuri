<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model 
{

    public function getAllData()
    {
        return $this->db->get('buku')->result_array();
    }

    public function getBukuById($id_buku)
    {
        return $this->db->get_where('buku', ['id_buku' => $id_buku])->row_array();
    }

    public function tambah()
    {
        $gambar = $this->upload->data();

        $data = [
            'judul'     => $this->input->post('judul'),
            'isbn'      => $this->input->post('isbn'),
            'kategori'  => $this->input->post('kategori'),
            'pengarang' => $this->input->post('pengarang'),
            'penerbit'  => $this->input->post('penerbit'),
            'image'     => $gambar['file_name'],
        ];

        $this->db->insert('buku', $data);
        $this->session->set_flashdata(
            'message',
            'ditambah'
        );
        redirect('buku');
    }

    public function hapus($id_buku)
    {
        $this->db->delete('buku', ['id_buku' => $id_buku]);
        $this->session->set_flashdata(
            'message',
            'dihapus'
        );
        redirect('buku');
    }

    public function ubah()
    {
        $id_buku = $this->input->post('id_buku');
        $data = [
            'judul'     => $this->input->post('judul'),
            'isbn'      => $this->input->post('isbn'),
            'kategori'  => $this->input->post('kategori'),
            'pengarang' => $this->input->post('pengarang'),
            'penerbit'  => $this->input->post('penerbit'), 
        ];
        $this->db->where('id_buku', $id_buku);
        $this->db->update('buku', $data);

        $this->session->set_flashdata(
            'message',
            'diubah'
        );
        redirect('buku');
    }

    public function cariBuku()
    {
        $cari = $this->input->post('cari', true);
        $this->db->like('judul', $cari);
        // untuk mencari lebih dari 1 keyword
        $this->db->or_like('isbn', $cari);
        $this->db->or_like('pengarang', $cari);
        $this->db->or_like('penerbit', $cari);

        return $this->db->get('buku')->result_array();
    }

}

/* End of file Buku_model.php */

?>