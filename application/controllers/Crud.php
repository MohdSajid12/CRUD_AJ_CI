

<?php

class Crud extends CI_Controller
{

    public function __construct()
    {
     
        parent::__construct();
        $this->load->library('session');

        if(!$this->session->userdata('id'))
        {
            header('Location: Signup');
            exit;
            
        }

       

    }
    public function index()
    {
        $this->load->view('crud');
    }

    public function create()
    {
       
    
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'user_id' => $this->session->userdata('id')->id,
        );
    
        $insert = $this->frontPageModel->insertRecord($data);
    
        if ($insert) {
            echo "data submitted";
        } else {
            echo "something went wrong";
        }
    }

    public function getData()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Content-Type');

        // $id = $this->session->userdata('id');
        $id = $this->session->userdata('id')->id;
        $data = $this->frontPageModel->getRecords($id);
        echo json_encode($data);
    }



    public function update()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Content-Type');

        $data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email')
        );

        $update = $this->frontPageModel->updateRecord($data);

        if ($update) {
            echo "record updated";
        } else {
            echo "something went wrong";
        }
    }

    public function delete()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Content-Type');

        $data = array(
            'id' => $this->input->post('id'),
        );

        $delete = $this->frontPageModel->deleteRecord($data);

        if ($delete) {
            echo "record deleted";
        } else {
            echo "something went wrong";
        }
    }


}

?>