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
                <h1 class="col-12 g">Send Mass Email</h1> 
            </div>
            <div class="container shadow-lg p-5 mt-5 bg-white rounded">
            <?php 
                if(isset($email_sent)){
                    echo $email_sent;
                }
                else if(isset($email_not_sent)){
                    echo $email_not_sent;
                }
                ?>
                <?php echo form_open();?>
                    <div class="row justify-content-center p-4">
                        <div class="col-10 text-center">
                            <h5 class="g">Email all your users</h5>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-12">
                            <label class="font-weight-bold form-label">Subject</label>
                        </div>
                        <div class="col-12">
                            <input style="width: 100%; height: 40px;" name="subject" type="text" placeholder="Enter subject">
                        </div>
                    </div>
                    <div class="row justify-content-center mt-4">

                        <div class="col-12">
                            <label class="font-weight-bold form-label">Who is this email going to?</label>
                            <select name="user_type" class="form-control">
                                <option disabled selected>Choose who gets to see your email</option>
                                <option value="students">Students</option>
                                <option value="teachers">Teachers</option>
                                <option value="guests">Guests</option>
                                <option value="admins">All of The HEF Board</option>
                            </select>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-4">
                        <div class="col-12">
                            <label class="font-weight-bold form-label">Email Content</label>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control summernote-simple" name="msg" placeholder="Type your message..."></textarea>                    
                        </div>                                   
                    </div>

                    <div class="row justify-content-center mt-4">
                        <button class="btn btn-lg btn-primary" type="submit">Send Email</button>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>