<?php 
switch($this->session->privilege){
  case 1:
    $role = 'Main Administrator';
    break;
  
  case 2:
    $role = 'HEF Administrator';
    break;
  
  case 3:
    $role = 'Grant Reviewer';
    break;
  
  default:
  $role = 'No Role Assigned';
  break;
}
?>
<nav class="navbar navbar-expand-lg main-navbar" style="background-color: #265857">
       <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3" style="background-color: #265857;">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <!--<input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">-->
            <!--<button class="btn" type="submit"><i class="fas fa-search"></i></button> -->
            <div class="search-backdrop"></div>
            <div class="search-result">
              <div class="search-header">
                Histories
              </div>
              <div class="search-item">
                <a href="#">How to hack NASA using CSS</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">Kodinger.com</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">#Stisla</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-header">
                Result
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="assets/img/products/product-3-50.png" alt="product">
                  oPhone S9 Limited Edition
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="assets/img/products/product-2-50.png" alt="product">
                  Drone X2 New Gen-7
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="assets/img/products/product-1-50.png" alt="product">
                  Headphone Blitz
                </a>
              </div>
              <div class="search-header">
                Projects
              </div>
              <div class="search-item">
                <a href="#">
                  <div class="search-icon bg-danger text-white mr-3">
                    <i class="fas fa-code"></i>
                  </div>
              
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <div class="search-icon bg-primary text-white mr-3">
                    <i class="fas fa-laptop"></i>
                  </div>
                  Create a new Homepage Design
                </a>
              </div>
            </div>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle "><i class="far fa-envelope"></i><sup class="badge badge-pill badge-danger text-center ml-1"><?php echo count($msgs['data']);?></sup></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <?php 
                if(empty($msgs['data'])){
                  echo '<a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                  <i class="fa fa-exclamation-circle"></i>
                    <div class="is-offline"></div>
                  </div>
                  <div class="dropdown-item-desc">
                      You have no messages :(
                    <div class="time"></div>
                  </div>
                </a>';
                }
                foreach($msgs['data'] as $row){
                  echo '<a href="reply/'.$row->msg_id.'" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                  <!--  <img alt="image" src="'.base_url().'/assets/img/avatar/avatar-2.png" class="rounded-circle">-->
                  <i class="fa fa-comment fa-lg"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>'.$row->name.'</b>
                    <p>'.$row->msg.'</p>
                    <div class="time">'.$row->subject.'</div>
                  </div>
                </a>';
                }
                ?>  
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg"><i class="far fa-bell"></i><sup class="badge badge-pill badge-danger text-center ml-1"><?php echo count($grants['data']);?></sup></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
             <?php 
             if($this->session->priviledge == 2){
               if(empty($assigned_grants['data'])){
                echo '   <a href="#" class="dropdown-item dropdown-item-unread">
                <div class="dropdown-item-icon bg-danger text-white">
                  <i class="fas fa-exclamation-circle"></i>
                </div>
                <div class="dropdown-item-desc">
                  You have no notifications
                  <div class="time text-primary"></div>
                </div>
              </a>';
               }
               else{
              foreach($assigned_grants['data'] as $row){
                echo ' <a href="'.base_url().'index.php/Admin/Dash/grant_details/'.$row->grant_id.'" class="dropdown-item">
                <div class="dropdown-item-icon bg-info text-white">
                  <i class="far fa-user"></i>
                </div>
                <div class="dropdown-item-desc">
                  '.$row->first_name. ' '.$row->last_name.'</b>
                  <div class="time">'.$row->grant_title.'</div>
                </div>
              </a>';
              }
            }
          }
            else{

            
             
              if(empty($grants['data'])){
                echo '   <a href="#" class="dropdown-item dropdown-item-unread">
                <div class="dropdown-item-icon bg-danger text-white">
                  <i class="fas fa-exclamation-circle"></i>
                </div>
                <div class="dropdown-item-desc">
                  You have no notifications
                  <div class="time text-primary"></div>
                </div>
              </a>';
              }
              else{
                foreach($grants['data'] as $row){
                  echo ' <a href="'.base_url().'index.php/Admin/Dash/grant_details/'.$row->grant_id.'" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    '.$row->first_name. ' '.$row->last_name.'</b>
                    <div class="time">'.$row->grant_title.'</div>
                  </div>
                </a>';
                }
              }
            }
             ?>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?php if(!isset($this->session->profile_pic)){ echo base_url().'dash_styling/dist/assets/img/avatar/avatar-1.png';} else{ echo base_url().$this->session->profile_pic;}?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><?php echo $this->session->first_name. ' '.$this->session->last_name; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title"><?php echo $role;?></div>
              <a href="<?php echo base_url()?>index.php/Admin/Dash/profile" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="<?php echo base_url()?>index.php/Admin/Dash/settings" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?php echo base_url()?>index.php/Admin/Dash/logout" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>