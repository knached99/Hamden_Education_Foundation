<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a class="navhome " href="new_home"><img style="width: 300px; padding-left: 50px;" src="<?php echo base_url();?>/styling/img/HEF-full-logo-2020.png"></a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <?php
                switch($this->session->account_type){
                    case 'Student':
                    case 'Teacher':
                    case 'Guest':
                      $dash = '
                        <a href="'.base_url().'index.php/Dash/user_dash" class="nav-item nav-link">Dashboard</a>
                      ';
                    break;
                  
                    case 'admin':
                      $dash = '
                        <a href="'.base_url().'index.php/Admin/Dash/admin_dash" class="nav-item nav-link">Dashboard</a>
                      ';
                    break;

                    default:
                        $dash = '
                            <a href="choose_login" class="nav-item nav-link">Sign In</a>
                        ';
                    break;
                  }
                switch(current_url()){
                    // About                 
                    case ''.base_url().'index.php/Home/new_about':
                    case ''.base_url().'index.php/Home/new_acomp':
                    case ''.base_url().'index.php/Home/new_future':
                        $nav_option='
                            <a href="new_home" class="nav-item nav-link">Home</a>
                            <a href="new_about" class="nav-item nav-link active">About</a>
                            <a href="new_events" class="nav-item nav-link">Events</a>
                            <a href="new_grants" class="nav-item nav-link">Past Grant</a>
                            <a href="new_awards" class="nav-item nav-link">Pasr Awards</a>
                            <a href="new_scholar" class="nav-item nav-link">Scholarships</a>
                            <a href="new_donate" class="nav-item nav-link">Donate</a>
                            <a href="contact" class="nav-item nav-link">Contact</a>
                            '.$dash.'
                            <a style="background-color: #265857; padding: 25px; color: #fff;" href="../Register/signup" class="text-center nav-item">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
                        ';
                    break;

                    // Events
                    case ''.base_url().'index.php/Home/new_events':
                        $nav_option='
                            <a href="new_home" class="nav-item nav-link">Home</a>
                            <a href="new_about" class="nav-item nav-link">About</a>
                            <a href="new_events" class="nav-item nav-link active">Events</a>
                            <a href="new_grants" class="nav-item nav-link">Past Grant</a>
                            <a href="new_awards" class="nav-item nav-link">Past Awards</a>
                            <a href="new_scholar" class="nav-item nav-link">Scholarships</a>
                            <a href="new_donate" class="nav-item nav-link">Donate</a>
                            <a href="contact" class="nav-item nav-link">Contact</a>
                            '.$dash.'
                            <a style="background-color: #265857; padding: 25px; color: #fff;" href="../Register/signup" class="text-center nav-item">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
                        ';
                    break;
                    
                    // Innovation Grants
                    case ''.base_url().'index.php/Home/new_grants':
                        $nav_option='
                            <a href="new_home" class="nav-item nav-link">Home</a>
                            <a href="new_about" class="nav-item nav-link">About</a>
                            <a href="new_events" class="nav-item nav-link">Events</a>
                            <a href="new_grants" class="nav-item nav-link active">Past Grant</a>
                            <a href="new_awards" class="nav-item nav-link">Past Awards</a>
                            <a href="new_scholar" class="nav-item nav-link">Scholarships</a>
                            <a href="new_donate" class="nav-item nav-link">Donate</a>
                            <a href="contact" class="nav-item nav-link">Contact</a>
                            '.$dash.'
                            <a style="background-color: #265857; padding: 25px; color: #fff;" href="../Register/signup" class="text-center nav-item">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
                        ';
                    break;

                    // Awards
                    case ''.base_url().'index.php/Home/new_awards':
                        $nav_option='
                            <a href="new_home" class="nav-item nav-link">Home</a>
                            <a href="new_about" class="nav-item nav-link">About</a>
                            <a href="new_events" class="nav-item nav-link">Events</a>
                            <a href="new_grants" class="nav-item nav-link">Past Grant</a>
                            <a href="new_awards" class="nav-item nav-link active">Past Awards</a>
                            <a href="new_scholar" class="nav-item nav-link">Scholarships</a>
                            <a href="new_donate" class="nav-item nav-link">Donate</a>
                            <a href="contact" class="nav-item nav-link">Contact</a>
                            '.$dash.'
                            <a style="background-color: #265857; padding: 25px; color: #fff;" href="../Register/signup" class="text-center nav-item">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
                        ';
                    break;

                    // Scholarships
                    case ''.base_url().'index.php/Home/new_scholar':
                        $nav_option='
                            <a href="new_home" class="nav-item nav-link">Home</a>
                            <a href="new_about" class="nav-item nav-link">About</a>
                            <a href="new_events" class="nav-item nav-link">Events</a>
                            <a href="new_grants" class="nav-item nav-link">Past Grant</a>
                            <a href="new_awards" class="nav-item nav-link">Past Awards</a>
                            <a href="new_scholar" class="nav-item nav-link active">Scholarships</a>
                            <a href="new_donate" class="nav-item nav-link">Donate</a>
                            <a href="contact" class="nav-item nav-link">Contact</a>
                            '.$dash.'
                            <a style="background-color: #265857; padding: 25px; color: #fff;" href="../Register/signup" class="text-center nav-item">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
                        ';
                    break;

                    // Donate
                    case ''.base_url().'index.php/Home/new_donate':
                        $nav_option='
                            <a href="new_home" class="nav-item nav-link">Home</a>
                            <a href="new_about" class="nav-item nav-link">About</a>
                            <a href="new_events" class="nav-item nav-link">Events</a>
                            <a href="new_grants" class="nav-item nav-link">Past Grant</a>
                            <a href="new_awards" class="nav-item nav-link">Past Awards</a>
                            <a href="new_scholar" class="nav-item nav-link">Scholarships</a>
                            <a href="new_donate" class="nav-item nav-link active">Donate</a>
                            <a href="contact" class="nav-item nav-link">Contact</a>
                            '.$dash.'
                            <a style="background-color: #265857; padding: 25px; color: #fff;" href="../Register/signup" class="text-center nav-item">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
                        ';
                    break;

                    // Contact
                    case ''.base_url().'index.php/Home/contact':
                        $nav_option='
                            <a href="new_home" class="nav-item nav-link">Home</a>
                            <a href="new_about" class="nav-item nav-link">About</a>
                            <a href="new_events" class="nav-item nav-link">Events</a>
                            <a href="new_grants" class="nav-item nav-link">Past Grants</a>
                            <a href="new_awards" class="nav-item nav-link">Past Awards</a>
                            <a href="new_scholar" class="nav-item nav-link">Scholarships</a>
                            <a href="new_donate" class="nav-item nav-link">Donate</a>
                            <a href="contact" class="nav-item nav-link active">Contact</a>
                            '.$dash.'
                            <a style="background-color: #265857; padding: 25px; color: #fff;" href="../Register/signup" class="text-center nav-item">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
                        ';
                    break;

                    default:
                        $nav_option='
                            <a href="new_home" class="nav-item nav-link active">Home</a>
                            <a href="new_about" class="nav-item nav-link">About</a>
                            <a href="new_events" class="nav-item nav-link">Events</a>
                            <a href="new_grants" class="nav-item nav-link">Past Grant </a>
                            <a href="new_awards" class="nav-item nav-link">Past Awards</a>
                            <a href="new_scholar" class="nav-item nav-link">Scholarships</a>
                            <a href="new_donate" class="nav-item nav-link">Donate</a>
                            <a href="contact" class="nav-item nav-link">Contact</a>
                            '.$dash.'
                            <a style="background-color: #265857; padding: 25px; color: #fff;" href="../Register/signup" class="text-center nav-item">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
                        ';  
                    }
            echo $nav_option;?>
        </div>
    </div>
</nav>

<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->