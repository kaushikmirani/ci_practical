<?php

class User extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->library('session');
    }

    public function index(){
        $this->load->view("register.php");
    }

    public function register_user(){

        $user=array(
            'user_name'=>$this->input->post('user_name'),
            'email'=>$this->input->post('email'),
            'password'=>md5($this->input->post('password'))
        );
        print_r($user);

        $email_check=$this->user_model->email_check($user['email']);

        if($email_check){
            $this->user_model->register_user($user);
            $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
            redirect('user/login_view');
        }
        else{
            $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
            redirect('user');
        }
    }

    public function login_view(){
        $this->load->view("login.php");
    }

    public function login_user(){
        $user_login=array(
          'email'=>$this->input->post('email'),
          'password'=>md5($this->input->post('password'))
        );

        $data['users']=$this->user_model->login_user($user_login);

        if(count($data['users'])>0){
            $this->session->set_userdata('id',$data['users'][0]['id']);
            $this->session->set_userdata('email',$data['users'][0]['email']);
            $this->session->set_userdata('user_name',$data['users'][0]['user_name']);

            /*$data['category_list']=$this->user_model->show_category_list();
            $this->load->view('category_list.php',$data);*/
            redirect('user/show_category');
        }else{
            $this->session->set_flashdata('error_msg', 'Invalid login credentials.');
            redirect('user');
        }

    }

    public function user_profile(){
        $this->load->view('user_profile.php');
    }

    public function user_logout(){
        $this->session->sess_destroy();
        redirect('user/login_view', 'refresh');
    }

    public function show_category(){
        $data['category_list']=$this->user_model->show_category_list();
        $this->load->view("category_list.php",$data);
    }

    public function booking_form($category_id=0){
        $data['vehical_list']=$this->user_model->show_vehical_list($category_id);
        $data['category_id'] = $category_id;
        $this->load->view("booking_form.php",$data);
    }

    public function submit_booking_form(){

        if($this->session->userdata('id')==NULL){
            $this->session->set_flashdata('error_msg', 'Session expired please login back.');
            redirect('user/login_view');
        }

        $ins_array=array(
            "category_id" => $this->input->post('category_id'),
            "vehical" => $this->input->post('vehicals'),
            "date" => $this->input->post('date'),
            "booking_for" => $this->input->post('booking_for'),
            "booking_session" => $this->input->post('booking_session'),
            "hours" => $this->input->post('hours'),
            "name" => $this->input->post('name'),
            "email" => $this->input->post('email'),
            "user_id" => $this->session->userdata('id'),
            "phone_number" => $this->input->post('phone_number'),
            "birth_date" => $this->input->post('birth_date'),
            "address" => $this->input->post('address'),
            "zip_code" => $this->input->post('zip_code'),
            "city" => $this->input->post('city'),
            "state" => $this->input->post('state'),
            "added_on" => date('Y-m-d H:i:s'),
        );

        $data = $this->user_model->submit_booking_form($ins_array);

        if(isset($data['insert_id']) && $data['insert_id']>0){
            $this->session->set_flashdata('success_msg', 'Booking form submited successfully.');
            redirect('user/show_category');
        }else{
            $this->session->set_flashdata('error_msg', 'This vehical is already booked during this selection.');
            redirect('user/show_category');
        }



    }
}

?>