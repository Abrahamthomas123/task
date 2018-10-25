<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->database();

	}
	
	public function get_table_data($table,$status)
	{
		if($status=="all")
		{
			$query=$this->db->get($table);
			$query=$query->result_array();
		}
		if($status=="1")
		{
			$this->db->where('status',1);
			$query=$this->db->get($table);
			$query=$query->result_array();
		}
		return $query;
	}
	public function get_table_data_order($table,$status,$order)
	{
		if($status=="all")
		{
			$this->db->order_by("id",$order);
			$query=$this->db->get($table);
			$query=$query->result_array();
		}
		if($status=="1")
		{
			$this->db->order_by("id", $order);
			$this->db->where('status',1);
			$query=$this->db->get($table);
			$query=$query->result_array();
		}
		return $query;
	}
	public function get_table_data_order_by($table,$status,$order_by,$order)
	{
		if($status=="all")
		{
			$this->db->order_by($order_by,$order);
			$query=$this->db->get($table);
			$query=$query->result_array();
		}
		if($status=="1")
		{
			$this->db->order_by($order_by, $order);
			$this->db->where('status',1);
			$query=$this->db->get($table);
			$query=$query->result_array();
		}
		return $query;
	}
	public function get_row_data($table,$id)
	{
		
		$this->db->where('id',$id);
		$query=$this->db->get($table);
		$query=$query->row_array();
		return $query;
	}
	public function add_data($id)
    {
        $data=array(
            'name'=>$this->input->post('name'),
            'email'=>$this->input->post('email'),
            'phone'=>$this->input->post('phone'),
            'dob'=>$this->input->post('dob'),
            'status'=>1,
            'created_on' => time(),
            'updated_on' => time()
        );

        $this->db->insert('ci_employee',$data);
    }
	public function update_data($id)
    {
        $data=array(
            'name'=>$this->input->post('name'),
            'email'=>$this->input->post('email'),
            'phone'=>$this->input->post('phone'),
            'dob'=>$this->input->post('dob'),            
            'updated_on' => time()
        );
        $this->db->where('id',$id);

        $this->db->update('ci_employee',$data);
    }
	public function update_status()
	{
		$data['status']=$this->input->post('status');
		$this->db->where('id',$this->input->post('id'));
		$this->db->update($this->input->post('table'),$data);
	}
	public function delete_row()
	{
		$this->db->where('id',$this->input->post('id'));
		$this->db->delete($this->input->post('table'));

		if($this->input->post('table')=='ci_products')
		{
			$this->db->where('product_id',$this->input->post('id'));
			$this->db->delete('ci_stock_management');


			$this->db->where('post_id',$this->input->post('id'));
			$this->db->delete('ci_seo');
		}

	}
	

}