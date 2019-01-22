<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BayarController extends CI_Controller
{
	function __construct()
	{
        parent::__construct();
		$this->load->model('Model_Cart');
		$this->load->library('session');
    }
	
	public function index()
    {
			$val = $_POST['cart_id'];
			$detail_cart = $this->Model_Cart->get_where_custom('id_cart', $val);
   			foreach ($detail_cart->result() as $row_cart) {
   				$id_products = $row_cart->id_products;
   			}
   			$detail_products = $this->Model_Cart->get_where_custom_product('id_products', $id_products);
   			foreach ($detail_products->result() as $row_products) {
   				$productsid = $row_products->name_products;
   			}
   			$sessid1 = array(
				'sessid'	=> $this->session->userdata('id'),
				'username'  => $this->session->userdata('username'),
				'dana'  => $this->session->userdata('dana'));
			$data = array(
				'id_cart' => $val,
				'id_products' => $productsid,
				'title' => 'Formulir Pembayaran',
				'nav_menu' => $this->load->view('include/nav_menu.php', $sessid1, TRUE),
				'footer' => $this->load->view('include/footer.php', NULL, TRUE),
				'css' => $this->load->view('include/css.php',null,TRUE),
				'style' => '<style type="text/css">.main.container, .ui.vertical.segment {margin-top: 7em;}.ui.menu .item img.logo {margin-right: 1em;}</style>'
			);
   			
			$this->load->view('pages/bayar.php', $data);
	}
	
}