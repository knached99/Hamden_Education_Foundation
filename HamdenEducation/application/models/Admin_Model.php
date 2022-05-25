<?php 
class Admin_Model extends CI_Model{

    public function admin_exists($email){
        $this->db->select('*');
        $this->db->from('admins');
        $this->db->where('email', $email);
        $results = $this->db->get()->num_rows();
        if($results == 0){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }

  // assign grant reviewer 
  public function assign_grant_reviewer($reviewer, $id){
    $this->db->set('reviewer_email', $reviewer);
    $this->db->set('assign_status', 1);
    $this->db->where('grant_id', $id);
    if($this->db->update('grants')){
        return TRUE;
    }
    else{
        return FALSE;
    }
}

    public function add_admin($admin_data){
        return $this->db->insert('admins', $admin_data);
    }

  

    public function comment($id, $proposal_comment, $impact_comment, $budget_comment, $info_comment, $overall_score){
        $this->db->set('admin_proposal_comments', $proposal_comment);
        $this->db->set('admin_impact_comments', $impact_comment);
        $this->db->set('admin_budget_comments', $budget_comment);
        $this->db->set('admin_extra_info_comments', $info_comment);
        $this->db->set('overall_score', $overall_score);
        $this->db->where('grant_id', $id);
        if($this->db->update('grants')){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    public function get_all_students(){
        $this->db->select('*');
        $this->db->from('Students');
        $results = $this->db->get()->row();
        return $results;
    }
    public function get_all_teachers(){
        $this->db->select('*');
        $this->db->from('Teachers');
        $results = $this->db->get()->row();
        return $results;
    }
    public function get_all_guests(){
        $this->db->select('*');
        $this->db->from('Guests');
        $results = $this->db->get()->row();
        return $results;
    }

    public function get_all_board(){
        $this->db->select('*');
        $this->db->from('admins');
        $results = $this->db->get()->row();
        return $results;
    }

    public function get_curr_pwd($email, $curr_pwd){
       $this->db->select('*');
       $this->db->from('admins');
       $this->db->where('email', $email);
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

    public function update_pwd($email, $pwd){
        $this->db->set('pwd', $pwd);
        $this->db->where('email', $email);
        if($this->db->update('admins')){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    public function authenticate($email, $pwd){
        $this->db->where('email', $email);
        $results = $this->db->get('admins');
        if($results->num_rows()==1){
            foreach($results->result_array() as $row){
                $password = $row['pwd'];
            }
            if(password_verify($pwd, $password)){
                return $results->row();
            }
        }
        return FALSE;
    }

    // update profile
    public function update_profile($bio, $facebook, $linkedin, $twitter, $sess_email){
        $this->db->set('bio', $bio);
        $this->db->set('facebook', $facebook);
        $this->db->set('linkedin', $linkedin);
        $this->db->set('twitter', $twitter);
        $this->db->where('email', $sess_email);
        $update = $this->db->update('admins');
        if($update){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    // upload profile pic 
    public function upload_profile_pic($email, $profile_pic){
        $this->db->set('profile_pic', $profile_pic);
        $this->db->where('email', $email);
        $upload = $this->db->update('admins');
        if($upload){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function get_msg($id){
        $this->db->where('msg_id', $id);
        $results = $this->db->get('messages');
        return $results->row();
    }
  
    public function delete_msg($id){
        $this->db->where('msg_id', $id);
        $del_msg =  $this->db->delete('messages');
        if($del_msg){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function upload_recipient($recipient_data){
        return $this->db->insert('grantRec', $recipient_data);
    }

    public function upload_award_recipient($recipient_data){
        return $this->db->insert('awardRec', $recipient_data);
    }

    public function get_attendees(){
        $data = $this->db->query("SELECT * FROM eventAttendees INNER JOIN events ON eventAttendees.event_id = events.event_id");
        return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());
    }


     public function get_recipients(){
        $data = $this->db->query("SELECT * FROM grantRec INNER JOIN admins ON grantRec.admin_id = admins.admin_id");
        return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());
    }

    public function get_award_recipients(){
        $data = $this->db->query("SELECT * FROM awardRec INNER JOIN admins ON awardRec.admin_id = admins.admin_id");
        return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());
    }

    public function delete_award_recipient($id){
        $this->db->where('recipients_id', $id);
        $del_recipient =  $this->db->delete('awardRec');
        if($del_recipient){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function delete_recipient($id){
        $this->db->where('recipients_id', $id);
        $del_recipient =  $this->db->delete('grantRec');
        if($del_recipient){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    public function get_students(){
        $data = $this->db->query('SELECT * FROM Students');
        return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());
    }
    public function view_student($id){
        $data = $this->db->query("SELECT * FROM Students WHERE user_id='{$id}'");
        return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());
    }

    public function get_teachers(){
        $data = $this->db->query('SELECT * FROM Teachers');
        return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());
    }

    public function view_teacher($id){
        $data = $this->db->query("SELECT * FROM Teachers WHERE user_id='{$id}'");
        return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());
    }

    public function view_admin($id){
        $data = $this->db->query("SELECT * FROM admins WHERE admin_id='{$id}'");
        return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());
    }

    public function get_guests(){
        $data = $this->db->query('SELECT * FROM Guests');
        return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());
    }

    
    public function view_guest($id){
        $data = $this->db->query("SELECT * FROM Guests WHERE user_id='{$id}'");
        return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());
    }
    
    public function get_all_admins(){
        $data = $this->db->query('SELECT * FROM admins');
        return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row()); 
    }

    public function get_officers(){
        $data = $this->db->query('SELECT * FROM admins WHERE privilege = 1');
        return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row()); 
    }

    public function get_members(){
        $data = $this->db->query('SELECT * FROM admins WHERE board_position= "Board Member"');
        return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row()); 
    }

    public function get_events(){
      //  $data = $this->db->query("SELECT * FROM grants INNER JOIN Teachers ON grants.userid = Teachers.user_id");
        $data = $this->db->query("SELECT * FROM events INNER JOIN admins ON events.admin_id = admins.admin_id");
        return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());
    }

    public function get_recent_events(){
        $data = $this->db->query('SELECT * FROM events ORDER BY event_date DESC LIMIT 3');
        return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row()); 
    }

    public function get_event($id){
        $data = $this->db->query("SELECT * FROM events WHERE event_id='{$id}'");
        return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());
    }

    public function delete_event($id){
        $this->db->where('event_id', $id);
        $del_event =  $this->db->delete('events');
        if($del_event){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function delete_attendee($id){
        $this->db->where('event_id', $id);
        $del_attendee = $this->db->delete('eventAttendees');
        if($del_attendee){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    // Edit Event function 
    public function edit_event($id, $event_title, $event_location, $event_date, $event_time, $event_picture, $event_description){
        $this->db->set('event_title', $event_title);
        $this->db->set('event_location', $event_location);
        $this->db->set('event_date', $event_date);
        $this->db->set('event_time', $event_time);
        $this->db->set('event_picture', $event_picture);
        $this->db->set('event_description', $event_description);
        $this->db->where('event_id', $id);
        if($this->db->update('events')){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    public function upload_event($event_data){
        return $this->db->insert('events', $event_data);
    }

    public function get_grants(){
        $data = $this->db->query("SELECT * FROM grants INNER JOIN Teachers ON grants.userid = Teachers.user_id");
        return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());
    }
    
  

    // Grants assigned to specific user 
    public function get_assigned_grants($email){
        $data = $this->db->query("SELECT * FROM grants where reviewer_email='{$email}'");
        return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());
    }
    public function get_grant($id){
        $data = $this->db->query("SELECT * FROM grants INNER JOIN Teachers ON grants.userid = Teachers.user_id WHERE grants.grant_id= '{$id}'");
        return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());
    }

    
    public function send_msg($msg){
        return $this->db->insert('messages', $msg);
    }

    public function get_msgs(){
        $data = $this->db->query("SELECT * FROM messages");
        return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());
    }

    public function get_admins($email){
        $data = $this->db->query("SELECT * FROM admins WHERE NOT email='{$email}'");
        return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());
    }

    public function delete_admin($id){
        $this->db->where('admin_id', $id);
        $del_admin =  $this->db->delete('admins');
        if($del_admin){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    // approve grant
    public function approve_grant($id){
        $this->db->set('grant_status', 1);
        $this->db->set('acknowledged', 0);
        $this->db->where('grant_id', $id);
        if($this->db->update('grants')){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function deny_grant($id){
        $this->db->set('grant_status', 0);
        $this->db->set('acknowledged', 0);
        $this->db->where('grant_id', $id);
        if($this->db->update('grants')){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
     
    // Password Reset functionality 
    public function send_verification_code($code, $email){
        $this->db->set('verification_code', $code);
        $this->db->where('email', $email);
        if($this->db->update('admins')){
            $this->db->set('verified', 0); // reset to 0
            $this->db->where('email', $email);
            $this->db->update('admins');
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function verify_code($email, $code){
        $this->db->select('*');
        $this->db->from('admins');
        $this->db->where('email', $email);
        $results = $this->db->get()->result_array();
        foreach($results as $row){
            $verification_code = $row['verification_code'];
        }
        if($code == $verification_code){
            $this->db->set('verified', 1);
            $this->db->where('email', $email);
            $this->db->update('admins');
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

   
}
?>