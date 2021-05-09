<?php
class Admin_model extends CI_model{


    public function admin_login_user($data = array()){

        $this->db->select('*');
        $this->db->from('admin');

        $this->db->where($data);

        if($query=$this->db->get()){
            return $query->result_array();
        }
        else{
            return false;
        }
    }

    public function admin_show_category_list(){

        $this->db->select('*');
        $this->db->from('vehical_category');

        $this->db->where(array("status"=>"a"));

        if($query=$this->db->get()){
            return $query->result_array();
        }
        else{
            return array();
        }
    }

    public function admin_show_vehical_list(){

        $this->db->select('*');
        $this->db->from('vehicals');

        $this->db->where(array("status"=>"a"));

        $query= $this->db->query("SELECT v.*,vc.category_name FROM vehicals AS v LEFT JOIN vehical_category AS vc ON v.category_id=vc.id WHERE v.status='a' GROUP by v.id ");

        if($query->num_rows()>0){
            return $query->result_array();
        }
        else{
            return array();
        }
    }

    public function admin_show_bookings(){

        $query= $this->db->query("SELECT vb.*,vc.category_name,v.vehical_name FROM vehical_bookings AS vb LEFT JOIN vehical_category AS vc ON vb.category_id=vc.id LEFT JOIN vehicals AS v ON vb.vehical=v.id ");

        if($query->num_rows()>0){
            return $query->result_array();
        }
        else{
            return array();
        }
    }

}


?>