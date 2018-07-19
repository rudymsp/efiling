<?php

class M_doku extends CI_Model {

	var $table = 'efiling_dokumentasi';
	var $table2 = 'efiling_kategori_doc';
    var $table3 = 'history_user';
	function __construct() {
        parent::__construct();
    }

    function getDoku() {
    	$this->db->where('jenis_file', 1);
        $this->db->order_by('id', 'desc');
    	$getb = $this->db->get($this->table);
    	return $getb;
    }

    function getListDoc($key) {
        $this->db->select("*");
        $this->db->where('jenis_file', $key);
        $this->db->order_by('id', 'desc');
        $this->db->from($this->table);
        $query = $this->db->get();

        return $query;
    }

    function getApps() {
    	$this->db->where('jenis_file', 2);
        $this->db->order_by('id', 'desc');
    	$getb = $this->db->get($this->table);
    	return $getb;
    }

    function delete($key){
        $this->db->where('id',$key);
        $this->db->delete($this->table);
    }    

    //fungsi insert ke database
    function get_insert($data){
       	$this->db->insert($this->table, $data);
      	return TRUE;
    }

    function get_insert_history($data){
        $this->db->insert($this->table3, $data);
        return TRUE;
    }

    function get_update($data, $key){
        $this->db->where("id", $key);
        $this->db->update($this->table, $data);
        return TRUE;
    }

    function getTabsMenu() {
    	$getb = $this->db->get($this->table2);
    	return $getb;
    }

    function getContentTabs() {
    	$getb = $this->db->get($this->table);
    	return $getb;
    }

    // category

    function getCategory() {
    	$getb = $this->db->get($this->table2);
    	return $getb;
    }

    function delete_category($key){
        $this->db->where('id',$key);
        $this->db->delete($this->table2);
    }    

    //fungsi insert ke database
    function get_cat_insert($data){
       	$this->db->insert($this->table2, $data);
      	return TRUE;
    }

    function get_cat_update($data, $key){
        $this->db->where("id", $key);
        $this->db->update($this->table2, $data);
        return TRUE;
    }

    function getdrop_karyawan()
    {
        $que = $this->db->get('karyawan');
        return $que->result();
    }

    function get_karyawan($id)
    {
        $this->db->where("id_karyawan",$id);
        $que= $this->db->get('karyawan');
        return $que->result();
    }
}
