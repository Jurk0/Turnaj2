<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hrac_model extends CI_Model
{

    public $table = 'hrac';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }


    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }


    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    

    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('Meno', $q);
	$this->db->or_like('Priezvisko', $q);
	$this->db->or_like('Vek', $q);
	$this->db->or_like('Poznamky', $q);
	$this->db->or_like('Mesto_idMesto', $q);
	$this->db->or_like('Tym_id', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }


    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('Meno', $q);
	$this->db->or_like('Priezvisko', $q);
	$this->db->or_like('Vek', $q);
	$this->db->or_like('Poznamky', $q);
	$this->db->or_like('Mesto_idMesto', $q);
	$this->db->or_like('Tym_id', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }


    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }


    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }


    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

