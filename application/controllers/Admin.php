<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->getsecurity();
		$this->load->library('form_validation');
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index(){
		$data['admin'] = $this->db->query("SELECT * FROM tbl_admin")->result_array();
		$this->load->view('admin', $data);
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('login');
		}
	}
	public function daftar(){
		$this->form_validation->set_rules('namefront', 'Namefront', 'trim|required');
		$this->form_validation->set_rules('nameback', 'Nameback', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|is_unique[tbl_admin.username_admin]',array(
			'required' => 'Username Wajib Di isi.',
			'is_unique' => 'Username Sudah Di Gunakan'
			 ));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',array(
			'required' => 'Email Wajib Di isi.',
			 ));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|matches[password2]',array(
			'matches' => 'Password Tidak Sama.',
			'min_length' => 'Password Minimal 8 Karakter.'
			 ));
		$this->form_validation->set_rules('password2', 'Password2', 'trim|required|matches[password]');
		if ($this->form_validation->run() == false) {
			$this->load->view('daftar');
		} else {
			// die(print_r($_POST));
			$data = array(
				'nama_admin' => $this->input->post('namefront').' '.$this->input->post('nameback'),
				'email_admin'		 => $this->input->post('email'),
				'username_admin' => strtolower($this->input->post('username')),
				'password_admin' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				'status_admin' => 1,
				'date_create_admin' => time()
				 );
			// die(print_r($data));
			$this->db->insert('tbl_admin', $data);
			$this->session->set_flashdata('message', 'swal("Berhasil", "Silahkan Login", "success");');
    		redirect('admin');
		}

	}
	public function view($id=''){
		$data['title'] = 'lihat Pegawai';
		$sqlcek = $this->db->get_where('tbl_admin',['kd_admin' => $id])->row_array();
	 		if (!$sqlcek == NULL) {
	 			$data['admin'] = $sqlcek;
	 			$this->load->view('view_admin', $data);
	 			}else{
	 			$this->session->set_flashdata('message', 'swal("Gagal", "data tidak ada", "error");');
	    		redirect('admin');
	 			}
	 	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */