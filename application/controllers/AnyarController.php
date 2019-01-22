<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnyarController extends CI_Controller
{

	function __construct()
	{
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('Model_Product');
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
			$this->load->view('productView/anyar.php', $data);
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
			$path = './assets/img/products/';
			// $path_two = $path_one."/".$username;
			// if (!is_dir('./assets/img/products/'.$now.'/'.$username))
			// {
			// 	mkdir($patproductView/h_one, 0777, TRUE);
			// 	// mkdir($path_two, 0777, TRUE);
			// 	$path = './assets/img/products/'.$now.'/'.$username;
			// }
			// else
			// {
			// 	$path = './assets/img/products/'.$now.'/'.$username;
			// }
			

			// $this->form_validation->set_rules('name_products', 'Nama Barang', 'trim|required|xss_clean');
			// $this->form_validation->set_rules('category', 'Kategori', 'trim|required|xss_clean');
			// $this->form_validation->set_rules('kondisi', 'Kondisi', 'trim|required|xss_clean');
			// $this->form_validation->set_rules('berat', 'Perkiraan Berat', 'trim|required|xss_clean');
			// $this->form_validation->set_rules('stok', 'Stok', 'trim|required|xss_clean');
			// $this->form_validation->set_rules('harga', 'Harga', 'trim|required|xss_clean');
			// $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required|xss_clean');
			// $this->form_validation->set_error_delimiters('<p style="color:red;">', '</p>');

				$config['upload_path']		= $path;
                $config['allowed_types']	= 'jpeg|jpg|png';
                $config['max_size']			= 1024;
                $config['max_width']		= 800;
                $config['max_height']		= 780;
                $config['encrypt_name']		= TRUE;
		  		$config['remove_spaces']	= TRUE;

                $this->load->library('upload', $config);
                echo $this->input->post('deskripsi');
                
                    // $gambar = $this->upload->data();
                	$this->upload->initialize($config);
                	// $source = './assets/img/products/'.$now.'/'.$gambar['file_name'];
                    //$image = $data['upload_path'];

					$data = array(
						// 'id_category' => $this->input->post('category'),
						// 'id_user' => $this->session->userdata('id'),
						'name_products' => $this->input->post('name_products'),
						'slug' => url_title($this->input->post('name_products'), 'dash', TRUE),
						'description' => $this->input->post('deskripsi'),
						'qty' => $this->input->post('jumlah'),
						// 'kondisi' => $this->input->post('kondisi'),
						'berat' => $this->input->post('berat'),
						'price' =>  $this->input->post('harga'),
						'image1' => $_FILES['poster']['name'],
						'nomorHP' => '111'
					);

					// $data = $this->get_data_from_post();
					$this->Model_Product->_insert($data);
					// $this->session->set_flashdata('notice', '<div class="ui success message"><i class="close icon"></i><div class="header">Barang berhasil disimpan.</div></div>');
					redirect('HomeController/index');
                
			
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
