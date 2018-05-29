<?php
class Cute extends CI_Controller {

	var $dir = "files";
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('M_folder', 'akses');
	}

	function index() {
		$response = $this->scan($this->dir);
		header('Content-type: application/json');
		echo json_encode(array(
			"name" => basename($this->dir),
			"type" => "folder",
			"path" => $this->dir,
			"items" => $response
		));
	}

	function scan($dir){
		// $id = $this->session->userdata('id_karyawan');
		$cek = $this->cek_id($this->session->userdata('id_karyawan'));

		$files = array();
		// Is there actually such a folder/file?
		if(file_exists($dir)){
		
			foreach(scandir($dir) as $f) {
			
				if(!$f || $f[0] == '.') {
					continue; // Ignore hidden files
				}
				if(is_dir($dir . '/' . $f)) {
					// The path is a folder
					if ($cek == 0) {
						$files[] = array(
										 "name" => $f,
										 "type" => "folder",
										 "path" => $dir . '/' . $f,
										 "items" => $this->scan($dir . '/' . $f) // Recursively get the contents of the folder
										);
					}else if ($cek == 1){
						    if ($this->cek_kata($f) != true){
								$files[] = array(
												 "name" => $f,
												 "type" => "folder",
												 "path" => $dir . '/' . $f,
												 "items" => $this->scan($dir . '/' . $f) // Recursively get the contents of the folder
												);
							};
					};	
				}
				else if (is_file($dir . '/' . $f)) {
					// It is a file
					$files[] = array(
						"name" => $f,
						"type" => "file",
						"path" => $dir . '/' . $f,
						"size" => filesize($dir . '/' . $f) // Gets the size of this file
					);
				}
				// else if (strpos($f, 'CISA')) {
				// 	// It is a file
				// 	$files[] = array(
				// 		"name" => $f,
				// 		"type" => "folder",
				// 		"path" => $dir . '/' . $f,
				// 		"size" => filesize($dir . '/' . $f) // Gets the size of this file
				// 	);
				// }
			}
		
		}
		return $files;
	}

	function cek_id($id){
    	$data = $this->akses->getForbidden($id);
    	$count = $data->num_rows();
    	if ($count > 0) {
    		$hasil=1;
    	}else { $hasil=0; 
    		    // echo "data tidak ada";
    	};
    	return $hasil;
    }

    function cek_akses($id){
    	$data = $this->akses->getForbidden($id);
    	$b = '';
    	foreach ($data->result() as $rs) {
    		$b = $rs->FOLDER_FORBIDDEN;
     	}
    	return $b;
    }

    function cek_kata($teks)
	{	 
		$aks = array();
		$aks = explode("%",$this->cek_akses($this->session->userdata('id_karyawan')));	 
		$hasil = 0;		 
		$jml_kata = count($aks);		 
		for ($i=0; $i<$jml_kata; $i++)		 
		{		 			 
			if ($teks == $aks[$i])
			{ 
				$hasil = 1; 
			}		 
		}		 
		return $hasil;
	}
}