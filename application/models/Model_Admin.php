<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Model_Admin extends CI_Model{

	function get_table() {
        $table = "tbl_checkout";
        return $table;
    }
	

	function join_status($col, $value)
    {
        $table = $this->get_table();
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_checkout.seller');
        $this->db->join('tbl_products', 'tbl_products.id_products = tbl_checkout.id_products');
        $this->db->where($col, $value);
        $query=$this->db->get($table);
        return $query;
    }

    function join_dana($col, $value)
    {
        $table = $this->get_table();
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_checkout.buyer');
        $this->db->where($col, $value);
        $query=$this->db->get($table);
        return $query;
    }
	
	function get_where_custom_status($col, $value) {
        $table = $this->get_table();
        $this->db->where($col, $value);
        $query=$this->db->get($table);
        return $query;
    }

    function get_where_custom_dana($col, $value) {
        $table = "tbl_user";
        $this->db->where($col, $value);
        $query=$this->db->get($table);
        return $query;
    }
	function update_status_konfirmasi_bayar_3($data){
		$table = $this->get_table();
		$this->db->set('status', 3);
		$this->db->where('id_checkout', $data);
		$this->db->update($table);
	}	
    function update_dana($data,$value){
        $table = "tbl_user";
        $this->db->set('dana', $value);
        $this->db->where('id_user', $data);
        $this->db->update($table);
    }   

    function get_qty_awal($id){
        $table = "tbl_products";
        $this->db->where('id_products',$id);
        $query = $this->db->get($table);
        return $query;
    }

    function update_qty($id,$value){
        $table = "tbl_products";
        $this->db->set('qty', $value);
        $this->db->where('id_products',$id);
        $this->db->update($table);
    }   
}