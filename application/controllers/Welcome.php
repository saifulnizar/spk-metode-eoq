<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	 function __construct(){
		parent:: __construct();
		$this->load->model('Model');
	}
	
	public function index()
	{

		$this->load->view('welcome_message');
	}
	
	function login(){
		$where = array(
			'userlogin'	=> $this->input->post('nama'),
			'psslogin'	=> $this->input->post('sandi')
		);
		$validate = $this->Model->validate('user', $where);
   
	   if($validate->num_rows() > 0){
			 $data  = $validate->row_array();
			 
        $id_user	= $data['id_user'];
		$userlogin	= $data['userlogin'];
		$psslogin	= $data['psslogin'];
        $level 		= $data['level'];
        $sesdata = array(
            'id_user'		=> $id_user,
			'userlogin'		=> $userlogin,
            'psslogin'     	=> $psslogin,
            'level'     	=> $level,
            'logged_in'	 	=> TRUE
        );
        $this->session->set_userdata($sesdata);
        // access login for admin
			if($level === '1'){
				redirect('admin');
	 
				}elseif ($level === '2'){
				redirect('kasir');
			}elseif ($level === '3'){
				redirect('gudang');
			}else{
				echo $this->session->set_flashdata('msg','<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
  <div class="toast-header">
    <svg class="rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
      focusable="false" role="img">
      <rect fill="#007aff" width="100%" height="100%" /></svg>
    <strong class="mr-auto">Morodadi</strong>
    <small class="text-muted">just now</small>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body">
   Nama dan Password tidak terdaftar ...!!!!
  </div>
</div>');
			redirect('welcome');
			}
		}else{
			echo $this->session->set_flashdata('msg','<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
  <div class="toast-header">
    <svg class="rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"
      focusable="false" role="img">
      <rect fill="#007aff" width="100%" height="100%" /></svg>
    <strong class="mr-auto">Morodadi</strong>
    <small class="text-muted">just now</small>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body">
   Nama dan Password tidak terdaftar ...!!!!
  </div>
</div>');
			redirect('welcome');
		}
	}
	
	function logout(){
      $this->session->sess_destroy();
      redirect('welcome');
  }
}
