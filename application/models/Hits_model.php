<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Hits_model extends CI_Model
{

    protected $table = "tbl_hits";

    public function __construct()
    {
        parent::__construct();
    }

    public function get_daily_totals($date_range = FALSE, $sort = 'DESC')
    {
        if ($date_range) {
            $this->db->where('date >=', $date_range['from']);
            $this->db->where('date <=', $date_range['to']);
        }

        $this->db->where('is_total', 1);
        $this->db->order_by('date', $sort);
        $query = $this->db->get($this->table);
        return $query->result();
    }
	
	public function get_year_record()
    {
		$now = strtotime(date("d-M-Y"));
		$year = date('Y', $now);
		
		$this->db->select('SUM(count) as total');
		 $this->db->where('year', $year );
        $this->db->group_by('year', $year);
        $query = $this->db->get($this->table);
        return $query->row();
    }
	
	
	public function get_month_record()
    {
		$now = strtotime(date("d-M-Y"));
		$year = date('Y', $now);
		$month = date('m', $now);
		
		$this->db->select('SUM(count) as total');
		 $this->db->where('year', $year );
		 $this->db->where('month', $month );
        $this->db->group_by('month', $year);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function get_all($date_range = FALSE, $sort = 'DESC')
    {
        if ($date_range) {
            $this->db->where('date >=', $date_range['from']);
            $this->db->where('date <=', $date_range['to']);
        }

        $this->db->order_by('date', $sort);
        $this->db->order_by('is_total', 'ASC');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function get_totals($date_range = FALSE)
    {
        $this->db->select('SUM(count) as page_views, SUM(sessions) as sessions');
        if ($date_range) {
            $this->db->where('date >=', $date_range['from']);
            $this->db->where('date <=', $date_range['to']);
        }
        $this->db->where('is_total', 1);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function add($count)
    {
		$input['date'] = strtotime(date("d-M-Y"));
        $input['count'] = $count;
        $input['year'] = date("Y");
        $input['month'] = date("m");
		
        $this->db->insert($this->table, $input);

        return true;
    }

 

    public function update_count($count)
    {
		$today = strtotime(date("d-M-Y"));
        $this->db->where('date', $today );
		//$this->db->where("id", $this->session->user->id);
        if($this->db->update($this->table, array('count' =>$count))){
			return true;
		}else{
			return false;
		}
        
    }

    public function update_totals()
    {
        $uri = date('F d, Y') . ' Totals';

        $hit = $this->get_hit_data($uri);

        //var_dump($hit);exit;

        if ($hit != NULL) {
            $this->db->where(array('uri' => $uri, 'date' => strtotime(date('d-M-Y'))));
            $this->db->update($this->table, array('count' => $hit->count + 1));

            if (!$this->session->has_userdata('visited')) {
                $this->db->where(array('uri' => $uri, 'date' => strtotime(date('d-M-Y'))));
                $this->db->update($this->table, array('sessions' => $hit->sessions + 1));
            }
        } else {
            $data['uri'] = $uri;
            $data['date'] = strtotime(date('d-M-Y'));
            $data['count'] = 1;
            $data['sessions'] = 1;
            $data['is_total'] = 1;
            $this->db->insert($this->table, $data);
        }


    }

    public function get_hit_data($uri)
    {
        $query = $this->db->get_where($this->table, array('uri' => $uri, 'date' => strtotime(date('d-M-Y'))), 1);
        return $query->row();
    }

    public function get_todays_top()
    {
        $this->db->order_by('count', 'DESC');
        $this->db->where('date', strtotime(date('d-M-Y')));

        // Suppress this line if no status_code column in Hits table yet.
        if ($this->db->field_exists('status_code', 'hits')) {
            $this->db->group_start();
            $this->db->where('status_code !=', 404);
            $this->db->where('status_code !=', 410);
            $this->db->or_where('status_code', NULL);
            $this->db->group_end();
        }

        $this->db->limit(5);
        $query = $this->db->get_where($this->table);
        return $query->result();
    }

    /**
     *   Get the 5 Most Popular Sermons by views.
     */
    public function get_today_hits()
    {
		$today = strtotime(date("d-M-Y"));
		$this->db->where('date', $today);
        $query = $this->db->get($this->table);
        return $query->row();
    }
}