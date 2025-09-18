<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario_model extends CI_Model
{
    private $table_users = 'usuarios';
    private $table_documents = 'tipo_documento';
    private $table_roles = 'roles';

    public function get_all()
    {
        $this->db->select('u.*, r.nombre AS rol_nombre, e.nombre AS estado_nombre, t.nombre AS tipo_documento_nombre');
        $this->db->from('usuarios u');
        $this->db->join('roles r', 'u.id_roles = r.id_roles');
        $this->db->join('estado_usuario e', 'u.id_estado_usuario = e.id_estado_usuario');
        $this->db->join('tipo_documento t', 'u.id_tipo_documento = t.id_tipo_documento');
        $this->db->where('u.id_estado_usuario !=', 2);
        return $this->db->get()->result();
    }

    public function get_user_by_email($email)
    {
        $this->db->select('u.*, r.nombre AS rol_nombre');
        $this->db->from('usuarios u');
        $this->db->join('roles r', 'u.id_roles = r.id_roles');
        $this->db->where('u.email', $email);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_inactive()
    {
        $this->db->select('u.*, r.nombre AS rol_nombre, e.nombre AS estado_nombre, t.nombre AS tipo_documento_nombre');
        $this->db->from('usuarios u');
        $this->db->join('roles r', 'u.id_roles = r.id_roles');
        $this->db->join('estado_usuario e', 'u.id_estado_usuario = e.id_estado_usuario');
        $this->db->join('tipo_documento t', 'u.id_tipo_documento = t.id_tipo_documento');
        $this->db->where('u.id_estado_usuario', 2);
        return $this->db->get()->result();
    }

    public function get_all_document_types()
    {
        return $this->db->get($this->table_documents)->result();
    }

    public function get_all_roles()
    {
        return $this->db->get($this->table_roles)->result();
    }

    public function get_by_id($id)
    {
        $this->db->select('u.*, r.nombre AS rol_nombre, e.nombre AS estado_nombre, t.nombre AS tipo_documento_nombre');
        $this->db->from('usuarios u');
        $this->db->join('roles r', 'u.id_roles = r.id_roles');
        $this->db->join('estado_usuario e', 'u.id_estado_usuario = e.id_estado_usuario');
        $this->db->join('tipo_documento t', 'u.id_tipo_documento = t.id_tipo_documento');
        $this->db->where('u.id_usuarios', $id);
        return $this->db->get()->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table_users, $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_usuarios', $id);
        return $this->db->update($this->table_users, $data);
    }

    /*
    public function delete($id)
    {
        $this->db->where('id_usuarios', $id);
        return $this->db->delete($this->table_users);
    }
    */
}
