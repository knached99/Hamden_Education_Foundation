<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Dash extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->account_type!=="admin" || !isset($this->session->email)){
            session_destroy(); // destroy any active session data 
            redirect('../index.php/Admin/Admin_Login/login');
        }
    }

    public function admin_dash(){
        $this->load->helper(array('url', 'form'));
        $this->load->model('Admin_Model');
        $data['students'] =$this->Admin_Model->get_students();
        $data['teachers']=$this->Admin_Model->get_teachers();
        $data['guests']=$this->Admin_Model->get_guests();
        $data['msgs']=$this->Admin_Model->get_msgs(); // pass into navbar 
        $data['grants'] = $this->Admin_Model->get_grants(); // pass into navbar
        $data['attendees']=$this->Admin_Model->get_attendees();
        if($this->session->privilege=="3"){
            redirect('../index.php/Admin/Dash/assigned_grants');
        }
        $this->load->view('dash/header');
        $this->load->view('admin/nav', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/admin_dash', $data);
        $this->load->view('dash/footer', $data);
    }


    public function mass_email(){
        $this->load->helper(array('url', 'form'));
        $this->load->model('Admin_Model');
        $data['admins'] =$this->Admin_Model->get_all_admins();
        $data['students'] =$this->Admin_Model->get_students();
        $data['teachers']=$this->Admin_Model->get_teachers();
        $data['guests']=$this->Admin_Model->get_guests();
        $data['msgs']=$this->Admin_Model->get_msgs(); // pass into navbar 
        $data['grants'] = $this->Admin_Model->get_grants(); // pass into navbar
        $data['attendees']=$this->Admin_Model->get_attendees();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('user_type', 'User Type', 'required');
        $this->form_validation->set_rules('msg', 'Message', 'required');
        if($this->form_validation->run()==FALSE){
            $this->load->view('dash/header');
            $this->load->view('admin/nav', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/mass_email', $data);
            $this->load->view('dash/footer', $data);
        }
        else{
            // switch between the user type the admin selected 
            switch($this->input->post('user_type')){
                case 'students':
                    $email_all_students = $this->__email_all_students($this->input->post('subject'), $this->input->post('msg'));
                    if($email_all_students){
                        $data['email_sent']='<div class="alert alert-success">A mass email has been sent to all student users <i class="fa fa-check-circle"></i></div>';
                        $this->load->view('dash/header');
                        $this->load->view('admin/nav', $data);
                        $this->load->view('admin/sidebar');
                        $this->load->view('admin/mass_email', $data);
                        $this->load->view('dash/footer', $data);
                    }
                    else{
                        $data['email_not_sent']='<div class="alert alert-danger">There was an issue sending your email <i class="fa fa-exclamation-circle"></i></div>';
                        $this->load->view('dash/header');
                        $this->load->view('admin/nav', $data);
                        $this->load->view('admin/sidebar');
                        $this->load->view('admin/mass_email', $data);
                        $this->load->view('dash/footer', $data);
                    }
                break;
                case 'teachers':
                    $email_all_teachers = $this->__email_all_teachers($this->input->post('subject'), $this->input->post('msg'));
                    if($email_all_teachers){
                        $data['email_sent']='<div class="alert alert-success">A mass email has been sent to all teacher users <i class="fa fa-check-circle"></i></div>';
                        $this->load->view('dash/header');
                        $this->load->view('admin/nav', $data);
                        $this->load->view('admin/sidebar');
                        $this->load->view('admin/mass_email', $data);
                        $this->load->view('dash/footer', $data);
                    }
                    else{
                        $data['email_not_sent']='<div class="alert alert-danger">There was an issue sending your email <i class="fa fa-exclamation-circle"></i></div>';
                        $this->load->view('dash/header');
                        $this->load->view('admin/nav', $data);
                        $this->load->view('admin/sidebar');
                        $this->load->view('admin/mass_email', $data);
                        $this->load->view('dash/footer', $data);
                    }
                break;

                case 'guests':
                    $email_all_guests = $this->__email_all_guests($this->input->post('subject'), $this->input->post('msg')); 
                    if($email_all_guests){
                        $data['email_sent']='<div class="alert alert-success">A mass email has been sent to all guest users <i class="fa fa-check-circle"></i></div>';
                        $this->load->view('dash/header');
                        $this->load->view('admin/nav', $data);
                        $this->load->view('admin/sidebar');
                        $this->load->view('admin/mass_email', $data);
                        $this->load->view('dash/footer', $data);
                    }
                    else{
                        $data['email_not_sent']='<div class="alert alert-danger">There was an issue sending your email <i class="fa fa-exclamation-circle"></i></div>';
                        $this->load->view('dash/header');
                        $this->load->view('admin/nav', $data);
                        $this->load->view('admin/sidebar');
                        $this->load->view('admin/mass_email', $data);
                        $this->load->view('dash/footer', $data);  
                    }
                break;

                case 'admins':
                    $email_all_admins = $this->__email_all_admins($this->input->post('subject'), $this->input->post('msg')); 
                    if($email_all_admins){
                        $data['email_sent']='<div class="alert alert-success">A mass email has been sent to all HEF Board users <i class="fa fa-check-circle"></i></div>';
                        $this->load->view('dash/header');
                        $this->load->view('admin/nav', $data);
                        $this->load->view('admin/sidebar');
                        $this->load->view('admin/mass_email', $data);
                        $this->load->view('dash/footer', $data);
                    }
                    else{
                        $data['email_not_sent']='<div class="alert alert-danger">There was an issue sending your email <i class="fa fa-exclamation-circle"></i></div>';
                        $this->load->view('dash/header');
                        $this->load->view('admin/nav', $data);
                        $this->load->view('admin/sidebar');
                        $this->load->view('admin/mass_email', $data);
                        $this->load->view('dash/footer', $data);  
                    }
                break;

            }
        }
    }

    // manage password 
    public function settings(){
        $this->load->helper(array('url', 'form'));
        $this->load->model('Admin_Model');
        $data['msgs']=$this->Admin_Model->get_msgs(); // pass into navbar 
        $data['grants'] = $this->Admin_Model->get_grants(); // pass into navbar
        $this->load->library('form_validation');
        $this->form_validation->set_rules('curr_pwd', 'Current Password', 'required', array('required'=>'you must enter your current password'));
        $this->form_validation->set_rules('pwd', 'Password', 'required|trim|regex_match[/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/]', array('required'=>'you must create a password', 'regex_match'=>'your password is not strong enough'));
        $this->form_validation->set_rules('retype_pwd', 'Retype Password', 'required|trim|matches[pwd]', array('required'=>'you must retype your new password', 'matches'=>'this must match the new password you typed above'));
        if($this->form_validation->run()==FALSE){
        $this->load->view('dash/header');
        $this->load->view('admin/nav', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/settings', $data);
        $this->load->view('dash/footer', $data);
        } 
        else{
            $get_curr_pwd = $this->Admin_Model->get_curr_pwd($this->session->email, $this->input->post('curr_pwd'));
            if($get_curr_pwd == FALSE){
                $data['not_curr_pwd']='<div class="alert alert-danger">to change your password, you must enter the one you are currently using first</div>';
                $this->load->view('dash/header');
                $this->load->view('admin/nav', $data);
                $this->load->view('admin/sidebar');
                $this->load->view('admin/settings', $data);
                $this->load->view('dash/footer', $data);
            }
            else{
                $update_pwd = $this->Admin_Model->update_pwd($this->session->email, password_hash($this->input->post('pwd'), PASSWORD_DEFAULT));
                if($update_pwd == TRUE){
                    session_unset();
                    $pwd_updated = '<div class="alert alert-success">your password was successfully updated, you can now login with your new password <i class="fa fa-check-circle"></i></div>';
                    $this->session->set_flashdata('pwd_updated', $pwd_updated);
                    redirect('./Admin/Admin_Login/login');
                }
                else{
                    $data['update_failed']='<div class="alert alert-warning">there was an issue updating your password/div>';
                    $this->load->view('dash/header');
                    $this->load->view('admin/nav', $data);
                    $this->load->view('admin/sidebar');
                    $this->load->view('admin/settings', $data);
                    $this->load->view('dash/footer', $data);
                }
            }
        }

    }

    // Edit Event 
    public function edit_event($id){
        $this->load->helper(array('url', 'form'));
        $this->load->library('form_validation');
        $this->load->model('Admin_Model');
        $this->form_validation->set_rules('event_title', 'Event Title', 'required', array('required'=>'The event\'s title is required'));
        $this->form_validation->set_rules('event_location', 'Event Location', 'required', array('required'=>'The event\'s location is required'));
        $this->form_validation->set_rules('event_date', 'Event Date', 'required', array('required'=>'The event\'s date is required'));
        //$this->form_validation->set_rules('event_picture', 'Event Picture', 'required', array('required'=>'Event picture is required'));
        $this->form_validation->set_rules('event_time', 'Event Time', 'required', array('required'=>'The event\'s time is required'));
        $this->form_validation->set_rules('event_description', 'Event Description', 'required', array('required'=>'The event\'s description is required'));
        if($this->form_validation->run()==FALSE){
            $errors = validation_errors();
            $this->session->set_flashdata('errors', $errors);
            redirect('../index.php/Admin/Dash/event_details/'.$id.'');
        }
        else{
            $config['upload_path']          = './events/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 32000;
            $config['max_width']            = 3000;
            $config['max_height']           = 3000;
            $config['remove_spaces']=true;
            $config['detect_mime']=true;
            $config['mod_mime_fix']=true;
            $config['file_name']=$_FILES['event_picture']['name'];
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('event_picture')){
                $pic_upload_err = $this->upload->display_errors();
                $this->session->set_flashdata('pic_upload_err',$pic_upload_err);
                redirect('../index.php/Admin/Dash/event_details/'.$id.'');                
                
            }
            else{
                $upload_event = $this->upload->data();
                $event_picture = '/events/'.$upload_event['file_name'].'';
                // Upload event details 
                $edit_event = $this->Admin_Model->edit_event($id, $this->input->post('event_title'), $this->input->post('event_location'), $this->input->post('event_date'), $this->input->post('event_time'), $event_picture, $this->input->post('event_description'));
                if($edit_event == TRUE){
                    $edit_success = '<div class="alert alert-success">This event was updated <i class="fa fa-check-circle"></i></div>';
                    $this->session->set_flashdata('edit_success', $edit_success);
                    redirect('../index.php/Admin/Dash/event_details/'.$id.'');
                }
                else{
                    $edit_failed = '<div class="alert alert-danger">There was an issue updating this event <i class="fa fa-exclamation-circle"></i></div>';
                    $this->session->set_flashdata('edit_failed', $edit_failed);
                    redirect('../index.php/Admin/Dash/event_details/'.$id.'');
                }
            }
        }
    }

    // load profile view
    public function profile(){
        $this->load->helper(array('url', 'form'));
        $this->load->model('Admin_Model');
        $data['msgs']=$this->Admin_Model->get_msgs(); // pass into navbar 
        $data['grants'] = $this->Admin_Model->get_grants(); // pass into navbar
        $this->load->view('dash/header');
        $this->load->view('admin/nav', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/admin_profile');
        $this->load->view('dash/footer');
    }

    // update profile
    public function update_profile(){
        $this->load->model('Admin_Model');
        $this->load->helper(array('url', 'form'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('twitter', 'Twitter', 'min_length[1]', array('min_length'=>'Not a real link'));
        $this->form_validation->set_rules('facebook', 'Facebook', 'min_length[1]', array('min_length'=>'Not a real link'));
        $this->form_validation->set_rules('linkedin', 'Linkedin', 'min_length[1]', array('min_length'=>'Not a real link'));
        $this->form_validation->set_rules('bio', 'Bio', 'min_length[10]', array('min_length'=>'your bio is not long enough, Dont be afraid to tell us moe about yourself.'));
        if($this->form_validation->run()==FALSE){
            $errs = validation_errors();
            $this->session->set_flashdata('validation_errs', $errs );
            redirect('./Admin/Dash/profile');
        }
        else{
            $update_admin = $this->Admin_Model->update_profile($this->input->post('bio'), $this->input->post('facebook'), $this->input->post('twitter'), $this->input->post('linkedin'), $this->session->email);
            if($update_admin == FALSE){
                $update_admin_err = '<div class="alert alert-danger">unable to update your profile, something went wrong</div>';
                $this->session->set_flashdata('update_err', $update_admin_err);
                redirect('./Admin/Dash/profile');
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
                $update_admin_success = '<div class="alert alert-success">your profile was updated <i class="fa fa-check-circle"></i></div>';
                $this->session->set_flashdata('update_success', $update_admin_success);
                redirect('./Admin/Dash/profile');
            }
        }
    }

    // upload profile picture 
    public function upload_profile_pic(){
        $this->load->model('Admin_Model');
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
            redirect('./Admin/Dash/profile');
        }
        else{
            $uploadData = $this->upload->data();
            $profile_pic =  '/profile_picture/'.$uploadData['file_name'].'';
            $this->Admin_Model->upload_profile_pic($_SESSION['email'], $profile_pic);
            $success_msg ='<div class="alert alert-success">Your Profile Pic was Changed!</div>';
            $this->session->set_flashdata('success_msg', $success_msg);
            $data = array('profile_pic'=>$profile_pic);
            if(empty('./profile_picture/'.$_SESSION['profile_pic'].'')){
                $this->session->unset_userdata($data);
                $this->session->set_userdata($data);
                $this->session->set_flashdata('success_msg', $success_msg);
            redirect('./Admin/Dash/profile');
            }
            else{
                unlink('./'.$_SESSION['profile_pic']);
                $this->session->unset_userdata($data);
                $this->session->set_userdata($data);
                $this->session->set_flashdata('success_msg', $success_msg);
                redirect('./Admin/Dash/profile'); 
            }

        }
    }

    public function add_admin(){
        $this->load->helper(array('url', 'form'));
        // add an admin role 
        $this->load->library('form_validation');
        $this->load->model('Admin_Model');
        $data['msgs']=$this->Admin_Model->get_msgs(); // pass into navbar 
        $data['grants'] = $this->Admin_Model->get_grants(); // pass into navbar
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim', array('required'=>'Admin\'s first name is required'));
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim', array('required'=>'Admin\'s last name is required'));
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', array('required'=>'Admin\'s email is required for their login', 'valid_email'=>'the email you entered is not valid'));
        $this->form_validation->set_rules('privilege', 'Privilege', 'required', array('required'=>'You must select a role'));
        $this->form_validation->set_rules('board_position', 'Board_position', 'required', array('required'=>'You must select a role'));
        if($this->form_validation->run()==FALSE){
        $this->load->view('dash/header');
        $this->load->view('admin/nav', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/add_admin');
        $this->load->view('dash/footer');
        }
        else{
            $admin_id = 'admin'.sha1(date('m-d-y').time());
            $password = 'password123'; // temp for now then find a way to generate random pwd 
            $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
            $profile_pic= '/default_pic/avatar-1.png';
            $admin_data = array(
                'admin_id'=>$admin_id,
                'first_name'=>$this->input->post('first_name'),
                'last_name'=>$this->input->post('last_name'),
                'email'=>$this->input->post('email'),
                'pwd'=>$hashed_pass,
                'account_type'=>'admin',
                'privilege'=>$this->input->post('privilege'),
                'profile_pic'=>$profile_pic,
                'board_position'=>$this->input->post('board_position'),
            ); 
            $create_admin = $this->Admin_Model->add_admin($admin_data);
            if($create_admin){
                if($this->__email_admin($this->input->post('first_name'), $this->input->post('email'), $password)){
                    $role_created = '<div class="alert alert-success">an account for '.$this->input->post('first_name').' has been created and an email with instructions has been sent <i class="fa fa-check-circle"></i></div>';
                    $this->session->set_flashdata('role_created', $role_created);
                    redirect('./Admin/Dash/admins');
                }
                else{
                    // if email did not send, display debug errors
                    echo $this->email->print_debugger();
                }
                
            }
            else{
                $data['err']='<div class="alert alert-danger">There was an issue creating the admin account</div>';
                $this->load->view('dash/header');
                $this->load->view('admin/nav', $data);
                $this->load->view('admin/sidebar');
                $this->load->view('admin/add_admin', $data);
                $this->load->view('dash/footer');
            }

        }
    }

    public function del_admin($id){
        $this->load->model('Admin_Model');
        $del_admin = $this->Admin_Model->delete_admin($id);
        if($del_event == TRUE){
            redirect('../index.php/Admin/Dash/admins');
        }
        else{
            $delete_err ='<div class="alert alert-danger">There was an issue with deleting the admin <i class="fa fa-exclamation-circle"></i></div>';
            $this->session->set_flashdata('delete_err', $delete_err);
            redirect('../index.php/Admin/Dash/admins');
        }
    }

    // display all administrators 
    public function admins(){
        $this->load->helper(array('url', 'form'));
        $this->load->model('Admin_Model');
        $data['msgs']=$this->Admin_Model->get_msgs(); // pass into navbar 
        $data['grants'] = $this->Admin_Model->get_grants(); // pass into navbar
        // passing in session email, so it gets all admins that aren\'t current logged in user 
        $data['admins']=$this->Admin_Model->get_admins($this->session->email);
        $data['officers']=$this->Admin_Model->get_officers();
        $data['members']=$this->Admin_Model->get_members(); 
        $this->load->view('dash/header');
        $this->load->view('admin/nav', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/admins', $data);
        $this->load->view('dash/footer');
    }

    // Respond to a message 
    public function reply($id){
        $data['id']=$id;
        $this->load->model('Admin_Model');
        $data = $this->Admin_Model->get_msg($id);
        $name = $data->name;
        $subject = $data->subject;
        $message = $data->msg;
        $email = $data->email;
        $this->load->library('form_validation');
        $this->load->helper(array('url', 'form'));
        $this->form_validation->set_rules('msg', 'Message', 'required|min_length[10]', array('required'=>'you cannot send a blank message', 'min_length'=>'your message must be at least 10 characters long'));
        if($this->form_validation->run()==FALSE){
            $this->load->view('dash/header');
        //   $this->load->view('admin/nav', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/reply', $data);
        $this->load->view('dash/footer');

        }
        else{
        
        if($this-> __reply_to_msg($email, $this->input->post('msg'), $name, $subject) == TRUE){
            $delete_msg = $this->Admin_Model->delete_msg($id);
            if($delete_msg == TRUE){
                $replied='<div class="alert alert-success">'.$name. ' has recieved your message <i class="fa fa-check-circle"></i></div>';
                $this->session->set_flashdata('replied', $replied);
                redirect('./Admin/Dash/admin_dash');
            }
            else{
                $data['delete_err']='<div class="alert alert-danger">there was an issue deleting the message <i class="fa fa-exclamation-circle"></i></div>';
                $this->load->view('dash/header');
                $this->load->view('admin/nav', $data);
                $this->load->view('admin/sidebar');
                $this->load->view('admin/reply', $data);
                $this->load->view('dash/footer');

            }
        }
        else{
            echo $this->email->print_debugger();
        }
        }
    }

    // Events Create and Del Section 
    public function create_event(){
        $this->load->helper(array('url', 'form'));
        $this->load->model('Admin_Model');
        $this->load->library('form_validation');
        $data['msgs']=$this->Admin_Model->get_msgs();
        $data['grants'] = $this->Admin_Model->get_grants(); // pass into navbar
        $this->load->view('dash/header');
        $this->load->view('admin/nav', $data);
        $this->load->view('admin/sidebar');
        $this->form_validation->set_rules('event_date', 'Event Date', 'required', array('required'=>'Event date is required'));
        $this->form_validation->set_rules('event_time', 'Event Time', 'required', array('required'=>'Event time is required'));
        $this->form_validation->set_rules('event_title', 'Event Title', 'required', array('required'=>'Event title is required'));
        $this->form_validation->set_rules('event_description', 'Event Description', 'required', array('required'=>'Event description is required'));
        $this->form_validation->set_rules('event_location', 'Event Location', 'required', array('required'=>'Event location is required'));
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/create_event');
            $this->load->view('dash/footer');
        }
        else{
            // image configurations 
            $config['upload_path']          = './events/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 32000;
            $config['max_width']            = 3000;
            $config['max_height']           = 3000;
            $config['remove_spaces']=true;
            $config['detect_mime']=true;
            $config['mod_mime_fix']=true;
            $config['file_name']=$_FILES['event_picture']['name'];
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('event_picture')){
                $data['file_upload_errors'] = $this->upload->display_errors();
                $this->load->view('admin/create_event', $data);
            }
            else{
                $upload_event = $this->upload->data();
                $event_picture = '/events/'.$upload_event['file_name'].'';
                $event_id = 'event_'.sha1(time().$this->input->post('event_date'));
                $event_data = array(
                    'event_id'=>$event_id,
                    'event_date'=>$this->input->post('event_date'),
                    'event_time'=>$this->input->post('event_time'),
                    'event_title'=>$this->input->post('event_title'),
                    'event_description'=>$this->input->post('event_description'),
                    'event_location'=>$this->input->post('event_location'),
                    'event_picture'=>$event_picture,
                    'admin_id'=>$this->session->admin_id
                );
                $upload_event = $this->Admin_Model->upload_event($event_data);
                if($upload_event == TRUE){
                    //$data['success'] = '<div class="alert alert-success">your event was created <i class="fa fa-check-circle"></i></div>';
                    //$this->load->view('admin/create_event', $data);
                    $success='<div class="alert alert-success">your event was created <i class="fa fa-check-circle"></i></div>';
                    $this->session->set_flashdata('success', $success);
                    redirect('../index.php/Admin/Dash/events');
                }
                else{
                    $data['error']='<div class="alert alert-danger">we encountered an issue trying to create your event, please try again later <i class="fa fa-exclamation-circle"></i></div>';
                    $this->load->view('admin/create_event', $data);
                }
            }
    
            $this->load->view('dash/footer');
        }
    }

    public function events(){
        $this->load->model('Admin_Model');
        $data['grants'] = $this->Admin_Model->get_grants(); // pass into navbar
        $this->load->helper(array('url', 'form'));
        $data['msgs']=$this->Admin_Model->get_msgs();
        $data['events']=$this->Admin_Model->get_events();
        $this->load->view('dash/header');
        $this->load->view('admin/nav', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/events', $data);
        $this->load->view('dash/footer');
    }

    public function event_details($id){
        $this->load->model('Admin_Model');
        $this->load->helper(array('url', 'form'));
        $data['grants'] = $this->Admin_Model->get_grants(); // pass into navbar
        $data['grant_id']=$id;
        $data['students'] =$this->Admin_Model->get_students();
        $data['teachers']=$this->Admin_Model->get_teachers();
        $data['guests']=$this->Admin_Model->get_guests();
        $data['msgs']=$this->Admin_Model->get_msgs();
        $data['event_details']=$this->Admin_Model->get_event($id);
        $this->load->view('dash/header');
        $this->load->view('admin/nav', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/event_details', $data);
        $this->load->view('dash/footer');
    }

    public function del_event($id){
        $this->load->model('Admin_Model');
        $del_event = $this->Admin_Model->delete_event($id);
        $del_event_attendee = $this->Admin_Model->delete_attendee($id);
        if($del_event == TRUE && $del_event_attendee == TRUE){
            redirect('../index.php/Admin/Dash/events');
        }
        else{
            $delete_err ='<div class="alert alert-danger">There was an issue with deleting the admin <i class="fa fa-exclamation-circle"></i></div>';
            $this->session->set_flashdata('delete_err', $delete_err);
            redirect('../index.php/Admin/Dash/events');
        }
    }
    // End Event Section

    public function view_teacher($id){
        $this->load->model('Admin_Model');
        $this->load->helper(array('url', 'form'));
        $data['grants'] = $this->Admin_Model->get_grants(); // pass into navbar
        $data['user_id']=$id;
        $data['msgs']=$this->Admin_Model->get_msgs();
        $data['teacher']=$this->Admin_Model->view_teacher($id);
        $this->load->view('dash/header');
        $this->load->view('admin/nav', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/view_teacher', $data);
        $this->load->view('dash/footer');
    }

    public function view_admin($id){
        $this->load->model('Admin_Model');
        $this->load->helper(array('url', 'form'));
        $data['grants'] = $this->Admin_Model->get_grants(); // pass into navbar
        $data['admin_id']=$id;
        $data['msgs']=$this->Admin_Model->get_msgs();
        $data['admin']=$this->Admin_Model->view_admin($id);
        $this->load->view('dash/header');
        $this->load->view('admin/nav', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/view_admin', $data);
        $this->load->view('dash/footer');
    }

    public function view_student($id){
        $this->load->model('Admin_Model');
        $this->load->helper(array('url', 'form'));
        $data['grants'] = $this->Admin_Model->get_grants(); // pass into navbar
        $data['user_id']=$id;
        $data['msgs']=$this->Admin_Model->get_msgs();
        $data['student']=$this->Admin_Model->view_student($id);
        $this->load->view('dash/header');
        $this->load->view('admin/nav', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/view_student', $data);
        $this->load->view('dash/footer');
    }

    public function view_guest($id){
        $this->load->model('Admin_Model');
        $this->load->helper(array('url', 'form'));
        $data['grants'] = $this->Admin_Model->get_grants(); // pass into navbar
        $data['user_id']=$id;
        $data['msgs']=$this->Admin_Model->get_msgs();
        $data['guest']=$this->Admin_Model->view_guest($id);
        $this->load->view('dash/header');
        $this->load->view('admin/nav', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/view_guest', $data);
        $this->load->view('dash/footer');
    }

    // Recipient Create Section 
    public function create_recipient(){
        $this->load->helper(array('url', 'form'));
        $this->load->model('Admin_Model');
        $this->load->library('form_validation');
        $data['msgs']=$this->Admin_Model->get_msgs();
        $data['grants'] = $this->Admin_Model->get_grants(); // pass into navbar
        $this->load->view('dash/header');
        $this->load->view('admin/nav', $data);
        $this->load->view('admin/sidebar');
        $this->form_validation->set_rules('recipients_school', 'Recipients School', 'required', array('required'=>'Recipients School is required'));
        $this->form_validation->set_rules('recipients_title', 'Recipients Title', 'required', array('required'=>'Recipients Title is required'));
        $this->form_validation->set_rules('recipients_year', 'Recipients Year', 'required', array('required'=>'Recipients Year is required'));
        $this->form_validation->set_rules('recipients_first_name', 'Recipients First Name', 'required', array('required'=>'Recipients First Name is required'));
        $this->form_validation->set_rules('recipients_last_name', 'Recipients Last Name', 'required', array('required'=>'Recipients Last Name is required'));
        $this->form_validation->set_rules('recipients_description', 'Recipients Description', 'required', array('required'=>'Recipients Description is required'));
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/addRecipient');
            $this->load->view('dash/footer');
        }
        else{
            // image configurations 
            $config['upload_path']          = './events/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 32000;
            $config['max_width']            = 3000;
            $config['max_height']           = 3000;
            $config['remove_spaces']=true;
            $config['detect_mime']=true;
            $config['mod_mime_fix']=true;
            $config['file_name']=$_FILES['recipients_picture']['name'];
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('recipients_picture')){
                $data['file_upload_errors'] = $this->upload->display_errors();
                $this->load->view('admin/addRecipient', $data);
            }
            else{
                $upload_recipient = $this->upload->data();
                $recipients_picture = '/events/'.$upload_recipient['file_name'].'';
                $recipients_id = 'recipient_'.sha1(time().$this->input->post('recipients_year'));
                $recipient_data = array(
                    'recipients_id'=>$recipients_id,
                    'recipients_title'=>$this->input->post('recipients_title'),
                    'recipients_year'=>$this->input->post('recipients_year'),
                    'recipients_first_name'=>$this->input->post('recipients_first_name'),
                    'recipients_last_name'=>$this->input->post('recipients_last_name'),
                    'recipients_school'=>$this->input->post('recipients_school'),
                    'recipients_description'=>$this->input->post('recipients_description'),
                    'recipients_picture'=>$recipients_picture,
                    'admin_id'=>$this->session->admin_id
                );
                $upload_recipient = $this->Admin_Model->upload_recipient($recipient_data);
                if($upload_recipient == TRUE){
                    //$data['success'] = '<div class="alert alert-success">your event was created <i class="fa fa-check-circle"></i></div>';
                    //$this->load->view('admin/create_event', $data);
                    $success='<div class="alert alert-success">your Grant Recipient was created <i class="fa fa-check-circle"></i></div>';
                    $this->session->set_flashdata('success', $success);
                    redirect('../index.php/Admin/Dash/create_recipient');
                }
                else{
                    $data['error']='<div class="alert alert-danger">we encountered an issue trying to create your grants recipients, please try again later <i class="fa fa-exclamation-circle"></i></div>';
                    $this->load->view('admin/addRecipients', $data);
                }
            }
    
            $this->load->view('dash/footer');
        }
    }

    // Recipient Create Section 
    public function create_award_recipient(){
        $this->load->helper(array('url', 'form'));
        $this->load->model('Admin_Model');
        $this->load->library('form_validation');
        $data['msgs']=$this->Admin_Model->get_msgs();
        $data['grants'] = $this->Admin_Model->get_grants(); // pass into navbar
        $this->load->view('dash/header');
        $this->load->view('admin/nav', $data);
        $this->load->view('admin/sidebar');
        $this->form_validation->set_rules('recipients_school', 'Recipients School', 'required', array('required'=>'Recipients School is required'));
        $this->form_validation->set_rules('recipients_title', 'Recipients Title', 'required', array('required'=>'Recipients Title is required'));
        $this->form_validation->set_rules('recipients_year', 'Recipients Year', 'required', array('required'=>'Recipients Year is required'));
        $this->form_validation->set_rules('recipients_first_name', 'Recipients First Name', 'required', array('required'=>'Recipients First Name is required'));
        $this->form_validation->set_rules('recipients_last_name', 'Recipients Last Name', 'required', array('required'=>'Recipients Last Name is required'));
        $this->form_validation->set_rules('recipients_description', 'Recipients Description', 'required', array('required'=>'Recipients Description is required'));
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/create_past_award_recipient');
            $this->load->view('dash/footer');
        }
        else{
            // image configurations 
            $config['upload_path']          = './events/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 32000;
            $config['max_width']            = 3000;
            $config['max_height']           = 3000;
            $config['remove_spaces']=true;
            $config['detect_mime']=true;
            $config['mod_mime_fix']=true;
            $config['file_name']=$_FILES['recipients_picture']['name'];
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('recipients_picture')){
                $data['file_upload_errors'] = $this->upload->display_errors();
                $this->load->view('admin/create_past_award_recipient', $data);
            }
            else{
                $upload_recipient = $this->upload->data();
                $recipients_picture = '/events/'.$upload_recipient['file_name'].'';
                $recipients_id = 'recipient_'.sha1(time().$this->input->post('recipients_year'));
                $recipient_data = array(
                    'recipients_id'=>$recipients_id,
                    'recipients_title'=>$this->input->post('recipients_title'),
                    'recipients_year'=>$this->input->post('recipients_year'),
                    'recipients_first_name'=>$this->input->post('recipients_first_name'),
                    'recipients_last_name'=>$this->input->post('recipients_last_name'),
                    'recipients_school'=>$this->input->post('recipients_school'),
                    'recipients_description'=>$this->input->post('recipients_description'),
                    'recipients_picture'=>$recipients_picture,
                    'admin_id'=>$this->session->admin_id
                );
                $upload_recipient = $this->Admin_Model->upload_award_recipient($recipient_data);
                if($upload_recipient == TRUE){
                    //$data['success'] = '<div class="alert alert-success">your event was created <i class="fa fa-check-circle"></i></div>';
                    //$this->load->view('admin/create_event', $data);
                    $success='<div class="alert alert-success">your award Recipient was created <i class="fa fa-check-circle"></i></div>';
                    $this->session->set_flashdata('success', $success);
                    redirect('../index.php/Admin/Dash/create_award_recipient');
                }
                else{
                    $data['error']='<div class="alert alert-danger">we encountered an issue trying to create your award recipients, please try again later <i class="fa fa-exclamation-circle"></i></div>';
                    $this->load->view('admin/create_past_award_recipient', $data);
                }
            }
    
            $this->load->view('dash/footer');
        }
    }

    // Grant Section view and details function 
    public function view_grants(){
        $this->load->model('Admin_Model');
        $data['events']=$this->Admin_Model->get_events();
        $data['grants'] = $this->Admin_Model->get_grants(); // pass into navbar
        $this->load->helper(array('url', 'form'));
        $data['msgs']=$this->Admin_Model->get_msgs();
        $data['grants']=$this->Admin_Model->get_grants();
        $this->load->view('dash/header');
        $this->load->view('admin/nav', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/view_grants', $data);
        $this->load->view('dash/footer');
    }

    public function rubric(){
        $this->load->model('Admin_Model');
        $data['msgs']=$this->Admin_Model->get_msgs();
        $data['grants']=$this->Admin_Model->get_grants(); // pass into navbar
        $this->load->helper(array('url', 'form'));
        $this->load->view('dash/header');
        $this->load->view('admin/nav', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/rubric');
        $this->load->view('dash/footer');
    }

    public function reports(){
        $this->load->model('Admin_Model');
        $data['msgs']=$this->Admin_Model->get_msgs();
        $data['grants']=$this->Admin_Model->get_grants(); // pass into navbar
        $data['students'] =$this->Admin_Model->get_students();
        $data['teachers']=$this->Admin_Model->get_teachers();
        $data['guests']=$this->Admin_Model->get_guests();
        $data['attendees']=$this->Admin_Model->get_attendees();
        $data['admins'] =$this->Admin_Model->get_all_admins();
        $data['events']=$this->Admin_Model->get_events();
        $data['grantRec']=$this->Admin_Model->get_recipients();
        $data['awardRec']=$this->Admin_Model->get_award_recipients();
        $this->load->helper(array('url', 'form'));
        $this->load->view('dash/header');
        $this->load->view('admin/nav', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/reports', $data);
        $this->load->view('dash/footer');
    }


    public function assigned_grants(){
        $this->load->model('Admin_Model');
        $data['msgs']=$this->Admin_Model->get_msgs();
        $data['grants']=$this->Admin_Model->get_grants(); // pass into navbar
        $this->load->helper(array('url', 'form'));
        $data['assigned_grants'] = $this->Admin_Model->get_assigned_grants($this->session->email);
        $this->load->view('dash/header');
        $this->load->view('admin/nav', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/view_assigned_grants', $data);
        $this->load->view('dash/footer');
    }
    // view grants 

    public function assign_reviewer($id){
        $this->load->model('Admin_Model');
        $this->load->helper(array('url', 'form'));
        $this->load->library('form_validation');
        $data['grants'] = $this->Admin_Model->get_grants(); // pass into navbar
        $data['grant_id']=$id;
        $data['admins'] =$this->Admin_Model->get_all_admins();
        $data['teachers']=$this->Admin_Model->get_teachers();
        $data['msgs']=$this->Admin_Model->get_msgs();
        $this->form_validation->set_rules('reviewer_email', 'Reviewer Email', 'required|trim', array('required'=>'Select a Reviewer Email'));
        $this->form_validation->set_rules('reviewer_email_content', 'Reviewer Email Content', 'required|trim', array('required'=>'Enter some intructions for the Reiveiwer'));
        if($this->form_validation->run()==FALSE){
        $this->load->view('dash/header');
        $this->load->view('admin/nav', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/assign_reviewer', $data);
        $this->load->view('dash/footer');
        }
        else{
            $link = base_url().'index.php/Admin/Dash/grant_details/'.$id.'';
            $reviewer = $this->input->post('reviewer_email');
            $subject = 'Hey, '.$this->session->first_name.' you have been assigned a grant to review';
            $body = $this->input->post('reviewer_email_content');
            if($this->__send_reviewer_email($reviewer, $subject, $body, $link)==TRUE){
            $this->Admin_Model->assign_grant_reviewer($reviewer, $id);
            $data['email_sent']='<div class="alert alert-success">An email has been sent to '.$reviewer.' </div>'; 
            $this->load->view('dash/header');
            $this->load->view('admin/nav', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/assign_reviewer', $data);
            $this->load->view('dash/footer');
            }
            else{
                $data['email_not_sent']='<div class="alert alert-danger">Email could not be sent to '.$reviewer.', an internal error occurred </div>';
                $this->load->view('dash/header');
                $this->load->view('admin/nav', $data);
                $this->load->view('admin/sidebar');
                $this->load->view('admin/assign_reviewer', $data);
                $this->load->view('dash/footer');
            }
        }
    }

    // Grant Recipient Section view details function 
    public function view_recipient(){
        $this->load->model('Admin_Model');
        $data['grants'] = $this->Admin_Model->get_grants(); // pass into navbar
        $this->load->helper(array('url', 'form'));
        $data['msgs']=$this->Admin_Model->get_msgs();
        $data['grantRec']=$this->Admin_Model->get_recipients();
        $this->load->view('dash/header');
        $this->load->view('admin/nav', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/view_past_recipients', $data);
        $this->load->view('dash/footer');
    }

    public function view_award_recipient(){
        $this->load->model('Admin_Model');
        $data['grants'] = $this->Admin_Model->get_grants(); // pass into navbar
        $this->load->helper(array('url', 'form'));
        $data['msgs']=$this->Admin_Model->get_msgs();
        $data['awardRec']=$this->Admin_Model->get_award_recipients();
        $this->load->view('dash/header');
        $this->load->view('admin/nav', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/view_past_award_recipients', $data);
        $this->load->view('dash/footer');
    }

    public function del_recipient($id){
        $this->load->model('Admin_Model');
        $del_recipient = $this->Admin_Model->delete_recipient($id);
        if($del_recipient == TRUE){
            redirect('../index.php/Admin/Dash/view_recipient');
        }
        else{
            $delete_err ='<div class="alert alert-danger">There was an issue with deleting your recipient <i class="fa fa-exclamation-circle"></i></div>';
            $this->session->set_flashdata('delete_err', $delete_err);
            redirect('../index.php/Admin/Dash/view_recipient');
        }
    }

    public function del_award_recipient($id){
        $this->load->model('Admin_Model');
        $del_recipient = $this->Admin_Model->delete_award_recipient($id);
        if($del_recipient == TRUE){
            redirect('../index.php/Admin/Dash/view_award_recipient');
        }
        else{
            $delete_err ='<div class="alert alert-danger">There was an issue with deleting your recipient <i class="fa fa-exclamation-circle"></i></div>';
            $this->session->set_flashdata('delete_err', $delete_err);
            redirect('../index.php/Admin/Dash/view_award_recipient');
        }
    }
    
    public function grant_details($id){
        $this->load->model('Admin_Model');
        $this->load->helper(array('url', 'form'));
        $this->load->library('form_validation');
        $data['grants'] = $this->Admin_Model->get_grants(); // pass into navbar
        $data['grant_id']=$id;
        $data['students'] =$this->Admin_Model->get_students();
        $data['teachers']=$this->Admin_Model->get_teachers();
        $data['msgs']=$this->Admin_Model->get_msgs();
        $data['grant_details']=$this->Admin_Model->get_grant($id);
        $this->form_validation->set_rules('admin_proposal_comments', 'Admin Proposal Comments', 'required|trim', array('required'=>'your comments to the grant proposal are required'));
        $this->form_validation->set_rules('admin_impact_comments', 'Admin Impact Comments', 'required|trim', array('required'=>'your coments to the grant impact are required'));
        $this->form_validation->set_rules('admin_budget_comments', 'Admin Budget Comments', 'required|trim', array('required'=>'your comments to the budget are required'));
        $this->form_validation->set_rules('admin_extra_info_comments', 'Admin Extra Info Comments', 'required|trim', array('required'=>'your comments are required here, otherwise say N/A'));
        // Score Requirements 
        $grant_score = $this->input->post('grant_score');
        $impact_score = $this->input->post('impact_score');
        $budget_score = $this->input->post('budget_score');
        $info_score = $this->input->post('info_score');
        $overall_score = $grant_score + $impact_score + $budget_score + $info_score;
        if($this->form_validation->run()==FALSE){
            $this->load->view('dash/header');
            $this->load->view('admin/nav', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/grant_details', $data);
            $this->load->view('dash/footer');
        }
        else{
        
        
        // insert any comments
        $comment = $this->Admin_Model->comment($id, $this->input->post('admin_proposal_comments'), $this->input->post('admin_impact_comments'), $this->input->post('admin_budget_comments'), $this->input->post('admin_extra_info_comments'), $overall_score);
        if($comment == TRUE){
            $data['comment_success']='<div class="alert alert-success mt-5 col-4 ml-5">your comments were sent to the grant applicant</div>';
            $this->load->view('dash/header');
            $this->load->view('admin/nav', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/grant_details', $data);
            $this->load->view('dash/footer');
        }
        else{
            $data['comment_failed']='<div class="alert alert-danger mt-5 col-4 ml-5">An error occurred and we were unable to send your comments to the grant applicant</div>';
            $this->load->view('dash/header');
            $this->load->view('admin/nav', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/grant_details', $data);
            $this->load->view('dash/footer');
        }
    
        }
    }

    // approve grant 
    public function approve_grant($id){
        $this->load->model('Admin_Model');
        $approve_grant = $this->Admin_Model->approve_grant($id);
        if($approve_grant){
            $approved = '<div class="alert alert-success">this grant has been approved, the teacher that created this grant will be notified of this change </div>';
            $this->session->set_flashdata('approved', $approved);

            redirect('Admin/Dash/grant_details/'.$id.'');
        }
        else{
        
            $approve_error = '<div class="alert alert-warning">There was an error with trying to approve this grant. Please try again later </div>';
            $this->session->set_flashdata('approve_error', $approve_error);
            redirect('Admin/Dash/grant_details/'.$id.'');
        }
    }

    public function deny_grant($id){
        $this->load->model('Admin_Model');
        $deny_grant = $this->Admin_Model->deny_grant($id);
        if($deny_grant){
            
            $denied = '<div class="alert alert-success">this grant has been denied, the teacher that created this grant will be notified of this change </div>';
            $this->session->set_flashdata('denied', $denied);
            redirect('Admin/Dash/grant_details/'.$id.'');
        }
        else{

            $deny_error = '<div class="alert alert-warning">There was an error with trying to deny this grant. Please try again later </div>';
            $this->session->set_flashdata('deny_error', $deny_error);
            redirect('Admin/Dash/grant_details/'.$id.'');
        }
    }

    // End  Section

    // logout
    public function logout(){
        if(session_destroy()){
           redirect(base_url().'index.php/Admin/Admin_Login/login');
        }
    }

    //admin reply message to user 
    private function __reply_to_msg($email, $msg, $name, $subject){
        $this->load->library('email');
        $config['useragent']='CodeIgniter';
        $config['protocol']='smtp';
        $config['smtp_host']='smtp.gmail.com';
        $config['smtp_user']='hefcsc400@gmail.com';
        $config['smtp_pass']=''; // not showing pwd 
        $config['smtp_port']='465';
        $config['newline']="\r\n";
        $config['smtp_timeout']='5';
        $config['smtp_crypto']='ssl';
        $config['wordwrap']=TRUE;
        $config['mailtype']='html';
        $config['charset']='iso-8859-1';
        $link = base_url().'index.php/Home/new_home';
        $this->email->initialize($config);
        $this->email->from('hefcsc400@gmail.com');
        $this->email->to($email);
        $this->email->subject('Hey '.$name.', you have an email from HEF staff');
        $this->email->message(
            '
                <h1>Thank you for contacting us about '.$subject.'!</h1>
                <p>
                    <h4>Our Response to your message is:</h4>
                    '.$msg.'
                    <br>
                    <br>
                    If You are a Hamden Educational Teacher or A Student in Hamden Education in Connecticut Visit our site <a href="'.$link.'">Click Here</a>
                </p>
            '
        );
        if(!$this->email->send()){
            return FALSE;
            return $this->email->print_debugger();
        }
        else{
            return TRUE;
        }
    }

   

    // send email to newly created admin account
    private function __email_admin($fname, $email, $pwd){
        $this->load->library('email');
        $config['useragent']='CodeIgniter';
        $config['protocol']='smtp';
        $config['smtp_host']='smtp.gmail.com';
        $config['smtp_user']='hefcsc400@gmail.com';
        $config['smtp_pass']=''; // removing pwd 
        $config['smtp_port']='465';
        $config['newline']="\r\n";
        $config['smtp_timeout']='5';
        $config['smtp_crypto']='ssl';
        $config['wordwrap']=TRUE;
        $config['mailtype']='html';
        $config['charset']='iso-8859-1';
        $this->email->initialize($config);
        $this->email->from('hefcsc400@gmail.com');
        $this->email->to($email);
        $this->email->subject('Hamden Education Foundation Account Creation');
        $this->email->message(
            '
                <h4>Hello, '.$fname.' Great News!</h4>
                <p>
                    We would like to say welcome to the Hamden Education Foundation Team!
                    <br>
                    <br>
                    Your default password is: <b>'.$pwd.'</b> 
                    <br>
                    <br>
                    Please change this immediately to a more secure password. 
                    <br>
                    <br>
                    Instructions: 
                    <ol>
                        <li>Log into you account</li>
                        <li>Click the drop down menu by your name on the top right</li>
                        <li>Click settings</li>
                        <li>Enter a new password!</li>
                    </ol>
                    <br>
                    Clock <a href="'.base_url().'index.php/Admin/Admin_Login/login">here</a> to login to your new account!
                </p>
            '
        );
        if(!$this->email->send()){
            return FALSE;
            return $this->email->print_debugger();
        }
        else{
            return TRUE;
        }
    }

    public function __email_all_students($subject, $msg){
        $this->load->model('admin_model');
        $all_emails = $this->admin_model->get_all_students();
        $emails = array(
            'email'=>$all_emails->email
        );
        $this->load->library('email');
        $config['useragent']='CodeIgniter';
        $config['protocol']='smtp';
        $config['smtp_host']='smtp.gmail.com';
        $config['smtp_user']='hefcsc400@gmail.com';
        $config['smtp_pass']=''; //not showing pwd 
        $config['smtp_port']='465';
        $config['newline']="\r\n";
        $config['smtp_timeout']='5';
        $config['smtp_crypto']='ssl';
        $config['wordwrap']=TRUE;
        $config['mailtype']='html';
        $config['charset']='iso-8859-1';
        $link=''.base_url().'index.php/Home/contact';
        $this->email->initialize($config);
        $this->email->from('hefcsc400@gmail.com');
        $this->email->to($emails);
        $this->email->subject($subject);
        $this->email->message(
            '
                <h4>Attention Below is a Mass Email Sent By Hamden Education Foundation</h4>
                '.$msg.'
                <br>
                <br>
                <p>Click here to log in <a href="'.base_url().'index.php/Home/choose_login">Log in</a></p>
                <p>If this was sen to you by accident, Please contact us <a href='.$link.'>Click Here</p>
            '
        );
        if(!$this->email->send()){
            return FALSE;
            return $this->email->print_debugger();
        }
        else{
            return TRUE;
        }
    }

    public function __email_all_teachers($subject, $msg){
        $this->load->model('admin_model');
        $all_emails = $this->admin_model->get_all_teachers();
        $emails = array(
            'email'=>$all_emails->email
        );
        $this->load->library('email');
        $config['useragent']='CodeIgniter';
        $config['protocol']='smtp';
        $config['smtp_host']='smtp.gmail.com';
        $config['smtp_user']='hefcsc400@gmail.com';
        $config['smtp_pass']=''; //not showing pwd 
        $config['smtp_port']='465';
        $config['newline']="\r\n";
        $config['smtp_timeout']='5';
        $config['smtp_crypto']='ssl';
        $config['wordwrap']=TRUE;
        $config['mailtype']='html';
        $config['charset']='iso-8859-1';
        $link = base_url().'index.php/Home/contact';

        $this->email->initialize($config);
        $this->email->from('hefcsc400@gmail.com');
        $this->email->to($emails);
        $this->email->subject($subject);
        $this->email->message(
            '
                <h1>Attention Below is a Mass Email Sent By Hamden Education Foundation</h1>
                '.$msg.'
                <br>
                <br>
                <p>Click here to log in <a href="'.base_url().'index.php/Home/choose_login">Log in</a></p>
                <p>If this was sen to you by accident, Please contact us <a href='.$link.'>Click Here</p>
            '
        );
        if(!$this->email->send()){
            return FALSE;
            return $this->email->print_debugger();
        }
        else{
            return TRUE;
        }
    }

    public function __email_all_guests($subject, $msg){
        $this->load->model('admin_model');
        $all_emails = $this->admin_model->get_all_guests();
        $emails = array(
            'email'=>$all_emails->email
        );
        $this->load->library('email');
        $config['useragent']='CodeIgniter';
        $config['protocol']='smtp';
        $config['smtp_host']='smtp.gmail.com';
        $config['smtp_user']='hefcsc400@gmail.com';
        $config['smtp_pass']=''; // not showing pwd 
        $config['smtp_port']='465';
        $config['newline']="\r\n";
        $config['smtp_timeout']='5';
        $config['smtp_crypto']='ssl';
        $config['wordwrap']=TRUE;
        $config['mailtype']='html';
        $config['charset']='iso-8859-1';
        $link = base_url().'index.php/Home/contact';
        $this->email->initialize($config);
        $this->email->from('hefcsc400@gmail.com');
        $this->email->to($emails);
        $this->email->subject($subject);
        $this->email->message(
            '
                <h1>Attention Below is a Mass Email Sent By Hamden Education Foundation</h1>
                '.$msg.'
                <br>
                <br>
                <p>Click here to log in <a href="'.base_url().'index.php/Home/choose_login">Log in</a></p>
                <p>If this was sen to you by accident, Please contact us <a href='.$link.'>Click Here</p>
            '
        );
        if(!$this->email->send()){
            return FALSE;
            return $this->email->print_debugger();
        }
        else{
            return TRUE;
        }
    }

    public function __email_all_admins($subject, $msg){
        $this->load->model('admin_model');
        $all_emails = $this->admin_model->get_all_board();
        $emails = array(
            'email'=>$all_emails->email
        );
        $this->load->library('email');
        $config['useragent']='CodeIgniter';
        $config['protocol']='smtp';
        $config['smtp_host']='smtp.gmail.com';
        $config['smtp_user']='hefcsc400@gmail.com';
        $config['smtp_pass']=''; // not showing pwd  
        $config['smtp_port']='465';
        $config['newline']="\r\n";
        $config['smtp_timeout']='5';
        $config['smtp_crypto']='ssl';
        $config['wordwrap']=TRUE;
        $config['mailtype']='html';
        $config['charset']='iso-8859-1';
        $link = base_url().'index.php/Home/contact';
        $this->email->initialize($config);
        $this->email->from('hefcsc400@gmail.com');
        $this->email->to($emails);
        $this->email->subject($subject);
        $this->email->message(
            '
                <h1>Attention Below is a Mass Email Sent By Hamden Education Foundation</h1>
                '.$msg.'
                <br>
                <br>
                <p>Click here to log in <a href="'.base_url().'index.php/Admin/Admin_login/login">Log in</a></p>
                <p>If this was sen to you by accident, Please contact us <a href='.$link.'>Click Here</p>
            '
        );
        if(!$this->email->send()){
            return FALSE;
            return $this->email->print_debugger();
        }
        else{
            return TRUE;
        }
    }

    public function __send_reviewer_email($reviewer, $subject, $body){
        $this->load->library('email');
        $config['useragent']='CodeIgniter';
        $config['protocol']='smtp';
        $config['smtp_host']='smtp.gmail.com';
        $config['smtp_user']='hefcsc400@gmail.com';
        $config['smtp_pass']=''; // not showing pwd 
        $config['smtp_port']='465';
        $config['newline']="\r\n";
        $config['smtp_timeout']='5';
        $config['smtp_crypto']='ssl';
        $config['wordwrap']=TRUE;
        $config['mailtype']='html';
        $config['charset']='iso-8859-1';
        $this->email->initialize($config);
        $this->email->from('hefcsc400@gmail.com');
        $this->email->to($reviewer);
        $this->email->subject($subject);
        $this->email->message(
            '
            <h1 style="text-align: center;">Hello '.$reviewer.' you have been selected to review a Grant by the HEF administration</h1>
            <h5 style="text-align: center;">Message from the HEF Administration:</h5>
            <p>'.$body.'</p>
            <br>
            <br>
            <p>Please Click here to sign into your account to review thew grant: <a href="'.base_url().'index.php/Admin/Admin_Login/login">Click Here</p>
            <p>If this email was sent to the wrong person, please contact us! <a href="'.base_url().'index.php/Home/contact">Click Here</a></p>
            '
        );
        if(!$this->email->send()){
            return FALSE;
            return $this->email->print_debugger();
        }
        else{
            return TRUE;
        }
    }
}
?>
