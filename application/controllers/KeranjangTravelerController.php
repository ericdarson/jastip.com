<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class KeranjangBelanjaController extends MX_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        // $this->load->module('template');
    }

    public function index()
    {
            $this->load->model('Model_KeranjangTraveler');

            $id_user = $this->session->userdata('id');
            $cart_user = $this->Model_KeranjangTraveler->join_cart('buyer', $id_user);
            $sessid1 = array(
                'sessid'    => $this->session->userdata('id'),
                'username'  => $this->session->userdata('username'),
				'dana'  => $this->session->userdata('dana'));
            $data = array(
                'query' => $cart_user,
                'num' => $cart_user->num_rows(),
                'title' => 'Keranjang Traveler',
                'css' => $this->load->view('include/css.php', NULL, TRUE),
                'nav_menu' => $this->load->view('include/nav_menu.php', $sessid1, TRUE),
                'footer' => $this->load->view('include/footer.php', NULL, TRUE)
            );

            $this->template->header($data);
            $this->template->nav_menu();
            $this->load->view('ty', $data);
            $this->template->footer();
        
        $data = array(
                'title' => 'Titip barang',
                // 'category' => $this->mdl_category->get('category', 'ASC'),
            
            );
        $this->load->view('travelerView/keranjangBelanja.php', $data);
        // redirect('cart/ty');
    }

    function ty()
    {
        
    }
    
    function checkout()
    {
        if ($this->lib->login() == "")
        {
            $this->session->set_flashdata('not_login', '<p style="color: red;">Silahkan login terlebih dahulu.</p>');
            redirect('login');
        }
        else
        {
            $this->load->model('Model_KeranjangTraveler');
            $this->load->model('products/Mdl_products', 'mdl_products');

            $uri_product = $this->uri->segment(3);
            $auth_product = $this->mdl_products->get_where_custom(do_hash('id_products', 'sha1'), $uri_product);
            if ($auth_product->num_rows() > 0)
            {
                echo "Ada";
            }
            else
            {
                echo "Nothing";
            }


            // echo "Berhasil membeli produk";
        }
    }

    function en()
    {
        $this->load->library('encryption');

        $plain_text = 'This is a plain-text message!';
        $ciphertext = $this->encryption->encrypt($plain_text);
        echo $ciphertext;
    }

    function delete()
    {
        if ($this->lib->login() == "")
        {
            $this->session->set_flashdata('not_login', '<p style="color: red;">Silahkan login terlebih dahulu.</p>');
            redirect('login');
        }
        else
        {
            $this->load->model('Model_KeranjangTraveler');

            $uri_cart = $this->uri->segment(3);
            $this->Model_KeranjangTraveler->_delete('id_cart', $uri_cart);
            $this->session->set_flashdata('success_delete', '<p style="color: green;">Berhasil menghapus barang di keranjang.</p>');
            redirect('cart/ty');
            //echo $uri_cart;
        }
    }

    function _count_cart_user()
    {
        if ($this->lib->login() == "")
        {
            echo "";
        }
        else
        {
            $this->load->model('Model_KeranjangTraveler');

            $id_user = $this->session->userdata('id');
            $query = $this->Model_KeranjangTraveler->count_where('buyer', $id_user);
            if ($query > 0)
            {
                echo "<hr>";
                echo anchor('cart/ty', 'Cart '.$query);
            }
            else
            {
                echo "<hr>";
                echo "Cart 0";
            }
        }
    }

}