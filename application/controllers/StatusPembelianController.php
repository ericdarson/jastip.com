<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StatusPembelianController extends CI_Controller
{
	function __construct()
	{
        parent::__construct();
		$this->load->model('Model_Status_Pembelian');
		$this->load->library('session');
    }
	
	public function index()
    {
		
		$row = $this->Model_Status_Pembelian->join_status('buyer',$this->session->userdata('id'));
		if($row->num_rows()==0){
		$sessid1 = array(
				'sessid'	=> $this->session->userdata('id'),
				'username'  => $this->session->userdata('username'),
'dana'  => $this->session->userdata('dana')				
		);
			$data = array(
				'result'=> "kosong",
				'title' => 'Konfirmasi Pembayaran',
				'nav_menu' => $this->load->view('include/nav_menu.php',$sessid1,TRUE),
				'footer' => $this->load->view('include/footer.php', NULL, TRUE),
				'css' => $this->load->view('include/css.php',null,TRUE),
				'style' => '<style type="text/css">.main.container, .ui.vertical.segment {margin-top: 7em;}.ui.menu .item img.logo {margin-right: 1em;}</style>'
			);
		}
		else{
			$sessid1 = array(
				'sessid'	=> $this->session->userdata('id'),
				'username'  => $this->session->userdata('username'),
				'dana'  => $this->session->userdata('dana')
		);
			$data = array(
					'result'=> $row,
					'title' => 'Konfirmasi Pembayaran',
					'nav_menu' => $this->load->view('include/nav_menu.php', $sessid1, TRUE),
					'footer' => $this->load->view('include/footer.php', NULL, TRUE),
					'css' => $this->load->view('include/css.php',null,TRUE),
					'style' => '<style type="text/css">.main.container, .ui.vertical.segment {margin-top: 7em;}.ui.menu .item img.logo {margin-right: 1em;}</style>'
				);
		}
		$this->load->view('pages/statuspembelian.php', $data);
	}



}