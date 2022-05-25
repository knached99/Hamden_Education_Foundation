<style>
  h1{
    color: #265857;
  }
  .y{
    border-bottom: #ffa639;
  }
  .form-label{
    color: #265857;
  }

        /* The message box is shown when the user clicks on the password field */
        #msg {
            display: none;
            background: #fff;
            color: #000;
            position: relative;
            padding: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        #msg p {
            padding: 10px 35px;
            font-size: 14px;
            background-color: white;
        }

        /* Add a green text color and a checkmark when the requirements are right */
        .valid {
            color: #5cb85c;
        }

        .valid:before {
            position: relative;
            left: -35px;
            content: "✅";

        }

        /* Add a red text color and an "x" when the requirements are wrong */
        .invalid {
            color: #e96060;
        }

        .invalid:before {
            position: relative;
            left: -35px;
            content: "❌";
        }
        .container{
          box-shadow: 1px 8px 20px grey;
        }
</style>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div style="background-color: #265857"></div>
        <!-- Main Content -->
        <div class="main-content">
          <div class="row text-center mt-5 mb-5">
            <h1 class="col">Password Manager</h1> 
          </div>
        
          <div class="container justify-content-center p-3 bg-white rounded">
            <?php
             echo $this->session->flashdata('errs');
             echo $this->session->flashdata('not_curr_pwd');
             echo $this->session->flashdata('update_failed');
             echo $this->session->flashdata('update_success');
            ?>
            <?php echo form_open('../index.php/Dash/update_pwd');?>

        
            <div class="row justify-content-center mt-5">
              <div class="col-6">
                <label class="font-weight-bold form-label">Enter Current Password</label>
                <input id="curr_pwd" type="password" class="form-control" name="curr_pwd" placeholder="Enter your current password">
                <small class="text-danger fw-bold"><?php echo form_error('curr_pwd');?></small> 
              </div>
            </div>

            <div class="row justify-content-center mt-5">
              <div class="col-6">
                <label class="font-weight-bold form-label">Enter New Passowrd</label>
                <input type="password" id="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" name="pwd" placeholder="Create your new password">
                <small class="text-danger fw-bold"><?php echo form_error('pwd');?></small> 
              </div>
            </div>

            <div class="row justify-content-center mt-4">
              <div class="col-4">
                <div id="msg">
                  <h6 class="fw-normal">Your password must contain the following:</h6>
                  <hr style="background-color: #4650dd !important">
                  <p id="letter" class="fw-normal invalid">A <b>lowercase</b> letter</p>
                  <p id="capital" class="fw-normal invalid">A <b>capital (uppercase)</b> letter</p>
                  <p id="number" class="fw-normal  invalid">A <b>number</b></p>
                  <p id="length" class="fw-normal  invalid">Minimum <b>8 characters</b></p>
                  <p id="special" class="fw-normal  invalid">special character like <b>?</b> or <b>!</b></p>
                </div>
              </div>
            </div>

            <div class="row justify-content-center mt-5">
              <div class="col-6">
                <label class="font-weight-bold form-label">Re-type New Passowrd</label>
                <input type="password" id="confirm_pwd" class="form-control" name="confirm_pwd" placeholder="Retype your new password">
                <small class="text-danger fw-bold"><?php echo form_error('confirm_pwd');?></small> 
              </div> 
            </div>

            <div class="row justify-content-center mt-5">
              <div class="col-6 text-center">
                <input type="checkbox" onclick="showpwd()"> <b class="fw-normal text-primary" id="text">Show Password</b>
              </div>

              <div class="col-6 text-center">
                <button class="btn btn-primary">update password</button>
              </div>
            </div>
            <?php echo form_close();?>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</body>
    