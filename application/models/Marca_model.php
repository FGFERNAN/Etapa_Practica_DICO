<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Marca_model extends CI_Model
{
    private $table = 'marca';

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }
}
