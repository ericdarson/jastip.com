<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Model_Cart extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_table() {
        $table = "tbl_cart";
        return $table;
    }

    function insert_to_tbl_checkout($data){
        $table = "tbl_checkout";
        $this->db->insert($table, $data);
    }

    function get($order_by) {
        $table = $this->get_table();
        $this->db->order_by($order_by);
        $query=$this->db->get($table);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $table = $this->get_table();
        $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query=$this->db->get($table);
        return $query;
    }

    function get_where($id) {
        $table = $this->get_table();
        $this->db->where('id', $id);
        $query=$this->db->get($table);
        return $query;
    }

    function get_seller($id) {
        $table = "tbl_user";
        $this->db->where('id_user', $id);
        $query=$this->db->get($table);
        return $query;
    }

    function get_where_custom($col, $value) {
        $table = $this->get_table();
        $this->db->where($col, $value);
        $query=$this->db->get($table);
        return $query;
    }

    function get_where_custom_product($col, $value) {
        $table = "tbl_products";
        $this->db->where($col, $value);
        $query=$this->db->get($table);
        return $query;
    }

    function join_cart($col, $value)
    {
        $table = $this->get_table();
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_cart.seller');
        $this->db->join('tbl_products', 'tbl_products.id_products = tbl_cart.id_products');
        $this->db->where($col, $value);
        $query=$this->db->get($table);
        return $query;
    }

    function join_dana($col, $value)
    {
        $table = "tbl_checkout";
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_checkout.buyer');
        $this->db->where($col, $value);
        $query=$this->db->get($table);
        return $query;
    }

    function _insert($data) {
        $table = $this->get_table();
        $this->db->insert($table, $data);
    }

    function _update($id, $data) {
        $table = $this->get_table();
        $this->db->where('id', $id);
        $this->db->update($table, $data);
    }

    function update_transaksi($col,$id, $dana) {
        $table = "tbl_user";
        $this->db->set('dana',$dana,false);
        $this->db->where($col, $id);
        $this->db->update($table);
    }

    function _delete($column, $id) {
        $table = $this->get_table();
        $this->db->where($column, $id);
        $this->db->delete($table);
    }

    function delete_transaksi($column, $id) {
        $table = "tbl_checkout";
        $this->db->where($column, $id);
        $this->db->delete($table);
    }

    function count_where($column, $value) {
        $table = $this->get_table();
        $this->db->where($column, $value);
        $query=$this->db->get($table);
        $num_rows = $query->num_rows();
        return $num_rows;
    }

    function get_max() {
        $table = $this->get_table();
        $this->db->select_max('id');
        $query = $this->db->get($table);
        $row=$query->row();
        $id=$row->id;
        return $id;
    }

    function _custom_query($mysql_query) {
        $query = $this->db->query($mysql_query);
        return $query;
    }

    function custom_get_max($column, $field, $value)
    {
        $table = $this->get_table();
        $this->db->select_max($column);
        $this->db->like($field, $value);
        $query = $this->db->get($table);
        return $query;
    }

    function update_status_konfirmasi_bayar($data){
        $table = "tbl_checkout";
        $date = date('Y-m-d');
        $this->db->set('status', 2);
        $this->db->set('send_date', $date);
        $this->db->where('no_invoice', $data);
        $this->db->update($table);
    }
    function update_status_konfirmasi_bayar_2($data,$status){
        $table = "tbl_checkout";
        $date = date('Y-m-d');
        $this->db->set('status', $status);
        $this->db->set('send_date', $date);
        $this->db->where('id_checkout', $data);
        $this->db->update($table);
    }   
}