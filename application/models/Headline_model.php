<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Headline_model extends CI_Model
{

    protected $table = "tbl_headline";

    public function get_details($key, $field = false)
    {
        $query = $this->db->get_where($this->table, array('id' => $key), 1);

        if ($field) {
            $result = $query->row();
            return $result->$field;
        } else {
            return $query->row();
        }
    }


    public function get_ad_details($key, $rating)
    {
        $query = $this->db->get_where($this->table, array('id' => $key , 'ad_rating' => $rating), 1);
        return $query->row();

    }
    public function get_ad_specific_rating($rating)
    {
        $this->db->where("ad_rating",$rating);
        $this->db->where("ad_position","Top");
        $this->db->where("ad_status",1);
        $query = $this->db->get($this->table);
        return $query->result();
    }


    public function get_all_active()
    {
        $this->db->where("ad_rating",1);
        $this->db->where("ad_status",1);
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function get_all_active_ratings($rate)
    {
        $this->db->where("ad_status",1);
        $this->db->where("ad_position","Column");
        $this->db->where("ad_rating",$rate);
        $query = $this->db->get($this->table);
        return $query->result();
    }


    public function get_all()
    {
        $this->db->order_by('id','DESC');
        $query = $this->db->get($this->table);
        return $query->result();
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