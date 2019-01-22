<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
        parent::__construct();
		$this->load->model('model_login');
		$this->load->library('session');
    }

	public function index()
	{
			$data = array(
						'css' => $this->load->view('include/css.php',null,TRUE),
						// 'script'=>$this->load->view('include/script.php',null,TRUE),
						'title' => 'Masuk',
						'style' => '<style type="text/css">body {background-color: #DADADA;}body > .grid {height: 100%;}.image {margin-top: -100px;}.column {max-width: 450px;}</style>'
					);
			$this->load->view('pages/login.php',$data);
	}
	
	public function submit(){
				$data = array(
						'css' => $this->load->view('include/css.php',null,TRUE),
						// 'script'=>$this->load->view('include/script.php',null,TRUE),
						'title' => 'Masuk',
						'style' => '<style type="text/css">body {background-color: #DADADA;}body > .grid {height: 100%;}.image {margin-top: -100px;}.column {max-width: 450px;}</style>',
					);

				if(isset($this->session->userdata['logged_in'])){
					redirect('Homecontroller/index');
				}else{
					$data = array(
						'css' => $this->load->view('include/css.php',null,TRUE),
						//'script'=>$this->load->view('include/script.php',null,TRUE),
						'error' => 'Maaf, Email atau Password salah!',
						'title' => 'Masuk',
							'style' => '<style type="text/css">body {background-color: #DADADA;}body > .grid {height: 100%;}.image {margin-top: -100px;}.column {max-width: 450px;}</style>'
					);
					$this->load->view('pages/login.php',$data);
				}
				
				$email = $this->input->post('_email');
				$password = md5(md5(sha1($this->input->post('_password'))));
				$check = $this->model_login->login(array('email' => $email), array('password' => $password));
				if ($check == TRUE)
				{
					foreach ($check as $user)
					{
						$this->session->set_userdata(array(
							'email' => $user->email,
							'id' => $user->id_user,
							'nama_lengkap' => $user->nama_lengkap,
							'username' => $user->username,
							'dana'=> $user->dana
						));
						redirect('Homecontroller/index');
					}
				} 
				else
				{
					$data = array(
						'css' => $this->load->view('include/css.php',null,TRUE),
						'error' => 'Maaf, Email atau Password salah!',
						'title' => 'Masuk',
							'style' => '<style type="text/css">body {background-color: #DADADA;}body > .grid {height: 100%;}.image {margin-top: -100px;}.column {max-width: 450px;}</style>'
					);
					$this->load->view('pages/login', $data);
				}
			
	}

	function logout()
	{
		if ($this->session->userdata('id') != "") {
			$this->session->unset_userdata['logged_in'];
			$this->session->sess_destroy();
			redirect('Homecontroller/index');
		} else {
			redirect();
		}
	}
}
