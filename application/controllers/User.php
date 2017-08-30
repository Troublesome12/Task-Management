<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct() {
		parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
		$this->load->model('UserModel', 'userModel');
	}


	public function index() {
		$config["base_url"] = base_url()."user/index";
        $config["total_rows"] = $this->userModel->dataCount();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["tasks"] = $this->userModel->getTaskList($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

		$this->load->view('partials/head');
		$this->load->view('partials/navbar');
		$this->load->view('public/dashboard', $data);
		$this->load->view('partials/bottom');
	}

	public function fetchTask() {
		$task = $this->userModel->fetchTask($this->input->post('id'));
		$task->created_at = TimeDifference::time($task->created_at);
		$task->updated_at = TimeDifference::time($task->updated_at);
		echo json_encode($task);
	}

	public function createTask() {
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		if($this->form_validation->run('createTask')){
			$this->userModel->createTask();
			$this->session->set_flashdata(['message' => '<h3>The task has been created successfully!</h3>', 'type' => 'success']);
			return redirect('user');
		}else{
			$this->index();
		}
	}

	public function deleteTask() {
		if($this->userModel->deleteTask($this->input->post('id')))
			echo 'success';
		else echo 'failed';
	}

	public function editTask() {
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		if($this->form_validation->run('createTask')){
			$this->userModel->editTask();
			$this->session->set_flashdata(['message' => '<h3>The task has been edited successfully!</h3>', 'type' => 'success']);
			return redirect('user');
		}else{
			$this->index();
		}
	}
}