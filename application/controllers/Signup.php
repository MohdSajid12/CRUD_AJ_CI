<?php

class Signup extends CI_Controller
{
    public function index()
    {
        $this->load->view('frontPage');
    }

    public function addUser()
    {
        
        $this->form_validation->set_rules('firstname', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[signup.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'required|matches[password]');
    
        $response = array(
            'status' => 'error',
            'message' => 'Validation Error',
            'errors' => array()
        );
    
        if ($this->form_validation->run()==FALSE) {
            $response['errors'] = $this->form_validation->error_array();
           
        } else {
    
            $userData = array(
                'firstname' => $this->input->post('firstname'),
                'email' => $this->input->post('email'),
                'password' =>md5( $this->input->post('password',true)),
            );
           
            $insert_id = $this->frontPageModel->addUser($userData);
    
            if ($insert_id) {
                $response['status'] = 'success';
                $response['message'] = 'Register Successfully';
                $response['response_data'] = $userData;
               
            } else {
                $response['message'] = 'Failed to register';
            }
        }
    
        echo json_encode($response);
    }

    

}

?>