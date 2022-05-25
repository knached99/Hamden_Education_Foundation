<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    Class Register extends CI_Controller{
        public function signup(){
            $this->load->library('form_validation');
            $this->load->helper('url');
            $this->load->model('HamdenEdModel');
            $this->form_validation->set_rules('fname', 'First Name', 'required', array('required'=>'First name is required'));    
            $this->form_validation->set_rules('lname', 'Last Name', 'required', array('required'=>'Last name is required'));    
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[Guests.email]|is_unique[Teachers.email]|is_unique[Students.email]', array('required'=>'your email is required', 'valid_email'=>'the email you entered is not valid')); //|regex_match[/^(({1}\d{3}){1}|\d{3})(\s|-|.)\d{3}(\s|-|.)\d{4}$/]  
            $this->form_validation->set_rules('school_name', 'School Name', 'required|trim');
            $this->form_validation->set_rules('school_type', 'School Type', 'required');
            $this->form_validation->set_rules('position', 'Position', 'required');
            $this->form_validation->set_rules('pwd', 'Password', 'required|trim|regex_match[/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/]'); 
            $this->form_validation->set_rules('confirm_pwd', 'Retype Password', 'required|trim|matches[pwd]');
            $this->form_validation->set_message('is_unique', '%s is already taken by another user');
            if($this->form_validation->run()==FALSE){
                $this->load->view('signup');
            }
        
            else{
                $position = $this->input->post('position');
                $user_id = 'user'.sha1($this->input->post('email').time().date());
                $code = mt_rand(111111,999999);
                $profile_pic= '/default_pic/avatar-1.png';
                $user_data = array(
                        'user_id'=>$user_id,
                        'first_name'=>$this->input->post('fname'),
                        'last_name'=>$this->input->post('lname'),
                        'school_name'=> $this->input->post('school_name'),
                        'school_type'=> $this->input->post('school_type'),
                        'email'=> $this->input->post('email'),
                        'pwd'=> password_hash($this->input->post('pwd'), PASSWORD_DEFAULT),
                        'verification_code'=>$code,
                        'profile_pic'=>$profile_pic,
                        'account_type'=>$position
                    );
                
                switch($position){
                    case 'Student':
                            $this->HamdenEdModel->create_student_acct($user_data);
                            if($this->__verify_user($this->input->post('email'), $code, $this->input->post('first_name'))==TRUE){
                                $verify_msg = '<div class="alert alert-success">We sent a verification code to '.$this->input->post('first_name').'</div>';
                                redirect('../index.php/Register/verify_student/'.$this->input->post('email').'');
                                break;
                            }
                            else{
                                echo $this->email->print_debugger();

                                }
                            /*$success ='<div class="alert alert-success">Your account was successfully created</div>';
                            $this->session->set_flashdata('signup_success', $success);
                            redirect('../index.php/Login/signin'); */
                            
                        case 'Teacher':
                            $this->HamdenEdModel->create_teacher_acct($user_data);
                            $this->__verify_user($this->input->post('email'), $code, $this->input->post('first_name'));
                            /*$success ='<div class="alert alert-success">Your account was successfully created</div>';
                            $this->session->set_flashdata('signup_success', $success);
                            redirect('../index.php/Login/signin'); */
                            $verify_msg = '<div class="alert alert-success">We sent a verification code to '.$this->input->post('first_name').'</div>';
                            redirect('../index.php/Register/verify_teacher/'.$this->input->post('email').'');
                        break;

                        case 'Guest':
                            $this->HamdenEdModel->create_guest_acct($user_data);
                            $this->__verify_user($this->input->post('email'), $code, $this->input->post('first_name'));
                            /*$success ='<div class="alert alert-success">Your account was successfully created</div>';
                            $this->session->set_flashdata('signup_success', $success);
                            redirect('../index.php/Login/signin'); */
                            $verify_msg = '<div class="alert alert-success">We sent a verification code to '.$this->input->post('first_name').'</div>';
                            redirect('../index.php/Register/verify_guest/'.$this->input->post('email').'');
                        break;
                        
                        default:
                        $data['signup_err']='<div class="alert alert-danger">There was an issue creating your account, please try again later or contact support </div>';
                        $this->load->view('signup', $data);
                }
                } 
            }

            public function verify_student($email){
                $this->load->model('HamdenEdModel');
                $this->load->library('form_validation');
                $this->load->helper(array('url', 'form'));
                $this->form_validation->set_rules('code', 'Verification Code', 'required|numeric|trim', array('required'=>'the verification code is required to continue', 'numeric'=>'The verification code is a number only'));
                if($this->form_validation->run()==FALSE){
                    $this->load->view('verify');
                }
                else{
                    // verify the verification code is valid
                $verify = $this->HamdenEdModel->verify_student($email, $this->input->post('code'));
                    if($verify == FALSE){
                        $data['wrong_code']='<div class="alert alert-danger">The code you entered is incorrect, check your email and try agian </div>';
                        $this->load->view('verify',$data);
                    }
                    else{
                        $verified  ='<div class="alert alert-success">Your email was verified, you can now login <i class="fa fa-check-circle"></i> </div>';
                        $this->session->set_flashdata('verified', $verified);
                        redirect('../index.php/Login/student_login');
                    }

                }
            }

            public function verify_teacher($email){
                $this->load->model('HamdenEdModel');
                $this->load->library('form_validation');
                $this->load->helper(array('url', 'form'));
                $this->form_validation->set_rules('code', 'Verification Code', 'required|numeric|trim', array('required'=>'the verification code is required to continue', 'numeric'=>'The verification code is a number only'));
                if($this->form_validation->run()==FALSE){
                    $this->load->view('verify');
                }
                else{
                    // verify the verification code is valid
                $verify = $this->HamdenEdModel->verify_teacher($email, $this->input->post('code'));
                    if($verify == FALSE){
                        $data['wrong_code']='<div class="alert alert-danger">The code you entered is incorrect, check your email and try agian </div>';
                        $this->load->view('verify',$data);
                    }
                    else{
                        $verified  ='<div class="alert alert-success">Your email was verified, you can now login <i class="fa fa-check-circle"></i> </div>';
                        $this->session->set_flashdata('verified', $verified);
                        redirect('../index.php/Login/teacher_login');
                    }

                }
            }

            public function verify_guest($email){
                $this->load->model('HamdenEdModel');
                $this->load->library('form_validation');
                $this->load->helper(array('url', 'form'));
                $this->form_validation->set_rules('code', 'Verification Code', 'required|numeric|trim', array('required'=>'the verification code is required to continue', 'numeric'=>'The verification code is a number only'));
                if($this->form_validation->run()==FALSE){
                    $this->load->view('verify');
                }
                else{
                    // verify the verification code is valid
                $verify = $this->HamdenEdModel->verify_guest($email, $this->input->post('code'));
                    if($verify == FALSE){
                        $data['wrong_code']='<div class="alert alert-danger">The code you entered is incorrect, check your email and try agian </div>';
                        $this->load->view('verify',$data);
                    }
                    else{
                        $verified  ='<div class="alert alert-success">Your email was verified, you can now login <i class="fa fa-check-circle"></i> </div>';
                        $this->session->set_flashdata('verified', $verified);
                        redirect('../index.php/Login/guest_login');
                    }

                }
            }

            // Send verification code
            private function __verify_user($email, $code, $fname){
            /* $msg = 'Hey, '.$fname. ' you\'re almost finished! you just need to verify your email, simply enter this six digit verification code: '.$code.'';
                $this->email->from('hefcsc400@gmail.com');
                $this->email->to($email);
                $this->email->subject('Verify your account');
                $this->email->message($msg);
                if(!$this->email->send()){
                    return FALSE;
                    return $this->email->print_debugger();
                }
                else{
                    return TRUE;
                } */
                $msg = 'Hey, '.$fname. ' you\'re almost finished! you just need to verify your email, simply enter this six digit verification code: '.$code.'';
                $this->load->library('email');
                $config['useragent']='CodeIgniter';
                $config['protocol']='smtp';
                $config['smtp_host']='smtp.gmail.com';
                $config['smtp_user']='hefcsc400@gmail.com';
                $config['smtp_pass']=''; // not showing for privacy
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
                $this->email->subject('Verify your account');
                $this->email->message($msg);
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