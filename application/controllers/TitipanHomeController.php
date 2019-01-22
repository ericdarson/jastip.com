<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TitipanHomeController extends CI_Controller
{

	function __construct()
	{
        parent::__construct();
        $this->load->library('session');
    }

	public function index($param='')
	{
		header('Location: '.base_url().'');
	}

	function show()
	{
		$this->load->model('Model_Category');
		$this->load->model('Model_Traveler');

		$slug = "titipan";
		$col = "slug";
		echo $slug;
        $cat = $this->Model_Category->count_where($col,$slug);
        if ($cat > 0)
        {
        	$cat_query = $this->Model_Category->get_where_custom($col, $slug);
        	foreach ($cat_query->result() as $row_category)
			{
				$id_category = $row_category->id_category;
				$name_category = $row_category->category;
				$slug_category = $row_category->slug;
			}
			$sessid1 = array(
				'sessid'	=> $this->session->userdata('id'),
				'username'  => $this->session->userdata('username'),
				'dana'  => $this->session->userdata('dana')
				);
			$data = array (
				'query_products' => $this->Model_Traveler->get_where_custom('id_category', $id_category),
				'title' => $name_category,
				'name_category' => $name_category,
				'slug_category' => $slug_category,
				'style' => '<style type="text/css">h3 > b{color:#21BA45;}</style>',
				'css' => $this->load->view('include/css.php', NULL, TRUE),
	        'nav_menu' => $this->load->view('include/nav_menu.php', $sessid1, TRUE),
	        'footer' => $this->load->view('include/footer.php', NULL, TRUE)
			);
			$this->load->helper('url');
			$this->load->view('titipanView/titipanHome.php', $data,$sessid1);
			
        }
        else
        {
        	echo "Tidak Ada";
        }

		//$this->load->view('category', $data);
	}

	function traveler()
	{
		$this->load->model('Model_Category');
		$this->load->model('Model_Traveler');

		$slug = "travelProduct";
		$tujuan = $this->input->post('keterangan');
		$col = "slug";
		echo $slug;
        $cat = $this->Model_Category->count_where($col,$slug);
        if ($cat > 0)
        {
        	$cat_query = $this->Model_Category->get_where_custom($col, $slug);
        	foreach ($cat_query->result() as $row_category)
			{
				$id_category = $row_category->id_category;
				$name_category = $row_category->category;
				$slug_category = $row_category->slug;
			}
			$sessid1 = array(
				'sessid'	=> $this->session->userdata('id'),
				'username'  => $this->session->userdata('username'),
				'dana'  => $this->session->userdata('dana'));
			$data = array (
				'query_products' => $this->Model_Traveler->get_where_custom_traveler('id_category', $id_category,'tujuan',$tujuan),
				'title' => $name_category,
				'name_category' => $name_category,
				'slug_category' => $slug_category,
				'style' => '<style type="text/css">h3 > b{color:#21BA45;}</style>',
				'css' => $this->load->view('include/css.php', NULL, TRUE),
	        'nav_menu' => $this->load->view('include/nav_menu.php', $sessid1, TRUE),
	        'footer' => $this->load->view('include/footer.php', NULL, TRUE)
			);
			$this->load->helper('url');
			$this->load->view('travelerView/travelHome.php', $data);
			
        }
        else
        {
        	echo "Tidak Ada";
        }

		//$this->load->view('category', $data);
	}

	
	// function url()
	// {
	// 	echo url_title('Pelembeb Muka Wanita!! Murah', 'dash', TRUE);
	// }
	// function pop()
	// {
	// 	$atts = array(
	//        'width'       => 800,
	//         'height'      => 600,
	//         'scrollbars'  => 'yes',
	//         'status'      => 'yes',
	//         'resizable'   => 'yes',
	//         'screenx'     => 0,
	//         'screeny'     => 0,
	//         'window_name' => '_blank'
	// 		);
	
	// 	echo anchor_popup('news/local/123', 'Click Me!', $atts);
	// }
	
}
