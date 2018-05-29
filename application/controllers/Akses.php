<?php
	class Akses extends CI_Controller {

		var $dir = "files";
		function __construct() {
			parent::__construct();
			$this->load->library('session');
			$this->load->model('M_folder', 'akses');
		}

		function index() {
			$data = $this->akses->getakses_folder();
			echo json_encode($data);
		}

		function simpan($id,$nama,$forbidden) {
			$data=array(
						'ID_KARYAWAN' => $id,
						'NAMA' => $nama,
						'FOLDER_FORBIDDEN' => $forbidden
				);
			$data = $this->akses->saveakses_folder($data);
			echo json_encode($data);
		}

		function hapus($id) {
			$data = $this->akses->deleteakses_folder($id);
			echo json_encode($data);
		}
	}
?>