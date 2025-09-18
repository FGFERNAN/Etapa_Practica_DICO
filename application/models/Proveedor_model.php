<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proveedor_model extends CI_Model
{
    private $table = 'proveedores';

    public function getAll()
    {
        $this->db->select('p.*, e.nombre AS estado_nombre');
        $this->db->from('proveedores_con_contador p');
        $this->db->join('estado_proveedor e', 'p.estado = e.id_estado_proveedor');
        $this->db->where('p.estado !=', 2);
        return $this->db->get()->result();
    }

    public function getAllProveedorContingencia() {
        $this->db->select('p.*, e.nombre AS estado_nombre');
        $this->db->from('proveedores_con_contador p');
        $this->db->join('estado_proveedor e', 'p.estado = e.id_estado_proveedor');
        $this->db->where('p.estado =', 7);
        return $this->db->get()->result();
    }

    public function getAllProveedoresForProducts() {
        $this->db->select('p.*, e.nombre AS estado_nombre');
        $this->db->from('proveedores_con_contador p');
        $this->db->join('estado_proveedor e', 'p.estado = e.id_estado_proveedor');
        $this->db->where('p.estado !=', 2);
        $this->db->where('p.estado !=', 3);
        $this->db->where('p.estado !=', 4);
        $this->db->where('p.estado !=', 5);
        $this->db->where('p.estado !=', 7);
        $this->db->where('p.estado !=', 8);
        $this->db->where('p.estado !=', 9);
        return $this->db->get()->result();
    }

    public function getCantidadProductos($id_proveedores)
    {
        $this->db->select('cantidad_productos');
        $this->db->from('proveedores_con_contador');
        $this->db->where('id_proveedores', $id_proveedores);
        $query = $this->db->get();
        return $query->row()->cantidad_productos;
    }

    public function getInactive()
    {
        $this->db->select('p.*, e.nombre AS estado_nombre');
        $this->db->from('proveedores_con_contador p');
        $this->db->join('estado_proveedor e', 'p.estado = e.id_estado_proveedor');
        $this->db->where('p.estado =', 2);
        return $this->db->get()->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ['id_proveedores' => $id])->row();
    }

    public function create($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function asignar_proveedor($productos_ids, $id_proveedor)
    {
        $this->db->where_in('id_productos', $productos_ids);
        return $this->db->update('productos', ['id_proveedores' => $id_proveedor]);
    }

    public function asignar_proveedor_c($productos_ids, $id_proveedor_c)
    {
        $this->db->where_in('id_productos', $productos_ids);
        return $this->db->update('productos', ['id_proveedores_contingencia' => $id_proveedor_c]);
    }

    public function update($id, $data)
    {
        $this->db->where('id_proveedores', $id);
        return $this->db->update($this->table, $data);
    }

    /*
    public function delete($id)
    {
        $this->db->where('id_proveedores', $id);
        return $this->db->delete($this->table);
    }
    */
}
