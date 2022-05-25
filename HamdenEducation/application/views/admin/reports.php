<style>
  .yellow{
    color: #ffa639;
  }

  h1{
    color: #265857;
  }

  .form-label{
    color: #265857;
  }

  .form-control .box{
    height: 200px;
  }
</style>

<body>  
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div id="accordion">
                        <!--Admins-->
                        <div class="card mt-5">
                            <div class="card-header" id="admin">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#admin" aria-expanded="false" aria-controls="admin">
                                        View Admins Report
                                    </button>
                                </h5>
                            </div>

                            <div id="admin" class="collapse" aria-labelledby="admin" data-parent="#accordion">
                                <div class="card-body">
                                    <!--Admins-->
                                    <div class="mt-5 container">
                                        <div class="row justify-content-center">
                                            <div class="col-10 shadow-lg p-3 bg-white rounded">
                                                <h1 class="mt-3 mb-3 text-center">Admin Account Information Report</h1> 
                                                <div class="responsive">
                                                    <table id="datatables" class="display table">
                                                        <thead style="background-color: #265857;">
                                                            <tr>
                                                                <th class="text-white">First Name</th>
                                                                <th class="text-white">Last Name</th>
                                                                <th class="text-white">Email</th>
                                                                <th class="text-white">Privilege</th>
                                                            </tr>
                                                        </thead>
                                                            
                                                        <tbody>
                                                            <?php 
                                                            foreach($admins['data'] as $row){
                                                                echo '
                                                                <tr>
                                                                    <td>'.$row->first_name.'</td>
                                                                    <td>'.$row->last_name.'</td>
                                                                    <td>'.$row->email.'</td>
                                                                    <td>'.$row->privilege.'</td>
                                                                </tr>
                                                                ';
                                                            }
                                                            if(empty($admins['data'])){
                                                                echo '<p class="text-center text-primary font-weight-normal"><i class="fa fa-exclamation-circle"></i> Currently have no Admin Accounts!</p>';
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Teachers-->
                        <div class="card">
                            <div class="card-header" id="teacher">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#teacher" aria-expanded="false" aria-controls="teacher">
                                        View Teachers Report
                                    </button>
                                </h5>
                            </div>
                            <div id="teacher" class="collapse" aria-labelledby="teacher" data-parent="#accordion">
                                <div class="card-body">
                                    <!--Teachers-->
                                    <div class="mt-5 container">
                                        <div class="row justify-content-center">
                                            <div class="col-10 shadow-lg p-3 bg-white rounded">
                                                <h1 class="mt-3 mb-3 text-center">Teacher Account Information Report</h1> 
                                                <div class="responsive">
                                                    <table id="datatables" class="display table">
                                                        <thead style="background-color: #265857;">
                                                            <tr>
                                                            <th class="text-white">First Name</th>
                                                            <th class="text-white">Last Name</th>
                                                            <th class="text-white">School Name</th>
                                                            <th class="text-white">Email</th>
                                                            </tr>
                                                        </thead>
                                                            
                                                        <tbody>
                                                            <?php 
                                                            foreach($teachers['data'] as $row){
                                                                echo '
                                                                <tr>
                                                                    <td>'.$row->first_name.'</td>
                                                                    <td>'.$row->last_name.'</td>
                                                                    <td>'.$row->school_name.'</td>
                                                                    <td>'.$row->email.'</td>
                                                                </tr>
                                                                ';
                                                            }
                                                            if(empty($teachers['data'])){
                                                                echo '<p class="text-center text-primary font-weight-normal"><i class="fa fa-exclamation-circle"></i> Currently have no Teacher Accounts!</p>';
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                            
                                </div>
                            </div>
                        </div>

                        <!--Students-->
                        <div class="card">
                            <div class="card-header" id="students">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#students" aria-expanded="false" aria-controls="students">
                                        View Students Report
                                    </button>
                                </h5>
                            </div>
                            <div id="students" class="collapse" aria-labelledby="students" data-parent="#accordion">
                                <div class="card-body">
                                    <!--Students-->
                                    <div class="mt-5 container">
                                        <div class="row justify-content-center">
                                            <div class="col-10 shadow-lg p-3 bg-white rounded">
                                                <h1 class="mt-3 mb-3 text-center">Student Account Information Report</h1> 
                                                <div class="responsive">
                                                    <table id="datatables" class="display table">
                                                        <thead style="background-color: #265857;">
                                                            <tr>
                                                            <th class="text-white">First Name</th>
                                                            <th class="text-white">Last Name</th>
                                                            <th class="text-white">School Name</th>
                                                            <th class="text-white">Email</th>
                                                            </tr>
                                                        </thead>
                                                            
                                                        <tbody>
                                                            <?php 
                                                            foreach($students['data'] as $row){
                                                                echo '
                                                                <tr>
                                                                    <td>'.$row->first_name.'</td>
                                                                    <td>'.$row->last_name.'</td>
                                                                    <td>'.$row->school_name.'</td>
                                                                    <td>'.$row->email.'</td>
                                                                </tr>
                                                                ';
                                                            }
                                                            if(empty($students['data'])){
                                                                echo '<p class="text-center text-primary font-weight-normal"><i class="fa fa-exclamation-circle"></i> Currently have no Student Accounts!</p>';
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Guests-->
                        <div class="card">
                            <div class="card-header" id="guests">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#guests" aria-expanded="false" aria-controls="guests">
                                        View Guests Report
                                    </button>
                                </h5>
                            </div>
                            <div id="guests" class="collapse" aria-labelledby="guests" data-parent="#accordion">
                                <div class="card-body">
                                    <!--Guests-->
                                    <div class="mt-5 container">
                                        <div class="row justify-content-center">
                                            <div class="col-10 shadow-lg p-3 bg-white rounded">
                                                <h1 class="mt-3 mb-3 text-center">Guests Account Information Report</h1> 
                                                <div class="responsive">
                                                    <table id="datatables" class="display table">
                                                        <thead style="background-color: #265857;">
                                                            <tr>
                                                            <th class="text-white">First Name</th>
                                                            <th class="text-white">Last Name</th>
                                                            <th class="text-white">School Name</th>
                                                            <th class="text-white">Email</th>
                                                            </tr>
                                                        </thead>
                                                            
                                                        <tbody>
                                                            <?php 
                                                            foreach($guests['data'] as $row){
                                                                echo '
                                                                <tr>
                                                                    <td>'.$row->first_name.'</td>
                                                                    <td>'.$row->last_name.'</td>
                                                                    <td>'.$row->school_name.'</td>
                                                                    <td>'.$row->email.'</td>
                                                                </tr>
                                                                ';
                                                            }
                                                            if(empty($guests['data'])){
                                                                echo '<p class="text-center text-primary font-weight-normal"><i class="fa fa-exclamation-circle"></i> Currently have no Guest Accounts!</p>';
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--Event Events-->
                        <div class="card">
                            <div class="card-header" id="Event">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#Event" aria-expanded="false" aria-controls="Event">
                                        View Events Report
                                    </button>
                                </h5>
                            </div>
                            <div id="Event" class="collapse" aria-labelledby="Event" data-parent="#accordion">
                                <div class="card-body">
                                    <!--Events-->
                                    <div class="mt-5 container">
                                        <div class="row justify-content-center">
                                            <div class="col-10 shadow-lg p-3 bg-white rounded">
                                                <h1 class="mt-3 mb-3 text-center">Events Information Report</h1> 
                                                <div class="responsive">
                                                    <table id="datatables" class="display table">
                                                        <thead style="background-color: #265857;">
                                                            <tr>
                                                            <th class="text-white">Event Title</th>
                                                            <th class="text-white">Event Time</th>
                                                            <th class="text-white">Event Date</th>
                                                            <th class="text-white">Event Location</th>
                                                            </tr>
                                                        </thead>
                                                            
                                                        <tbody>
                                                            <?php 
                                                            foreach($events['data'] as $row){
                                                                echo '
                                                                <tr>
                                                                    <td>'.$row->event_title.'</td>
                                                                    <td>'.$row->event_time.'</td>
                                                                    <td>'.$row->event_date.'</td>
                                                                    <td>'.$row->event_location.'</td>
                                                                </tr>
                                                                ';
                                                            }
                                                            if(empty($events['data'])){
                                                                echo '<p class="text-center text-primary font-weight-normal"><i class="fa fa-exclamation-circle"></i> Currently have no Events!</p>';
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--Event Attndees-->
                        <div class="card">
                            <div class="card-header" id="EventAttendees">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#EventAttendees" aria-expanded="false" aria-controls="EventAttendees">
                                        View Attendees Report
                                    </button>
                                </h5>
                            </div>
                            <div id="EventAttendees" class="collapse" aria-labelledby="EventAttendees" data-parent="#accordion">
                                <div class="card-body">
                                    <!--Guests-->
                                    <div class="mt-5 container">
                                        <div class="row justify-content-center">
                                            <div class="col-10 shadow-lg p-3 bg-white rounded">
                                                <h1 class="mt-3 mb-3 text-center">Event Attendees Information Report</h1> 
                                                <div class="responsive">
                                                    <table id="datatables" class="display table">
                                                        <thead style="background-color: #265857;">
                                                            <tr>
                                                            <th class="text-white">First Name</th>
                                                            <th class="text-white">Last Name</th>
                                                            <th class="text-white">Event Title</th>
                                                            <th class="text-white">Event Date</th>
                                                            <th class="text-white">Date Joined</th>
                                                            </tr>
                                                        </thead>
                                                            
                                                        <tbody>
                                                            <?php 
                                                            foreach($attendees['data'] as $row){
                                                                echo '
                                                                <tr>
                                                                    <td>'.$row->first_name.'</td>
                                                                    <td>'.$row->last_name.'</td>
                                                                    <td>'.$row->event_title.'</td>
                                                                    <td>'.$row->event_date.'</td>
                                                                    <td>'.$row->date_joined.'</td>
                                                                </tr>
                                                                ';
                                                            }
                                                            if(empty($attendees['data'])){
                                                                echo '<p class="text-center text-primary font-weight-normal"><i class="fa fa-exclamation-circle"></i> Currently have no Event Attendees!</p>';
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Grants-->
                        <div class="card">
                            <div class="card-header" id="grants">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#grants" aria-expanded="false" aria-controls="grants">
                                    View Grants Report
                                </button>
                            </h5>
                            </div>
                            <div id="grants" class="collapse" aria-labelledby="grants" data-parent="#accordion">
                                <div class="card-body">
                                    <!--grants-->
                                    <div class="mt-5 container">
                                        <div class="row justify-content-center">
                                            <div class="col-10 shadow-lg p-3 bg-white rounded">
                                                <h1 class="mt-3 mb-3 text-center">Grants Information Report</h1> 
                                                <div class="responsive">
                                                    <table id="datatables" class="display table">
                                                        <thead style="background-color: #265857;">
                                                            <tr>
                                                            <th class="text-white">Grant Title</th>
                                                            <th class="text-white">Grant Amount</th>
                                                            <th class="text-white">School Name</th>
                                                            <th class="text-white">Teacher Name</th>
                                                            <th class="text-white">Grant Status</th>
                                                            <th class="text-white">Assign Status</th>
                                                            <th class="text-white">Reviewer Email</th>
                                                            <th class="text-white">Overall Score</th>
                                                            </tr>
                                                        </thead>
                                                            
                                                        <tbody>
                                                            <?php 
                                                            foreach($grants['data'] as $row){
                                                                echo '
                                                                <tr>
                                                                    <td>'.$row->grant_title.'</td>
                                                                    <td>'.$row->grant_amount.'</td>
                                                                    <td>'.$row->school_name.'</td>
                                                                    <td>'.$row->first_name.'</td>
                                                                    <td>'.$row->grant_status.'</td>
                                                                    <td>'.$row->assign_status.'</td>
                                                                    <td>'.$row->reviewer_email.'</td>
                                                                    <td>'.$row->overall_score.'</td>

                                                                </tr>
                                                                ';
                                                            }
                                                            if(empty($grants['data'])){
                                                                echo '<p class="text-center text-primary font-weight-normal"><i class="fa fa-exclamation-circle"></i> Currently have no Grants!</p>';
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Grant Rec-->
                        <div class="card">
                            <div class="card-header" id="grantRec">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#grantRec" aria-expanded="false" aria-controls="grantRec">
                                        View Grant Recipients Report
                                    </button>
                                </h5>
                            </div>
                            <div id="grantRec" class="collapse" aria-labelledby="grantRec" data-parent="#accordion">
                                <div class="card-body">
                                    <!--Guests-->
                                    <div class="mt-5 container">
                                        <div class="row justify-content-center">
                                            <div class="col-10 shadow-lg p-3 bg-white rounded">
                                                <h1 class="mt-3 mb-3 text-center">Grant Recipients Information Report</h1> 
                                                <div class="responsive">
                                                    <table id="datatables" class="display table">
                                                        <thead style="background-color: #265857;">
                                                            <tr>
                                                            <th class="text-white">Grant Title</th>
                                                            <th class="text-white">Year</th>
                                                            <th class="text-white">School Name</th>
                                                            <th class="text-white">Full Name</th>
                                                            </tr>
                                                        </thead>
                                                            
                                                        <tbody>
                                                            <?php 
                                                            foreach($grantRec['data'] as $row){
                                                                echo '
                                                                <tr>
                                                                    <td>'.$row->recipients_title.'</td>
                                                                    <td>'.$row->recipients_year.'</td>
                                                                    <td>'.$row->recipients_school.'</td>
                                                                    <td>'.$row->recipients_first_name.' '.$row->recipients_last_name.'</td>
                                                                </tr>
                                                                ';
                                                            }
                                                            if(empty($grantRec['data'])){
                                                                echo '<p class="text-center text-primary font-weight-normal"><i class="fa fa-exclamation-circle"></i> Currently have no Grant Recipients!</p>';
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Award Rec-->
                        <div class="card">
                            <div class="card-header" id="awardRec">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#awardRec" aria-expanded="false" aria-controls="awardRec">
                                        View Award Recipients Report
                                    </button>
                                </h5>
                            </div>
                            <div id="awardRec" class="collapse" aria-labelledby="awardRec" data-parent="#accordion">
                                <div class="card-body">
                                    <!--Award-->
                                    <div class="mt-5 container">
                                        <div class="row justify-content-center">
                                            <div class="col-10 shadow-lg p-3 bg-white rounded">
                                                <h1 class="mt-3 mb-3 text-center">Award Recipients Information Report</h1> 
                                                <div class="responsive">
                                                    <table id="datatables" class="display table">
                                                        <thead style="background-color: #265857;">
                                                            <tr>
                                                            <th class="text-white">Grant Title</th>
                                                            <th class="text-white">Year</th>
                                                            <th class="text-white">School Name</th>
                                                            <th class="text-white">Full Name</th>
                                                            </tr>
                                                        </thead>
                                                            
                                                        <tbody>
                                                            <?php 
                                                            foreach($awardRec['data'] as $row){
                                                                echo '
                                                                <tr>
                                                                    <td>'.$row->recipients_title.'</td>
                                                                    <td>'.$row->recipients_year.'</td>
                                                                    <td>'.$row->recipients_school.'</td>
                                                                    <td>'.$row->recipients_first_name.' '.$row->recipients_last_name.'</td>
                                                                </tr>
                                                                ';
                                                            }
                                                            if(empty($awardRec['data'])){
                                                                echo '<p class="text-center text-primary font-weight-normal"><i class="fa fa-exclamation-circle"></i> Currently have no Award Recipients!</p>';
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>