<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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

	
	 // new site syle 
	public function new_home(){
		$this->load->model('Admin_Model');
		$data['events']=$this->Admin_Model->get_recent_events();
		$data['officers']=$this->Admin_Model->get_officers();
		$this->load->view('home/header');
		$this->load->view('home/new_nav');
		$this->load->view('home/home_2', $data);
		$this->load->view('home/footer');
	}

	public function new_about(){
		$this->load->model('Admin_Model');
		$data['officers']=$this->Admin_Model->get_officers();
		$data['members']=$this->Admin_Model->get_members();
		$this->load->view('home/header');
		$this->load->view('home/new_nav');
		$this->load->view('home/new_about',$data);
		$this->load->view('home/footer');
	}

	public function new_acomp(){
		$this->load->view('home/header');
		$this->load->view('home/new_nav');
		$this->load->view('home/new_acomp');
		$this->load->view('home/footer');
	}

	public function new_future(){
		$this->load->view('home/header');
		$this->load->view('home/new_nav');
		$this->load->view('home/new_future');
		$this->load->view('home/footer');
	}

	public function new_awards(){
		$this->load->model('Admin_Model');
		$data['awardRec']=$this->Admin_Model->get_award_recipients();
		$this->load->view('home/header');
		$this->load->view('home/new_nav');
		$this->load->view('home/new_awards', $data);
		$this->load->view('home/footer');
	}

	public function new_donate(){
		$this->load->view('home/header');
		$this->load->view('home/new_nav');
		$this->load->view('home/new_donate');
		$this->load->view('home/footer');
	}

	public function new_grants(){
		$this->load->model('Admin_Model');
		$data['grantRec']=$this->Admin_Model->get_recipients();
		$this->load->view('home/header');
		$this->load->view('home/new_nav');
		$this->load->view('home/new_grants', $data);
		$this->load->view('home/footer');
	}

	public function new_scholar(){
		$this->load->view('home/header');
		$this->load->view('home/new_nav');
		$this->load->view('home/new_scholar');
		$this->load->view('home/footer');
	}

	public function new_events(){
		$this->load->model('Admin_Model');
		$data['events']=$this->Admin_Model->get_events();
		$this->load->view('home/header');
		$this->load->view('home/new_nav');
		$this->load->view('home/new_events', $data);
		$this->load->view('home/footer');
	}
	
	public function contact(){
		$this->load->helper(array('url', 'form'));
		$this->load->library('form_validation');
		$this->load->model('Admin_Model');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('subject', 'Subject', 'required');
		$this->form_validation->set_rules('msg', 'Message', 'required|min_length[10]');
		
		if($this->form_validation->run()==FALSE){
			$this->load->view('home/header');
			$this->load->view('home/new_nav');
			$this->load->view('home/contact');
			$this->load->view('home/footer');
		}
		else{
			$msg = array(
				'name'=>$this->input->post('name'),
				'email'=>$this->input->post('email'),
				'subject'=>$this->input->post('subject'),
				'msg'=>$this->input->post('msg')
			);
			$send_msg = $this->Admin_Model->send_msg($msg);
			if(!$send_msg){
				$data['send_failed']='<div class="alert alert-danger">There was an issue sending your message, try again later <i class="fa fa-exclamation-circle"></i></div>';
				$this->load->view('home/header');
				$this->load->view('home/new_nav');
				$this->load->view('home/contact', $data);
				$this->load->view('home/footer');

			}
			else{
				$data['send_success']='<div class="alert alert-success">Your message was sent, an HEF administrator will respond to you in 24 hours <i class="fa fa-check-circle"></i></div>';
				$this->load->view('home/header');
				$this->load->view('home/new_nav');
				$this->load->view('home/contact', $data);
				$this->load->view('home/footer');

			}
		}
		
	}

	public function choose_login(){
		$this->load->view('home/choose_login');
	}
	// end

}
?>
