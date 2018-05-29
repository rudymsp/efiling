<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {

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
	public function index()
	{
		$isiedept = $this->session->userdata('id_dept');
		$id_karyawan = $this->session->userdata('id_karyawan');
		$nama_karyawan = $this->session->userdata('user_name');
		$this->session->set_userdata('id_dept1',$isiedept);
		$this->session->set_userdata('id_user1',$id_karyawan);

		$match = 'b';
		$kct = 'z';
		$wpi = 'o';

		$pos1 = strpos($isiedept, $match);
		$pos2 = strpos($isiedept, $kct);
		$pos3 = strpos($isiedept, $wpi);
		// $pos4 = strpos($isiedept, $finance);

		if ($pos1 === false AND $pos2 === false AND $pos3 === false) {

			$this->session->set_flashdata('message_name', 'Mohon maaf, Anda tidak dapat mengakses halaman E-bank');
	        redirect('http://localhost/e-matchad/index', 'refresh');

		} else {

			$data['dept'] = $this->session->userdata('id_dept');
			$data['title']='E-Filling - Halaman Utama';
			// $data['menu']='dash_reminder';
			// $data['content']='projectreminder/menu/content/reminder_dashboard';
			$this->load->view('browser',$data);
		} 
		// $this->load->view('browser');
	}
}
