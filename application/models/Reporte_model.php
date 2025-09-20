<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reporte_model extends CI_Model {
    public function get_all($filtros){
        $this->db->select('hp.*, CONCAT(u.nombre, " ", u.apellidos) AS usuario_nombre');
        $this->db->from('historial_operaciones hp');
        $this->db->join('usuarios u', 'hp.id_usuarios = u.id_usuarios');
        // Aplicar filtro de fecha de inicio SI EXISTE
        if (!empty($filtros['fecha_inicio'])) {
            // Asumiendo que tu columna de fecha en la tabla 'compras' se llama 'fecha'
            $this->db->where('hp.fecha_hora >=', $filtros['fecha_inicio']);
        }

        // Aplicar filtro de fecha de fin SI EXISTE
        if (!empty($filtros['fecha_fin'])) {
            $this->db->where('hp.fecha_hora <=', $filtros['fecha_fin']);
        }

        $this->db->order_by('hp.id_historial_operaciones', 'DESC'); // Ordenar por la más reciente
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_operations() {
        $this->db->distinct();
        $this->db->select('tipo_operacion');
        $query = $this->db->get('historial_operaciones');
        return $query->result_array();
    }

    public function filter_by_operation($operacion) {
        $this->db->select('hp.*, CONCAT(u.nombre, " ", u.apellidos) AS usuario_nombre');
        $this->db->from('historial_operaciones hp');
        $this->db->join('usuarios u', 'hp.id_usuarios = u.id_usuarios');
        $this->db->where('hp.tipo_operacion =', $operacion);
        return $this->db->get()->result();
    }
}
?>