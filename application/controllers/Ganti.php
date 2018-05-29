<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ganti extends CI_Controller {
	public function __construct()
    {
      parent::__construct();
      $this->load->model('Doku/M_doku', 'doku');
    }

	public function index()
	{
	   $id_dept = $this->session->userdata('id_dept');
       $id_karyawan = $this->session->userdata('id_karyawan');
       $nama_karyawan = $this->session->userdata('nama_karyawan');	
	   $folder=$_POST["alamat_folder"];
	   if ( is_dir($folder."/".$_POST["nama_lama_folder"])) {
	   	  if ( is_dir($folder."/".$_POST["nama_baru_folder"])) {
	   	  	echo "<script> alert('Folder sudah ada, pakai Nama Folder yang lain!');</script>";
	   	  } else {
	   	  	rename($folder."/".$_POST["nama_lama_folder"],$folder."/".$_POST["nama_baru_folder"]);
	   	  	$data = array(
                    'id_dept' => $id_dept,
                    'id_karyawan' => $id_karyawan,
                    'nama_karyawan' => $nama_karyawan,
                    'kegiatan' => 'Ganti nama folder '.$folder."/".$_POST["nama_lama_folder"].' menjadi '.$folder."/".$_POST["nama_baru_folder"]
            );
            $this->doku->get_insert_history($data);
	   	    echo "<script> alert('Folder sudah diganti namanya !');</script>";
	   	  }
	   } else {
	      echo "<script> alert('Folder tidak ada !');</script>";
	   }
	   redirect(base_url() .'#'.$folder, 'refresh');
	}
}
