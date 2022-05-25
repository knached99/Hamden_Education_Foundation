<style>
  h1{
    color: #265857;
  }

  thead{
    background-color: #265857;
  }
</style>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          
          <!--Header-->
          <div class="row text-center mt-5">
            <h1 class="col">Active Administrators</h1>
          </div>

          <div class="row mt-5 justify-content-center">
            <div class="text-center col-12">
              <h1>Board Officers</h1>
            </div>
          </div>

          <div class="row g-4 justify-content-center">
            <?php 
              foreach($officers['data'] as $row){
                switch($this->session->privilege){
                  case 1:
                    $del = '
                      <a href="del_admin/'.$row->admin_id.' " class="btn btn-danger">delete <i class="fa fa-trash"></i></a>
                    ';
                  break;
                
                  case 2:
                  case 3:
                    $del = '
                    ';
                  break;
                }
                echo '
                  <div class="mt-5 col-lg-4 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div style="background-color: #f6f6f6; box-shadow: 1px 8px 20px grey;" class="team-item">
                      <div class="overflow-hidden">
                        <img class="img-fluid" src="'.base_url().$row->profile_pic.'" alt="No Profile Picure">
                      </div>
                      <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div stlye="background-color: #fff;" class="d-flex justify-content-center pt-2 px-1">
                          <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href="'.$row->facebook.'"><i class="fab fa-facebook-f"></i></a>
                          <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href="'.$row->twitter.'"><i class="fab fa-twitter"></i></a>
                          <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href="'.$row->linkedin.'"><i class="fab fa-linkedin"></i></a>
                        </div>
                      </div>
                      <div class="text-center p-4">
                        <h5 style="color: #265857;" class="mb-0">'.$row->first_name.' '.$row->last_name.'</h5>
                        <small>'.$row->board_position.'</small>
                        <p class="card-text"><a href="mailto:'.$row->email.'">'.$row->email.'</a></p>
                        <a style="color: #fff;" href="'.base_url().'index.php/Admin/Dash/view_admin/'.$row->admin_id.'" class="btn btn-primary">View More Details</a>
                        '.$del.'
                      </div>
                    </div>
                  </div>                              
                ';
              }
              if(empty($officers['data'])){
                echo '<h6 class="text-center text-secondary" style="font-weight: 800;">There are currently no Board Officers at this time</h6>';
              }
            ?>
          </div>

          <div class="row mt-5 justify-content-center">
            <div class="text-center col-12">
              <h1>Board Members</h1>
            </div>
          </div>
          
          <div class="row g-4 justify-content-center">
            <?php 
              foreach($members['data'] as $row){
                switch($this->session->privilege){
                  case 1:
                    $del = '
                      <a href="del_admin/'.$row->admin_id.' " class="btn btn-danger">delete <i class="fa fa-trash"></i></a>
                    ';
                  break;
                
                  case 2:
                    $del = '
                    ';
                  break;
                }
                echo '
                  <div class="mt-5 col-lg-4 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div style="background-color: #f6f6f6; box-shadow: 1px 8px 20px grey;" class="team-item">
                      <div class="overflow-hidden">
                        <img class="img-fluid" src="'.base_url().$row->profile_pic.'" alt="No Profile Picure">
                      </div>
                      <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div stlye="background-color: #fff;" class="d-flex justify-content-center pt-2 px-1">
                          <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href="'.$row->facebook.'"><i class="fab fa-facebook-f"></i></a>
                          <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href="'.$row->twitter.'"><i class="fab fa-twitter"></i></a>
                          <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href="'.$row->linkedin.'"><i class="fab fa-linkedin"></i></a>
                        </div>
                      </div>
                      <div class="text-center p-4">
                        <h5 style="color: #265857;" class="mb-0">'.$row->first_name.' '.$row->last_name.'</h5>
                        <small>'.$row->board_position.'</small>
                        <p class="card-text"><a href="mailto:'.$row->email.'">'.$row->email.'</a></p>
                        <a style="color: #fff;" href="'.base_url().'index.php/Admin/Dash/view_admin/'.$row->admin_id.'" class="btn btn-primary">View More Details</a>
                        '.$del.'
                      </div>
                    </div>
                  </div>                              
                ';
              }
              if(empty($members['data'])){
                echo '<h6 class="text-center text-secondary" style="font-weight: 800;">There are currently no Board Members at this time</h6>';
              }
            ?>
          </div>
        </section>
      </div>
    </div>
  </div>

    