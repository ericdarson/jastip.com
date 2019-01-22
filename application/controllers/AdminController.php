<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class AdminController extends CI_Controller
{
	function __construct()
	{
        parent::__construct();
		$this->load->model('Model_Admin');
		$this->load->library('session');
		$this->load->model('Model_Traveler');
	}    
	
	public function index()
    {	
    	$sessid1 = array(
				'sessid'	=> $this->session->userdata('id'),
				'username'  => $this->session->userdata('username'),
				'dana'  => $this->session->userdata('dana'));
		$data = array(
			'title' => 'Admin Pembayaran',
			'admin'=> false,
			'nav_menu' => $this->load->view('include/nav_menu.php', $sessid1, TRUE),
			'footer' => $this->load->view('include/footer.php', NULL, TRUE),
			'css' => $this->load->view('include/css.php',null,TRUE),
			'style' => '<style type="text/css">.main.container, .ui.vertical.segment {margin-top: 7em;}.ui.menu .item img.logo {margin-right: 1em;}</style>'
		);
		$this->load->view('pages/admin.php', $data);
	}
	
	public function status_ubah_pembelian_admin(){
		$id = $this->input->post('id_checkout');
		$qty_beli = $this->input->post('qty_beli');
		$id_products = $this->input->post('id_products');

		$this->Model_Admin->update_status_konfirmasi_bayar_3($id);
		$var= $this->Model_Admin->join_dana('id_checkout',$id);
		foreach($var->result() as $row){
			$id_user=$row->id_user;
			$price = $row->price_beli;
		}
		//$this->Model_Admin->update_qty($id_user,$price);

		redirect('AdminController/admin_home');	
	}
	
	public function admin_home(){
		$row = $this->Model_Admin->get_where_custom_status('status',2);
		$sessid1 = array(
				'sessid'	=> $this->session->userdata('id'),
				'username'  => $this->session->userdata('username'));
			$data = array(
			'result'=> $row,
			'title' => 'Admin Pembayaran',
			'admin'=> true,
			'nav_menu' => $this->load->view('include/nav_menu.php', $sessid1, TRUE),
			'footer' => $this->load->view('include/footer.php', NULL, TRUE),
			'css' => $this->load->view('include/css.php',null,TRUE),
			'style' => '<style type="text/css">.main.container, .ui.vertical.segment {margin-top: 7em;}.ui.menu .item img.logo {margin-right: 1em;}</style>'
			);
			$this->load->view('pages/admin.php', $data);
	}
	public function auth_admin(){
		$user= $this->input->post('user');
		$password = $this->input->post('pwd');
		
		if($user == "admin" && $password =="asdf"){
			$row = $this->Model_Admin->get_where_custom_status('status',2);
			$sessid1 = array(
				'sessid'	=> $this->session->userdata('id'),
				'username'  => $this->session->userdata('username'));
			$data = array(
			'result'=> $row,
			'title' => 'Admin Pembayaran',
			'admin'=> true,
			'nav_menu' => $this->load->view('include/nav_menu.php', $sessid1, TRUE),
			'footer' => $this->load->view('include/footer.php', NULL, TRUE),
			'css' => $this->load->view('include/css.php',null,TRUE),
			'style' => '<style type="text/css">.main.container, .ui.vertical.segment {margin-top: 7em;}.ui.menu .item img.logo {margin-right: 1em;}</style>'
			);
			$this->load->view('pages/admin.php', $data);
		}
		else{
			redirect('AdminController/index');
		}
	}

}