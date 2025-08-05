<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estado_model extends CI_Model {
    private $table = 'estado';

    public function getAll() {
        return $this->db->get($this->table)->result();
    }
}

?>