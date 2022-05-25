<?php 
    Class Dash extends CI_Controller{
	    public function __construct(){
		    parent::__construct();
		    if(!isset($_SESSION['email'])){
                switch($this->session->account_type){
                    case 'Student':
                        if ($this->session->verified ="0"){
                            session_destroy();
                            redirect('../index.php/Login/student_login');
                        }
                    break;
                    case 'Teacher':
                        if ($this->session->verified ="0"){
                            session_destroy();
                            redirect('../index.php/Login/teacher_login');
                        }
                    break;
                    case 'Guest':
                        if ($this->session->verified ="0"){
                            session_destroy();
                            redirect('../index.php/Login/guests_login');
                        }
                    break;
                    default:
                        // any existing session data destroy and redirect to choose login page 
                        session_destroy();
                        redirect('../index.php/Home/choose_login');
                    break;
                }
		}
    }
      
// load dashboard
public function user_dash(){
    $this->load->library('form_validation');
    $this->load->helper('url');
    $this->load->model('HamdenEdModel');
    $this->load->model('Admin_Model');
    $data['grant_status']=$this->HamdenEdModel->grant_status($_SESSION['user_id']);
    $data['recent_events']=$this->Admin_Model->get_recent_events();
    $this->load->view('dash/header');
    $this->load->view('dash/nav', $data);
    $this->load->view('dash/sidebar');
    $this->load->view('dash/dash', $data);
    $this->load->view('dash/footer');
}

public function view_events(){
    $this->load->library('form_validation');
    $this->load->helper('url');
    $this->load->model('HamdenEdModel');
    $this->load->model('Admin_Model');
    $data['grant_status']=$this->HamdenEdModel->grant_status($_SESSION['user_id']);
    $data['events']=$this->Admin_Model->get_events();
    $this->load->view('dash/header');
    $this->load->view('dash/nav', $data);
    $this->load->view('dash/sidebar');
    $this->load->view('dash/view_events', $data);
    $this->load->view('dash/footer');
}

// load event details 
public function event_details($id){
    $data['event_id']=$id;
    $this->load->model('Admin_Model');
    $this->load->model('HamdenEdModel');
    $this->load->helper(array('url', 'form'));
    $data['grant_status']=$this->HamdenEdModel->grant_status($_SESSION['user_id']);
    $is_event_joined = $this->HamdenEdModel->is_event_joined($this->session->user_id, $id);
    switch($is_event_joined){
        case TRUE;
            $data['event_joined']='<p style="color: green; font-weight: bold;">You already joined this event <i class="fa fa-check-circle"></i></p>';
        break;
        case FALSE:
            $data['not_joined']='<p class="text-dark font-weight-bold">You have not yet joined this event <i class="fa fa-exclamation-circle"></i></p>';
        break;
    }
   
    $this->load->helper(array('url', 'form'));
    $data['event_details']=$this->Admin_Model->get_event($id);
    $this->load->view('dash/header');
    $this->load->view('dash/nav', $data);
    $this->load->view('dash/sidebar');
    $this->load->view('dash/event_details', $data);
    $this->load->view('dash/footer');
}

public function join_event($event_id){
    $this->load->model('HamdenEdModel');
    $event_details = array(
        'first_name'=>$this->session->first_name,
        'last_name'=>$this->session->last_name,
        'user_id'=>$this->session->user_id,
        'event_id'=>$event_id,
        'date_joined'=>date('F jS, Y')
       );
    $event_joined = $this->HamdenEdModel->is_event_joined($this->session->user_id, $event_id);
    if($event_joined == TRUE){
        $event_joined='<div class="alert alert-warning">You have already joined this event <i class="fa fa-exclamation-circle"></i></div>';
        $this->session->set_flashdata('event_joined', $event_joined);
        redirect('../index.php/Dash/event_details/'.$event_id.'');
    }
    else if($event_joined == NULL){
        $join_event = $this->HamdenEdModel->join_event($event_details);
        if($join_event == TRUE){
            $join_success = '<div class="alert alert-success">You\'ve successfully signed up for this event <i class="fa fa-check-circle"></i></div>';
            $this->session->set_flashdata('join_success', $join_success);
            /* $user_data = array(
                'email'=>$_SESSION['email'],
                'event_joined'=>$_SESSION['event_joined']
            );
            $this->session->unset($user_data);
            $this->session->set_userdata($user_data); */
            redirect('../index.php/Dash/event_details/'.$event_id.'');
        }
        else{
            $this->session->unset($user_data);
            $this->session->set_userdata($user_data);
            $join_fail = '<div class="alert alert-danger">An issue occurred while signing up for this event, please try again later <i class="fa fa-exclamation-circle"></i></div>';
            $this->session->set_flashdata('join_fail', $join_fail);
            redirect('../index.php/Dash/event_details/'.$event_id.'');
        }
    }
 
}

// Remove from event 
public function unattend_event($id){
    $this->load->model('HamdenEdModel');
    $this->load->helper(array('form', 'url'));
    $event_joined = $this->HamdenEdModel->is_event_joined($this->session->user_id, $id);
    $unattend = $this->HamdenEdModel->unattend_event($id);
    if($unattend == TRUE){
    $unattended = '<div class="alert alert-warning">You have been removed from the event <i class="fa fa-exclamation-circle"></i></div>';
    $this->session->set_flashdata('unattended', $unattended);
    redirect('../index.php/Dash/event_details/'.$event_id.'');
}
    else{
        $unattend_fail = '<div class="alert alert-danger">There was an issue removing you from the event <i class="fa fa-times-circle"></i></div>';
        $this->session->set_flashdata('unnattend_fail', $unnattend_fail);
        redirect('../index.php/Dash/event_details/'.$event_id.'');
    }
}
// load profile view
public function profile(){
    $this->load->model('HamdenEdModel');
    $this->load->helper(array('url', 'form'));
    $data['grant_status']=$this->HamdenEdModel->grant_status($_SESSION['user_id']);
    $this->load->view('dash/header');
    $this->load->view('dash/nav', $data);
    $this->load->view('dash/sidebar');
    $this->load->view('dash/profile');
    $this->load->view('dash/footer');
}

// update profile
public function update_profile(){
    $this->load->model('HamdenEdModel');
    $this->load->helper(array('url', 'form'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('bio', 'Bio', 'min_length[10]', array('min_length'=>'Your bio is not long enough, Dont be afraid to tell us more about yourself.'));
    $this->form_validation->set_rules('twitter', 'Twitter', 'regex_match[(https:\/\/twitter.com\/(?![a-zA-Z0-9_]+\/)([a-zA-Z0-9_]+))]', array('regex_match'=>'This is not a valid Twitter profile link'));
    $this->form_validation->set_rules('facebook', 'Facebook', 'regex_match[/http(?:s):\/\/(?:www\.)facebook\.com\/.+/i]', array('regex_match'=>'This is not a valid Facebook profile link'));
    $this->form_validation->set_rules('linkedin', 'Linkedin', 'regex_match[^(http(s)?:\/\/)?([\w]+\.)?linkedin\.com\/(pub|in|profile)]', array('regex_match'=>'This is not a valid Linkedin link'));
    if($this->form_validation->run()==FALSE){
        $errs = validation_errors();
        $this->session->set_flashdata('validation_errs', $errs );
        redirect('./Dash/profile');
    }
    else{
        switch($this->session->account_type){
            case 'Student':
                $update_student = $this->HamdenEdModel->update_student_profile($this->input->post('bio'), $this->input->post('facebook'), $this->input->post('linkedin'), $this->input->post('twitter'), $this->session->email);
                if($update_student == FALSE){
                    $update_student_err = '<div class="alert alert-danger">Unable to Update your Profile, Something went wrong</div>';
                    $this->session->set_flashdata('update_err', $update_student_err);
                     redirect('./Dash/profile');
                }
                else{
                    $data = array(
                        'bio'=>$this->input->post('bio'),
                        'facebook'=>$this->input->post('facebook'),
                        'twitter'=>$this->input->post('twitter'),
                        'linkedin'=>$this->input->post('linkedin')
                    );
                    $this->session->unset_userdata($data);
			        $this->session->set_userdata($data);
                    $update_student_success = '<div class="alert alert-success">Your profile was updated <i class="fa fa-check-circle"></i></div>';
                    $this->session->set_flashdata('update_success', $update_student_success);
                    redirect('./Dash/profile');
                }
            break;

            case 'Teacher':
                $update_teacher = $this->HamdenEdModel->update_teacher_profile($this->input->post('bio'), $this->input->post('facebook'), $this->input->post('twitter'), $this->input->post('linkedin'), $this->session->email);
                if($update_teacher == FALSE){
                    $update_teacher_err = '<div class="alert alert-danger">Unable to update your profile, something went wrong</div>';
                    $this->session->set_flashdata('update_err', $update_teacher_err);
                     redirect('./Dash/profile');
                }
                else{
                    $data = array(
                        'bio'=>$this->input->post('bio'),
                        'facebook'=>$this->input->post('facebook'),
                        'twitter'=>$this->input->post('twitter'),
                        'linkedin'=>$this->input->post('linkedin')
                    );
                    $this->session->unset_userdata($data);
			        $this->session->set_userdata($data);
                    $update_teacher_success = '<div class="alert alert-success">Your profile was updated <i class="fa fa-check-circle"></i></div>';
                    $this->session->set_flashdata('update_success', $update_teacher_success);
                    redirect('./Dash/profile');
                }
            break;

            case 'Guest':
                $update_guests = $this->HamdenEdModel->update_guests_profile($this->input->post('bio'), $this->input->post('facebook'), $this->input->post('twitter'), $this->input->post('linkedin'), $this->session->email);
                if($update_guests == FALSE){
                    $update_guests_err = '<div class="alert alert-danger">Unable to update your profile, something went wrong</div>';
                    $this->session->set_flashdata('update_err', $update_guests_err);
                    redirect('./Dash/profile');
                }
                else{
                    $data = array(
                        'bio'=>$this->input->post('bio'),
                        'facebook'=>$this->input->post('facebook'),
                        'twitter'=>$this->input->post('twitter'),
                        'linkedin'=>$this->input->post('linkedin')
                    );
                    $this->session->unset_userdata($data);
                    $this->session->set_userdata($data);
                    $update_guests_success = '<div class="alert alert-success">Your profile was updated <i class="fa fa-check-circle"></i></div>';
                    $this->session->set_flashdata('update_success', $update_guests_success);
                    redirect('./Dash/profile');
                }
            break;
        }
    }
}


// load manage password view
public function manage_pwd(){
    $this->load->helper(array('url', 'form'));
    $this->load->model('HamdenEdModel');
    $data['grant_status']=$this->HamdenEdModel->grant_status($_SESSION['user_id']);
    $this->load->view('dash/header');
    $this->load->view('dash/nav', $data);
    $this->load->view('dash/sidebar');
    $this->load->view('dash/manage_pwd');
    $this->load->view('dash/footer');
}

// Password manager function  
public function update_pwd(){
    $this->load->model('HamdenEdModel');
    $this->load->helper(array('url', 'form'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('curr_pwd', 'Current Password', 'required'); 
    $this->form_validation->set_rules('pwd', 'Password', 'required|trim|regex_match[/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/]'); 
    $this->form_validation->set_rules('confirm_pwd', 'Retype Password', 'required|trim|matches[pwd]');
    if($this->form_validation->run()==FALSE){
        $errs = validation_errors();
        $this->session->set_flashdata('errs', $errs);
        redirect('./Dash/manage_pwd');
    }
    else{
        switch($this->session->account_type){
            case 'Student':
                $url = '../index.php/Login/student_login';
                break;
            case 'Teacher':
                $url = '../index.php/Login/teacher_login';
                break;

            case 'Guests':
                $url = '../index.php/Login/guests_login';
                break;
        }

        if($this->session->account_type=='Student'){
            $get_curr_pwd = $this->HamdenEdModel->is_curr_student_pwd($this->session->email, $this->input->post('curr_pwd'));
            if($get_curr_pwd == FALSE){
                $not_curr_pwd = '<div class="alert alert-danger">You must enter the current password you are using to update your password <i class="fa fa-exclamation-circle"></i></div>';
                $this->session->set_flashdata('not_curr_pwd',$not_curr_pwd);
                redirect('./Dash/manage_pwd');
            }
            else{
                $update_pwd = $this->HamdenEdModel->update_student_pwd($this->session->email, password_hash($this->input->post('pwd'), PASSWORD_DEFAULT));
                if($update_pwd == TRUE){
                session_unset();
                $pwd_updated = '<div class="alert alert-success">Your password was successfully reset, you can now login with your new password <i class="fa fa-check-circle"></i></div>';
                $this->session->set_flashdata('pwd_updated',$pwd_updated);
                redirect($url);
                }
                else{
                    $update_failed='<div class="alert alert-danger">We were unable to update your password <i class="fa fa-exclamation-circle"></i></div>';
                    $this->session->set_flashdata('update_failed', $update_failed);
                    redirect('./Dash/manage_pwd'); 
                }
            }

        }
  
        else if($this->session->account_type='Teacher'){
            $get_curr_pwd = $this->HamdenEdModel->is_curr_teacher_pwd($this->session->email, $this->input->post('curr_pwd'));
            if($get_curr_pwd == FALSE){
                $not_curr_pwd = '<div class="alert alert-danger">You must enter the current password you are using to update your password <i class="fa fa-exclamation-circle"></i></div>';
                $this->session->set_flashdata('not_curr_pwd',$not_curr_pwd);
                redirect('./Dash/manage_pwd');
            }
            else{
                $update_pwd = $this->HamdenEdModel->update_teacher_pwd($this->session->email, password_hash($this->input->post('pwd'), PASSWORD_DEFAULT));
                if($update_pwd == FALSE){
                    $update_failed='<div class="alert alert-danger">We were unable to update your password <i class="fa fa-exclamation-circle"></i></div>';
                    $this->session->set_flashdata('update_failed', $update_failed);
                    redirect('./Dash/manage_pwd'); 
                }
                else{
                    session_unset();
                    $pwd_updated = '<div class="alert alert-success">Your password was successfully reset, you can now login with your new password <i class="fa fa-check-circle"></i></div>';
                    $this->session->set_flashdata('pwd_updated',$pwd_updated);
                    redirect($url);
                }
            }
        }

        else if($this->session->account_type='Guests'){
            $get_curr_pwd = $this->HamdenEdModel->is_curr_guests_pwd($this->session->email, $this->input->post('curr_pwd'));
            if($get_curr_pwd == FALSE){
                $not_curr_pwd = '<div class="alert alert-danger">You must enter the current password you are using to update your password <i class="fa fa-exclamation-circle"></i></div>';
                $this->session->set_flashdata('not_curr_pwd',$not_curr_pwd);
                redirect('./Dash/manage_pwd');
            }
            else{
                $update_pwd = $this->HamdenEdModel->update_guests_pwd($this->session->email, password_hash($this->input->post('pwd'), PASSWORD_DEFAULT));
                if($update_pwd == FALSE){
                    $update_failed='<div class="alert alert-danger">We were unable to update your password <i class="fa fa-exclamation-circle"></i></div>';
                    $this->session->set_flashdata('update_failed', $update_failed);
                    redirect('./Dash/manage_pwd'); 
                }
                else{
                    session_unset();
                    $pwd_updated = '<div class="alert alert-success">Your password was successfully reset, you can now login with your new password <i class="fa fa-check-circle"></i></div>';
                    $this->session->set_flashdata('pwd_updated',$pwd_updated);
                    redirect($url);
                }
            }
        }
        /*switch($_SESSION['account_type']){
            case 'Students':
                if($this->HamdenEdModel->is_curr_student_pwd($_SESSION['email'], $this->input->post('curr_pwd'))== FALSE){
                    $not_curr_pwd='<div class="alert alert-danger">you must enter the current password you are using to update your password <i class="fa fa-exclamation-circle"></i></div>';
                    $this->session->set_flashdata('not_curr_pwd',$not_curr_pwd);
                    redirect('./Dash/manage_pwd');
                }
                else{
                    $update_pwd = $this->HamdenEdModel->update_student_pwd($_SESSION['email'], password_hash($this->input_post('pwd'), PASSWORD_DEFAULT)); 
                    if($update_pwd){
                        $update_success='<div class="alert alert-success">your password was updated <i class="fa fa-check-circle"></i></div>';
                        $this->session->set_flashdata('update_success', $update_success);
                        redirect('./Dash/manage_pwd');
                    }
                    else{
                        $update_failed='<div class="alert alert-danger">we were unable to update your password <i class="fa fa-exclamation-circle"></i></div>';
                        $this->session->set_flashdata('update_failed', $update_failed);
                        redirect('./Dash/manage_pwd'); 
                    }
                 }
                break;

                case 'Teachers':
                    if($this->HamdenEdModel->is_curr_teacher_pwd($_SESSION['email'], $this->input->post('curr_pwd'))== FALSE){
                        $data['not_curr_pwd']='<div class="alert alert-danger">you must enter the current password you are using to update your password <i class="fa fa-exclamation-circle"></i></div>';
                        $this->load->view('dash/update_pwd',$data);
                    }
                    else{
                        $update_pwd = $this->HamdenEdModel->update_student_pwd($_SESSION['email'], password_hash($this->input_post('pwd'), PASSWORD_DEFAULT)); 
                        if($update_pwd){
                            $data['update_success']='<div class="alert alert-success">your password was updated <i class="fa fa-check-circle"></i></div>';
                            $this->load->view('dash/update_pwd', $data);
                        }
                        else{
                            $data['update_failed']='<div class="alert alert-danger">we were unable to update your password <i class="fa fa-exclamation-circle"></i></div>';
                            $this->load->view('dash/update_pwd',$data);
                        }
                     }
                    break;


        } */
    }
}

// student upload profile picture 
public function student_upload_profile_pic(){
    $this->load->model('HamdenEdModel');
    $this->load->helper(array('url', 'form'));
    $config['upload_path']          = './profile_picture/';
    $config['allowed_types']        = 'jpeg|jpg|png';
    $config['max_size']             = 32000;
    $config['max_width']            = 3000;
    $config['max_height']           = 3000;
    $config['remove_spaces']=true;
    $config['detect_mime']=true;
    $config['mod_mime_fix']=true;
    $config['file_name']=$_FILES['profile_pic']['name'];
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if(!$this->upload->do_upload('profile_pic')){
        $err = $this->upload->display_errors();
        $this->session->set_flashdata('err_msg',$err);
        redirect('./Dash/student_profile');
    }
    else{
        $uploadData = $this->upload->data();
        $profile_pic =  '/profile_picture/'.$uploadData['file_name'].'';
        $this->HamdenEdModel->student_upload_profile_pic($_SESSION['email'], $profile_pic);
        $success_msg ='<div class="alert alert-success">your profile pic was changed!</div>';
        $this->session->set_flashdata('success_msg', $success_msg);
        $data = array('profile_pic'=>$profile_pic);
        if(empty('./profile_picture/'.$_SESSION['profile_pic'].'')){
            $this->session->unset_userdata($data);
			$this->session->set_userdata($data);
			$this->session->set_flashdata('success_msg', $success_msg);
		redirect('./Dash/profile');
        }
        else{
            unlink('./'.$_SESSION['profile_pic']);
            $this->session->unset_userdata($data);
            $this->session->set_userdata($data);
            $this->session->set_flashdata('success_msg', $success_msg);
            redirect('./Dash/profile'); 
        }

    }
    
    /*  $upload_data = $this->upload->data();

   $profile_pic =  '/uploads/'.$upload_data['file_name'];
    $upload_pic = $this->HamdenEdModel->upload_profile_pic($_SESSION['email'], $profile_pic);
    if($upload_pic == TRUE){
        // Reset session data 
        $this->session->unset_userdata($data);
        $this->session->set_userdata($data);
        $sucess_msg = '<div class="alert alert-success">Your profile pic was changed!</div>';
        $this->session->set_flashdata('success_msg', $success_msg);
        redirect('./Dash/profile');
    }
    else{
        $err_msg = '<div class="alert alert-danger">Something went wrong while trying to upload your new pic</div>';
        $this->session->set_flashdata('err_msg',$err_msg);
        redirect('./Dash/profile');
    } */

}

// Teacher upload profile picture 
public function teacher_upload_profile_pic(){
    $this->load->model('HamdenEdModel');
    $this->load->helper(array('url', 'form'));
    $config['upload_path']          = './profile_picture/';
    $config['allowed_types']        = 'jpeg|jpg|png';
    $config['max_size']             = 32000;
    $config['max_width']            = 3000;
    $config['max_height']           = 3000;
    $config['remove_spaces']=true;
    $config['detect_mime']=true;
    $config['mod_mime_fix']=true;
    $config['file_name']=$_FILES['profile_pic']['name'];
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if(!$this->upload->do_upload('profile_pic')){
        $err = $this->upload->display_errors();
        $this->session->set_flashdata('err_msg',$err);
        redirect('./Dash/profile');
    }
    else{
        $uploadData = $this->upload->data();
        $profile_pic =  '/profile_picture/'.$uploadData['file_name'].'';
        $this->HamdenEdModel->teacher_upload_profile_pic($_SESSION['email'], $profile_pic);
        $success_msg ='<div class="alert alert-success">your profile pic was changed!</div>';
        $this->session->set_flashdata('success_msg', $success_msg);
        $data = array('profile_pic'=>$profile_pic);
        if(empty('./profile_picture/'.$_SESSION['profile_pic'].'')){
            $this->session->unset_userdata($data);
			$this->session->set_userdata($data);
			$this->session->set_flashdata('success_msg', $success_msg);
		redirect('./Dash/profile');
        }
        else{
            unlink('./'.$_SESSION['profile_pic']);
            $this->session->unset_userdata($data);
            $this->session->set_userdata($data);
            $this->session->set_flashdata('success_msg', $success_msg);
            redirect('./Dash/profile'); 
        }

    }
    
    /*  $upload_data = $this->upload->data();

   $profile_pic =  '/uploads/'.$upload_data['file_name'];
    $upload_pic = $this->HamdenEdModel->upload_profile_pic($_SESSION['email'], $profile_pic);
    if($upload_pic == TRUE){
        // Reset session data 
        $this->session->unset_userdata($data);
        $this->session->set_userdata($data);
        $sucess_msg = '<div class="alert alert-success">Your profile pic was changed!</div>';
        $this->session->set_flashdata('success_msg', $success_msg);
        redirect('./Dash/profile');
    }
    else{
        $err_msg = '<div class="alert alert-danger">Something went wrong while trying to upload your new pic</div>';
        $this->session->set_flashdata('err_msg',$err_msg);
        redirect('./Dash/profile');
    } */

}

// Guests upload profile picture 
public function guests_upload_profile_pic(){
    $this->load->model('HamdenEdModel');
    $this->load->helper(array('url', 'form'));
    $config['upload_path']          = './profile_picture/';
    $config['allowed_types']        = 'jpeg|jpg|png';
    $config['max_size']             = 32000;
    $config['max_width']            = 3000;
    $config['max_height']           = 3000;
    $config['remove_spaces']=true;
    $config['detect_mime']=true;
    $config['mod_mime_fix']=true;
    $config['file_name']=$_FILES['profile_pic']['name'];
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if(!$this->upload->do_upload('profile_pic')){
        $err = $this->upload->display_errors();
        $this->session->set_flashdata('err_msg',$err);
        redirect('./Dash/profile');
    }
    else{
        $uploadData = $this->upload->data();
        $profile_pic =  '/profile_picture/'.$uploadData['file_name'].'';
        $this->HamdenEdModel->guests_upload_profile_pic($_SESSION['email'], $profile_pic);
        $success_msg ='<div class="alert alert-success">your profile pic was changed!</div>';
        $this->session->set_flashdata('success_msg', $success_msg);
        $data = array('profile_pic'=>$profile_pic);
        if(empty('./profile_picture/'.$_SESSION['profile_pic'].'')){
            $this->session->unset_userdata($data);
			$this->session->set_userdata($data);
			$this->session->set_flashdata('success_msg', $success_msg);
		redirect('./Dash/profile');
        }
        else{
            unlink('./'.$_SESSION['profile_pic']);
            $this->session->unset_userdata($data);
            $this->session->set_userdata($data);
            $this->session->set_flashdata('success_msg', $success_msg);
            redirect('./Dash/profile'); 
        }

    }
    
    /*  $upload_data = $this->upload->data();

   $profile_pic =  '/uploads/'.$upload_data['file_name'];
    $upload_pic = $this->HamdenEdModel->upload_profile_pic($_SESSION['email'], $profile_pic);
    if($upload_pic == TRUE){
        // Reset session data 
        $this->session->unset_userdata($data);
        $this->session->set_userdata($data);
        $sucess_msg = '<div class="alert alert-success">Your profile pic was changed!</div>';
        $this->session->set_flashdata('success_msg', $success_msg);
        redirect('./Dash/profile');
    }
    else{
        $err_msg = '<div class="alert alert-danger">Something went wrong while trying to upload your new pic</div>';
        $this->session->set_flashdata('err_msg',$err_msg);
        redirect('./Dash/profile');
    } */

}

// Grant Application 
public function grant_application(){
    $this->load->helper(array('url', 'form'));
    $this->load->library('form_validation');
    $this->load->model('HamdenEdModel');
    $data['grant_status']=$this->HamdenEdModel->grant_status($_SESSION['user_id']);

    $this->form_validation->set_rules('grant_title', 'Grant Title', 'required', array('required'=>'the grant title is required'));
    $this->form_validation->set_rules('grant_amount', 'Grant Amount', 'required|trim|decimal', array('required'=>'grant amount is required', 'trim'=>'no whitespaces allowed', 'decimal'=>'you must enter a decimal number'));
    $this->form_validation->set_rules('grant_reason', 'Grant Reason', 'required', array('required'=>'Your reason for the grant is required'));
    $this->form_validation->set_rules('grant_duration', 'Grant Duration', 'required|trim|numeric', array('required'=> 'grant duration is required to calculate how long this grant application will be open for', 'trim'=>'no whitespaces allowed', 'numeric'=>'grant duration has to be a whole number'));
    $this->form_validation->set_rules('grant_impact', 'Grant Impact', 'required', array('required'=> 'you must include the impacts and expectations this grant will have'));
    $this->form_validation->set_rules('budget_description', 'Budget Description', 'required', array('required'=>'budget description is required'));
    $this->form_validation->set_rules('extra_info', 'Extra Info', 'required', array('required'=>'if there is no additional info'));
    if($this->form_validation->run()==FALSE){
     $this->load->view('dash/header');
    $this->load->view('dash/nav', $data);
    $this->load->view('dash/sidebar');
    $this->load->view('dash/applications_grants');
    $this->load->view('dash/footer');
    }
    else{
        $grant_id = 'grant_'.sha1(time().date('Y'));
        $grant_data = array(
        'grant_id'=>$grant_id,
        'grant_title'=>$this->input->post('grant_title'),
        'grant_amount'=>$this->input->post('grant_amount'),
        'grant_reason'=>$this->input->post('grant_reason'),
        'grant_duration'=>$this->input->post('grant_duration'),
        'grant_impact'=>$this->input->post('grant_impact'),
        'budget_description'=>$this->input->post('budget_description'),
        'extra_info'=>$this->input->post('extra_info'),
        'grant_status'=>2,
        'userid'=>$this->session->user_id
        );
        $create_grant = $this->HamdenEdModel->create_grant($grant_data);
        if($create_grant == TRUE){
            $data['success']='<div class="alert alert-success">your grant was successfully created, it\'s been sent to an HEF administrator for further review, once reviewed, you\'ll get a notification in your dashboard notifying you of the approval status  <i class="fa fa-check-circle"></i></div>';
            $this->load->view('dash/header');
            $this->load->view('dash/nav', $data);
            $this->load->view('dash/sidebar');
            $this->load->view('dash/applications_grants', $data);
            $this->load->view('dash/footer');        }
        else{
            $data['error']='<div class="alert alert-danger">there was an error creating your grant <i class="fa fa-exclamation-circle"></i></div>';
            $this->load->view('dash/header');
            $this->load->view('dash/nav', $data);
            $this->load->view('dash/sidebar');
            $this->load->view('dash/applications_grants', $data);
            $this->load->view('dash/footer'); 
        }
    }

}

// acknoweldge notification 
public function acknowledge($id){
    $this->load->model('HamdenEdModel');
    $acknowledge = $this->HamdenEdModel->acknowledge($id);
    if($acknowledge == TRUE){
        $acknowledged = '<div class="alert alert-success">you\'ve acknowledged a notification</div>';
        $this->session->set_flashdata('acknowledged', $acknowledged);
        redirect(base_url().'index.php/Dash/user_dash');
    }
}

// view grants 
public function view_grants(){
    $this->load->model('HamdenEdModel');
    $this->load->helper(array('url', 'form'));
    $data['grants']=$this->HamdenEdModel->get_grants($_SESSION['user_id']);
    $data['grant_status']=$this->HamdenEdModel->grant_status($_SESSION['user_id']);
    $this->load->view('dash/header');
    $this->load->view('dash/nav', $data);
    $this->load->view('dash/sidebar');
    $this->load->view('dash/view_grants', $data);
    $this->load->view('dash/footer'); 
}

// load grant details for individual grants
public function grant($id){
    $this->load->model('HamdenEdModel');
    $data['grants']=$this->HamdenEdModel->get_grants($_SESSION['user_id']);
    $data['grant_status']=$this->HamdenEdModel->grant_status($_SESSION['user_id']);
    $data['grant']=$this->HamdenEdModel->grant($id);
    $this->load->helper(array('url', 'form'));
    $this->load->view('dash/header');
    $this->load->view('dash/nav', $data);
    $this->load->view('dash/sidebar');
    $this->load->view('dash/grant', $data);
    $this->load->view('dash/footer'); 
}

// Dispute admin decisions on grants  
public function dispute_decision($id){
    $this->load->model('HamdenEdModel');
    $this->load->library('form_validation');
    $this->load->helper(array('url', 'form'));
    $this->form_validation->set_rules('decision_dispute', 'Dispute', 'required|trim', array('required'=>'you need to write something if you want to send your message'));
    if($this->form_validation->run()==FALSE){
        $errs = '<div class="alert alert-danger">'.validation_errors().'</div>';
        $this->session->set_flashdata('errs', $errs);
        redirect('./Dash/grant/'.$id.'');
    }
    else{
        $dispute = $this->HamdenEdModel->dispute_decision($id, $this->input->post('decision_dispute'));
        if($dispute == TRUE){
            $dispute_success = '<div class="alert alert-success">your dispute was sent to the grant applicant</div>';
            $this->session->set_flashdata('dispute_success', $dispute_success);
            redirect('./Dash/grant/'.$id.'');
        }
        else{
            $dispute_error = '<div class="alert alert-danger">there was an issue with sending your dispute</div>';
            $this->session->set_flashdata('dispute_error', $dispute_error);
            redirect('./Dash/grant/'.$id.'');
        }
    }
}

// Send questions or comments to admin about a grant 
public function comment($id){
    $this->load->model('HamdenEdModel');
    $this->load->library('form_validation');
    $this->load->helper(array('url', 'form'));
    $this->form_validation->set_rules('questions_or_comments', 'Questions or Comments', 'required', array('required'=>'This field is required. If you do not have anything to say, type N/A'));
    if($this->form_validation->run()==FALSE){
        $errors = '<div class="alert alert-danger">'.validation_errors().'</div>';
        $this->session->set_flashdata('errors', $errors);
        redirect('./Dash/grant/'.$id.'');
    }
    else{
        // Send Question or Comment
        $send_msg = $this->HamdenEdModel->question_or_comment($id, $this->input->post('questions_or_comments'));
        if($send_msg == FALSE){
            $msg_failed = '<div class="alert alert-danger">there was an issue with sending your message</div>';
            $this->session->set_flashdata('msg_failed', $msg_failed);
            redirect('./Dash/grant/'.$id.'');
        }
        else{
            $msg_success = '<div class="alert alert-success">Your message was sent to the administrator</div>';
            $this->session->set_flashdata('msg_success', $msg_success);
            redirect('./Dash/grant/'.$id.'');
        }
    }
}

// logout
public function logout(){
    switch($this->session->account_type){
        case 'Student':
            session_destroy();
            redirect('../index.php/Login/student_login');
            break;
        case 'Teacher':
            session_destroy();
            redirect('../index.php/Login/teacher_login');
            break;
        case 'Guest':
            session_destroy();
            redirect('../index.php/Login/guest_login');
        break;
    }
}

}