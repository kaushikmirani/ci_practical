<?php
class User_model extends CI_model{

    public function register_user($user){
        $this->db->insert('user', $user);
    }

    public function login_user($data = array()){

        $this->db->select('*');
        $this->db->from('user');

        $this->db->where($data);

        if($query=$this->db->get()){
            return $query->result_array();
        }
        else{
            return false;
        }
    }

    public function email_check($email){

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email',$email);
        $query=$this->db->get();

        if($query->num_rows()>0){
            return false;
        }else{
            return true;
        }
    }

    public function show_category_list(){

        /*$this->db->select('*');
        $this->db->from('vehical_category');

        $this->db->where(array("status"=>"a"));*/

        $query= $this->db->query("SELECT vc.* FROM vehical_category AS vc INNER JOIN vehicals AS v ON v.category_id=vc.id WHERE vc.status='a' GROUP by vc.id ");
        if($query->num_rows()>0){
            return $query->result_array();
        }
        else{
            return array();
        }
    }

    public function show_vehical_list($category_id=0){

        $this->db->select('*');
        $this->db->from('vehicals');

        $this->db->where(array("status"=>"a","category_id"=>$category_id));

        if($query=$this->db->get()){
            return $query->result_array();
        }
        else{
            return array();
        }
    }

    public function submit_booking_form($ins_array){
        $response = array();

        $query= $this->db->query("SELECT id,booking_for,booking_session,hours FROM vehical_bookings WHERE category_id=? AND vehical=? AND `date`=? ",array($ins_array['category_id'],$ins_array['vehical'],$ins_array['date']));

        if($query->num_rows()>0){
            $booking_data = $query->result_array();
            if($booking_data['booking_for']=='full'){
                return $response;
            }else if($booking_data['booking_for']=='half'){
                if($ins_array['booking_for']=='full'){
                    return $response;
                }else if ($ins_array['booking_for']=='half'){
                    if($ins_array['booking_session']==$booking_data['booking_session']){
                        return $response;
                    }else{
                        $this->db->insert('vehical_bookings', $ins_array);
                        $response['insert_id'] = $this->db->insert_id();
                        return $response;
                    }
                }else{
                    return $response;
                }
            }else{
                return $response;
            }
        }else{
            $this->db->insert('vehical_bookings', $ins_array);
            $response['insert_id'] = $this->db->insert_id();
        }

        return $response;
    }
}


?>