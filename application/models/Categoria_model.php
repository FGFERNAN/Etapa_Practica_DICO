<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categoria_model extends CI_Model
{
    private $table = 'categorias';

    public function getAll()
    {
        $this->db->select('c.*, e.nombre AS estado_nombre');
        $this->db->from('categorias_con_contador c');
        $this->db->where('c.estado !=', 2);
        $this->db->join('estado e', 'c.estado = e.id_estado');
        return $this->db->get()->result();
    }

    public function getInactive()
    {
        $this->db->select('c.*, e.nombre AS estado_nombre');
        $this->db->from('categorias_con_contador c');
        $this->db->where('c.estado =', 2);
        $this->db->join('estado e', 'c.estado = e.id_estado');
        return $this->db->get()->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ['id_categorias' => $id])->row();
    }

    public function create($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function asignar_categoria($productos_ids, $id_categoria)
    {
        $this->db->where_in('id_productos', $productos_ids);
        return $this->db->update('productos', ['id_categorias' => $id_categoria]);
    }

    public function update($id, $data)
    {
        $this->db->where('id_categorias', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id_categorias', $id);
        return $this->db->delete($this->table);
    }
}
