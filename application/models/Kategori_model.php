<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model 
{
    public function getAllData()
    {
        return $this->db->get('kategori')->result_array();
    }

    public function getKategoriById($id_kategori)
    {
        return $this->db->get_where('kategori', ['id_kategori' => $id_kategori])->row_array();
    }

    public function tambah()
    {
        $data = [
            'kategori'     => $this->input->post('kategori'),
        ];

        $this->db->insert('kategori', $data);
        $this->session->set_flashdata(
            'message',
            'ditambah'
        );
        redirect('kategori');
    }

    public function hapus($id_kategori)
    {
        $this->db->delete('kategori', ['id_kategori' => $id_kategori]);
        $this->session->set_flashdata(
            'message',
            'dihapus'
        );
        redirect('kategori');
    }

    public function ubah()
    {
        $id_kategori = $this->input->post('id_kategori');
        $data = [
            'kategori'     => $this->input->post('kategori'),
        ];
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori', $data);

        $this->session->set_flashdata(
            'message',
            'diubah'
        );
        redirect('kategori');
    }

}

/* End of file Kategori_model.php */

?>