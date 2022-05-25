
<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
    
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Profile</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Hi, <?php echo $this->session->first_name;?>!</h2>
            <p class="section-lead">
              Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
              <div class="col-12">
                <div style="color: #265857; box-shadow: 1px 8px 20px grey;"class="card profile-widget">
                  <div class="profile-widget-header">
                      <?php 
                      echo $this->session->flashdata('err_msg');
                      echo $this->session->flashdata('success_msg');
                      ?>
                      <a href="#" data-toggle="modal" data-target="#exampleModal">                     
                        <img alt="image" src="<?php if(!isset($this->session->profile_pic)){ echo base_url().'dash_styling/dist/assets/img/avatar/avatar-1.png';} else{ echo base_url().$this->session->profile_pic;}?>" class="rounded-circle profile-widget-picture">
                      </a>
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                      </div>
                     
                  </div>
                  <div class="profile-widget-description">
                    <div class="profile-widget-name m-3"><?php echo $this->session->first_name. ' ' .$this->session->last_name;?> <div class="text-muted d-inline font-weight-normal"><div class="slash"></div><?php echo $this->session->school_name; ?></div></div>
                  </div>
                  
                </div>
              </div>
              <!--<div class="col-12 col-md-12 col-lg-7">--> 
                  <div class="col">
                <div style="box-shadow: 1px 8px 20px grey;" class="card">
             
                  <?php echo form_open('../index.php/Dash/update_profile');?>
                    <div class="card-header">
                      <h4>Edit Profile</h4>
                      <?php 
                        echo $this->session->flashdata('validation_errs');
                        echo $this->session->flashdata('update_err');
                        echo $this->session->flashdata('update_success');
                      ?>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-lg-6 col-sm-12">
                            <label>First Name</label>
                            <input type="text" readonly class="form-control" value="<?php echo $this->session->first_name;?>">
                          </div>

                          <div class="form-group col-lg-6 col-sm-12">
                            <label>Last Name</label>
                            <input type="text" readonly class="form-control" value="<?php echo $this->session->last_name;?>">
                          </div>
                        </div>

                        <div class="row">
                          <!--div class="form-group col-lg-4 col-sm-12">
                            <label>School Email</label>
                            <input readonly type="text" name="school_email" class="form-control" value="<?php echo $this->session->school_email;?>" >
                          </div>-->
                          
                          <div class="form-group col-lg-6 col-sm-12">
                            <label>School</label>
                            <input type="text" readonly class="form-control" value="<?php echo $this->session->school_name;?>">
                          </div>

                          <div class="form-group col-lg-6 col-sm-12">
                            <label>Login Email</label>
                            <input name="email" readonly type="text" class="form-control" value="<?php echo $this->session->email;?>">
                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-4 col-sm-12 mt-4 text-center">
                            <a style="background-color: #265857; color: #fff;" class="btn btn-sm-square mx-1" href="<?php echo $this->session->twitter;?>"><i style="font-size: 20px;" class="p-2 fab fa-twitter"></i></a>
                            <input name="twitter" type="text" class="mt-3 form-control" placeholder="Enter Your Twitter Link" value="<?php echo $this->session->twitter;?>">
                          </div>
                          <div class="col-lg-4 col-sm-12 mt-4 text-center">
                            <a style="background-color: #265857; color: #fff;" class="btn btn-sm-square mx-1"  href="<?php echo $this->session->facebook;?>"><i style="font-size: 20px;" class="p-2 fab fa-facebook-f"></i></a>
                            <input name="facebook" type="text" class="mt-3 form-control" placeholder="Enter Your Facebook Link" value="<?php echo $this->session->facebook;?>">
                          </div>
                          <div class="col-lg-4 col-sm-12 mt-4 text-center">
                            <a style="background-color: #265857; color: #fff;" class="btn btn-sm-square mx-1"  href="<?php echo $this->session->linkedin;?>"><i style="font-size: 20px;" class="p-2 fab fa-linkedin-in"></i></a>
                            <input name="linkedin" type="text" class="mt-3 form-control" placeholder="Enter Your Linkedin Link" value="<?php echo $this->session->linkedin;?>">
                          </div>
                        </div>
                      
                        <div class="row mt-5">
                          <div class="form-group col-12">
                            <label>Bio</label>
                            <textarea name="bio" class="form-control summernote-simple" placeholder="Tell us about yourself.."><?php echo $this->session->bio;?></textarea>
                          </div>
                        </div>
                   
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
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
    