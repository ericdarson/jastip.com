<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Model_Product extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_table() {
        $table = "tbl_products";
        return $table;
    }

    function get($order_by) {
        $table = $this->get_table();
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

    function get_where_custom($col, $value)
    {
        $table = $this->get_table();
        $this->db->where($col, $value);
        $query=$this->db->get($table);
        return $query;
    }

    function join_products($col, $value)
    {
        $table = $this->get_table();
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_products.id_user');
        $this->db->where($col, $value);
        $query=$this->db->get($table);
        return $query;
    }

    function count_where($column, $value)
    {
        $table = $this->get_table();
        $this->db->where($column, $value);
        $query=$this->db->get($table);
        $num_rows = $query->num_rows();
        return $num_rows;
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

    function _delete($id) {
        $table = $this->get_table();
        $this->db->where('id', $id);
        $this->db->delete($table);
    }

    function _custom_query($mysql_query) {
        $query = $this->db->query($mysql_query);
        return $query;
    }

    function join()
    {
        $table = $this->get_table();
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_products.id_user');
        $query = $this->db->get($table);
        return $query;
    }
}