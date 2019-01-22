<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class HomeModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_table() {
        $table = "tbl_category";
        return $table;
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
    function get_slider(){
        return $this->db->get('slider');
    } 

    function get_where_custom($col, $value) {
        $table = $this->get_table();
        $this->db->where($col, $value);
        $query=$this->db->get($table);
        return $query;
    }
	function get_where_custom2($col, $value) {
        $table = "tbl_user";
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
}