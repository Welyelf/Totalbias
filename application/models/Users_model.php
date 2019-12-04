<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model
{

    protected $table = "tbl_users";

    public function get_details($key, $field = false)
    {
        if (is_numeric($key)) {
            $query = $this->db->get_where($this->table, array('id' => $key), 1);
        } else {
            $query = $this->db->get_where($this->table, array('username' => $key), 1);
        }

        if ($field) {
            $result = $query->row();
            return $result->$field;
        } else {
            return $query->row();
        }
    }
    public function get_all()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function get_details_by_email($key, $field = false){

        $query = $this->db->get_where($this->table, array('email' => $key), 1);

        if ($field) {
            $result = $query->row();
            return $result->$field;
        } else {
            return $query->row();
        }
    }

    public function update_password($password)
    {
        $this->db->set('password', $password);
        $this->db->where("id", $this->session->user->id);
        $this->db->update($this->table);
    }

    public function add($input)
    {
        if ($this->db->insert($this->table, $input)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);

        if ($this->db->delete($this->table)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($input, $id)
    {
        if ($this->db->update($this->table, $input, array('id' => $id))) {
            return true;
        } else {
            return false;
        }
    }


}