<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('courses_model');
		$this->load->model('team_model');
	}
	
	public function index(){

		$courses = $this->courses_model->show_courses();
		$team = $this->team_model->show_team();

		$data = array(
			"scripts" => array(
				"owl.carousel.min.js",
				"theme-scripts.js" 
			),
			"courses" => $courses,
			"team" => $team
		);
		$this->template->show("home.php", $data);
	}

}
