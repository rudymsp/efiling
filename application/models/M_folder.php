<?php
	class M_folder extends CI_model {
		var $table = 'akses_folder';
		function __construct() {
        	parent::__construct();
    	}

    	function getForbidden($id) {
    		$this->db->select("*");
	        $this->db->where('id_karyawan', $id);
	        $this->db->order_by('id', 'desc');
	        $this->db->from($this->table);
	        $query = $this->db->get();

	        return $query;
    	}

    	function getakses_folder() {
    		$this->db->select("*");
	        // $this->db->where('id_karyawan', $id);
	        $this->db->order_by('id', 'asc');
	        $this->db->from($this->table);
	        $query = $this->db->get();
	        return $query->result();
    	}

    	function saveakses_folder($data) {
    		$this->db->insert($this->table,$data);
    		return TRUE;
    	}
    	
    	function getupdate_folder($data, $key){
	        $this->db->where("id", $key);
	        $this->db->update($this->table, $data);
	        return TRUE;
    	}

    	function deleteakses_folder($id) {
    		$this->db->where('id', $id);
    		$this->db->delete($this->table);
    		return TRUE;
    	}
	}
?>