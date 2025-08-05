<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Producto_model extends CI_Model
{
    private $table = 'productos';

    public function getAll()
    {
        $this->db->select('p.*, e.nombre AS estado_nombre');
        $this->db->from('productos p');
        $this->db->join('estado e', 'p.estadoID = e.id');
        return $this->db->get()->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function create($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}
