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
            <h1 class="col">User Information</h1>
          </div>
          <div class="row mt-5">
            <div class="col">
              <div class="card">
                <div class="card-wrap">
                  <div class="row justify-content-center">
                    <?php 
                      foreach($student['data'] as $row){
                        echo '
                          <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                            <div style="background-color: #f6f6f6; box-shadow: 1px 8px 20px grey;" class="team-item">
                              <div class="overflow-hidden text-center">
                                <img class="mt-5 img-fluid" style="height: 400px;" src="'.base_url().$row->profile_pic.'" alt="No Profile Picure">
                              </div>
                              <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                <div stlye="background-color: #fff;" class="d-flex justify-content-center pt-2 px-1">
                                  <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href="'.$row->facebook.'"><i class="fab fa-facebook-f"></i></a>
                                  <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href="'.$row->twitter.'"><i class="fab fa-twitter"></i></a>
                                  <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href="'.$row->linkedin.'"><i class="fab fa-linkedin"></i></a>
                                </div>
                              </div>

                              <div class="row mt-3 justify-content-center">
                                <div class="col-10 text-center">
                                  <h5 style="background-color: #265857; color: #fff;" class="p-2">User Id</h5>
                                  <p>'.$row->user_id.'</p>
                                </div>
                              </div>  

                              <div class="row mt-3 justify-content-center">
                                <div class="col-5 text-center">
                                  <h5 style="background-color: #265857; color: #fff;" class="p-2">Full Name</h5>
                                  <p>'.$row->first_name.' '.$row->last_name.'</p>
                                </div>

                                <div class="col-5 text-center">
                                  <h5 style="background-color: #265857; color: #fff;" class="p-2">Email</h5>
                                  <p><a href="mailto:'.$row->email.'">'.$row->email.'</a></p>
                                </div>                                      
                              </div>

                              <div class="row mt-3 justify-content-center">
                                <div class="col-5 text-center">
                                  <h5 style="background-color: #265857; color: #fff;" class="p-2">Account Type</h5>
                                  <p>'.$row->account_type.'</p>
                                </div>
                                <div class="col-5 text-center">
                                  <h5 style="background-color: #265857; color: #fff;" class="p-2">Current School Name</h5>
                                  <p>'.$row->school_name.'</p>
                                </div>
                              </div>

                              <div class="row mt-3 justify-content-center">
                                <div class="col-10 mb-5 text-center">
                                  <h5 style="background-color: #265857; color: #fff;" class="p-2">Bio</h5>
                                  <p>'.$row->bio.'</p>
                                </div>
                              </div> 
                            </div>
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