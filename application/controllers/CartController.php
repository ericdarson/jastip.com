<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CartController extends CI_Controller
{
	function __construct()
	{
        parent::__construct();
		$this->load->model('Model_Cart');
		$this->load->library('session');
    }

	public function index()
	{
		//ini session
		$row = $this->Model_Cart->join_cart('buyer',$this->session->userdata('id'));
		$sessid1 = array(
				'sessid'	=> $this->session->userdata('id'),
				'username'  => $this->session->userdata('username'),
				'dana'  => $this->session->userdata('dana'));
		$data = array(
					'query' => $row,
					'css' => $this->load->view('include/css.php',null,TRUE),
					// 'script'=>$this->load->view('include/script.php',null,TRUE),
					'side_bar'=> $this->load->view('include/side_bar_menu',null,TRUE),
					'nav_menu' => $this->load->view('include/nav_menu.php', $sessid1, TRUE),
					'footer' => $this->load->view('include/footer.php', NULL, TRUE),
					'style' => '<style type="text/css">body {background-color: #DADADA;}body > .grid {height: 100%;}.image {margin-top: -100px;}.column {max-width: 450px;}</style>'
				);
		$this->load->view('pages/cart.php',$data);
	}
	
	public function delete(){
		$val = $_POST['cart_id'];
		$this->Model_Cart->_delete('id_cart',$val);
		redirect('CartController/index');
	}
		
}