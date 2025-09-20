<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Compra_model extends CI_Model
{
    private $table_compra = 'compras';
    private $table_detalle_compra = 'detalle_compra';


    public function getAllCompras()
    {
        $this->db->select('c.*, u.nombre AS usuario_nombre, pr.nombre AS proveedor_nombre');
        $this->db->from('compras c');
        $this->db->join('usuarios u', 'c.id_usuarios = u.id_usuarios', 'left');
        $this->db->join('proveedores pr', 'c.id_proveedores = pr.id_proveedores');
        return $this->db->get()->result();
    }

    public function filterProveedor($id_proveedor)
    {
        $this->db->select('c.*, u.nombre AS usuario_nombre, pr.nombre AS proveedor_nombre');
        $this->db->from('compras c');
        $this->db->join('usuarios u', 'c.id_usuarios = u.id_usuarios', 'left');
        $this->db->join('proveedores pr', 'c.id_proveedores = pr.id_proveedores');
        $this->db->where('c.id_proveedores =', $id_proveedor);
        return $this->db->get()->result();
    }

    public function getComprasConFiltros($filtros)
    {
        $this->db->select('c.*, CONCAT(u.nombre, " ", u.apellidos) AS usuario_nombre, pr.nombre as proveedor_nombre');
        $this->db->from('compras c');
        $this->db->join('usuarios u', 'c.id_usuarios = u.id_usuarios', 'left');
        $this->db->join('proveedores pr', 'c.id_proveedores = pr.id_proveedores');

        // Aplicar filtro de fecha de inicio SI EXISTE
        if (!empty($filtros['fecha_inicio'])) {
            // Asumiendo que tu columna de fecha en la tabla 'compras' se llama 'fecha'
            $this->db->where('c.fecha_hora >=', $filtros['fecha_inicio']);
        }

        // Aplicar filtro de fecha de fin SI EXISTE
        if (!empty($filtros['fecha_fin'])) {
            $this->db->where('c.fecha_hora <=', $filtros['fecha_fin']);
        }

        $this->db->order_by('c.id_compras', 'DESC'); // Ordenar por la más reciente
        $query = $this->db->get();
        return $query->result();
    }

    public function getDetalleCompra($id_compra)
    {
        $this->db->select('dc.* , p.nombre AS producto_nombre');
        $this->db->from('detalle_compras dc');
        $this->db->join('productos p', 'dc.id_productos = p.id_productos');
        $this->db->where('dc.id_compras', $id_compra);
        return $this->db->get()->result();
    }

    public function getById($id)
    {
        $this->db->select('c.*, u.nombre AS usuario_nombre, pr.nombre AS proveedor_nombre');
        $this->db->from('compras c');
        $this->db->join('usuarios u', 'c.id_usuarios = u.id_usuarios', 'left');
        $this->db->join('proveedores pr', 'c.id_proveedores = pr.id_proveedores');
        $this->db->where('c.id_compras', $id);
        return $this->db->get()->row();
    }

    public function createCompra($data)
    {
        $this->db->insert($this->table_compra, $data);
        return $this->db->insert_id();
    }

    public function createDetalleCompra($data)
    {
        return $this->db->insert($this->table_detalle_compra, $data);
    }

    public function verDatelleCompra($id_compra)
    {
        $this->db->select('dc.*, p.nombre AS nombre_producto, m.nombre AS marca_producto');
        $this->db->from('detalle_compra dc');
        $this->db->join('productos p', 'dc.id_productos = p.id_productos');
        $this->db->join('marca m', 'p.id_marca = m.id_marca');
        $this->db->where('dc.id_compras', $id_compra);
        return $this->db->get()->result();
    }
}
