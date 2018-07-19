<?php
	class Akses extends CI_Controller {

		var $dir = "files";
		function __construct() {
			parent::__construct();
			$this->load->library('session');
			$this->load->model('M_folder', 'akses');
			$this->load->model('Doku/M_doku', 'dropdown');
		}

		function index() {
			$data = $this->akses->getakses_folder();
			echo json_encode($data);
		}

		function simpan($id,$nama,$forbidden) {
			$nama_karyawan=str_replace("%20"," ",$nama);
			$data=array(
						'ID_KARYAWAN' => $id,
						'NAMA' => $nama_karyawan,
						'FOLDER_FORBIDDEN' => $forbidden
				);
			$data = $this->akses->saveakses_folder($data);
			echo json_encode($data);
		}

		function hapus($id) {
			$data = $this->akses->deleteakses_folder($id);
			echo json_encode($data);
		}

		function drop_karyawan()
		{
			$data = $this->dropdown->getdrop_karyawan();
			echo json_encode($data);
		}

		function pick_karyawan($id)
		{
			$data = $this->dropdown->get_karyawan($id);
			echo json_encode($data);
		}
	}
?>