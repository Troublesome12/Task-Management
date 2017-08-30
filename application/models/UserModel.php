<?php defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
    }

    public function dataCount() {
        return $this->db->count_all("tasks");
    }

    public function getTaskList($limit, $start) {
    	$this->db->limit($limit, $start);
    	return $this->db->order_by('id', "DESC")->get('tasks')->result();
    }

    public function fetchTask($id) {
		return $this->db->where('id', $id)->get('tasks')->row();
	}

	public function createTask() {
		$this->load->helper('security');

		$data = array(
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description', TRUE),   //TRUE enables the xss filtering 
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		);

		$this->db->insert('tasks', $data);
	}

	public function deleteTask($id) {
		return $this->db->where('id', $id)->delete('tasks');
	}

	public function editTask() {
		$this->load->helper('security');
		$id = $this->input->post('id');

		$data = array(
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description', TRUE),   //TRUE enables the xss filtering 
			'updated_at' => date('Y-m-d H:i:s')
		);

		$data = array_filter($data);
        return $this->db->where('id', $id)->update('tasks', $data);
	}
}