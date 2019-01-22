<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Model_Status_Pembelian extends CI_Model{

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

    function join_status_buyer($col, $value)
    {
        $table = $this->get_table();
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_checkout.buyer');
        $this->db->join('tbl_products', 'tbl_products.id_products = tbl_checkout.id_products');
        $this->db->where($col, $value);
        $query=$this->db->get($table);
        return $query;
    }
	
	function get_where_custom($col, $value) {
        $table = "tbl_user";
        $this->db->where($col, $value);
        $query=$this->db->get($table);
        return $query;
    }

}