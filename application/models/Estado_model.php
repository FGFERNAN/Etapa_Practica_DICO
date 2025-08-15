<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Estado_model extends CI_Model
{
    private $table_usuarios = 'estado_usuario';
    private $table_productos = 'estado_producto';
    private $table_marca = 'estado_marca';
    private $table_categorias = 'estado_categoria';
    private $table_proveedores = 'estado_proveedor';

    public function getAllStateUser()
    {
        return $this->db->get($this->table_usuarios)->result();
    }

    public function getAllStateProduct()
    {
        return $this->db->get($this->table_productos)->result();
    }

    public function getAllStateMarca()
    {
        return $this->db->get($this->table_marca)->result();
    }

    public function getAllStateCategory()
    {
        return $this->db->get($this->table_categorias)->result();
    }

    public function getAllStateProveedor() {
        return $this->db->get($this->table_proveedores)->result();
    }
}
