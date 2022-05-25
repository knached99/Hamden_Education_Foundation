<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Login extends CI_Controller{

    public function login(){
        $this->load->model('Admin_Model');
        $this->load->library('form_validation');
        $this->load->helper(array('url', 'form'));
        $this->form_validation->set_rules('email', 'Email', 'required', array('required'=>'your email is required'));
        $this->form_validation->set_rules('pwd', 'Password', 'required', array('required'=>'your password is required'));
        $email = $this->input->post('email');
        $pwd = $this->input->post('pwd');
        $authenticate = $this->Admin_Model->authenticate($email, $pwd);
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/login');
        }
        else{
            
            $exists = $this->Admin_Model->admin_exists($email);
            if($exists == FALSE){
                $data['no_admin']='<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Looks like you do nat have an admin account, please reach out to the main admin for assistance
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
                $this->load->view('admin/login', $data);
            }
            else if(
                $authenticate== FALSE){
                $data['wrong_pwd']='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                The email or password you entered is incorrect
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
              $this->load->view('admin/login', $data);
            }
            else{
                $admin = array(
                    'admin_id'=>$authenticate->admin_id,
                    'first_name'=>$authenticate->first_name,
                    'last_name'=>$authenticate->last_name,
                    'email'=>$authenticate->email,
                    'account_type'=>$authenticate->account_type,
                    'privilege'=>$authenticate->privilege,
                    'board_position'=>$authenticate->board_position,
                    'profile_pic'=>$authenticate->profile_pic,
                    'twitter'=>$authenticate->twitter,
                    'facebook'=>$authenticate->facebook,
                    'linkedin'=>$authenticate->linkedin,
                    'bio'=>$authenticate->bio

                );
                $this->session->set_userdata($admin);
                redirect('../index.php/Admin/Dash/admin_dash');
            }
        }
       
    }

    // Forgot Password 
     public function forgot_pwd(){ 
        $this->load->model('Admin_Model');
        $this->load->library('form_validation');
        $this->load->helper(array('url', 'form'));
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim', array('required'=>'your email is required to continue', 'valid_email'=>'you did not enter a valid email'));
        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/forgot_pwd');
        }
        else{
            // make sure email exists in the admin system 
            $admin_exists = $this->Admin_Model->admin_exists($this->input->post('email'));
            if($admin_exists == FALSE){
                $data['no_user']='<div class="alert alert-danger">an admin account with the email you entered does not exist <i class="fa fa-exclamation-circle"></i></div>';
                $this->load->view('admin/forgot_pwd',$data);
            }
            else{
                $code = mt_rand(000000, 999999); // generates random 6 digit number 
                $email = $this->input->post('email');
                $subject = 'You have requested a password reset, DO NOT REPLY';
                if($this->Admin_Model->send_verification_code($code, $email) == TRUE){
                    if($this->__send_request_email($code, $email, $subject) == TRUE){
                        $email_sent = '<div class="alert alert-success font-weight-bold"><i class="fa fa-check-circle"></i></div>';
                        $this->session->flashdata('email_sent', $email_sent);
                        redirect('../index.php/Admin/Admin_Login/verify_code/'.$email.'');
                     }
                    else{
                        $data['email_not_sent']='<div class="alert alert-danger font-weight-bold">Something went wrong and we couldn\'t send an email <i class="fa fa-exclamation"></i></div>';
                        $this->load->view('admin/forgot_pwd', $data);
                    }
                }
            }
        }
    }
    public function verify_code($email){
        $this->load->model('Admin_Model');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->form_validation->set_rules('code', 'Code', 'required|trim|numeric', array('required'=>'The verification code is required', 'numeric'=>'the verification code must be a number'));
        if($this->form_validation->run()==false){
            $this->load->view('admin/verify_code');
        }
        else{
            $verify_code = $this->Admin_Model->verify_code($email, $this->input->post('code'));
            if($verify_code == FALSE){
                $data['wrong_code']='<div class="alert alert-danger"> code you entered is incorrect <i class="fa fa-exclamation-circle"></i></div>';
                $this->load->view('admin/verify_code', $data);
            }
            else{
                // redirect to create new password page 
                $code_verified = '<div class="alert alert-success font-weight-bold">Code verified! You can now create your new password</div>';
                $this->session->set_flashdata('code_verified', $code_verified);
                redirect('../index.php/Admin/Admin_Login/create_new_pwd/'.$email.'');
            }
        }
    }
    public function create_new_pwd($email){
     $this->load->library('form_validation');
     $this->load->model('Admin_Model');
     $this->load->helper('url');
     $this->form_validation->set_rules('pwd', 'Password', 'required|trim|regex_match[/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/]'); 
     $this->form_validation->set_rules('confirm_pwd', 'Retype Password', 'required|trim|matches[pwd]');
     if($this->form_validation->run()==FALSE){
         $this->load->view('admin/create_new_pwd');
     }
     else{
         $hashed_pwd = password_hash($this->input->post('pwd'), PASSWORD_DEFAULT);
         $update_pwd = $this->Admin_Model->update_pwd($email, $hashed_pwd);
         if($update_pwd == TRUE){
             $pwd_updated = '<div class="alert alert-success font-weight-bold">your password was successfully updated <i class="fa fa-check-circle"></i></div>';
             $this->session->set_flashdata('pwd_updated', $pwd_updated);
             redirect('../index.php/Admin/Admin_Login/login');
         }
     }
    }

    private function __send_request_email($code, $email, $subject){

            $this->load->library('email');
            $config['useragent']='CodeIgniter';
            $config['protocol']='smtp';
            $config['smtp_host']='smtp.gmail.com';
            $config['smtp_user']='hefcsc400@gmail.com';
            $config['smtp_pass']='southernct.edu1';
            $config['smtp_port']='465';
            $config['newline']="\r\n";
            $config['smtp_timeout']='5';
            $config['smtp_crypto']='ssl';
            $config['wordwrap']=TRUE;
            $config['mailtype']='html';
            $config['charset']='iso-8859-1';
            $link = ''.base_url().'index.php/Admin/Admin_Login/verify_code/'.$email.'';
            $link2 = ''.base_url().'index.php/Home/contact';
            $this->email->initialize($config);
            $this->email->from('hefcsc400@gmail.com');
            $this->email->to($email);
            $this->email->subject($subject);
            $this->email->message(
                '
                    <h1>Password Reset Confirmation</h1>
                    We wanted to let you know that your reset password verification code was sent.
                    Please enter this verification code to reset your password, your code is '.$code.'
                    <br> 
                    Click this link to reset your password, <a href="'.$link.'">Reset Password</a>
                    <br>
                    Please do not reply to this email with your password. We will never ask for your password, and we strongly discourage you from sharing it with anyone.
                    <h4>If this is not your account please contact us! <a href="'.$link2.'">Click here</a></h4>
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