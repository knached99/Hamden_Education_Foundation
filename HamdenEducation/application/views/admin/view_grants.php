<style>
  h1{
    color: #265857;
  }
</style>

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="row text-center mt-5 mb-3">
                    <h1 class="col">All Grant Applications</h1>
                </div>
                <div class="row justify-content-center mt-5 mb-5">
                <!--Event Counter-->
                <div class="col-lg-3 col-sm-12">
                    <div style="box-shadow: 1px 8px 20px grey;" class="card card-statistic-2">
                        <div class="card-icon shadow-primary" style="box-shadow: 1px 8px 20px grey; background-color: #265857">
                            <i class="fas fa-file"></i>                        
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Number of Grants Submissions</h4>
                            </div>
                            <div class="card-body">
                                <?php echo count($grants['data']);?>
                            </div>
                        </div>
                    </div>
                </div> 
                <!--End-->
                </div>

                <div class="container shadow-lg p-3 bg-white rounded">
                    <?php 
                        echo $this->session->flashdata('success');
                        echo $this->session->flashdata('delete_err');
                    ?>
                    <div class="responsive">
                        <table id="datatables" class="display table">
                            <thead style="background-color: #265857;">
                                <tr>
                                    <th class="text-white">Grant Title</th>
                                    <th class="text-white">Grant Amount</th>
                                    <th class="text-white">Grant School</th>
                                    <th class="text-white">Overall Score</th>
                                    <th class="text-white">Status</th>
                                    <th class="text-white">Assign Grant</th>
                                    <th class="text-white">View Details</th>
                                    <th class="text-white">Assign Status</th>
                                    <th class="text-white">Reviewer</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                <?php foreach($grants['data'] as $row){
                                    switch($this->session->privilege){
                                        case 1:
                                            switch($row->grant_status){
                                                case 0:
                                                    $status = '<td class="text-danger font-weight-bold">Denied <i class="fa fa-times-circle"></i></td>';
                                                break;
                                                case 1:
                                                    $status ='<td style="color: #198754; font-weight: bolder;">Approved <i class="fa fa-check-circle"></i></td>';
                                                break;
                                                case 2:
                                                    $status = '<td class="font-weight-bold" style="color: #6610f2;">Pending Review <i class="fa fa-exclamation-circle"></i></td>';
                                                break;
                                            }
                                            switch($row->assign_status){
                                                case 0:
                                                    $assign_status = '<td class="font-weight-bold" style="color: #6610f2;">Pending Assignment <i class="fa fa-exclamation-circle"></i></td>';
                                                    $review_button = '<td><a href="assign_reviewer/'.$row->grant_id.'" class="btn btn-primary">Assign Reviewer <i class="fas fa-plus"></i></a></td>';
                                                break;

                                                case 1:
                                                    $assign_status ='<td class="font-weight-bold" style="color: #198754;">This Grant has been Assigned a Reviewer <i class="fa fa-check-circle"></i></td>';
                                                    $review_button = '<td><a href="#" class="btn btn-secondary" disabled>Already Assigned <i class="fa fa-check-circle"></i></a></td>';
                                                break;
                                            }
                                        break;

                                        default:
                                        switch($row->grant_status){
                                            case 0:
                                                $status = '<td class="text-danger font-weight-bold">Denied <i class="fa fa-times-circle"></i></td>';
                                            break;
                                            case 1:
                                                $status ='<td style="color: #198754; font-weight: bolder;">Approved <i class="fa fa-check-circle"></i></td>';
                                            break;
                                            case 2:
                                                $status = '<td class="font-weight-bold" style="color: #6610f2;">Pending Review <i class="fa fa-exclamation-circle"></i></td>';
                                            break;
                                        }
                                        switch($row->assign_status){
                                            case 0:
                                                $assign_status = '<td class="font-weight-bold" style="color: #6610f2;">Pending Assignment <i class="fa fa-exclamation-circle"></i></td>';
                                                $review_button = '<td><a href="assign_reviewer/'.$row->grant_id.'" class="btn btn-secondary disabled">Assign Reviewer <i class="fas fa-plus"></i></a></td>';
                                            break;

                                            case 1:
                                                $assign_status ='<td class="font-weight-bold" style="color: #198754;">This Grant has been Assigned a Reviewer <i class="fa fa-check-circle"></i></td>';
                                                $review_button = '<td><a href="#" class="btn btn-secondary" disabled>Already Assigned <i class="fa fa-check-circle"></i></a></td>';
                                            break;
                                        }
                                    }
                                    echo '
                                        <tr>
                                            <td>'.$row->grant_title.'</td>
                                            <td> $'.$row->grant_amount.'</td>
                                            <td>'.$row->school_name.'</td> 
                                            <td>'.$row->overall_score.' points</td>
                                            '.$status.'
                                            '.$review_button.'
                                            <td><a href="grant_details/'.$row->grant_id.'" class="btn btn-primary">Review Details <i class="fas fa-pencil-alt"></i></a></td>
                                            '.$assign_status.'
                                            <td class="font-weight-bold">'.$row->reviewer_email.'</td>

                                        </tr>
                                    ';
                                }
                                if(empty($grants['data'])){
                                    echo '<p class="text-primary text-center  font-weight-normal"><i class="fa fa-exclamation-circle"></i> You currently have no Grant Submissions to view"</p>';
                                }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
</body>