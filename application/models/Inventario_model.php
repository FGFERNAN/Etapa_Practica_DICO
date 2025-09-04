<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventario_model extends CI_Model
{
    public function getAll()
    {
        $this->db->select('p.*, m.nombre AS marca_nombre, c.nombre AS categoria_nombre, e.nombre AS estado_nombre');
        $this->db->from('productos p');
        $this->db->join('estado_producto e', 'p.id_estado_producto = e.id_estado_producto');
        $this->db->join('marca m', 'p.id_marca = m.id_marca');
        $this->db->join('categorias c', 'p.id_categorias = c.id_categorias');
        return $this->db->get()->result();
    }
}

?>