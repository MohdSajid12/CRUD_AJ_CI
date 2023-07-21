<?php

class frontPageModel extends CI_Model
{
    public function addUser($userData)
    {
        $this->db->insert('signup', $userData);
        return $this->db->insert_id();
    }

    public function checkUser($userData)
    {
        $query = $this->db->get_where('signup', $userData);
        if ($query->num_rows())
        {
            return $query->row();
        } else {
            return false;
        }
    }


    public function insertRecord($data)
    {

        return $this->db->insert('crud', $data);
    }



    public function getRecords($user_id)
    {
        
        $this->db->where('user_id', $user_id);
        $q = $this->db->get('crud');
        $results = $q->result_array();
        return $results;
        // $id = $this->session->userdata('id');
        // $t = $this->db->select()
        //     ->from('crud')
        //     ->where(['user_id' => $id])           
        //     ->get();
        // return $t->result_array();
    }

    public function updateRecord($data)
    {
        $this->db->where('id', $data['id']);
        return $this->db->update('crud', $data);
    }

    public function deleteRecord($data)
    {
        $this->db->where('id', $data['id']);
        return $this->db->delete('crud');
    }
}

?>