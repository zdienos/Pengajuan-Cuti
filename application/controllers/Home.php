<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index(){
		$data['pegawai'] = $this->db->query("SELECT count(kd_pegawai) FROM tbl_pegawai ")->row_array();
		$data['cuti'] = $this->db->query("SELECT count(kd_cuti) FROM tbl_cuti ")->row_array();
		$data['admin'] = $this->db->query("SELECT count(kd_admin) FROM tbl_admin ")->row_array();
		// die(print_r($data));
		$this->load->view('home',$data);
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('login');
		}
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */