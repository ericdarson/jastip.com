<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TemplateController extends MX_Controller {

	function __construct() {
        parent::__construct();
    }

	function header($data)
	{
		$this->load->view('front/global/header', $data);
	}

	function footer()
	{
		$this->load->view('front/global/footer');
	}

	function nav_menu()
	{
		$data['sessid'] = $this->session->userdata('id');
		$this->load->view('front/global/nav_menu', $data);
	}

	function sidebar_dashboard()
	{
		$this->load->view('back/user/sidebar_dashboard');
	}

	function register($data)
	{
        $this->load->view('front/global/register', $data);
	}
}
