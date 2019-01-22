<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

	public function index()
	{
			
			//$data['script']= $this->load->view('include/script.php',null,TRUE);
			$data['css']= $this->load->view('include/css.php',null,TRUE);
			//$data['style'] = $this->load->view('include/style.php',null,TRUE);
			
			$this->load->view('pages/register.php',$data);
	}

	function submit()
	{
			$data['css']= $this->load->view('include/css.php',null,TRUE);

			$this->form_validation->set_rules('_username', 'Username', 'required');
			$this->form_validation->set_rules('_email', 'Email', 'required');
			$this->form_validation->set_rules('_password', 'Password', 'required');
			$this->form_validation->set_rules('_nama_lengkap','Nama_lengkap','required');
			$this->form_validation->set_rules('_alamat','Alamat','required');
			$this->form_validation->set_rules('gender','Gender','required');
			if($this->form_validation->run()==FALSE){
				$this->load->view('pages/register.php',$data);
			}else{
        	$username = $this->input->post('_username');
        	$data = array(
		        'username'		=> $this->input->post('_username'),
		        'email'			=> $this->input->post('_email'),
		        'password'		=> md5(md5(sha1($this->input->post('_password')))),
		        'nama_lengkap'	=> $this->input->post('_nama_lengkap'),
		        'alamat'		=> $this->input->post('_alamat'),
		        'gender'		=> $this->input->post('gender'),
			);
			mkdir('./assets/img/user/'.$username, 0777, TRUE);
			$this->db->insert('tbl_user', $data);
			//$this->session->set_flashdata('success', '<div class="ui success message"><i class="close icon"></i><div class="header">Horee!!! Selamat Anda berhasil mendaftar di ApAja.</div></div>');
			redirect('login');
        	}
	}
}