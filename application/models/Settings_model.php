<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model
{

    protected $table = "tbl_settings";

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        $this->db->select('name, value');
        $query = $this->db->get($this->table);
        return $query->result();
    }


    public function get_all_admin()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function update($data)
    {
        foreach ($data as $key => $value) {
            // Initialize input array.
            $input = array('name' => $key, 'value' => $value);
            // Check first if settings already exist, then add if not.
            // Update existing settings to new value.
            $this->db->update($this->table, array('value' => $value), array('name' => $key));
        }
        return true;
    }

    /**
     *   Add new settings for new fields.
     * @return bool
     */
    public function add($input)
    {
        if ($this->db->insert($this->table, $input)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     *   Edit settings.
     * @return bool
     */
    public function edit($input)
    {
        $this->db->where('id', $input['id']);
        unset($input['id']);

        if ($this->db->update($this->table, $input)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function val($key, $is_id = null)
    {
        if ($is_id) {
            // Get the row id.
            $query = $this->db->get_where($this->table, array('id' => $key), 1);
            $result = $query->row();
            // Return the entire row of the ID.
            return ($result) ? $result : FALSE;
        } else {
            $query = $this->db->get_where($this->table, array('name' => $key), 1);
        }
        $result = $query->row();

        return ($result) ? $result->value : FALSE;
    }
}
