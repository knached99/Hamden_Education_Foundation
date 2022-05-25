<?php 
foreach($grants['data'] as $row){
    $grant_title = $row->grant_title;
    $grant_amount = $row->grant_amount;
    $first_name = $row->first_name;
    $last_name = $row->last_name;
    $school = $row->school_name;
    $reviewer_email = $row->reviewer_email;
}
?>
<style>
  button{
    background-color: #265857;
    color: #fff;
  }

  .yellow{
    color: #ffa639;
  }

  .g{
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
            <div class="row text-center mt-5 mb-5">
                <h1 class="col-12 g"></h1> 
            </div>
            <div class="container shadow-lg p-5 mt-5 bg-white rounded">
                <?php echo form_open();?>
                    <div class="row justify-content-center p-4">
                        <div class="col-10 text-center">
                            <h1 class="g">Send Grant Submission to a Reviewer</h1>
                            <?php if(isset($email_sent)){echo $email_sent;}
                            else if(isset($email_not_sent)){echo $email_not_sent;}
                            ?>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-4">
                        <div class="col-lg-4 col-sm-12 text-center">
                            <h5 class="g mb-3">Rquesting School</h5>
                            <p> <?php echo $school; ?></p>
                        </div>

                        <div class="col-lg-4 col-sm-12 text-center">
                            <h5 class="g mb-3">Teachers Full Name </h5>
                            <p><?php echo $first_name;?> <?php echo $last_name;?></p>
                        </div>

                        <div class="col-lg-4 col-sm-12 text-center">
                            <h5 class="g mb-3">Grant Title</h5>
                            <p><?php echo $grant_title;?></p>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-4">
                        <div class="col-lg-4 col-sm-12 text-center">
                            <h5 class="g mb-3">Grant Amount</h5>
                            <p>$ <?php echo $grant_amount; ?></p>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-4">
                        <div class="col-12">
                            <label class="font-weight-bold form-label">Who are you Emailing this Grant Submission to?</label>
                            <select name="reviewer_email" class="form-control">
                                <option disabled selected>Choose Reviewer</option>
                                <?php 
                                    foreach($admins['data'] as $row){
                                        echo '<option>'.$row->email.'</option>';
                                    }
                                ?>
                            </select>
                            <small class="text-danger"><?php echo form_error('reviewer_email');?></small>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-4">
                        <div class="col-12">
                            <label class="font-weight-bold form-label">Email Content</label>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control summernote-simple" name="reviewer_email_content" placeholder="Type your message..."></textarea>   
                            <small class="text-danger"><?php echo form_error('reviewer_email_content');?></small>
                 
                        </div>                                   
                    </div>

                    <div class="row justify-content-center mt-4">
                        <button class="btn btn-lg btn-primary" type="submit">Send to Reviewer</button>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>