<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Venta_model extends CI_Model
{
    private $table_venta = 'ventas';
    private $table_detalle_venta = 'detalle_venta';


    public function getAllVentas()
    {
        $this->db->select('v.*, u.nombre AS usuario_nombre');
        $this->db->from('ventas v');
        $this->db->join('usuarios u', 'v.id_usuarios = u.id_usuarios', 'left');
        return $this->db->get()->result();
    }

    public function getVentasConFiltros($filtros)
    {
        $this->db->select('v.*, CONCAT(u.nombre, " ", u.apellidos) AS usuario_nombre');
        $this->db->from('ventas v');
        $this->db->join('usuarios u', 'v.id_usuarios = u.id_usuarios', 'left');

        // Aplicar filtro de fecha de inicio SI EXISTE
        if (!empty($filtros['fecha_inicio'])) {
            // Asumiendo que tu columna de fecha en la tabla 'compras' se llama 'fecha'
            $this->db->where('v.fecha_hora >=', $filtros['fecha_inicio']);
        }

        // Aplicar filtro de fecha de fin SI EXISTE
        if (!empty($filtros['fecha_fin'])) {
            $this->db->where('v.fecha_hora <=', $filtros['fecha_fin']);
        }

        $this->db->order_by('v.id_ventas', 'DESC'); // Ordenar por la más reciente
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id)
    {
        $this->db->select('v.*, u.nombre AS usuario_nombre');
        $this->db->from('ventas v');
        $this->db->join('usuarios u', 'v.id_usuarios = u.id_usuarios', 'left');
        $this->db->where('v.id_ventas', $id);
        return $this->db->get()->row();
    }

    public function createVenta($data)
    {
        $this->db->insert($this->table_venta, $data);
        return $this->db->insert_id();
    }

    public function createDetalleVenta($data)
    {
        return $this->db->insert($this->table_detalle_venta, $data);
    }

    public function verDatelleVenta($id_venta)
    {
        $this->db->select('dv.*, p.nombre AS nombre_producto, m.nombre AS marca_producto');
        $this->db->from('detalle_venta dv');
        $this->db->join('productos p', 'dv.id_productos = p.id_productos');
        $this->db->join('marca m', 'p.id_marca = m.id_marca');
        $this->db->where('dv.id_ventas', $id_venta);
        return $this->db->get()->result();
    }
}
