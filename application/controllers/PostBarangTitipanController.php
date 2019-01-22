<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PostBarangTitipanController extends CI_Controller
{

	function __construct()
	{
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('Model_Post_Barang');
        $this->load->library('session');
    }

	public function index()
	{		
			// $this->load->module('template');
			// $this->load->model('category/Mdl_category', 'mdl_category');
			$sessid1 = array(
				'sessid'	=> $this->session->userdata('id'),
				'username'  => $this->session->userdata('username'),
				'dana'  => $this->session->userdata('dana')
				);
			$data = array(
				'title' => 'Titip barang',
				// 'category' => $this->mdl_category->get('category', 'ASC'),
				'css' => $this->load->view('include/css.php', NULL, TRUE),
		        'nav_menu' => $this->load->view('include/nav_menu.php', $sessid1, TRUE),
		        'footer' => $this->load->view('include/footer.php', NULL, TRUE)
			);

			// $this->template->header($data);
			// $this->template->nav_menu();
			// $this->template->sidebar_dashboard();
			$this->load->view('pages/postbarangtitipan.php', $data);
			// $this->template->footer();
		}
		// else
		// {
		// 	$this->session->set_flashdata('not_login', '<p style="color: red;">Silahkan login sebelum menjual barang.</p>');
		// 	redirect('login');
		// }
	// }

	function add()
	{
			// $username = $this->session->userdata('username');
			$now = date("Y-m-d");
			$path = './assets/img/penitip/';
			
				$config['upload_path']		= $path;
                $config['allowed_types']	= 'jpeg|jpg|png';
                $config['max_size']			= 1024;
                $config['max_width']		= 800;
                $config['max_height']		= 780;
                //$config['encrypt_name']		= TRUE;
		  		$config['remove_spaces']	= TRUE;

		  		
                $this->load->library('upload', $config);
                
                
                    // $gambar = $this->upload->data();
                	$this->upload->initialize($config);
                	// $source = './assets/img/products/'.$now.'/'.$gambar['file_name'];
                    //$image = $data['upload_path'];
                 
                	if (!$this->upload->do_upload('poster'))
	           		{
	           			 $error = array('error' => $this->upload->display_errors());
	           			 $this->load->view('pages/test.php', $error);
	           		}
	           		else{
                    $source = './assets/img/penitip/'.$_FILES['poster']['name'];

					$data = array(
						 'id_category' => '1',
						 'id_user' => $this->session->userdata('id'),
						'name_products' => $this->input->post('name_products'),
						'slug' => url_title($this->input->post('name_products'), 'dash', TRUE),
						'description' => $this->input->post('deskripsi'),
						'qty' => $this->input->post('jumlah'),
						// 'kondisi' => $this->input->post('kondisi'),
						'tujuan' => $this->input->post('tujuan'),
						'price' =>  $this->input->post('harga'),
						'tgl_terima' => $this->input->post('tgl_terima'),
						'image1' => $source,
						'nomorHP' => $this->input->post('nomorHp')
					);

					

					// $data = $this->get_data_from_post();
					$this->Model_Post_Barang->_insert($data);
					// $this->session->set_flashdata('notice', '<div class="ui success message"><i class="close icon"></i><div class="header">Barang berhasil disimpan.</div></div>');
					redirect('HomeController/index');
				}
                
			
			// else
			// {
			// 	$this->load->model('category/Mdl_category', 'mdl_category');
			// 	$this->load->module('template');

			// 	$data = array(
			// 		'title' => 'Tambah Barang Anyar',
			// 		'category' => $this->mdl_category->get('category', 'ASC'),
			// 		'style' => '<style type="text/css">.main.container, .ui.vertical.segment {margin-top: 7em;}.ui.menu .item img.logo {margin-right: 1em;}</style>'
			// 	);

			// 	$this->template->header($data);
			// 	$this->template->nav_menu();
			// 	$this->template->sidebar_dashboard();
			// 	$this->load->view('anyar', $data);
			// 	$this->template->footer();
			// }
		
	}

}
