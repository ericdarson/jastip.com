<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KonfirmasiController extends CI_Controller
{
	function __construct()
	{
      parent::__construct();
		$this->load->model('Model_Cart');
		$this->load->model('Model_Admin');
      $this->load->library('session');
    }
	
	public function index()
    {
		$val = $this->input->post('id_cart');
      echo $val;
			$detail_cart = $this->Model_Cart->get_where_custom('id_cart', $val);
   			foreach($detail_cart->result() as $row_cart) {
   				$no_invoice = $row_cart->no_invoice;
   				$order_code = $row_cart->order_code;
   				$id_products = $row_cart->id_products;
   				$seller = $row_cart->seller;
   				$buyer = $row_cart->buyer;
   				$qty = $row_cart->num_qty;
   				$price = $row_cart->num_price;
   			}
   			$data = array(
   				'no_invoice' => $no_invoice,
   				'order_code' => $order_code, 
   				'id_products' => $id_products,
   				'seller' => $seller,
   				'buyer' => $buyer,
   				'qty_beli' => $qty,
   				'price_beli' => $price,
   				'nama_penerima' => $this->input->post('penerima'),
   				'alamat_penerima' => $this->input->post('almt'),
   				'telepon' => $this->input->post('tlp'),
   				'province' =>$this->input->post('province'),
   				'city' => $this->input->post('city'),
   				'postal_code' => $this->input->post('postal_code'),
   				'courier' => $this->input->post('kurir'),
   				'bank' => $this->input->post('bank'),
   				'order_date' => date("Y-m-d"),
   				'message' => $this->input->post('catatan'),
   				'status' => 1    
   			);

   			$this->Model_Cart->insert_to_tbl_checkout($data);
   			$this->Model_Cart->_delete('id_cart', $val);
			//$this->session->set_flashdata('success_delete', '<div class="ui success message"><i class="close icon"></i><div class="header">Barang berhasil dimasukan ke checkout.</div></div>');
			$sessid1 = array(
            'sessid' => $this->session->userdata('id'),
            'username'  => $this->session->userdata('username'),
			'dana'  => $this->session->userdata('dana')
			);
			$datas = array(
				'no_invoice'=>$no_invoice,
				'price' => $price,
				'title' => 'Konfirmasi Pembayaran',
				'nav_menu' => $this->load->view('include/nav_menu.php', $sessid1, TRUE),
				'footer' => $this->load->view('include/footer.php', NULL, TRUE),
				'css' => $this->load->view('include/css.php',null,TRUE),
				'style' => '<style type="text/css">.main.container, .ui.vertical.segment {margin-top: 7em;}.ui.menu .item img.logo {margin-right: 1em;}</style>'
			);
			
			$this->load->view('pages/konfirmasi.php', $datas);
	}
	
	public function status_ubah(){
		$val = $this->input->post('no_invoice');
		$this->Model_Cart->update_status_konfirmasi_bayar($val);
		redirect('StatusPembelianController/index');
	}
	
	public function status_ubah_pembelian(){
		$id = $this->input->post('id_checkout');
		$this->Model_Cart->update_status_konfirmasi_bayar_2($id,2);
		redirect('StatusPembelianController/index');
	}

   public function status_terima_orderan(){
      $id = $this->input->post('id_checkout');
	  $id_products = $this->input->post('id_products');
	  $qty_beli = $this->input->post('qty_beli');
      $this->Model_Cart->update_status_konfirmasi_bayar_2($id,4);
	  
	  $var_qty = $this->Model_Admin->get_qty_awal($id_products);
	  
		foreach ($var_qty->result() as $row) {
			$qty_awal = $row->qty;
		}
		//echo $qty_awal;
		$qty_awal -= $qty_beli;

		$this->Model_Admin->update_qty($id_products,$qty_awal);
	  
      redirect('TravelerOrderController/index');
   }

   public function status_tolak_orderan(){
   $id = $this->input->post('id_checkout');
      $this->Model_Cart->update_status_konfirmasi_bayar_2($id,99);
       $table =  $this->Model_Cart->join_dana('id_checkout',$id);
	   //var_dump($table->result());
      foreach($table->result() as $row){
         $id_seller= $row->seller;
         $id_buyer = $row->buyer;
         $dana_buyer= $row->dana;
         $price= $row->price_beli;
      }
	  //echo $dana_buyer . $price;
      $dana_buyer = $dana_buyer+$price;
      //$dana_seller = $dana_seller+$price;
	
	  
      //$this->Model_Cart->update_transaksi('id_user',$id_seller,$dana_seller);
      $this->Model_Cart->update_transaksi('id_user',$id_buyer,$dana_buyer);
      redirect('TravelerOrderController/index');
   }

   public function status_kirim_barang(){
      $id = $this->input->post('id_checkout');
      $this->Model_Cart->update_status_konfirmasi_bayar_2($id,5);
      redirect('TravelerOrderController/index');
   }

   public function status_terima_barang(){
      $id = $this->input->post('id_checkout');
      $this->Model_Cart->update_status_konfirmasi_bayar_2($id,6);
       $table =  $this->Model_Cart->join_dana('id_checkout',$id);
      foreach($table->result() as $row){
         $id_seller= $row->seller;
         $id_buyer = $row->buyer;
         $dana_buyer= $row->dana;
         $price= $row->price_beli;
      }
       $table_seller=  $this->Model_Cart->get_seller($id_seller);
      foreach($table_seller->result() as $row){
         $dana_seller= $row->dana;
      }
      //$dana_buyer = $dana_buyer-$price;
      $dana_seller = $dana_seller+$price;

      $this->Model_Cart->update_transaksi('id_user',$id_seller,$dana_seller);
      //$this->Model_Cart->update_transaksi('id_user',$id_buyer,$dana_buyer);
      
	  
      redirect('StatusPembelianController/index');
   }
   public function status_ubah_pembelian7(){
      $id = $this->input->post('id_checkout');
      $this->Model_Cart->update_status_konfirmasi_bayar_2($id,7);
      redirect('StatusPembelianController/index');
   }
   public function status_ubah_pembelian8(){
      $id = $this->input->post('id_checkout');
      $this->Model_Cart->update_status_konfirmasi_bayar_2($id,8);
      redirect('TravelerOrderController/index');
   }
   public function status_ubah_pembelian11(){
      $id = $this->input->post('id_checkout');
      $this->Model_Cart->update_status_konfirmasi_bayar_2($id,11);
      redirect('TravelerOrderController/index');
   }
   public function status_ubah_pembelian10(){
      $id = $this->input->post('id_checkout');
      $this->Model_Cart->update_status_konfirmasi_bayar_2($id,10);
      redirect('StatusPembelianController/index');
   }
   public function delete_permanen(){
      $id = $this->input->post('id_checkout');
      $this->Model_Cart->update_status_konfirmasi_bayar_2($id,9);
      redirect('StatusPembelianController/index');
   }
   public function delete_permanen_traveler(){
      $id = $this->input->post('id_checkout');
      $this->Model_Cart->update_status_konfirmasi_bayar_2($id,9);
      redirect('TravelerOrderController/index');
   }
    public function delete_transaksi(){
      $id = $this->input->post('no_invoice');
      $this->Model_Cart->_delete('no_invoice',$id);
      redirect('homeController/index');
   }
}