<?php
class HamdenEdModel extends CI_Model{

    public function create_student_acct($user_data){
        return $this->db->insert('Students', $user_data);
    }
    public function create_teacher_acct($user_data){
        return $this->db->insert('Teachers', $user_data);
    }
    public function create_guest_acct($user_data){
        return $this->db->insert('Guests', $user_data);
    }

    public function create_grant($grant_data){
       return$this->db->insert('grants', $grant_data);
      
    }

    // get all the grants 
    public function get_grants($user_id){
        $data = $this->db->query("SELECT * FROM grants INNER JOIN Teachers ON grants.userid = Teachers.user_id WHERE Teachers.user_id='{$user_id}'");
        return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());
    }

    // get grant status 
    public function grant_status($user_id){
        $data = $this->db->query("SELECT * FROM Teachers INNER JOIN grants ON Teachers.user_id = grants.userid WHERE Teachers.user_id='{$user_id}' AND acknowledged=0");
        return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());

    }
    // view individual grant 
    public function grant($id){
        $data = $this->db->query("SELECT * FROM grants WHERE grant_id='{$id}'");
        return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());

    }

    public function acknowledge($id){
        $this->db->set('acknowledged', 1);
        $this->db->where('grant_id', $id);
        if($this->db->update('grants')){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    // authenticate students, guests and teachers
    public function authenticate_student($email, $password){
        $this->db->where('email', $email);
        $query = $this->db->get('Students');
        
        if($query->num_rows() == 1) {
            foreach($query->result_array() as $row){
                $right_pwd = $row['pwd'];
            }
            if(password_verify($password, $right_pwd)){
                return $query->row();
            }
               
        }
        
        return false;
    }

    public function authenticate_teacher($email, $password){
        $this->db->where('email', $email);
        $query = $this->db->get('Teachers');
        
        if($query->num_rows() == 1) {
            foreach($query->result_array() as $row){
                $right_pwd = $row['pwd'];
            }
            if(password_verify($password, $right_pwd)){
                return $query->row();
            }
               
        }
        
        return false;
    }

    public function authenticate_guest($email, $password){
        $this->db->where('email', $email);
        $query = $this->db->get('Guests');
        
        if($query->num_rows() == 1) {
            foreach($query->result_array() as $row){
                $right_pwd = $row['pwd'];
            }
            if(password_verify($password, $right_pwd)){
                return $query->row();
            }
               
        }
        
        return false;
    }

    // current password teacher, students, guests
    public function is_curr_student_pwd($email, $curr_pwd){
        $this->db->select('*');
        $this->db->from('Students');
        $this->db->where('email',$email);
        $results = $this->db->get()->result_array();
        foreach($results as $row){
            $curr_pass = $row['pwd'];
        }
        if(!password_verify($curr_pwd, $curr_pass)){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }

    public function is_curr_teacher_pwd($email, $curr_pwd){
        $this->db->select('*');
        $this->db->from('Teachers');
        $this->db->where('email',$email);
        $results = $this->db->get()->result_array();
        foreach($results as $row){
            $curr_pass = $row['pwd'];
        }
        if(!password_verify($curr_pwd, $curr_pass)){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }

    public function is_curr_guests_pwd($email, $curr_pwd){
        $this->db->select('*');
        $this->db->from('Guests');
        $this->db->where('email',$email);
        $results = $this->db->get()->result_array();
        foreach($results as $row){
            $curr_pass = $row['pwd'];
        }
        if(!password_verify($curr_pwd, $curr_pass)){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }

    // update students, teacher, guest password
    public function update_student_pwd($email, $pwd){
        $this->db->set('pwd', $pwd);
        $this->db->where('email', $email);
        $update = $this->db->update('Students');
        if($update){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function update_teacher_pwd($email, $pwd){
        $this->db->set('pwd', $pwd);
        $this->db->where('email', $email);
        $update = $this->db->update('Teachers');
        if($update){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function update_guests_pwd($email, $pwd){
        $this->db->set('pwd', $pwd);
        $this->db->where('email', $email);
        $update = $this->db->update('Guests');
        if($update){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }


    // dispute decision 
    public function dispute_decision($id, $decision_dispute){
        $this->db->set('decision_dispute', $decision_dispute);
        $this->db->where('grant_id', $id);
        if($this->db->update('grants')){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    // questions or comments 
    public function question_or_comment($id, $decision_dispute){
        $this->db->set('decision_dispute', $decision_dispute);
        $this->db->where('grant_id', $id);
        if($this->db->update('grants')){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    // Student upload profile pic 
    public function Student_upload_profile_pic($email, $profile_pic){
        $this->db->set('profile_pic', $profile_pic);
        $this->db->where('email', $email);
        $upload = $this->db->update('Students');
        if($upload){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    // Teacher upload profile pic 
    public function teacher_upload_profile_pic($email, $profile_pic){
        $this->db->set('profile_pic', $profile_pic);
        $this->db->where('email', $email);
        $upload = $this->db->update('Teachers');
        if($upload){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    // Guests upload profile pic 
    public function guests_upload_profile_pic($email, $profile_pic){
        $this->db->set('profile_pic', $profile_pic);
        $this->db->where('email', $email);
        $upload = $this->db->update('Guests');
        if($upload){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    // Student update profile
    public function update_student_profile($bio, $facebook, $linkedin, $twitter, $sess_email){
        $this->db->set('bio', $bio);
        $this->db->set('facebook', $facebook);
        $this->db->set('linkedin', $linkedin);
        $this->db->set('twitter', $twitter);
        $this->db->where('email', $sess_email);
        $update = $this->db->update('Students');
        if($update){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    // update teacher profile 
    public function update_teacher_profile($bio, $facebook, $linkedin, $twitter, $sess_email){
        $this->db->set('bio', $bio);
        $this->db->set('facebook', $facebook);
        $this->db->set('linkedin', $linkedin);
        $this->db->set('twitter', $twitter);
        $this->db->where('email', $sess_email);
        $update = $this->db->update('Teachers');
        if($update){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    // update Guests profile 
    public function update_guests_profile($bio, $facebook, $linkedin, $twitter, $sess_email){
        $this->db->set('bio', $bio);
        $this->db->set('facebook', $facebook);
        $this->db->set('linkedin', $linkedin);
        $this->db->set('twitter', $twitter);
        $this->db->where('email', $sess_email);
        $update = $this->db->update('Guests');
        if($update){
            return TRUE;
        }
        else{ 
            return FALSE;
        }
    }

    // for login, checks if account exists 
    public function student_exists($email){
        $this->db->select('*');
        $this->db->from('Students');
        $this->db->where('email', $email);
        $results = $this->db->get()->num_rows();
        if($results == 0){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }

    // check teacher 
    public function teacher_exists($email){
        $this->db->select('*');
        $this->db->from('Teachers');
        $this->db->where('email', $email);
        $results = $this->db->get()->num_rows();
        if($results == 0){
            return FALSE;
        }
        else{
            return TRUE;
        }
    } 
    
    // chech guests 
    public function guest_exists($email){
        $this->db->select('*');
        $this->db->from('Guests');
        $this->db->where('email', $email);
        $results = $this->db->get()->num_rows();
        if($results == 0){
            return FALSE;
        }
        else{
            return TRUE;
        }
    } 

    // signup for an event students 
    public function join_event($event_details){
     return $this->db->insert('eventAttendees', $event_details);
    }

    // Unattend event 
    public function unattend_event($event_id){
        $this->db->where('event_id', $event_id);
        $remove_from_event = $this->db->delete('eventAttendees');
        if($remove_from_event){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    

    // check to see if the user signed up for the event already 
    public function is_event_joined($user_id, $event_id){
        $this->db->select('*');
        //$this->db->from('eventAttendees');
        $this->db->where('user_id', $user_id);
        $this->db->where('event_id', $event_id);
        $results = $this->db->get('eventAttendees')->result_array();
        foreach($results as $row){
            if($user_id == $row['user_id'] && $event_id == $row['event_id'] && $row['joined']==0){
                return FALSE;  // return FALSE if event is not joined
            }
            else if($user_id == $row['user_id'] && $event_id == $row['event_id'] && $row['joined']==1){
                return TRUE; // Return true if event is joined 
            }
            else{
                return NULL;
            }
        }


    }

    // password reset students code
    public function send_reset_code($email, $code){
        $this->db->set('reset_code', $code);
        $this->db->where('email', $email);
        if($this->db->update('Students')){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    // send reset code to teacher
    public function send_teacher_code($email, $code){
        $this->db->set('reset_code', $code);
        $this->db->where('email', $email);
        if($this->db->update('Teachers')){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    // send reset code to teacher
    public function send_guest_code($email, $code){
        $this->db->set('reset_code', $code);
        $this->db->where('email', $email);
        if($this->db->update('Guests')){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    // check verification students code 
    public function check_code($email, $code){
        $this->db->where('email', $email);
        $results = $this->db->get('Students')->result_array();
        foreach($results as $row){
            $reset_code = $row['reset_code'];
        }
        if($code == $reset_code){
          return TRUE;
        }
        else{
            return FALSE;
        }
    }

    // check verification teachers code 
    public function verify_teacher_code($email, $code){
        $this->db->where('email', $email);
        $results = $this->db->get('Teachers')->result_array();
        foreach($results as $row){
            $reset_code = $row['reset_code'];
        }
        if($code == $reset_code){
          return TRUE;
        }
        else{
            return FALSE;
        }
    }

    // check verification guests code 
    public function verify_guests_code($email, $code){
        $this->db->where('email', $email);
        $results = $this->db->get('Guests')->result_array();
        foreach($results as $row){
            $reset_code = $row['reset_code'];
        }
        if($code == $reset_code){
          return TRUE;
        }
        else{
            return FALSE;
        }
    }

    // student update password
    public function update_pass($email, $hashed_pass){
        $this->db->set('pwd', $hashed_pass);
        $this->db->set('reset_status', 1);
        $this->db->where('email', $email);
        if($this->db->update('Students')){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    // teacher password update 
    public function update_pwd($email, $hashed_pass){
        $this->db->set('pwd', $hashed_pass);
        $this->db->set('reset_status', 1);
        $this->db->where('email', $email);
        if($this->db->update('Teachers')){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    // guests password update
    public function update_pwd_guests($email, $hashed_pass){
        $this->db->set('pwd', $hashed_pass);
        $this->db->set('reset_status', 1);
        $this->db->where('email', $email);
        if($this->db->update('Guests')){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    // verify students, teachers , guests 
    public function verify_student($email, $code){
        $this->db->select('*');
        $this->db->where('email', $email);
       $results = $this->db->get('Students')->result_array();
       foreach($results as $row){
           $auth = $row['verification_code'];
       }
       if($code == $auth){
           $this->db->set('verified', 1);
           $this->db->where('email', $email);
            $this->db->update('Students');
           return TRUE;
       }
       else{
           return FALSE;
       }
    }

    public function verify_teacher($email, $code){
        $this->db->select('*');
        $this->db->where('email', $email);
       $results = $this->db->get('Teachers')->result_array();
       foreach($results as $row){
           $auth = $row['verification_code'];
       }
       if($code == $auth){
           $this->db->set('verified', 1);
           $this->db->where('email', $email);
            $this->db->update('Teachers');
           return TRUE;
       }
       else{
           return FALSE;
       }
    }

    public function verify_guest($email, $code){
        $this->db->select('*');
        $this->db->where('email', $email);
       $results = $this->db->get('Guests')->result_array();
       foreach($results as $row){
           $auth = $row['verification_code'];
       }
       if($code == $auth){
           $this->db->set('verified', 1);
           $this->db->where('email', $email);
            $this->db->update('Guests');
           return TRUE;
       }
       else{
           return FALSE;
       }
    }

    // check that email is verified
    // make sure teacher account is verified
    public function is_teacher_verified($email){
        $this->db->where('email', $email);
        $status = $this->db->get('Teachers')->result_array();
        foreach($status as $row){
            $status = $row['verified'];
        }
        if($status == 0){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }

    // make sure student account is verified
    public function is_student_verified($email){
        $this->db->where('email', $email);
        $status = $this->db->get('Students')->result_array();
        foreach($status as $row){
            $status = $row['verified'];
        }
        if($status == 0){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }

    // make sure guests account is verified
    public function is_guest_verified($email){
        $this->db->where('email', $email);
        $status = $this->db->get('Guests')->result_array();
        foreach($status as $row){
            $status = $row['verified'];
        }
        if($status == 0){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
    
       
}
?>