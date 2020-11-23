<?php

class User extends CI_controller{



  function create(){

    $this->load->model('User_model');
    $this->form_validation->set_rules('name','Name','required');
    $this->form_validation->set_rules('email','Email','required|valid_email');

    if ($this->form_validation->run() == false) {
    $this->load->view('create');
    
    } else {
// save data in db

    $formArray = array();
    $formArray['name']=$this->input->post('name');
    $formArray['email']=$this->input->post('email');
    $formArray['created_at'] = date('y-m-d');
    $this->User_model->create($formArray);
    $this->session->set_flashdata('success','Record Added Successfully');
    redirect(base_url().'index.php/User/index');
    }

    }


     function showCreateForm(){

            $html = $this->load->view('createajax','',true);
            $response['html'] = $html;
            echo json_encode($response);

            }

     function addForm(){

        $this->load->model('User_model');
	    $this->form_validation->set_rules('name','Name','required');
	    $this->form_validation->set_rules('email','Email','required|valid_email');

        if ($this->form_validation->run() == true) {

            //Save Data in DB

            $formArray = array();
            $formArray['name']=$this->input->post('name');
            $formArray['email']=$this->input->post('email');
            $formArray['created_at'] = date('y-m-d');
            $this->User_model->create($formArray);
           



      
        $response['status']=1;
        $response['message']="<div class=\"alert alert-success\">Record has been added Successfully.</div>";
	
        } else { 

        	$response['status']=0;
        	$response['name']=strip_tags(form_error('name'));
        	$response['email']=strip_tags(form_error('email'));

            }
            echo json_encode($response);
        }



     function index(){


     $this->load->model('User_model');
     $users=$this->User_model->all();
     $data = array();
     $data['users']= $users;
	 $users = $this->load->view('list',$data);


    }

  

    function edit($userId){


    $this->load->model('User_model');
    $user= $this->User_model->getUser($userId);
    $data = array();
    $data['user']= $user;

    $this->form_validation->set_rules('name','Name','required');
	$this->form_validation->set_rules('email','Email','required|valid_email');

	if($this->form_validation->run()== false){

    $this->load->view('edit',$data);

	}else {

	$formArray = array();
	$formArray['name']=$this->input->post('name');
    $formArray['email']=$this->input->post('email');
    $this->User_model->updateUser($userId,$formArray);
    $this->session->set_flashdata('success','Record Update Successfully');
    redirect(base_url().'index.php/User/index');
	}
    }

    function delete($userId){

    $this->load->model('User_model');
    $user= $this->User_model->getUser($userId);

    if(empty($user)){

    $this->session->set_flashdata('failure','Record not found in db');
    redirect(base_url().'index.php/User/index');
    }

    $this->User_model->deleteUser($userId);
    $this->session->set_flashdata('success','Record deleted Successfully');
    redirect(base_url().'index.php/User/index');
    }

    }


?>