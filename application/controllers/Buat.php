<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buat extends CI_Controller {
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
      //echo $nama_karyawan;
	    $folder=$_POST["alamat_folder"];
   		if ( is_dir($folder."/".$_POST["nama_folder"])) {
   	  		echo "<script> alert('Folder Sudah ada !');</script>";
   		} else {
      		mkdir($folder."/".$_POST["nama_folder"]);
            $data = array(
                    'id_dept' => $id_dept,
                    'id_karyawan' => $id_karyawan,
                    'nama_karyawan' => $nama_karyawan,
                    'kegiatan' => 'Buat folder '.$folder."/".$_POST["nama_folder"]
            );
            $this->doku->get_insert_history($data);
      		echo "<script> alert('Folder berhasil dibuat !');</script>";
   		}
   		redirect(base_url() .'#'.$folder, 'refresh');
	}
}