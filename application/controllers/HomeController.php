<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller
{

	function __construct()
	{
        parent::__construct();
        $this->load->model('HomeModel');
        $this->load->library('session');
    }

	public function index()
	{
		//$this->load->model('HomeModel');
		// $this->load->module('template');
		//echo $this->session->userdata('dana');
		if($this->session->userdata('id')!=null){
			$resdana = $this->HomeModel->get_where_custom2('id_user',$this->session->userdata('id'));
			foreach($resdana->result() as $row_dana){
				$dana = $row_dana->dana;
			}
			$this->session->set_userdata('dana',$dana);
		}
		$sessid1 = array(
			'sessid'	=> $this->session->userdata('id'),
			'username'  => $this->session->userdata('username'),
			'dana' => $this->session->userdata('dana')
		);
		
        $data = array (
        	'querySlider' => $this->HomeModel->get_slider(),
        	'query'		=> $this->HomeModel->get('id_category'),
	        'sessid'	=> $this->session->userdata('id'),
	        'css' => $this->load->view('include/css.php', NULL, TRUE),
	        'nav_menu' => $this->load->view('include/nav_menu.php',$sessid1,TRUE),
	        'footer' => $this->load->view('include/footer.php', NULL, TRUE)
	    );

        // $this->template->header($data);
        // $this->template->nav_menu($data);
		$this->load->view('homeView.php', $data);
        // $this->template->footer();
	}
}
