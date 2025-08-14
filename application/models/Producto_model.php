<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Producto_model extends CI_Model
{
    private $table = 'productos';

    public function getAll()
    {
        $this->db->select('p.*, m.nombre AS marca_nombre, c.nombre AS categoria_nombre, e.nombre AS estado_nombre');
        $this->db->from('productos p');
        $this->db->join('estado_producto e', 'p.id_estado_producto = e.id_estado_producto');
        $this->db->join('marca m', 'p.id_marca = m.id_marca');
        $this->db->join('categorias c', 'p.id_categorias = c.id_categorias');
        $this->db->where('p.id_estado_producto !=', 2);
        return $this->db->get()->result();
    }

    public function getInactive()
    {
        $this->db->select('p.*, m.nombre AS marca_nombre, e.nombre AS estado_nombre');
        $this->db->from('productos p');
        $this->db->join('estado_producto e', 'p.id_estado_producto = e.id_estado_producto');
        $this->db->join('marca m', 'p.id_marca = m.id_marca');
        $this->db->where('p.id_estado_producto =', 2);
        return $this->db->get()->result();
    }

    public function getByCategory($id_categoria) {
        $this->db->select('p.*, m.nombre AS marca_nombre, c.nombre AS categoria_nombre, e.nombre AS estado_nombre');
        $this->db->from('productos p');
        $this->db->join('estado_producto e', 'p.id_estado_producto = e.id_estado_producto');
        $this->db->join('marca m', 'p.id_marca = m.id_marca');
        $this->db->join('categorias c', 'p.id_categorias = c.id_categorias');
        $this->db->where('p.id_estado_producto !=', 2);
        $this->db->where('p.id_categorias !=', $id_categoria);
        return $this->db->get()->result();
    }

    public function filterCategory($id_categoria) {
        $this->db->select('p.*, m.nombre AS marca_nombre, c.nombre AS categoria_nombre, e.nombre AS estado_nombre');
        $this->db->from('productos p');
        $this->db->join('estado_producto e', 'p.id_estado_producto = e.id_estado_producto');
        $this->db->join('marca m', 'p.id_marca = m.id_marca');
        $this->db->join('categorias c', 'p.id_categorias = c.id_categorias');
        $this->db->where('p.id_estado_producto !=', 2);
        $this->db->where('p.id_categorias =', $id_categoria);
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
