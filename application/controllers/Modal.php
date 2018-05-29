<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modal extends CI_Controller {

	
	function __construct()
    {
        parent::__construct();	
        $this->load->helper(array('form'));	
    }
	
	public function index()
	{
		
	}
	
	function popup($page_name = '' , $param2 = '' , $param3 = '')
	{
		// $page_name = '';
		$data_page['param2'] = $param2;
		$data_page['param3'] = $param3;
		$this->load->view('guide/'.$page_name.'.php' ,$data_page);
		
	}
}

