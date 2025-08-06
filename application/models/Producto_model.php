<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Producto_model extends CI_Model
{
    private $table = 'productos';

    public function getAll()
    {
        $this->db->select('p.*, m.nombre AS marca_nombre, e.nombre AS estado_nombre');
        $this->db->from('productos p');
        $this->db->where('p.id_estado !=', 2);
        $this->db->join('estado e', 'p.id_estado = e.id_estado');
        $this->db->join('marca m', 'p.id_marca = m.id_marca');
        return $this->db->get()->result();
    }

    public function getInactive() {
        $this->db->select('p.*, m.nombre AS marca_nombre, e.nombre AS estado_nombre');
        $this->db->from('productos p');
        $this->db->where('p.id_estado =', 2);
        $this->db->join('estado e', 'p.id_estado = e.id_estado');
        $this->db->join('marca m', 'p.id_marca = m.id_marca');
        return $this->db->get()->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ['id_productos' => $id])->row();
    }

    public function create($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_productos', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id_productos', $id);
        return $this->db->delete($this->table);
    }
}
