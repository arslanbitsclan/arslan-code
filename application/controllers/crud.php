 <?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class Crud extends CI_Controller {  
      //functions  
      function index(){  
           $data["title"] = "Codeigniter Ajax CRUD with Datatables";  
           $this->load->view('crud_view', $data);  
      }  
      function fetch_user(){  
           $this->load->model("crud_model");  
           $fetch_data = $this->crud_model->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $row->user_id; 
                $sub_array[] = $row->name;  
                $sub_array[] = $row->email;  
                $sub_array[] = '<button type="button" name="update" id="'.$row->user_id.'" class="btn btn-warning btn-xs">Update</button>';  
                $sub_array[] = '<button type="button" name="delete" id="'.$row->user_id.'" class="btn btn-danger btn-xs">Delete</button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->crud_model->get_all_data(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      }  

      function user_action(){

        if($_POST["action"] == "Add")
        {

          $insert_data =array(
          
          'name'    => $this->input->post('name'),
          'email'    => $this->input->post('email'),
          );
          $this->load->model('crud_model');
          $this->crud_model->insert_crud($insert_data);
          echo 'Data Inserted';
        }
      }
 }  