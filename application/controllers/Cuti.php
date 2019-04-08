<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->library('form_validation');
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('login');
		}
	}
	public function index(){
		$data['cuti'] = $this->db->query('SELECT * FROM tbl_cuti LEFT JOIN tbl_pegawai on tbl_cuti.kd_pegawai = tbl_pegawai.kd_pegawai')->result_array();
		// die(print_r($data));
		$this->load->view('cuti', $data);
	}
	public function ajukancuti($value=''){
		$this->form_validation->set_rules('alasan', 'Alasan', 'trim|required');
		
		if ($this->form_validation->run() == false) {
			$data['pegawai'] = $this->db->query('select * from tbl_pegawai')->result_array();
			$this->load->view('ajukan_cuti',$data);
		} else {
			// die(print_r($_POST));
			$id = $this->input->post('pegawai');
			$date1 = $this->input->post('mulai');
			$date2 = $this->input->post('selesai');
			$alasan = $this->input->post('alasan');
			$resultday = $this->IntervalDays($date1,$date2);
			$sqlcek = $this->db->query("SELECT * FROM tbl_cuti LEFT JOIN tbl_pegawai on tbl_cuti.kd_pegawai = tbl_pegawai.kd_pegawai WHERE tbl_cuti.kd_pegawai ='".$id."'")->result_array();
			for ($i=0; $i < count($sqlcek) ; $i++) { 
				$total[$i] = $this->IntervalDays($sqlcek[$i]['tgl_mulai_cuti'],$sqlcek[$i]['tgl_selesai_cuti']);
			}
			$cekday = array_sum($total);
			if ($resultday <> '0') {
				if ($cekday < 5) {
					if ($sqlcek) {
						if ($resultday > 5) {
							$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
						 	Ajukan Minimal 5 hari
							</div>');
	    					redirect('cuti/ajukancuti');
						}elseif ($cekday > $resultday ) {
							$data = array(
							'kd_pegawai' => $id,
							'tgl_mulai_cuti' => $date1,
							'tgl_selesai_cuti' => $date2,
							'alasan_cuti' => $alasan,
							'insertby_cuti' => $this->session->userdata('nama_admin'),
							'status_cuti' => 1
							 );
							$this->db->insert('tbl_cuti', $data);
							$this->session->set_flashdata('message', 'swal("Berhasil", "Berhasil Tambah Cuti", "success");');
				    		redirect('cuti');
						}else{
							$total = 5-$cekday;
							$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
						 	Sisa Cuti Pegawai Hanya '.$total.' Hari
						</div>');
	    					redirect('cuti/ajukancuti');
						}
					}else{
						$data = array(
						'kd_pegawai' => $id,
						'tgl_mulai_cuti' => $date1,
						'tgl_selesai_cuti' => $date2,
						'alasan_cuti' => $alasan,
						'insertby_cuti' => $this->session->userdata('nama_admin'),
						'status_cuti' => 1
						 );
						$this->db->insert('tbl_cuti', $data);
						$this->session->set_flashdata('message', 'swal("Berhasil", "Berhasil Tambah Cuti", "success");');
			    		redirect('cuti');
					}
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
						 	Cuti Pegewai Sudah Lebih Dari 5 Hari
							</div>');
	    					redirect('cuti/ajukancuti');
				}
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
						 	Tanggal Tidak Boleh Sama
							</div>');
	    					redirect('cuti/ajukancuti');
			}
		}
			
	}
	function IntervalDays($CheckIn,$CheckOut){
		if ($CheckIn == NULL) {
			$interval = NULL;
			return  $interval;
		}else{
			$CheckInX = explode("-", $CheckIn);
		$CheckOutX =  explode("-", $CheckOut);
		$date1 =  mktime(0, 0, 0, $CheckInX[1],$CheckInX[2],$CheckInX[0]);
		$date2 =  mktime(0, 0, 0, $CheckOutX[1],$CheckOutX[2],$CheckOutX[0]);
		$interval =($date2 - $date1)/(3600*24);
		// returns numberofdays
		return  $interval+1 ;
		}
	}
	public function view($id=''){
		$data['title'] = 'Lihat Cuti';
		$sqlcek = $this->db->query("SELECT * FROM tbl_cuti LEFT JOIN tbl_pegawai on tbl_cuti.kd_pegawai = tbl_pegawai.kd_pegawai WHERE tbl_cuti.kd_cuti ='".$id."'")->row_array();
		// die(print_r($resultday));
	 		if (!$sqlcek == NULL) {
	 			$data['cuti'] = $sqlcek;
	 			$data['total'] = $this->IntervalDays($sqlcek['tgl_mulai_cuti'],$sqlcek['tgl_selesai_cuti']);
	 					// die(print_r($data));
	 			$this->load->view('view_cuti', $data);
	 			}else{
	 			$this->session->set_flashdata('message', 'swal("Gagal", "data tidak ada", "error");');
	    		redirect('cuti');
	 			}
	 	}
}

/* End of file Cuti.php */
/* Location: ./application/controllers/Cuti.php */