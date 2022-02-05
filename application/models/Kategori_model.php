<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

    public function getAllData()
    {
        return $this->db->get('kategori')->result_array();
    }

}

/* End of file Kategori_model.php */

?>