<style>
  .active{
    color: #265857;
  }
</style>
  <?php 
    switch($this->session->privilege){
      case 1:
        switch(current_url()){
          case ''.base_url().'index.php/Admin/Dash/admin_dash':
            $active = '
              <li class="active">
                <a href="'.base_url().'index.php/Admin/Dash/admin_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a></li>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/events" class="nav-link"><i class="fas fa-table"></i></i><span>All Events </span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_grants" class="nav-link"><i class="fas fa-file"></i><span>All Grant Submissions</span></a>
               </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_recipient" class="nav-link"><i class="fas fa-file-invoice-dollar"></i><span>All Past Grant Recipients</span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_award_recipient" class="nav-link"><i class="fas fa-trophy"></i><span>All Past Award Recipients</span></a>
              </li>

              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/rubric" class="nav-link"><i class="fas fa-file"></i><span>Grant Rating Rubric</span></a>
              </li>
            ';
            $active2 = '
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_event">Create an Event</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_recipient">Create a Past Grant Recipient</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_award_recipient">Create a Past Award Recipient</a></li>
                </ul>
              </li>
            ';
          break;
      
          case ''.base_url().'index.php/Admin/Dash/events':
            $active = '
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/admin_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a></li>
              </li>
      
              <li class="active">
                <a href="'.base_url().'index.php/Admin/Dash/events" class="nav-link"><i class="fas fa-table"></i></i><span>All Events </span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_grants" class="nav-link"><i class="fas fa-file"></i><span>All Grant Submissions</span></a>
               </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_recipient" class="nav-link"><i class="fas fa-file-invoice-dollar"></i><span>All Past Grant Recipients</span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_award_recipient" class="nav-link"><i class="fas fa-trophy"></i><span>All Past Award Recipients</span></a>
              </li>

              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/rubric" class="nav-link"><i class="fas fa-file"></i><span>Grant Rating Rubric</span></a>
              </li>
            ';
            $active2 = '
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_event">Create an Event</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_recipient">Create a Past Grant Recipient</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_award_recipient">Create a Past Award Recipient</a></li>
                </ul>
              </li>
            ';
          break;
      
          case ''.base_url().'index.php/Admin/Dash/view_grants':
            $active = '
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/admin_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a></li>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/events" class="nav-link"><i class="fas fa-table"></i></i><span>All Events </span></a>
              </li>
      
              <li class="active">
                <a href="'.base_url().'index.php/Admin/Dash/view_grants" class="nav-link"><i class="fas fa-file"></i><span>All Grant Submissions</span></a>
               </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_recipient" class="nav-link"><i class="fas fa-file-invoice-dollar"></i><span>All Past Grant Recipients</span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_award_recipient" class="nav-link"><i class="fas fa-trophy"></i><span>All Past Award Recipients</span></a>
              </li>

              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/rubric" class="nav-link"><i class="fas fa-file"></i><span>Grant Rating Rubric</span></a>
              </li>
            ';
            $active2 = '
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_event">Create an Event</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_recipient">Create a Past Grant Recipient</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_award_recipient">Create a Past Award Recipient</a></li>
                </ul>
              </li>
            ';
          break;
      
          case ''.base_url().'index.php/Admin/Dash/view_recipient':
            $active = '
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/admin_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a></li>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/events" class="nav-link"><i class="fas fa-table"></i></i><span>All Events </span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_grants" class="nav-link"><i class="fas fa-file"></i><span>All Grant Submissions</span></a>
              </li>
      
              <li class="active">
                <a href="'.base_url().'index.php/Admin/Dash/view_recipient" class="nav-link"><i class="fas fa-file-invoice-dollar"></i><span>All Past Grant Recipients</span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_award_recipient" class="nav-link"><i class="fas fa-trophy"></i><span>All Past Award Recipients</span></a>
              </li>

              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/rubric" class="nav-link"><i class="fas fa-file"></i><span>Grant Rating Rubric</span></a>
              </li>
            ';
            $active2 = '
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_event">Create an Event</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_recipient">Create a Past Grant Recipient</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_award_recipient">Create a Past Award Recipient</a></li>
                </ul>
              </li>
            ';
          break;
      
          case ''.base_url().'index.php/Admin/Dash/view_award_recipient':
            $active = '
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/admin_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a></li>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/events" class="nav-link"><i class="fas fa-table"></i></i><span>All Events </span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_grants" class="nav-link"><i class="fas fa-file"></i><span>All Grant Submissions</span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_recipient" class="nav-link"><i class="fas fa-file-invoice-dollar"></i><span>All Past Grant Recipients</span></a>
              </li>
      
              <li class="active">
                <a href="'.base_url().'index.php/Admin/Dash/view_award_recipient" class="nav-link"><i class="fas fa-trophy"></i><span>All Past Award Recipients</span></a>
              </li>

              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/rubric" class="nav-link"><i class="fas fa-file"></i><span>Grant Rating Rubric</span></a>
              </li>
            ';
            $active2 = '
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_event">Create an Event</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_recipient">Create a Past Grant Recipient</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_award_recipient">Create a Past Award Recipient</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/mass_email">Create a Mass Email</a></li>
                </ul>
              </li>
            ';
          break;
      
          case ''.base_url().'index.php/Admin/Dash/create_event':
            $active = '
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/admin_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a></li>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/events" class="nav-link"><i class="fas fa-table"></i></i><span>All Events </span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_grants" class="nav-link"><i class="fas fa-file"></i></i><span>All Grant Submissions</span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_recipient" class="nav-link"><i class="fas fa-file-invoice-dollar"></i></i><span>All Past Grant Recipients</span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_award_recipient" class="nav-link"><i class="fas fa-trophy"></i><span>All Past Award Recipients</span></a>
              </li>

              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/rubric" class="nav-link"><i class="fas fa-file"></i><span>Grant Rating Rubric</span></a>
              </li>
            ';
            $active2 = '
              <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                  <li class="nav-link mb-3 active"><a href="'.base_url().'index.php/Admin/Dash/create_event">Create an Event</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_recipient">Create a Past Grant Recipient</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_award_recipient">Create a Past Award Recipient</a></li>
                </ul>
              </li>
            ';
          break;
            
          case ''.base_url().'index.php/Admin/Dash/create_recipient':
            $active = '
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/admin_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a></li>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/events" class="nav-link"><i class="fas fa-table"></i></i><span>All Events </span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_grants" class="nav-link"><i class="fas fa-file"></i><span>All Grant Submissions</span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_recipient" class="nav-link"><i class="fas fa-file-invoice-dollar"></i><span>All Past Grant Recipients</span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_award_recipient" class="nav-link"><i class="fas fa-trophy"></i><span>All Past Award Recipients</span></a>
              </li>

              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/rubric" class="nav-link"><i class="fas fa-file"></i><span>Grant Rating Rubric</span></a>
              </li>
            ';
            $active2 = '
              <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_event">Create an Event</a></li>
                  <li class="nav-link mb-3 active"><a href="'.base_url().'index.php/Admin/Dash/create_recipient">Create a Past Grant Recipient</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_award_recipient">Create a Past Award Recipient</a></li>
                </ul>
              </li>
            ';
          break;
      
          case ''.base_url().'index.php/Admin/Dash/create_award_recipient':
            $active = '
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/admin_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a></li>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/events" class="nav-link"><i class="fas fa-table"></i></i><span>All Events </span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_grants" class="nav-link"><i class="fas fa-file"></i><span>All Grant Submissions</span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_recipient" class="nav-link"><i class="fas fa-file-invoice-dollar"></i><span>All Past Grant Recipients</span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_award_recipient" class="nav-link"><i class="fas fa-trophy"></i><span>All Past Award Recipients</span></a>
              </li>

              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/rubric" class="nav-link"><i class="fas fa-file"></i><span>Grant Rating Rubric</span></a>
              </li>
            ';
            $active2 = '
              <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_event">Create an Event</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_recipient">Create a Past Grant Recipient</a></li>
                  <li class="nav-link mb-3 active"><a href="'.base_url().'index.php/Admin/Dash/create_award_recipient">Create a Past Award Recipient</a></li>
                </ul>
              </li>
            ';
          break;

          case ''.base_url().'index.php/Admin/Dash/rubric':
            $active = '
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/admin_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a></li>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/events" class="nav-link"><i class="fas fa-table"></i></i><span>All Events </span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_grants" class="nav-link"><i class="fas fa-file"></i><span>All Grant Submissions</span></a>
               </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_recipient" class="nav-link"><i class="fas fa-file-invoice-dollar"></i><span>All Past Grant Recipients</span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_award_recipient" class="nav-link"><i class="fas fa-trophy"></i><span>All Past Award Recipients</span></a>
              </li>

              <li class="active">
                <a href="'.base_url().'index.php/Admin/Dash/rubric" class="nav-link"><i class="fas fa-file"></i><span>Grant Rating Rubric</span></a>
              </li>
            ';
            $active2 = '
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_event">Create an Event</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_recipient">Create a Past Grant Recipient</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_award_recipient">Create a Past Award Recipient</a></li>
                </ul>
              </li>
            ';
          break;
      
          default:
            $active = '
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/admin_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a></li>
              </li>
        
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/events" class="nav-link"><i class="fas fa-table"></i></i><span>All Events </span></a>
              </li>
        
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_grants" class="nav-link"><i class="fas fa-file"></i><span>All Grant Submissions</span></a>
              </li>
        
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_recipient" class="nav-link"><i class="fas fa-file-invoice-dollar"></i><span>All Past Grant Recipients</span></a>
              </li>
        
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_award_recipient" class="nav-link"><i class="fas fa-trophy"></i></i><span>All Past Award Recipients</span></a>
              </li>

              <li class="">
                  <a href="'.base_url().'index.php/Admin/Dash/rubric" class="nav-link"><i class="fas fa-file"></i><span>Grant Rating Rubric</span></a>
              </li>
            ';
           $active2 = '
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
              <ul class="dropdown-menu">
                <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_event">Create an Event</a></li>
                <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_recipient">Create a Past Grant Recipient</a></li>
                <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_award_recipient">Create a Past Award Recipient</a></li>
              </ul>
            </li>
           ';
          break; 
        }
        $link = '
          <li><a class="nav-link" href="'.base_url().'index.php/Admin/Dash/add_admin">Add Admin Role</a></li>
          <li><a class="nav-link" href="'.base_url().'index.php/Admin/Dash/admins">View All Admins</a></li>
          <li><a class="nav-link" href="'.base_url().'index.php/Admin/Dash/mass_email">Create a Mass Email</a></li>
          <li><a class="nav-link" href="'.base_url().'index.php/Admin/Dash/reports">Reports</a></li>
        ';
      break;

      case 2:
        switch(current_url()){
          case ''.base_url().'index.php/Admin/Dash/admin_dash':
            $active = '
              <li class="active">
                <a href="'.base_url().'index.php/Admin/Dash/admin_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a></li>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/events" class="nav-link"><i class="fas fa-table"></i></i><span>All Events </span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_grants" class="nav-link"><i class="fas fa-file"></i><span>All Grant Submissions</span></a>
               </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_recipient" class="nav-link"><i class="fas fa-file-invoice-dollar"></i><span>All Past Grant Recipients</span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_award_recipient" class="nav-link"><i class="fas fa-trophy"></i><span>All Past Award Recipients</span></a>
              </li>

              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/rubric" class="nav-link"><i class="fas fa-file"></i><span>Grant Rating Rubric</span></a>
              </li>
            ';
            $active2 = '
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_event">Create an Event</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_recipient">Create a Past Grant Recipient</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_award_recipient">Create a Past Award Recipient</a></li>
                </ul>
              </li>
            ';
          break;
      
          case ''.base_url().'index.php/Admin/Dash/events':
            $active = '
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/admin_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a></li>
              </li>
      
              <li class="active">
                <a href="'.base_url().'index.php/Admin/Dash/events" class="nav-link"><i class="fas fa-table"></i></i><span>All Events </span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_grants" class="nav-link"><i class="fas fa-file"></i><span>All Grant Submissions</span></a>
               </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_recipient" class="nav-link"><i class="fas fa-file-invoice-dollar"></i><span>All Past Grant Recipients</span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_award_recipient" class="nav-link"><i class="fas fa-trophy"></i><span>All Past Award Recipients</span></a>
              </li>

              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/rubric" class="nav-link"><i class="fas fa-file"></i><span>Grant Rating Rubric</span></a>
              </li>
            ';
            $active2 = '
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_event">Create an Event</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_recipient">Create a Past Grant Recipient</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_award_recipient">Create a Past Award Recipient</a></li>
                </ul>
              </li>
            ';
          break;
      
          case ''.base_url().'index.php/Admin/Dash/view_grants':
            $active = '
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/admin_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a></li>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/events" class="nav-link"><i class="fas fa-table"></i></i><span>All Events </span></a>
              </li>
      
              <li class="active">
                <a href="'.base_url().'index.php/Admin/Dash/view_grants" class="nav-link"><i class="fas fa-file"></i><span>All Grant Submissions</span></a>
               </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_recipient" class="nav-link"><i class="fas fa-file-invoice-dollar"></i><span>All Past Grant Recipients</span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_award_recipient" class="nav-link"><i class="fas fa-trophy"></i><span>All Past Award Recipients</span></a>
              </li>

              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/rubric" class="nav-link"><i class="fas fa-file"></i><span>Grant Rating Rubric</span></a>
              </li>
            ';
            $active2 = '
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_event">Create an Event</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_recipient">Create a Past Grant Recipient</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_award_recipient">Create a Past Award Recipient</a></li>
                </ul>
              </li>
            ';
          break;
      
          case ''.base_url().'index.php/Admin/Dash/view_recipient':
            $active = '
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/admin_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a></li>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/events" class="nav-link"><i class="fas fa-table"></i></i><span>All Events </span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_grants" class="nav-link"><i class="fas fa-file"></i><span>All Grant Submissions</span></a>
              </li>
      
              <li class="active">
                <a href="'.base_url().'index.php/Admin/Dash/view_recipient" class="nav-link"><i class="fas fa-file-invoice-dollar"></i><span>All Past Grant Recipients</span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_award_recipient" class="nav-link"><i class="fas fa-trophy"></i><span>All Past Award Recipients</span></a>
              </li>

              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/rubric" class="nav-link"><i class="fas fa-file"></i><span>Grant Rating Rubric</span></a>
              </li>
            ';
            $active2 = '
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_event">Create an Event</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_recipient">Create a Past Grant Recipient</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_award_recipient">Create a Past Award Recipient</a></li>
                </ul>
              </li>
            ';
          break;
      
          case ''.base_url().'index.php/Admin/Dash/view_award_recipient':
            $active = '
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/admin_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a></li>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/events" class="nav-link"><i class="fas fa-table"></i></i><span>All Events </span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_grants" class="nav-link"><i class="fas fa-file"></i><span>All Grant Submissions</span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_recipient" class="nav-link"><i class="fas fa-file-invoice-dollar"></i><span>All Past Grant Recipients</span></a>
              </li>
      
              <li class="active">
                <a href="'.base_url().'index.php/Admin/Dash/view_award_recipient" class="nav-link"><i class="fas fa-trophy"></i><span>All Past Award Recipients</span></a>
              </li>

              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/rubric" class="nav-link"><i class="fas fa-file"></i><span>Grant Rating Rubric</span></a>
              </li>
            ';
            $active2 = '
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_event">Create an Event</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_recipient">Create a Past Grant Recipient</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_award_recipient">Create a Past Award Recipient</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/mass_email">Create a Mass Email</a></li>
                </ul>
              </li>
            ';
          break;
      
          case ''.base_url().'index.php/Admin/Dash/create_event':
            $active = '
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/admin_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a></li>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/events" class="nav-link"><i class="fas fa-table"></i></i><span>All Events </span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_grants" class="nav-link"><i class="fas fa-file"></i></i><span>All Grant Submissions</span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_recipient" class="nav-link"><i class="fas fa-file-invoice-dollar"></i></i><span>All Past Grant Recipients</span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_award_recipient" class="nav-link"><i class="fas fa-trophy"></i><span>All Past Award Recipients</span></a>
              </li>

              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/rubric" class="nav-link"><i class="fas fa-file"></i><span>Grant Rating Rubric</span></a>
              </li>
            ';
            $active2 = '
              <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                  <li class="nav-link mb-3 active"><a href="'.base_url().'index.php/Admin/Dash/create_event">Create an Event</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_recipient">Create a Past Grant Recipient</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_award_recipient">Create a Past Award Recipient</a></li>
                </ul>
              </li>
            ';
          break;
            
          case ''.base_url().'index.php/Admin/Dash/create_recipient':
            $active = '
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/admin_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a></li>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/events" class="nav-link"><i class="fas fa-table"></i></i><span>All Events </span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_grants" class="nav-link"><i class="fas fa-file"></i><span>All Grant Submissions</span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_recipient" class="nav-link"><i class="fas fa-file-invoice-dollar"></i><span>All Past Grant Recipients</span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_award_recipient" class="nav-link"><i class="fas fa-trophy"></i><span>All Past Award Recipients</span></a>
              </li>

              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/rubric" class="nav-link"><i class="fas fa-file"></i><span>Grant Rating Rubric</span></a>
              </li>
            ';
            $active2 = '
              <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_event">Create an Event</a></li>
                  <li class="nav-link mb-3 active"><a href="'.base_url().'index.php/Admin/Dash/create_recipient">Create a Past Grant Recipient</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_award_recipient">Create a Past Award Recipient</a></li>
                </ul>
              </li>
            ';
          break;
      
          case ''.base_url().'index.php/Admin/Dash/create_award_recipient':
            $active = '
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/admin_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a></li>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/events" class="nav-link"><i class="fas fa-table"></i></i><span>All Events </span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_grants" class="nav-link"><i class="fas fa-file"></i><span>All Grant Submissions</span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_recipient" class="nav-link"><i class="fas fa-file-invoice-dollar"></i><span>All Past Grant Recipients</span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_award_recipient" class="nav-link"><i class="fas fa-trophy"></i><span>All Past Award Recipients</span></a>
              </li>

              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/rubric" class="nav-link"><i class="fas fa-file"></i><span>Grant Rating Rubric</span></a>
              </li>
            ';
            $active2 = '
              <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_event">Create an Event</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_recipient">Create a Past Grant Recipient</a></li>
                  <li class="nav-link mb-3 active"><a href="'.base_url().'index.php/Admin/Dash/create_award_recipient">Create a Past Award Recipient</a></li>
                </ul>
              </li>
            ';
          break;

          case ''.base_url().'index.php/Admin/Dash/rubric':
            $active = '
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/admin_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a></li>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/events" class="nav-link"><i class="fas fa-table"></i></i><span>All Events </span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_grants" class="nav-link"><i class="fas fa-file"></i><span>All Grant Submissions</span></a>
               </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_recipient" class="nav-link"><i class="fas fa-file-invoice-dollar"></i><span>All Past Grant Recipients</span></a>
              </li>
      
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_award_recipient" class="nav-link"><i class="fas fa-trophy"></i><span>All Past Award Recipients</span></a>
              </li>

              <li class="active">
                <a href="'.base_url().'index.php/Admin/Dash/rubric" class="nav-link"><i class="fas fa-file"></i><span>Grant Rating Rubric</span></a>
              </li>
            ';
            $active2 = '
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_event">Create an Event</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_recipient">Create a Past Grant Recipient</a></li>
                  <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_award_recipient">Create a Past Award Recipient</a></li>
                </ul>
              </li>
            ';
          break;
      
          default:
            $active = '
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/admin_dash" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a></li>
              </li>
        
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/events" class="nav-link"><i class="fas fa-table"></i></i><span>All Events </span></a>
              </li>
        
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_grants" class="nav-link"><i class="fas fa-file"></i><span>All Grant Submissions</span></a>
              </li>
        
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_recipient" class="nav-link"><i class="fas fa-file-invoice-dollar"></i><span>All Past Grant Recipients</span></a>
              </li>
        
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/view_award_recipient" class="nav-link"><i class="fas fa-trophy"></i></i><span>All Past Award Recipients</span></a>
              </li>

              <li class="">
                  <a href="'.base_url().'index.php/Admin/Dash/rubric" class="nav-link"><i class="fas fa-file"></i><span>Grant Rating Rubric</span></a>
              </li>
            ';
           $active2 = '
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
              <ul class="dropdown-menu">
                <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_event">Create an Event</a></li>
                <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_recipient">Create a Past Grant Recipient</a></li>
                <li class="nav-link mb-3"><a href="'.base_url().'index.php/Admin/Dash/create_award_recipient">Create a Past Award Recipient</a></li>
              </ul>
            </li>
           ';
          break; 
        }
        $link = '
          <li><a class="nav-link" href="'.base_url().'index.php/Admin/Dash/admins">View All Admins</a></li>
          <li><a class="nav-link" href="'.base_url().'index.php/Admin/Dash/mass_email">Create a Mass Email</a></li>
        ';
      break;

      case 3:
        switch(current_url()){
          case ''.base_url().'index.php/Admin/Dash/assigned_grants':
            $active = '
              <li class="active">
                <a href="'.base_url().'index.php/Admin/Dash/assigned_grants" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a></li>
              </li>

              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/rubric" class="nav-link"><i class="fas fa-file"></i><span>Grant Rating Rubric</span></a>
              </li>
            ';
            $active2 = '
            ';
          break;

          case ''.base_url().'index.php/Admin/Dash/rubric':
            $active = '
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/assigned_grants" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a>
              </li>

              <li class="active">
                <a href="'.base_url().'index.php/Admin/Dash/rubric" class="nav-link"><i class="fas fa-file"></i><span>Grant Rating Rubric</span></a>
              </li>
            ';
            $active2 = '
            ';
          break;
      
          default:
            $active = '
              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/assigned_grants" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a>
              </li>

              <li class="">
                <a href="'.base_url().'index.php/Admin/Dash/rubric" class="nav-link"><i class="fas fa-file"></i><span>Grant Rating Rubric</span></a>
              </li>
            ';
           $active2 = '
           ';
          break; 
        }
        $link = '
          <a href="'.base_url().'index.php/index.php/Admin/Dash/assigned_grants" class="nav-link"><i class="fas fa-exclamation-circle"></i><span> No Extra Features</span></a>
        ';
      break;
    }
  ?>


<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?php echo base_url();?>index.php/Home/new_home"><img src="<?php echo base_url();?>/styling/img/HEF-full-logo-2020.png" style="width: 200px;"></a>
    </div>

    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?php echo base_url();?>index.php/Admin/Dash/admin_dash"><img src="<?php echo base_url();?>/styling/img/HEF-favicon.png"></a>
    </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>

        <?php echo $active ?>

        <li class="menu-header">Administrative Activities</li>
        <?php echo $active2 ?>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-plus"></i> <span>Extra Admin Features</span></a>
          <ul class="dropdown-menu">
            <?php echo $link ?>
          </ul>
        </li>
        

      </ul>
  </aside>
</div>