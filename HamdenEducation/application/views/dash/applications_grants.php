<style>
  button{
    background-color: #265857;
    color: #fff;
  }

  .yellow{
    color: #ffa639;
  }

  h1{
    color: #265857;
  }

  .form-label{
    color: #265857;
  }
</style>
<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">    
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">       
          <div class="section-body">
            <div class="row mt-sm-4"> 
                <div class="col">
                    <div style="box-shadow: 1px 8px 20px grey;" class="card">
                        <?php echo form_open();?>
                            <div class="card-header row justify-content-center text-center">
                                <div class="col-12 text-center">
                                    <h1 class="mt-5" style="color: #265857; font-weight: 700;">Apply for a Grant</h1>       
                                </div>

                                <div class="col-12 mt-3">
                                    <?php 
                                        if(isset($error)){
                                            echo $error;
                                        }
                                        else if(isset($success)){
                                            echo $success;
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">                               
                                    <div class="form-group col-lg-6 col-sm-12">
                                        <label style="color: #265857;" class="font-weight-bold form-label">First Name</label>
                                        <input type="text" name="first_name" readonly class="form-control" value="<?php echo $this->session->first_name;?>">      
                                    </div>
                                    <div class="form-group col-lg-6 col-sm-12">
                                        <label style="color: #265857;" class="font-weight-bold form-label">Last Name</label>
                                        <input type="text" name="last_name" readonly class="form-control" value="<?php echo $this->session->last_name;?>">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-6 col-sm-12">
                                        <label style="color: #265857;" class="font-weight-bold form-label">School</label>
                                        <input type="text" name="school_name" readonly class="form-control" value="<?php echo $this->session->school_name;?>">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-6 col-sm-12">
                                        <label style="color: #265857;" class="font-weight-bold form-label">Grant Title</label>
                                        <input type="text" name="grant_title" class="form-control">     
                                        <small class="text-danger"><?php echo form_error('grant_title');?></small>
                                    </div>
                                    <div class="form-group col-lg-6 col-sm-12">
                                        <label style="color: #265857;" class="font-weight-bold form-label">Amount of Funding Requested</label>
                                        <input type="text" name="grant_amount" class="form-control" placeholder="enter amount as a decimaled number (ex: 0.00)">
                                        <small class="text-danger"><?php echo form_error('grant_amount');?></small>
                                    </div>
                                </div>
                      
                                <div class="row justify-content-center">
                                    <h4 class="mt-5 mb-5" style="color: #265857; font-weight: 700;">Grant Proposal</h4>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="form-group col-lg-9 col-sm-12">
                                        <label style="color: #265857;" class="font-weight-bold form-label">Please describe the Board of Education goal(s) that this project addresses and describe the purpose of the project, including materials needed. </label>
                                        <textarea name="grant_reason" class="form-control summernote-simple" placeholder="Briefly describe.."></textarea>
                                        <small class="text-danger"><?php echo form_error('grant_reason');?></small>
                                    </div>

                                    <div class="form-group col-lg-9 col-sm-12">
                                        <label style="color: #265857;" class="font-weight-bold form-label">Specify the duration of the proposed project. </label>
                                        <input name="grant_duration" class="form-control" placeholder="the number you put is the number of hours (ex: 24 ~ 24 hours)">
                                        <small class="text-danger"><?php echo form_error('grant_duration');?></small>
                                    </div>

                                    <div class="form-group col-lg-9 col-sm-12">
                                        <label style="color: #265857;" class="font-weight-bold form-label">What will be the impact and expectation(s) for improved student learning?</label>
                                        <textarea name="grant_impact" class="form-control summernote-simple" placeholder="Briefly describe.."></textarea>
                                        <small class="text-danger"><?php echo form_error('grant_impact');?></small>
                                    </div>

                                    <div class="form-group col-lg-9 col-sm-12">
                                        <label style="color: #265857;" class="font-weight-bold form-label">Please include a budget as to how the funds will be spent (do not include funds for food or personal compensation). </label>
                                        <textarea name="budget_description" class="form-control summernote-simple" placeholder="Tell us about yourself.."></textarea>
                                        <small class="text-danger"><?php echo form_error('budget_description');?></small>
                                    </div>

                                    <div class="form-group col-lg-9 col-sm-12">
                                        <label style="color: #265857;" class="font-weight-bold form-label">Please use the area below to enter any additional information.</label>
                                        <textarea name="extra_info" class="form-control summernote-simple" placeholder="Tell us about yourself.."></textarea>
                                        <small class="text-danger"><?php echo form_error('extra_info');?></small>
                                    </div>
                                </div>                
                            </div>
                    
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Submit Application</button>
                            </div>
                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</body>
    