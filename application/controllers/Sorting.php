<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Sorting extends CI_Controller {

    public function index()
    {
        $data['title'] = 'Sorting Nilai';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('sorting/index');
        $this->load->view('templates/footer');
    }

}

/* End of file Sorting.php */

?>