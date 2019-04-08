<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->getsecurity();
		$this->load->library('form_validation');
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('login');
		}
	}
	public function index()
	{
		$data['pegawai'] = $this->db->query('select * from tbl_pegawai')->result_array();
		// die(print_r($data));
		$this->load->view('pegawai', $data);
	}
	public function tambahpegawai($value=''){
		$this->form_validation->set_rules('namefront', 'Namefront', 'trim|required');
		$this->form_validation->set_rules('nameback', 'Nameback', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tbl_pegawai.email_pegawai]',array(
			'required' => 'Email Wajib Di isi.',
			'is_unique' => 'Email Sudah Di Gunakan'
			 ));
		$this->form_validation->set_rules('no_hp', 'No_hp', 'trim|required|min_length[4]|is_unique[tbl_pegawai.no_hp_pegawai]',array(
			'min_length' => 'Password Minimal 8 Karakter.',
			'is_unique' => 'No HP Sudah Di Gunakan'
			 ));
		if ($this->form_validation->run() == false) {
			$this->load->view('tambah_pegawai');
		} else {
			// die(print_r($_POST));
			$data = array(
				'nama_pegawai' => $this->input->post('namefront').' '.$this->input->post('nameback'),
				'email_pegawai'		 => $this->input->post('email'),
				'no_hp_pegawai' => $this->input->post('no_hp'),
				'alamat_pegawai' => $this->input->post('alamat'),
				'kelamin_pegawai' => $this->input->post('kelamin'),
				'date_create_pegawai' => time(),
				'insertby_pegawai' => $this->session->userdata('nama_admin')
				 );
			// die(print_r($data));
			$this->db->insert('tbl_pegawai', $data);
			$this->session->set_flashdata('message', 'swal("Berhasil", "Berhasil Tambah Pegewai", "success");');
    		redirect('pegawai');
		}
	}
	public function view($id=''){
		$data['title'] = 'lihat Pegawai';
		$sqlcek = $this->db->get_where('tbl_pegawai',['kd_pegawai' => $id])->row_array();
	 		if (!$sqlcek == NULL) {
	 			$data['pegawai'] = $sqlcek;
	 			// print_r($data);
	 			// die();
	 			$this->load->view('view_pegawai', $data);
	 			}else{
	 			$this->session->set_flashdata('message', 'swal("Gagal", "data tidak ada", "error");');
	    		redirect('pegawai');
	 			}
	 	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */