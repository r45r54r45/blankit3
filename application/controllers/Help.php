<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('help_notice');
		$this->load->view('footer');
	}
	public function faq()
	{
		$this->load->view('header');
		$this->load->view('help_faq');
		$this->load->view('footer');
	}
	public function cs()
	{
		$this->load->view('header');
		$this->load->view('help_cs');
		$this->load->view('footer');
	}
	public function func_cs_submit(){
		// post 데이터가 있어야함
		if($this->input->post('title') && $this->input->post('email')){
			$title = $this->input->post('title');
			$contents = $this->input->post('contents');
			$email = $this->input->post('email');
			$takeDown = $this->input->post('takeDown');
			
			$this->load->model('cs_model');
			$this->cs_model->upload_cs($title, $contents, $email);

			$qa_id2 = $this->cs_model->id_seed();
			$userSESSION = $this->session->userdata('user_id');

			$ext = end(explode(".",$_FILES['file']['name']));
			$fileName = $qa_id2 . "_" . $userSESSION . "." . $ext;
			move_uploaded_file($_FILES['file']['tmp_name'],SITE_ROOT."/files/cs/". $fileName);

			$this->cs_model->update_qa_root($qa_id2, $fileName);
			
			/*** 이메일 전송 ***/
			$this->load->library('email');
			
			$this->email->from('do-not-reply@blankit.kr', 'Customer Service');
			$this->email->to('arsischeon@gmail.com');
			$this->email->cc('ryusooyon@gmail.com, yunjiljjh@gmail.com, r54r45r54@gmail.com');

			$emailSubject = 'CS 문의 접수 - ' . $title;
			$emailMessage = "문의가 접수 되었어!\n\n----------\n\n접수 이메일: " . $email . "\n\n문의 제목: " . $title . "\n\n문의 내용: " . $contents;
			
			$this->email->subject($emailSubject);
			$this->email->message($emailMessage);
			
			$this->email->send();
			/*** 이메일 여기까지 ***/
			
			/*** 테이크다운 ***/
			if ($takeDown !== ""){
				$this->cs_model->takedown($takeDown);
			}
			/*** 테이크다운 여기까지 ***/
			
			$csUrl = "http://blankit.kr/help/cs?status=success";
			$this->load->helper('url');
			redirect($csUrl);
		}
		
		//비정상 접근
		$csUrl = "http://blankit.kr/help/cs?status=fail";
		$this->load->helper('url');
		redirect($csUrl);
	}
}
