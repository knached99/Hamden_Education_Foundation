<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

Class Login extends CI_Controller{

// student login
public function student_login(){
    $this->load->library('form_validation');
    $this->load->helper(array('url', 'form'));
    $this->load->model('HamdenEdModel');
    $this->load->library('session');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('pwd', 'Password', 'required|trim');
    if($this->form_validation->run()==FALSE){
        $this->load->view('student_login');
    }
    else{
        // check if the student exists 
        $student_exists = $this->HamdenEdModel->student_exists($this->input->post('email'));
        $student_verified = $this->HamdenEdModel->is_student_verified($this->input->post('email'));
        if($student_exists == FALSE){
            $data['no_student']="<div class='alert alert-warning'>
             An account with the email you entered does not exist.
          </div>";
            $this->load->view('student_login', $data);
        }
        else if($student_exists == TRUE && $student_verified == FALSE){
            $not_verified = '<div class="alet alert-danger">your account has not yet been verified, please verify your account before continuing </div>';
            $this->session->set_flashdata('student_not_verified', $not_verified);
            redirect('../index.php/Register/verify_student/'.$this->input->post('email').'');
        }
        
        else{
            $email = $this->input->post('email');
            $password = $this->input->post('pwd');
            $verify = $this->HamdenEdModel->authenticate_student($email, $password);
            if($verify == FALSE){
                $data['wrong_pwd']="<div class='alert alert-danger'>
                The email or password you entered is incorrect</div>";
             $this->load->view('student_login', $data);
            }
            else{
                $user_data = array(
                    'user_id'=>$verify->user_id,
                    'first_name'=>$verify->first_name,
                    'last_name'=>$verify->last_name,
                    'school_name'=>$verify->school_name,
                    'school_type'=>$verify->school_type,
                    'email'=>$verify->email,
                    'bio'=>$verify->bio,
                    'profile_pic'=>$verify->profile_pic,
                    'event_joined'=>$verify->event_joined,
                    'account_type'=>$verify->account_type,
                    'verified'=>$verify->verified
                );
                $this->session->set_userdata($user_data);
                redirect('../index.php/Dash/user_dash');
            }
        }
    }
}

// guest login
public function guest_login(){
    $this->load->library('form_validation');
    $this->load->helper(array('url', 'form'));
    $this->load->model('HamdenEdModel');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('pwd', 'Password', 'required|trim');
    if($this->form_validation->run()==FALSE){
        $this->load->view('guest_login');
    }
    else{
        $guest_exists = $this->HamdenEdModel->guest_exists($this->input->post('email'));
        $guest_veried = $this->HamdenEdModel->is_guest_verified($this->input->post('email'));
        if($guest_exists == FALSE){
            $data['no_guest']='<div class="alert alert-warning">
                A Guest Account with the email you entered does not exist.
            </div>';
            $this->load->view('guest_login', $data);
        }
        else if($guest_exists == TRUE && $guest_veried == FALSE){
            $not_verified = '<div class="alet alert-danger">your account has not yet been verified, please verify your account before continuing </div>';
            $this->session->set_flashdata('guest_not_verified', $not_verified);
            redirect('../index.php/Register/verify_guest/'.$this->input->post('email').'');
        }
        else{
            $email = $this->input->post('email');
            $password = $this->input->post('pwd');
            $verify = $this->HamdenEdModel->authenticate_guest($email, $password);
            if($verify == FALSE){
                $data['wrong_pwd']="<div class='alert alert-danger'>
                The email or password you entered is incorrect</div>";
             $this->load->view('guest_login', $data);
            }
            else{
                $user_data = array(
                    'user_id'=>$verify->user_id,
                    'first_name'=>$verify->first_name,
                    'last_name'=>$verify->last_name,
                    'school_name'=>$verify->school_name,
                    'email'=>$verify->email,
                    'bio'=>$verify->bio,
                    'profile_pic'=>$verify->profile_pic,
                    'event_joined'=>$verify->event_joined,
                    'account_type'=>$verify->account_type,
                    'verified'=>$verify->verified
                );
                $this->session->set_userdata($user_data);
                redirect('../index.php/Dash/user_dash');
            }
        }
    }
}

// teacher login 
public function teacher_login(){
    $this->load->library('form_validation');
    $this->load->helper(array('url', 'form'));
    $this->load->model('HamdenEdModel');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('pwd', 'Password', 'required|trim');
    if($this->form_validation->run()==FALSE){
        $this->load->view('teacher_login');
    }
    else{
        $teacher_exists = $this->HamdenEdModel->teacher_exists($this->input->post('email'));
        $teacher_veried = $this->HamdenEdModel->is_teacher_verified($this->input->post('email'));
        if($teacher_exists == FALSE){
            $data['no_teacher']='<div class="alert alert-warning">
                A teacher account with the email you entered does not exist.
            </div>';
            $this->load->view('teacher_login', $data);
        }
        else if($teacher_exists == TRUE && $teacher_veried == FALSE){
            $not_verified = '<div class="alet alert-danger">your account has not yet been verified, please verify your account before continuing </div>';
            $this->session->set_flashdata('teacher_not_verified', $not_verified);
            redirect('../index.php/Register/verify_teacher/'.$this->input->post('email').'');
        }
        else{
            $email = $this->input->post('email');
            $password = $this->input->post('pwd');
            $verify = $this->HamdenEdModel->authenticate_teacher($email, $password);
            if($verify == FALSE){
                $data['wrong_pwd']="<div class='alert alert-danger'>
                The email or password you entered is incorrect</div>";
             $this->load->view('teacher_login', $data);
            }
            else{
                $user_data = array(
                    'user_id'=>$verify->user_id,
                    'first_name'=>$verify->first_name,
                    'last_name'=>$verify->last_name,
                    'school_name'=>$verify->school_name,
                    'school_type'=>$verify->school_type,
                    'email'=>$verify->email,
                    'bio'=>$verify->bio,
                    'profile_pic'=>$verify->profile_pic,
                    'event_joined'=>$verify->event_joined,
                    'account_type'=>$verify->account_type,
                    'verified'=>$verify->verified
                    
                );
                $this->session->set_userdata($user_data);
                redirect('../index.php/Dash/user_dash');
            }
        }
    }
}

// Loads password reset page (for students)
public function reset_pwd(){
    $this->load->library('form_validation');
    $this->load->helper('url');
    $this->load->model('HamdenEdModel');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array('required'=>'Your email is required', 'valid_email'=>'you must provide a valid email'));
    if($this->form_validation->run()==FALSE){
    $this->load->view('forgot_pwd');
    }
    else{
        // check if user exists 
        if($this->HamdenEdModel->student_exists($this->input->post('email'))==FALSE){
            $data['no_user']='<div class="alert alert-danger">There is no account associated with that email</div>';
            $this->load->view('forgot_pwd', $data);
        }
        else{
        $code = mt_rand(111111, 999999);
        $email =$this->input->post('email');
        $send_code = $this->HamdenEdModel->send_reset_code($email, $code);
        if($send_code == TRUE){
            if($this->__send_reset_request($email, $code)==TRUE){
                $emailSent = '<div class="alert alert-success">We sent you a password reset request email to '.$email.'</div>';
                $this->session->set_flashdata('email_sent', $emailSent);
                redirect('./Login/auth/'.$email.'');
            }
            else{
                echo $this->email->print_debugger();
            }
        }
        else{
            $data['sql_err']='<div class="alert alert-danger">An SQL error has been encountered</div>';
            $this->load->view('forgot_pwd', $data);
        }
    }
    }
    
}

// Loads password reset page (for guests)
public function reset_guests_pwd(){
    $this->load->library('form_validation');
    $this->load->helper('url');
    $this->load->model('HamdenEdModel');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array('required'=>'Your email is required', 'valid_email'=>'you must provide a valid email'));
    if($this->form_validation->run()==FALSE){
    $this->load->view('forgot_pwd');
    }
    else{
        // check if user exists 
        if($this->HamdenEdModel->guest_exists($this->input->post('email'))==FALSE){
            $data['no_user']='<div class="alert alert-danger">There is no account associated with that email</div>';
            $this->load->view('forgot_pwd', $data);
        }
        else{
        $code = mt_rand(111111, 999999);
        $email =$this->input->post('email');
        $send_code = $this->HamdenEdModel->send_guest_code($email, $code);
        if($send_code == TRUE){
            if($this->__send_reset_request($email, $code)==TRUE){
                $emailSent = '<div class="alert alert-success">We sent you a password reset request email to '.$email.'</div>';
                $this->session->set_flashdata('email_sent', $emailSent);
                redirect('./Login/auth/'.$email.'');
            }
            else{
                echo $this->email->print_debugger();
            }
        }
        else{
            $data['sql_err']='<div class="alert alert-danger">An SQL error has been encountered</div>';
            $this->load->view('forgot_pwd', $data);
        }
    }
    }
    
}

// Loads password reset page (for teachers)
public function reset_teacher_pwd(){
    $this->load->library('form_validation');
    $this->load->helper('url');
    $this->load->model('HamdenEdModel');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array('required'=>'Your email is required', 'valid_email'=>'you must provide a valid email'));
    if($this->form_validation->run()==FALSE){
    $this->load->view('forgot_pwd');
    }
    else{
        // check if user exists 
        if($this->HamdenEdModel->teacher_exists($this->input->post('email'))==FALSE){
            $data['no_user']='<div class="alert alert-danger">There is no account associated with that email</div>';
            $this->load->view('forgot_pwd', $data);
        }
        else{
        $code = mt_rand(111111, 999999);
        $email =$this->input->post('email');
        $send_code = $this->HamdenEdModel->send_teacher_code($email, $code);
        if($send_code == TRUE){
            if($this->__send_reset_request($email, $code)==TRUE){
                $emailSent = '<div class="alert alert-success">We sent you a password reset request email to '.$email.'</div>';
                $this->session->set_flashdata('email_sent', $emailSent);
                redirect('./Login/verify_reset_code/'.$email.'');
            }
            else{
                echo $this->email->print_debugger();
            }
        }
        else{
            $data['sql_err']='<div class="alert alert-danger">An SQL error has been encountered</div>';
            $this->load->view('forgot_pwd', $data);
        }
    }
    }
    
}

// verify reset passwrod code (student users)
public function auth($email){
    $this->load->library('form_validation');
    $this->load->helper('url');
    $this->load->model('HamdenEdModel');
    $this->form_validation->set_rules('code', 'Code', 'required', array('required'=>'The verification code is required, check your email to get it'));
    if($this->form_validation->run()==FALSE){
        $this->load->view('auth');
    }
    else{
        // check code 
        $code = $this->input->post('code');
        $check_code = $this->HamdenEdModel->check_code($email, $code);
        if($check_code == FALSE){
            $data['wrong_code']='<div class="alert alert-danger">You entered the wrong verification code, check your email and try agian</div>';
            $this->load->view('auth', $data);
        }
        else{
            $validated = '<div class="alert alert-success alert-dismissible fade show" role="alert">
             your email was verified, you can now create your new password!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            $this->session->set_flashdata('auth_success', $validated);
            redirect('./Login/create_new_pwd/'.$email.'');
        }
    }
}

// verify reset reset code (Teacher users)
public function verify_reset_code($email){
    $this->load->library('form_validation');
    $this->load->helper('url');
    $this->load->model('HamdenEdModel');
    $this->form_validation->set_rules('code', 'Code', 'required', array('required'=>'The verification code is required, check your email to get it'));
    if($this->form_validation->run()==FALSE){
        $this->load->view('auth');
    }
    else{
        // check code 
        $code = $this->input->post('code');
        $check_code = $this->HamdenEdModel->verify_teacher_code($email, $code);
        if($check_code == FALSE){
            $data['wrong_code']='<div class="alert alert-danger">You entered the wrong verification code, check your email and try agian</div>';
            $this->load->view('auth', $data);
        }
        else{
            $validated = '<div class="alert alert-success alert-dismissible fade show" role="alert">
             your email was verified, you can now create your new password!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            $this->session->set_flashdata('auth_success', $validated);
            redirect('./Login/create_pwd/'.$email.'');
        }
    }
}

// verify reset reset code (guests users)
public function verify_reset_code_guests($email){
    $this->load->library('form_validation');
    $this->load->helper('url');
    $this->load->model('HamdenEdModel');
    $this->form_validation->set_rules('code', 'Code', 'required', array('required'=>'The verification code is required, check your email to get it'));
    if($this->form_validation->run()==FALSE){
        $this->load->view('auth');
    }
    else{
        // check code 
        $code = $this->input->post('code');
        $check_code = $this->HamdenEdModel->verify_guests_code($email, $code);
        if($check_code == FALSE){
            $data['wrong_code']='<div class="alert alert-danger">You entered the wrong verification code, check your email and try agian</div>';
            $this->load->view('auth', $data);
        }
        else{
            $validated = '<div class="alert alert-success alert-dismissible fade show" role="alert">
             your email was verified, you can now create your new password!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            $this->session->set_flashdata('auth_success', $validated);
            redirect('./Login/create_pwd/'.$email.'');
        }
    }
}

// Create a new password (for students)
public function create_new_pwd($email){
    $this->load->library('form_validation');
    $this->load->helper('url');
    $this->load->model('HamdenEdModel');
    $this->form_validation->set_rules('pwd', 'Password', 'required|trim|regex_match[/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/]', array('required'=>'this is a required field', 'trim'=>'no spaces allowed between characters', 'regex_match'=>'Your password is not strong enough'));
    $this->form_validation->set_rules('confirm_pwd', 'Confirm Password', 'required|matches[pwd]', array('required'=>'this is a required field', 'matches'=>'both passwords must match'));
    if($this->form_validation->run()==FALSE){
        $this->load->view('create_new_pwd');
    }
    else{
        $hashed_pass = password_hash($this->input->post('pwd'), PASSWORD_DEFAULT);
        $update_pwd = $this->HamdenEdModel->update_pass($email, $hashed_pass);
        if($update_pwd == TRUE){
        $new_pwd_success = '<div class="alert alert-success">Your password was reset, you can now login with your new password</div>';
        $this->session->set_flashdata('new_pwd_success', $new_pwd_success);
        redirect('./Login/student_login');
        }
        else{
            $data['err']='<div class="alert alert-danger">unable to update your password, something went wrong</div>';
            $this->load->view('create_new_pwd', $data);
        }
        
    }
}

// Create a new password (for teachers)
public function create_pwd($email){
    $this->load->library('form_validation');
    $this->load->helper('url');
    $this->load->model('HamdenEdModel');
    $this->form_validation->set_rules('pwd', 'Password', 'required|trim|regex_match[/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/]', array('required'=>'this is a required field', 'trim'=>'no spaces allowed between characters', 'regex_match'=>'Your password is not strong enough'));
    $this->form_validation->set_rules('confirm_pwd', 'Confirm Password', 'required|matches[pwd]', array('required'=>'this is a required field', 'matches'=>'both passwords must match'));
    if($this->form_validation->run()==FALSE){
        $this->load->view('create_new_pwd');
    }
    else{
        $hashed_pass = password_hash($this->input->post('pwd'), PASSWORD_DEFAULT);
        $update_pwd = $this->HamdenEdModel->update_pwd($email, $hashed_pass);
        if($update_pwd == TRUE){
        $new_pwd_success = '<div class="alert alert-success">Your password was reset, you can now login with your new password</div>';
        $this->session->set_flashdata('new_pwd_success', $new_pwd_success);
        redirect('./Login/teacher_login');
        }
        else{
            $data['err']='<div class="alert alert-danger">unable to update your password, something went wrong</div>';
            $this->load->view('create_new_pwd', $data);
        }
        
    }
}

// Create a new password (for guests)
public function create_pwd_guests($email){
    $this->load->library('form_validation');
    $this->load->helper('url');
    $this->load->model('HamdenEdModel');
    $this->form_validation->set_rules('pwd', 'Password', 'required|trim|regex_match[/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/]', array('required'=>'this is a required field', 'trim'=>'no spaces allowed between characters', 'regex_match'=>'Your password is not strong enough'));
    $this->form_validation->set_rules('confirm_pwd', 'Confirm Password', 'required|matches[pwd]', array('required'=>'this is a required field', 'matches'=>'both passwords must match'));
    if($this->form_validation->run()==FALSE){
        $this->load->view('create_new_pwd');
    }
    else{
        $hashed_pass = password_hash($this->input->post('pwd'), PASSWORD_DEFAULT);
        $update_pwd = $this->HamdenEdModel->update_pwd_guests($email, $hashed_pass);
        if($update_pwd == TRUE){
        $new_pwd_success = '<div class="alert alert-success">Your password was reset, you can now login with your new password</div>';
        $this->session->set_flashdata('new_pwd_success', $new_pwd_success);
        redirect('./Login/guests_login');
        }
        else{
            $data['err']='<div class="alert alert-danger">unable to update your password, something went wrong</div>';
            $this->load->view('create_new_pwd', $data);
        }
        
    }
}

private function __send_reset_request($email, $code){
 // email is autoloaded so load the email configuration 
 $this->load->library('email');
 $config['useragent']='CodeIgniter';
 $config['protocol']='smtp';
 $config['smtp_host']='smtp.gmail.com';
 $config['smtp_user']='hefcsc400@gmail.com';
 $config['smtp_pass']='southernct.edu1';
 $config['smtp_port']='465';
 $config['smtp_pass']='southernct.edu1';
 $config['smtp_port']='465';
 $config['newline']="\r\n";
 $config['smtp_timeout']='5';
 $config['smtp_crypto']='ssl';
 $config['wordwrap']=TRUE;
 $config['mailtype']='html';
 $config['charset']='iso-8859-1';
 $link = ''.base_url().'index.php/Login/auth/'.$email.'';
 $link2 = ''.base_url().'index.php/Home/contact';
 $this->email->initialize($config);
 $this->email->from('hefcsc400@gmail.com');
 $this->email->to($email);
 $this->email->subject('DO NOT REPLY - Password reset request');
 $this->email->message(
    '
        <h1>Password Reset Confirmation</h1>
        We wanted to let you know that your reset password verification code was sent.
        <br> 
        Please enter this verification code to reset your password, your code is '.$code.'
        <br> 
        Click this link to reset your password, <a href="'.$link.'">Reset Password</a>
        <br>
        Please do not reply to this email with your password. We will never ask for your password, and we strongly discourage you from sharing it with anyone.
        <h4>If this is not your account please contact us! <a href="'.$link2.'">Click here</a></h4>
     '
 );
 if($this->email->send()){
     return TRUE;
 }
 else{
     return FALSE;
     return $this->email->print_debugger();  
 }
}

}
?>