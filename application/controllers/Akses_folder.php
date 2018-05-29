<?php
	class Akses_folder extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->library('session');
			$this->load->model('M_folder', 'akses');
		}
	
		function index() {
			   $rest1 = array();
			   $rest2 = array();
			   $rest3 = array();
			   $rest4 = array();

			   $nomor = $this->input->post('nomor[]');
			   $id = $this->input->post('ID[]');
			   $id_karyawan = $this->input->post('ID_KARYAWAN[]');
			   $folder_forbidden = $this->input->post('FOLDER_FORBIDDEN[]');

			   foreach ($nomor as $nm) {
			   		$rest1[] = $nm;
			   }
			   echo $rest1[0];
			   foreach ($id as $n) {
			   		$rest2[] = $n;
			   }
			   foreach ($id_karyawan as $idk) {
			   		$rest3[] = $idk;
			   }
			   foreach ($folder_forbidden as $f) {
			   		$rest4[] = $f;
			   }

			   foreach ($nomor as $nm) {
			   		$i1 = $rest2[$nm];
			   		$i2 = $rest4[$nm];
			   		$mysql_query = "update akses_folder set FOLDER_FORBIDDEN='".$i2."' where ID=".$i1;
				  	$this->db->query($mysql_query);
			   }
		}
	}
?>