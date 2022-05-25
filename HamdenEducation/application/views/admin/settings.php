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

  .form-control .box{
    height: 200px;
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
      <!-- Main Content -->
      <div class="main-content">
        <div class="row text-center mt-5 mb-5">
          <h1 class="col">Password Manager</h1> 
        </div>
        <section class="section">
           <div class="container shadow-lg p-5 mt-5 bg-white rounded">
              <?php echo form_open_multipart();?>
              <?php 
               if(isset($not_curr_pwd)){
                 echo $not_curr_pwd;
               }
              ?>
              <div class="row justify-content-center mt-3">
                <div class="col-6">
                  <label class="font-weight-bold form-label">Enter your current password</label>
                  <input type="password" id="curr_pwd" placeholder="Enter your current password" name="curr_pwd" class="form-control">
                  <small class="text-danger font-weight-bold"><?php echo form_error('curr_pwd');?></small>
                </div>
              </div>

              <div class="row justify-content-center mt-3">
                <div class="col-6">
                  <label class="font-weight-bold form-label">Create a new password</label>
                  <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="pwd" placeholder="Enter your new password" name="pwd" class="form-control">
                  <small class="text-danger font-weight-bold"><?php echo form_error('pwd');?></small>
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

              <div class="row justify-content-center mt-3">
                <div class="col-6">
                  <label class="font-weight-bold form-label">Retype your new password</label>
                  <input type="password" id="confirm_pwd" placeholder="Retype your new password" name="retype_pwd" class="form-control">
                  <small class="text-danger font-weight-bold"><?php echo form_error('retype_pwd');?></small>
                </div>
              </div>

              <div class="row justify-content-center mt-5">
                <div class="col-6 text-center">
                  <input type="checkbox" onclick="showpwd()"> <b class="fw-normal text-primary" id="text">Show Password</b>
                </div>
                <div class="col-6 text-center">
                  <button class="btn btn-primary">Update Password</button>
                </div>
              </div>
   
            <?php echo form_close();?>
           </div>
        </section>
      </div>
  