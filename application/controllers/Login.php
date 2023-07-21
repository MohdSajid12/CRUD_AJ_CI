<?php

class Login extends CI_Controller
{

    public function loginUser()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Content-Type');

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $response = array(
            'status' => 'error',
            'message' => 'Validation Error',
            'errors' => array()
        );
        //$this->session->set_userdata('id', 1212); 
        //echo "<pre>"; print_r($this->session->userdata("id"));die;
        if ($this->form_validation->run() == FALSE) {
            $response['errors'] = $this->form_validation->error_array();
        } else {
            $userData = array(
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
            );

            $insert_id = $this->frontPageModel->checkUser($userData);

            if ($insert_id) {
                $this->session->set_userdata('id', $insert_id);
                $response['status'] = 'success';
                $response['success_message'] = 'Login Successful';
                $response['response_data'] = $userData;
                $this->session->set_flashdata('success_message', 'Login successful');
            } else {
                $response['message'] = 'Failed to Login';
                $response['error_message'] = 'Please check your email and password';
            }
        }

        echo json_encode($response);
    }

    public function logout()
    {
        $this->session->sess_destroy();
    }
}

?>