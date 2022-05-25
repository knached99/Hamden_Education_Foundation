<style>
  a:hover{
    text-decoration: none;
    color: #265857;
  }
  h5, h1{
    color: #265857;
  }
  .events{
    box-shadow: 1px 8px 20px grey;
  }
  .events:hover{
    box-shadow: 1px 8px 20px #265857;
  }
</style>
<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div style="background-color: #265857"></div>
        <!-- Main Content -->
        <div class="main-content">
          <div class="row mt-5 justify-content-center">
            <div class="col-12 text-center">
              <h1>Welcome <?php echo $this->session->first_name;?></h1>
              <p>
                Below You would find our upcoming 3 events, to view more click over on View Events on the left hand sidebar. 
              </p>
            </div>
          </div>
            <div class="row justify-content-center mt-5">
              <div class="col-12">
                <?php echo $this->session->flashdata('acknowledged');?>
              </div>
              <div class="col-12">
                <h1 class="text-center" style="color: #265857; font-weight: 700;">Upcoming Events</h1>
                <?php if(empty($recent_events['data'])){ echo '<h6 class="text-danger text-center font-weight-bold m-5">There are no upcoming events at this time <i class="fa fa-exclamation-circle fa-lg"></i></h6>';}?>
              </div>
            </div>
            <div class="row justify-content-center mt-5">
              <div class="col">
                <div class="card">
                  <div class="card-wrap">
                    <div class="row justify-content-center p-4 text-center">
                      <?php 
                        foreach($recent_events['data'] as $row){ echo '
                          <div style="height: 100%;" class="col-lg-6 col-sm-10">
                            <a href="event_details/'.$row->event_id.'">
                              <div class="events card">
                                <img class="card-img-top" style="height: 350px; width: 100%; max-width: 100%; max-height: 500px" src="'.base_url().$row->event_picture.'" alt="Card image cap">
                                <div class="card-body">
                                  <h5 class="font-weight-bold card-title">'.$row->event_title.' | '.date('F jS, Y', strtotime($row->event_date)).' </h5>
                                  <p class="card-text">click to view event details</p>
                                </div>
                              </div>
                            </a>
                          </div>
                        ';}
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
<body>
    