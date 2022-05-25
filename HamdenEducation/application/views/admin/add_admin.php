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
</style>

<body>  
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
           <div class="container shadow-lg p-5 mt-5 bg-white rounded">
              <h1 class="mt-3 text-center mb-3">Add an Admin Role</h1> 
              <?php 
                if(isset($err)){
                  echo $err;
                }
                echo form_open();
              ?>
              <div class="row justify-content-center mt-4">
                <div class="col-lg-3 col-sm-12 mt-5">
                  <label class="font-weight-bold form-label">Type of Admin:</label>
                    <select name="privilege" class="form-control">
                        <option value="1">Main Admin</option>
                        <option value="2">Standard Admin</option>
                        <option value="3">Grant Reviewer</option>

                    </select>
                  <small class="text-danger font-weight-bold"><?php echo form_error('privilege');?></small>
                </div>

                <div class="col-lg-3 col-sm-12 mt-5">
                  <label class="font-weight-bold form-label">Board Position</label>
                    <select name="board_position" class="form-control">
                        <option value="President">President</option>
                        <option value="Vice President">Vice President</option>
                        <option value="Secretary">Secretary</option>
                        <option value="Treasurer">Treasurer</option>
                        <option value="Board Member">Board Member</option>
                    </select>
                  <small class="text-danger font-weight-bold"><?php echo form_error('board_position');?></small>
                </div>
              </div>
              
              <div class="row justify-content-center mt-4">
                <div class="col-lg-3 col-sm-12 mt-5">
                  <label class="font-weight-bold form-label">First Name of Admin:</label>
                  <input type="text" placeholder="First Name" name="first_name" class="form-control">
                  <small class="text-danger font-weight-bold"><?php echo form_error('first_name');?></small>
                </div>
                
                <div class="col-lg-3 col-sm-12 mt-5">
                  <label class="font-weight-bold form-label">Last Name of Admin:</label>
                  <input type="text" placeholder="Last Name" name="last_name" class="form-control">
                  <small class="text-danger font-weight-bold"><?php echo form_error('last_name');?></small>
                </div>

                <div class="col-lg-3 col-sm-12 mt-5">
                  <label class="font-weight-bold form-label">Admin Email:</label>
                  <input type="text" placeholder="Email" name="email" class="form-control">
                  <small class="text-danger font-weight-bold"><?php echo form_error('email');?></small>
                </div>
              </div>


              <div class="row justify-content-center mt-5">
                <div class="col-6 text-center">
                  <button class="btn btn-lg" type="submit">Add Admin</button>
                </div>
              </div>
            <?php echo form_close();?>
           </div>
        </section>
      </div>
  