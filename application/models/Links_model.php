<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Links_model extends CI_Model
{

    protected $table = "tbl_links";

    public function get_details($key, $field = false)
    {
        log_message('debug', "Executing Users_model::get_details({$key}, {$field}).");

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

    public function get_all_articles($col)
    {
        $this->db->where('column_num', $col);
        $this->db->order_by('id','DESC');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function get_all_article()
    {
        $this->db->order_by('id','DESC');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function get_all_archived()
    {
        $this->db->where('is_archive', "1");
        $this->db->order_by('id','DESC');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function get_rating_data($rate,$limit,$sort_date,$sort_first=NULL)
    {

        $this->db->order_by($sort_date,"DESC");
        $this->db->where('rating', $rate);

        $rates=array($rate);

        $rating_value = (int)$rate;

        //echo $rating_value;
        if( ($rating_value - 1) !== 0){
            //array_push($rates,$rating_value - 1);
            $this->db->or_where('rating', $rating_value - 1);
        }
        if( $rating_value +1 < 6){
            //array_push($rates,$rating_value + 1);
            $this->db->or_where('rating', $rating_value + 1);
        }

        //$this->db->or_where('rating', $rates);
//        if($sort_first == 1){
//            $this->db->order_by('rating', 'ASC');
//        }else if($sort_first == 2){
//           $this->db->order_by('priority', 'ASC');
//        }else if($sort_first == 3){
//            $this->db->order_by('column_num', 'ASC');
//        }else{
//            //$this->db->order_by('priority', 'ASC');
//        }

        //$this->db->where('id', $sort_date);
        $this->db->limit($limit);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function get_all_c2()
    {
        $this->db->order_by('id', 'DESC');
        $this->db->where('column_num', "2");
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function get_all_c3()
    {
        $this->db->where('column_num', "3");
        $this->db->order_by('id', "DESC");
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

    public function delete_archive()
    {
        $this->db->where('is_archive', "1");

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