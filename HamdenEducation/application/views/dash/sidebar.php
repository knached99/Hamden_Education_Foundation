<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?php echo base_url();?>index.php/Home/new_home"><img src="<?php echo base_url();?>/styling/img/HEF-full-logo-2020.png" style="width: 200px;"></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?php echo base_url();?>index.php/Home/new_home"><img src="<?php echo base_url();?>/styling/img/HEF-favicon.png"></a>
    </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <?php 
        if($this->session->account_type == 'Teacher'){
          switch(current_url()){
            case ''.base_url().'index.php/Dash/user_dash':
              $nav_link = '
                <li class="menu-header">
                  <li class="active">
                    <a href="'.base_url().'index.php/Dash/user_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a>
                  </li>
   
                  <li class="">
                    <a href="'.base_url().'index.php/Dash/grant_application" class="nav-link"><i class="fas fa-copy"></i><span>Grant Application</span></a>
                  </li>
                 
                  <li class="">
                    <a href="'.base_url().'index.php/Dash/view_grants" class="nav-link"><i class="fas fa-eye"></i><span>View Grants</span></a>
                  </li>
                  
                  <li class="">
                    <a href="'.base_url().'index.php/Dash/view_events" class="nav-link"><i class="fas fa-table"></i><span>All Events</span></a>
                  </li>
                </li>
              ';
            break;
           
            case ''.base_url().'index.php/Dash/grant_application':
             $nav_link = '
               <li class="menu-header">
 
                 <li class="">
                   <a href="'.base_url().'index.php/Dash/user_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a>
                 </li>
 
                 <li class="active">
                   <a href="'.base_url().'index.php/Dash/grant_application" class="nav-link"><i class="fas fa-copy"></i><span>Grant Application</span></a>
                 </li>
               
                 <li class="">
                   <a href="'.base_url().'index.php/Dash/view_grants" class="nav-link"><i class="fas fa-eye"></i><span>View Grants</span></a>
                 </li>

                 <li class="">
                    <a href="'.base_url().'index.php/Dash/view_events" class="nav-link"><i class="fas fa-table"></i><span>All Events</span></a>
                  </li>     
               </li>
             ';
            break;
 
            case ''.base_url().'index.php/Dash/view_grants':
               $nav_link = '
                 <li class="menu-header">
                   <li class="">
                     <a href="'.base_url().'index.php/Dash/user_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a>
                   </li>
 
                   <li class="">
                     <a href="'.base_url().'index.php/Dash/grant_application" class="nav-link"><i class="fas fa-copy"></i><span>Grant Application</span></a>
                   </li>
               
                   <li class="active">
                     <a href="'.base_url().'index.php/Dash/view_grants" class="nav-link"><i class="fas fa-eye"></i><span>View Grants</span></a>
                   </li>

                   <li class="">
                    <a href="'.base_url().'index.php/Dash/view_events" class="nav-link"><i class="fas fa-table"></i><span>All Events</span></a>
                  </li>
                 </li>
               ';
            break;

            case ''.base_url().'index.php/Dash/view_events':
              $nav_link = '
                <li class="menu-header">
                  <li class="">
                    <a href="'.base_url().'index.php/Dash/user_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a>
                  </li>

                  <li class="">
                    <a href="'.base_url().'index.php/Dash/grant_application" class="nav-link"><i class="fas fa-copy"></i><span>Grant Application</span></a>
                  </li>
              
                  <li class="">
                    <a href="'.base_url().'index.php/Dash/view_grants" class="nav-link"><i class="fas fa-eye"></i><span>View Grants</span></a>
                  </li>

                  <li class="active">
                   <a href="'.base_url().'index.php/Dash/view_events" class="nav-link"><i class="fas fa-table"></i><span>All Events</span></a>
                 </li>
                </li>
              ';
            break;
               
            default:
              $nav_link = '
               <li class="menu-header">
                   <li class="">
                     <a href="'.base_url().'index.php/Dash/user_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a>
                   </li>
 
                   <li class="">
                     <a href="'.base_url().'index.php/Dash/grant_application" class="nav-link"><i class="fas fa-copy"></i><span>Grant Application</span></a>
                   </li>
               
                   <li class="">
                     <a href="'.base_url().'index.php/Dash/view_grants" class="nav-link"><i class="fas fa-eye"></i><span>View Grants</span></a>
                   </li>

                   <li class="">
                    <a href="'.base_url().'index.php/Dash/view_events" class="nav-link"><i class="fas fa-table"></i><span>All Events</span></a>
                  </li>
                 </li>
             ';
            break;
          }
        } 
        else{
          switch(current_url()){
            case ''.base_url().'index.php/Dash/user_dash':
              $nav_link ='
                <li class="menu-header">
                  <li class="active">
                     <a href="'.base_url().'index.php/Dash/user_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a>
                  </li>

                  <li class="">
                    <a href="'.base_url().'index.php/Dash/view_events" class="nav-link"><i class="fas fa-table"></i><span>All Events</span></a>
                  </li>
                </li>
              ';
            break;

            case ''.base_url().'index.php/Dash/view_events':
              $nav_link = '
                 <li class="menu-header">
                   <li class="">
                     <a href="'.base_url().'index.php/Dash/user_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a>
                   </li>

                   <li class="active">
                    <a href="'.base_url().'index.php/Dash/view_events" class="nav-link"><i class="fas fa-table"></i><span>All Events</span></a>
                  </li>
                 </li>
               ';
            break;

            default:
              $nav_link = '
                <li class="menu-header">
                  <li class="">
                    <a href="'.base_url().'index.php/Dash/user_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a>
                  </li>

                  <li class="">
                    <a href="'.base_url().'index.php/Dash/view_events" class="nav-link"><i class="fas fa-table"></i><span>All Events</span></a>
                  </li>
                </li>
             ';
            break;
          }
        }
         echo $nav_link;
        ?>
        </ul>
  </aside>
</div>