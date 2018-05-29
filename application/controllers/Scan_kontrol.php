<?php
class Scan_kontrol extends CI_Controller{
	var $dir = "files";
	var $response,$files,$f,$s;
//$idkaryawan = $_POST["id"];
// Run the recursive function 

	function __construct() {
		parent::__construct();
		// $response = $this->scan($this->dir);
		$response = $this->scan($this->dir);
		header('Content-type: application/json');
		// echo json_encode(array(
		// 						"name" => "files",
		// 						"type" => "folder",
		// 						"path" => $this->dir,
		// 						"items" => $this->response
		// 				));

	}

	function index() {
		$this->scan($this->dir);
	}

// This function scans the files folder recursively, and builds a large array
// function test(){

// 	echo "test";
// }

function scan($dir){

	$files = array();
    // echo "test";
	// die();
	// Is there actually such a folder/file?

	if(file_exists($dir)){
	
		foreach(scandir($dir) as $f) {
		
			if(!$f || $f[0] == '.') {
				continue; // Ignore hidden files
			}

			if(is_dir($dir . '/' . $f)) {

				// The path is a folder
				// if ($_POST['id_karyawan'] == "74"){
				if ($f !='ab') {
				$files[] = array(
					"name" => $f,
					"type" => "folder",
					"path" => $dir . '/' . $f,
					"items" => $this->scan($dir . '/' . $f) // Recursively get the contents of the folder
				);}
			}
			
			else {

				// It is a file

				$files[] = array(
					"name" => $f,
					"type" => "file",
					"path" => $dir . '/' . $f,
					"size" => filesize($dir . '/' . $f) // Gets the size of this file
				);
			}
		}
	
	}
	return $files;
}



// Output the directory listing as JSON

// header('Content-type: application/json');

function output(){
		// $this->output
		//      ->set_content_type('application/json')
		//      ->set_output(json_encode(array(
		// 	       "name" => "files",
		// 	       "type" => "folder",
		// 	       "path" => $dir,
		// 	       "items" => $response
		// )));
  }

// echo json_encode(array(
// 	"name" => "files",
// 	"type" => "folder",
// 	"path" => $dir,
// 	"items" => $response
// ));
}