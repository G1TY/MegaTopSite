<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Music extends CI_Controller {

    /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {

		$this->load->view('templates/header');
		$this->load->view('musicIndex');
        $this->load->view('templates/footer');
    }

    public function apiGetImg(){
        $this->load->database();
        $id = isset($_POST['id']) ? $_POST['id'] : 1;
	    $query = "select pic from playlist where id = $id";
	    $res = $this->db->query($query);
	    echo json_encode($res->result_array());
    }
}
