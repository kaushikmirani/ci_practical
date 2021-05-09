<?php

class Admin extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->helper('url');
        $this->load->model('admin_model');
        $this->load->library('session');
    }

    public function index(){
        $this->load->view("admin_login.php");
    }

    public function login_user(){
        $user_login=array(
          'admin_username'=>$this->input->post('email'),
          'password'=>md5($this->input->post('password'))
        );

        $data['users']=$this->admin_model->admin_login_user($user_login);

        if(count($data['users'])>0){
            $this->session->set_userdata('admin_id',$data['users'][0]['id']);
            $this->session->set_userdata('admin_username',$data['users'][0]['admin_username']);
            $this->session->set_userdata('admin_type',$data['users'][0]['admin_type']);

            redirect('admin/show_category');
        }else{
            $this->session->set_flashdata('error_msg', 'Invalid login credentials.');
            redirect('admin');
        }

    }

    public function user_logout(){
        $this->session->sess_destroy();
        redirect('admin', 'refresh');
    }

    public function show_category(){
        $data['category_list']=$this->admin_model->admin_show_category_list();
        $this->load->view("admin_category_list.php",$data);
    }

    public function show_vehical(){
        $data['vehical_list']=$this->admin_model->admin_show_vehical_list();
        $this->load->view("admin_vehical_list.php",$data);
    }

    public function show_bookings(){
        $data['bookings']=$this->admin_model->admin_show_bookings();
        $this->load->view("admin_vehical_bookings.php",$data);
    }

}

?>