<style>
  h1{
    color: #265857;
  }
  .y{
    border-bottom: #ffa639;
  }
  .y2{
    color: #ffa639;
  }
</style>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div style="background-color: #265857"></div>
        <!-- Main Content -->
        <div class="main-content">

          <div class="row text-center mt-5">
            <h1 class="col">Grant Applications Details</h1>
            <?php  echo $this->session->flashdata('approved');?>
            <?php echo $this->session->flashdata('approve_error');?>
            <?php echo $this->session->flashdata('denied');?>
            <?php echo $this->session->flashdata('deny_error');?>
          </div>
          <?php 
             if(isset($comment_success)){
              echo $comment_success;
            }
            else if(isset($comment_failed)){
              echo $comment_failed;
            }
            ?>
            <div class="row mt-5">
              <div class="col-12">
                <div class="card">
                  <div class="card-wrap">
                    <div class="row">
                      <?php 
                        foreach($grant_details['data'] as $row){
                          switch($this->session->privilege){
                            case 1:
                            case 2:
                              switch($row->grant_status){
                                case null:
                                  $status = '<p class="mt-5 font-weight-bold" style="color: #6610f2;">Pending Review <i class="fa fa-exclamation-circle"></i></p>';
 
                                  $buttons = '
                                    <a class="btn btn-dark m-3" href="'.base_url().'index.php/Admin/Dash/view_grants"><i class=" fa fa-arrow-left"></i> go back</a>
                                  ';
                                break;
                                case 0: // Denied
                                  $status = '<p class="mt-5 text-danger font-weight-bold">Denied <i class="fa fa-times-circle"></i></p>';

                                  $buttons = '
                                    <a class="btn btn-dark m-3" href="'.base_url().'index.php/Admin/Dash/view_grants"><i class=" fa fa-arrow-left"></i> go back</a>
                                  ';
                                break;
                                case 1: // Approved
                                  $status ='<p style="color: #198754; font-weight: bolder;">Approved <i class="fa fa-check-circle"></i></p>';

                                  $buttons = '
                                    <a class="btn btn-dark m-3" href="'.base_url().'index.php/Admin/Dash/view_grants"><i class=" fa fa-arrow-left"></i> go back</a>
                                  ';      
                                break;
                                case 2: // Pending Status
                                  $status = '<p class="font-weight-bold" style="color: #6610f2;">Pending Review <i class="fa fa-exclamation-circle"></i></p>';

                                  $buttons = '
                                    <a class="btn btn-dark m-3" href="'.base_url().'index.php/Admin/Dash/view_grants"><i class=" fa fa-arrow-left"></i> go back</a>
                                  ';
                                  
                                break;
                              }

                              $grant_reason_score ='
                                <div class="text-center col-lg-4 col-sm-6 mt-5 mb-5">
                                  <label class="font-weight-bold form-label">Give Score</label>
                                  <p class="text-danger">Only Reviewer Can Score</>
                                </div>
                              ';

                              $grant_impact_score ='
                                <div class="text-center col-lg-4 col-sm-6 mt-5 mb-5">
                                  <label class="font-weight-bold form-label">Give Score</label>
                                  <p class="text-danger">Only Reviewer Can Score</>
                                </div>
                              ';
                            
                              $grant_budget_score ='
                                <div class="text-center col-lg-4 col-sm-6 mt-5 mb-5">
                                  <label class="font-weight-bold form-label">Give Score</label>
                                  <p class="text-danger">Only Reviewer Can Score</>
                                </div>
                              ';

                              $grant_extra_info_score ='
                                <div class="text-center col-lg-4 col-sm-6 mt-5 mb-5">
                                  <label class="font-weight-bold form-label">Give Score</label>
                                  <p class="text-danger">Only Reviewer Can Score</>
                                </div>
                              ';

                              $admin_proposal_comment = '<p class="card-text">'.$row->admin_proposal_comments.'</p>';
                              $admin_impact_comment = '<p class="card-text">'.$row->admin_impact_comments.'</p>';
                              $admin_budget_comment ='<p class="card-text">'.$row->admin_budget_comments.'</p>';
                              $admin_extra_info_comment ='<p class="card-text">'.$row->admin_extra_info_comments.'</p>';
                            break;
                            case 3: // Only Reviewer can change the text
                              switch($row->grant_status){
                                case null:
                                  $status = '<p class="font-weight-bold mt-5" style="color: #6610f2;">Pending Review <i class="fa fa-exclamation-circle"></i></p>';
 
                                  $buttons = '
                                      <a href="'.base_url().'index.php/Admin/Dash/approve_grant/'.$row->grant_id.'" class=" m-3 btn btn-primary btn-lg">Approve</a>
                                      <a href="'.base_url().'index.php/Admin/Dash/deny_grant/'.$row->grant_id.'" class="m-3 btn btn-danger btn-lg">Deny</a>
                                      <a class="btn btn-dark m-3" href="'.base_url().'index.php/Admin/Dash/assigned_grants"><i class=" fa fa-arrow-left"></i> go back</a>
                                      <button class="btn btn-info m-3">Submit Responses</button>
                                    ';

                                  $admin_proposal_comment = '<textarea class="form-control summernote-simple" name="admin_proposal_comments" placeholder="briefly state your thoughts.." value="'.$row->admin_proposal_comments.'">'.$row->admin_proposal_comments.'</textarea>';
                                  $admin_impact_comment = '<textarea class="form-control  summernote-simple" name="admin_impact_comments" placeholder="briefly state your thoughts..">'.$row->admin_impact_comments.'</textarea>';
                                  $admin_budget_comment ='<textarea class="form-control summernote-simple" name="admin_budget_comments" placeholder="briefly state your thoughts..">'.$row->admin_budget_comments.'</textarea>';
                                  $admin_extra_info_comment ='<textarea class="form-control summernote-simple" name="admin_extra_info_comments" placeholder="briefly state your thoughts..">'.$row->admin_extra_info_comments.'</textarea>';
                                break;
                                case 0: // Denied
                                  $status = '<p class="text-danger mt-5 font-weight-bold">Denied <i class="fa fa-times-circle"></i></p>';

                                  $buttons = '
                                    <a class="btn btn-dark m-3" href="'.base_url().'index.php/Admin/Dash/assigned_grants"><i class=" fa fa-arrow-left"></i> go back</a>
                                  ';

                                  $admin_proposal_comment = '<p class="card-text">'.$row->admin_proposal_comments.'</p>';
                                  $admin_impact_comment = '<p class="card-text">'.$row->admin_impact_comments.'</p>';
                                  $admin_budget_comment ='<p class="card-text">'.$row->admin_budget_comments.'</p>';
                                  $admin_extra_info_comment ='<p class="card-text">'.$row->admin_extra_info_comments.'</p>';
                                break;
                                case 1: // Approved
                                  $status ='<p style="color: #198754; font-weight: bolder;">Approved <i class="fa fa-check-circle"></i></p>';

                                  $buttons = '
                                    <a class="btn btn-dark m-3" href="'.base_url().'index.php/Admin/Dash/assigned_grants"><i class=" fa fa-arrow-left"></i> go back</a>
                                  ';

                                  $admin_proposal_comment = '<p class="card-text">'.$row->admin_proposal_comments.'</p>';
                                  $admin_impact_comment = '<p class="card-text">'.$row->admin_impact_comments.'</p>';
                                  $admin_budget_comment ='<p class="card-text">'.$row->admin_budget_comments.'</p>';
                                  $admin_extra_info_comment ='<p class="card-text">'.$row->admin_extra_info_comments.'</p>';
                                  
                                break;
                                case 2: // Pending Status
                                  $status = '<p class="font-weight-bold mt-5 " style="color: #6610f2;">Pending Review <i class="fa fa-exclamation-circle"></i></p>';

                                  $buttons = '
                                    <a href="../approve_grant/'.$row->grant_id.'" class="m-3 btn btn-success">Approve Grant</a>
                                    <a href="../deny_grant/'.$row->grant_id.'" class="m-3 btn btn-danger">Deny Grant</a>
                                    <a class="btn btn-dark m-3" href="'.base_url().'index.php/Admin/Dash/assigned_grants"><i class=" fa fa-arrow-left"></i> go back</a>
                                    <button class="btn btn-info m-3">Submit Responses</button>
                                  ';
                                  
                                  $admin_proposal_comment = '<textarea class="form-control summernote-simple" name="admin_proposal_comments" placeholder="briefly state your thoughts.." value="'.$row->admin_proposal_comments.'">'.$row->admin_proposal_comments.'</textarea>';
                                  $admin_impact_comment = '<textarea class="form-control  summernote-simple" name="admin_impact_comments" placeholder="briefly state your thoughts..">'.$row->admin_impact_comments.'</textarea>';
                                  $admin_budget_comment ='<textarea class="form-control summernote-simple" name="admin_budget_comments" placeholder="briefly state your thoughts..">'.$row->admin_budget_comments.'</textarea>';
                                  $admin_extra_info_comment ='<textarea class="form-control summernote-simple" name="admin_extra_info_comments" placeholder="briefly state your thoughts..">'.$row->admin_extra_info_comments.'</textarea>';
                                break;
                              }
                              $grant_reason_score ='
                                <div class="text-center col-lg-2 col-sm-6 mt-5 mb-5">
                                  <label class="font-weight-bold form-label">Give Score</label>
                                  <select name="grant_score" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                  </select>
                                </div>
                              ';

                              $grant_impact_score ='
                                <div class="text-center col-lg-2 col-sm-6 mt-5 mb-5">
                                  <label class="font-weight-bold form-label">Give Score</label>
                                  <select name="impact_score" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                  </select>
                                </div>
                              ';
                              
                              $grant_budget_score ='
                                <div class="text-center col-lg-2 col-sm-6 mt-5 mb-5">
                                  <label class="font-weight-bold form-label">Give Score</label>
                                  <select name="budget_score" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                  </select>
                                </div>
                              ';

                              $grant_extra_info_score ='
                                <div class="text-center col-lg-2 col-sm-6 mt-5 mb-5">
                                  <label class="font-weight-bold form-label">Give Score</label>
                                  <select name="info_score" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                  </select>
                                </div>
                              ';
                            break;
                          }
                          echo '
                            <div class="col-12">
                            '.form_open().'
                              <div class="card" style="box-shadow: 1px 8px 20px grey;">
                                <div class="card-body">
                                  <div class=" row justify-content-center mt-4 text-center card-title">
                                    <p class="col-12 text-primary mb-4">Under Review By '.$row->reviewer_email.'</p>
                                    '.$status.'
                                    <h1 class="col-12 font-weight-bold card-title" stlye=" color: #265857;">'.$row->grant_title.'</h1>
                                    <h5 class="col-12 mt-2">Grant Request Amount</h5>
                                    <h5 class="col-12 y2 mt-2">$'.$row->grant_amount.'</h5>
                                  </div>

                                  <div class="row justify-content-center mt-4">
                                    <div class="mt-5 text-center col-lg-6 col-sm-12">
                                      <h5>Requesting Teachers Name:</h5>
                                      <h5 class="y2 mt-2">'.$row->first_name. ' '.$row->last_name.'</h5>
                                    </div>
                                    <div class="mt-5 text-center col-lg-6 col-sm-12">
                                      <h5>Overall Score:</h5>
                                      <h5 class="y2 mt-2">'.$row->overall_score.'</h5>
                                    </div>
                                    <div class="mt-5 text-center col-lg-6 col-sm-12">
                                      <h5>Requesting School:</h5>
                                      <h5 class="y2 mt-2">'.$row->school_name.'</h5>
                                    </div>
                                  </div>

                                  <div class="row justify-content-center mt-5">
                                    <div class="text-center col-12">
                                      <h5 style="color: #265857;"><span style="color: #ffa639;" class="y">-</span> Grant Reason <span style="color: #ffa639;" class="y">-</span></h5>
                                    </div>
                                    <div style="background-color: #f6f6f6; min-height: 200px; box-shadow: 1px 8px 20px grey;" class="p-5 mt-4 col-10">
                                      <div class="row justify-content-center">
                                        <div class="col-12">
                                          <h5 style="padding: 10px; color: #fff; background-color: #265857;" class="text-center" >Teacher Grant Reason</h5>
                                        </div>

                                        <div class="col-12 text-center">
                                          <p class="card-text">'.$row->grant_reason.'</p>                                        
                                        </div>
                                      </div>

                                      <div class="row justify-content-center">
                                        '.$grant_reason_score.'

                                        <div class="col-12 text-center">
                                          <h5 style="padding: 10px; color: #fff; background-color: #265857;">Reviewer Comment on Grant Reason</h5>
                                        </div>

                                        <div class="col-12 mt-4 text-center">
                                          '.$admin_proposal_comment.'                                       
                                        </div>
                                      </div>   
                                    </div>
                                  </div>

                                  <div class="row justify-content-center mt-5">
                                    <div class="text-center col-12">
                                      <h5 style="color: #265857;"><span style="color: #ffa639;" class="y">-</span> Grant Impact <span style="color: #ffa639;" class="y">-</span></h5>
                                    </div>
                                    <div style="background-color: #f6f6f6; min-height: 200px; box-shadow: 1px 8px 20px grey;" class="p-5 mt-4 col-10">
                                      <div class="row justify-content-center">
                                        <div class="col-12">
                                          <h5 style="padding: 10px; color: #fff; background-color: #265857;" class="text-center" >Teacher Grant Impact</h5>
                                        </div>

                                        <div class="col-12 text-center">
                                          <p class="card-text">'.$row->grant_impact.'</p>                                        
                                        </div>
                                      </div>

                                      <div class="row justify-content-center">
                                        '.$grant_impact_score.'

                                        <div class="col-12 text-center">
                                          <h5 style="padding: 10px; color: #fff; background-color: #265857;">Reviewer Comment on Grant Impact</h5>
                                        </div>

                                        <div class="text-center mt-4 col-12">
                                        '.$admin_impact_comment.'                                       
                                        </div>
                                      </div>   
                                    </div>
                                  </div>

                                  <div class="row justify-content-center mt-5">
                                    <div class="text-center col-12">
                                      <h5 style="color: #265857;"><span style="color: #ffa639;" class="y">-</span> Budget Description <span style="color: #ffa639;" class="y">-</span></h5>
                                    </div>
                                    <div style="background-color: #f6f6f6; min-height: 200px; box-shadow: 1px 8px 20px grey;" class="p-5 mt-4 col-10">
                                      <div class="row justify-content-center">
                                        <div class="col-12">
                                          <h5 style="padding: 10px; color: #fff; background-color: #265857;" class="text-center" >Teacher Grant Budget Description</h5>
                                        </div>

                                        <div class="col-12 text-center">
                                          <p class="card-text">'.$row->budget_description.'</p>                                        
                                        </div>
                                      </div>

                                      <div class="row justify-content-center">
                                        '.$grant_budget_score.'                                       


                                        <div class="col-12 text-center">
                                          <h5 style="padding: 10px; color: #fff; background-color: #265857;">Reviewer Comment on Budget Description</h5>
                                        </div>

                                        <div class="col-12 mt-4 text-center">
                                          '.$admin_budget_comment.'                                       
                                        </div>
                                      </div>   
                                    </div>
                                  </div>

                                  <div class="row justify-content-center mt-5">
                                    <div class="text-center col-12">
                                      <h5 style="color: #265857;"><span style="color: #ffa639;" class="y">-</span> Extra Info <span style="color: #ffa639;" class="y">-</span></h5>
                                    </div>
                                    <div style="background-color: #f6f6f6; min-height: 200px; box-shadow: 1px 8px 20px grey;" class="p-5 mt-4 col-10">
                                      <div class="row justify-content-center">
                                        <div class="col-12">
                                          <h5 style="padding: 10px; color: #fff; background-color: #265857;" class="text-center" >Teacher Extra Information</h5>
                                        </div>

                                        <div class="col-12 text-center">
                                          <p class="card-text">'.$row->extra_info.'</p>                                        
                                        </div>
                                      </div>

                                      <div class="row justify-content-center">
                                        '.$grant_extra_info_score.'                                       


                                        <div class="col-12 text-center">
                                          <h5 style="padding: 10px; color: #fff; background-color: #265857;">Reviewer Comment on Extra Information</h5>
                                        </div>

                                        <div class="col-12 mt-4 text-center">
                                          '.$admin_extra_info_comment.'                                       
                                        </div>
                                      </div>   
                                    </div>
                                  </div>
                                </div>
                                <div class="text-center m-3">
                                  '.$buttons.'
                                </div>
                              </div>
                              '.form_close().'
                            </div>
                          ';
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</body>