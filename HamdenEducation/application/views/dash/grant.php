<?php 
   foreach($grant['data'] as $row){
     $title = $row->grant_title;
     $amount = $row->grant_amount;
     $proposal = $row->grant_reason;
     $impact = $row->grant_impact;
     $description = $row->budget_description;
     $extra_info = $row->extra_info;
     $status = $row->grant_status;
     $dispute = $row->grant_status;
     $reviewer_proposal_comment = $row->admin_proposal_comments;
     $reviewer_impact_comment = $row->admin_impact_comments;
     $reviewer_budget_comment = $row->admin_budget_comments;
     $reviewer_extra_info_comment = $row->admin_extra_info_comments;
     $reviewer_overall_score = $row->overall_score;
   }
?>
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
          </div>

          <?php 
             if(isset($comment_success)){
              echo $comment_success;
            }
            else if(isset($comment_failed)){
              echo $comment_failed;
            }
            // display all session flashdata here 
            echo $this->session->flashdata('errs');
            echo $this->session->flashdata('dispute_success');
            echo $this->session->flashdata('dispute_error');
            ?>
            <div class="row m-5">
              <div class="col">
                <div class="card">
                  <div class="card-wrap">
                    <div class="row">
                      <div class="col">
                        <div class="card" style="box-shadow: 1px 8px 20px grey;">
                          <div class="card-body">
                            <div class="row justify-content-center text-center m-3">
                              <div class="col-10">
                                <!-- Switch between grant status -->
                                  <?php
                                    switch($status){
                                      case 0: // Denied 
                                        echo '<p class="text-danger font-weight-bold">Your Grant was Denied <i class="fa fa-times-circle"></i></p>';
                                      break;
                                      case 1: // Approved 
                                        echo '<p class="text-success font-weight-bold">Your Grant was Approved <i class="fa fa-check-circle"></i></p>';
                                      break;
                                      case 2: // Pending
                                        echo '<p class="font-weight-bold" style="color:#6610f2;">Your Grant is Still Pending Review by an HEF Grants Reviewer<i class="fa fa-exclamation-circle"></i></p>';
                                      break;
                                    }
                                  ?>        
                              </div>
                            </div>
                            <div class=" row justify-content-center mt-4 text-center card-title">
                              <h1 class="col-12 font-weight-bold card-title" stlye=" color: #265857;"><?php echo $title;?></h1>
                              <h5 class="col-12 mt-2">Grant Request Amount</h5>
                              <h5 class="col-12 y2 mt-2">$<?php echo $amount;?></h5>
                              <h5 class="col-12 mt-5">Overall Score</h5>
                              <h5 class="col-12 y2 mt-2"><?php echo $reviewer_overall_score;?></h5>
                            </div>

                            <div class="row justify-content-center mt-5">
                              <div class="text-center col-10">
                                <h5 style="color: #265857;"><span style="color: #ffa639;" class="y">-</span> Grant Reason <span style="color: #ffa639;" class="y">-</span></h5>
                              </div>
                              <div style="background-color: #f6f6f6; min-height: 200px;" class="p-5 mt-4 col-10">
                                <p class="card-text"><?php echo $proposal;?></p>
                              </div>

                              <!---Response From Reviewer-->
                              <div class="text-center col-10 mt-5">
                                <h5 style="background-color: #265857; color: #fff; padding: 10px;">Reviewer's Grant Reason Response</h5>
                              </div>
                              <div style="background-color: #f6f6f6; min-height: 200px;" class="p-5 mt-4 col-10">
                                <p class="card-text"><?php echo $reviewer_proposal_comment;?></p>
                              </div>
                            </div>

                                  <div class="row justify-content-center mt-5">
                                    <div class="text-center col-12">
                                      <h5 style="color: #265857;"><span style="color: #ffa639;" class="y">-</span> Grant Impact <span style="color: #ffa639;" class="y">-</span></h5>
                                    </div>
                                    <div style="background-color: #f6f6f6; min-height: 200px;" class="p-5 mt-4 col-10">
                                      <p class="card-text"><?php echo $impact;?></p>
                                    </div>
                                    <!---Response From Reviewer-->
                                    <div class="text-center col-10 mt-5">
                                      <h5 style="background-color: #265857; color: #fff; padding: 10px;">Reviewer's Impact Response</h5>
                                    </div>
                                    <div style="background-color: #f6f6f6; min-height: 200px;" class="p-5 mt-4 col-10">
                                      <p class="card-text"><?php echo $reviewer_proposal_comment;?></p>
                                    </div>
                                  </div>

                                  <div class="row justify-content-center mt-5">
                                    <div class="text-center col-12">
                                      <h5 style="color: #265857;"><span style="color: #ffa639;" class="y">-</span> Budget Description <span style="color: #ffa639;" class="y">-</span></h5>
                                    </div>
                                    <div style="background-color: #f6f6f6; min-height: 200px;" class="p-5 mt-4 col-10">
                                      <p class="card-text"><?php echo $description;?></p>
                                    </div>

                                    <!---Response From Reviewer-->
                                    <div class="text-center col-10 mt-5">
                                      <h5 style="background-color: #265857; color: #fff; padding: 10px;">Reviewer's Budget Response</h5>
                                    </div>
                                    <div style="background-color: #f6f6f6; min-height: 200px;" class="p-5 mt-4 col-10">
                                      <p class="card-text"><?php echo $reviewer_budget_comment;?></p>
                                    </div>
                                  </div>

                                   <div class="row justify-content-center mt-5">
                                    <div class="text-center col-12">
                                      <h5 style="color: #265857;"><span style="color: #ffa639;" class="y">-</span> Extra Infomation <span style="color: #ffa639;" class="y">-</span></h5>
                                    </div>
                                    <div style="background-color: #f6f6f6; min-height: 200px;" class="p-5 mt-4 col-10">
                                      <p class="card-text"><?php echo $extra_info;?></p>
                                    </div>
                                    <!---Response From Reviewer-->
                                    <div class="text-center col-10 mt-5">
                                      <h5 style="background-color: #265857; color: #fff; padding: 10px;">Reviewer's Extra Information Response</h5>
                                    </div>
                                    <div style="background-color: #f6f6f6; min-height: 200px;" class="p-5 mt-4 col-10">
                                      <p class="card-text"><?php echo $reviewer_extra_info_comment;?></p>
                                    </div>
                            </div>
                            <div class="row justify-content-center text-center mt-5">
                              <div class="col-10">
                                <!-- Switch between grant status -->
                                <?php
                                  switch($dispute){
                                    case 0: // Denied 
                                      echo '
                                        '.form_open().'
                                          <h5 class="mb-5" style="color: #265857;"><span style="color: #ffa639;" class="y">-</span> Dispute Denied Grant<span style="color: #ffa639;" class="y">-</span></h5>
                                          <textarea placeholder="If You Want to Dispute this Decision, State Y&our Case Here.." name="decision_dispute" class="form-control"></textarea>
                                          <button class="mt-5 btn btn-primary mt-3">Dispute</button>
                                        '.form_close().'
                                      ';
                                    break;
                                    case 1: // Approved 
                                      echo '
                                        '.form_open().'
                                          <h5 class="mb-5" style="color: #265857;"><span style="color: #ffa639;" class="y">-</span> Any Further Questions? <span style="color: #ffa639;" class="y">-</span></h5>
                                          <textarea placeholder="If You Have any Questions or Comments on this Decision, Write Them Here.." name="questions_or_comments" class="form-control"></textarea>
                                          <button class="mt-5 btn btn-primary mt-3">Send Message</button>
                                        '.form_close().'
                                      ';
                                    break;
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
            </div>
        </div>
      </div>
    </div>
  </div>
</body>