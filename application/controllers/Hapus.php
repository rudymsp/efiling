<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hapus extends CI_Controller {
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
       //echo $id_dept;
	     $folder=$_POST["alamat_folder"];
        $dir = $folder."/".$_POST["nama_folder"];
        if ( is_dir($folder."/".$_POST["nama_folder"])) {
            $q = (count(glob("$dir/*")) === 0) ? 'Empty' : 'Not empty';
            if ($q=="Empty"){
               rmdir($folder."/".$_POST["nama_folder"]);
               echo "<script> alert('Folder berhasil dihapus !');</script>";
               $data = array(
                    'id_dept' => $id_dept,
                    'id_karyawan' => $id_karyawan,
                    'nama_karyawan' => $nama_karyawan,
                    'kegiatan' => 'Hapus folder '.$folder."/".$_POST["nama_folder"]
                  );
               $this->doku->get_insert_history($data);
            } else {
               echo "<script> alert('Masih ada file, tidak dapat dihapus !');</script>";
            }
        } else {
            echo "<script> alert('Folder tidak ditemukan !');</script>";
        }
        redirect(base_url() .'#'.$folder, 'refresh');
	}
}