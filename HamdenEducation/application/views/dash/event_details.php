<style>
  h1, h3{
    color: #265857;
  }
  .y{
    border-bottom: #ffa639;
  }
  .y2{
    color: #ffa639;
  }
</style>

<?php 
  foreach($event_details['data'] as $row){
    $event_id = $row->event_id;
    $location = $row->event_location;
    $event_date = $row->event_date;
    $event_time = $row->event_time;
    $description = $row->event_description;
    $event_title = $row->event_title;
    $event_picture = $row->event_picture;
  }
?>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div style="background-color: #265857"></div>
        <!-- Main Content -->
        <div class="main-content">
          <div class="row text-center mt-5">
            <h1 class="col">Event Details</h1>
          </div>
          <div class="row mt-5">
            <div class="col">
              <div class="card">
                <?php 
                  echo $this->session->flashdata('join_success');
                  echo $this->session->flashdata('unattended');
                  echo $this->session->flashdata('unnattend_fail');
                ?>
                <div class="card-wrap">
                  <div class="row">
                    <div class="col">
                      <div class="card" style="box-shadow: 1px 8px 20px grey;">
                        <div class="card-body">
                          <div class=" row justify-content-center mt-4 text-center card-title">
                            <div class="col-12 text-center">
                              <?php 
                                echo $this->session->flashdata('event_joined');
                                echo $this->session->flashdata('join_success');
                                if(isset($not_joined)){
                                  echo $not_joined;
                                }
                              ?>                          
                            </div>
                            
                            <div class="mt-5 mb-5 col-md-6 text-center col-sm-12">
                              <h1 class="font-weight-bold card-title" stlye=" color: #265857;">Event Title</h1>
                              <h5 class="y2 mt-2"> <?php echo $event_title;?></h5>
                            </div>

                            <div class="mt-5 mb-5 col-md-6 text-center col-sm-12">
                              <h1 class="font-weight-bold card-title" stlye=" color: #265857;">Event Location</h1>
                              <h5 class="y2 mt-2"> <?php echo $location;?></h5>
                            </div>
                            <img class="card-img-top" style="height: 550px; width: 70%;  box-shadow: 1px 8px 20px grey;" src="<?php echo base_url().$event_picture;?>" alt="Event Picture">
                          </div>

                          <div class="row justify-content-center mt-5">
                            <div class="text-center col-lg-6 col-sm-12">
                              <h5 style="color: #265857;"><span style="color: #ffa639;" class="y">-</span> Event Date <span style="color: #ffa639;" class="y">-</span></h5>
                              <?php echo $event_date;?>
                              <h5 class="y2 mt-2"></h5>
                            </div>

                            <div class="text-center col-lg-6 col-sm-12">
                              <h5 style="color: #265857;"><span style="color: #ffa639;" class="y">-</span> Event Time <span style="color: #ffa639;" class="y">-</span></h5>
                              <?php echo $event_time;?>
                              <h5 class="y2 mt-2"></h5>
                            </div>
                          </div>

                          <div class="row justify-content-center mt-5">
                            <div class="text-center col-12">
                              <h5 style="color: #265857;"><span style="color: #ffa639;" class="y">-</span> Event Description <span style="color: #ffa639;" class="y">-</span></h5>
                            </div>
                            <div style="background-color: #f6f6f6; min-height: 200px; box-shadow: 1px 8px 20px grey;" class="p-5 mt-4 col-10">
                              <p class="card-text"></p>
                              <?php echo $description;?>
                            </div>
                          </div>

                          <div class="row justify-content-center">
                            <!-- add join and unnattend event buttons here -->
                            <div class="col-sm-6 col-lg-4 text-center mt-5 mb-5">
                              <a href="../../../index.php/Dash/join_event/<?php echo $event_id;?>" class="btn btn-success">Join Event</a>
                            </div>
                            <div class="col-sm-6 col-lg-4 text-center mt-5 mb-5">
                              <a href="../../../index.php/Dash/unattend_event/<?php echo $event_id;?>" class="btn btn-danger">Unattend Event</a>
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
    