<style>
  h1, h5{
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
            <h1 class="col">Event Details</h1>
          </div>
          <div class="row mt-5">
            <div class="col">
              <div class="card">
                <div class="card-wrap">
                  <div class="row justify-content-center">
                    <?php 
                    echo $this->session->flashdata('errors');
                    echo $this->session->flashdata('edit_success');
                    echo $this->session->flashdata('edit_failed');
                    echo $this->session->flashdata('pic_upload_err');
                    ?>
                    <?php 
                      foreach($event_details['data'] as $row){
                        echo '
                        '.form_open_multipart('../index.php/Admin/Dash/edit_event/'.$row->event_id.'').'
                       
                          <div class="col-12">
                            <div class="card" style="box-shadow: 1px 8px 20px grey;">
                              <div class="card-body">
                                <div class=" row justify-content-center mt-4 text-center card-title">
                                  <div class="col-md-6 col-sm-12 mt-3 mb-3"> 
                                    <h5 class="font-weight-bold card-title">Event Title</h5>
                                    <input class="form-control" name="event_title" placeholder="Event Title.." value="'.$row->event_title.'">
                                  </div>
                                </div>

                                <div class="row justify-content-center text-center card-title mt-4">
                                  <div class="col-md-6 col-sm-12 mt-3 mb-3"> 
                                    <h5 class="font-weight-bold card-title">Event Location</h5>
                                    <input class="form-control" name="event_location" placeholder="Event Location.." value="'.$row->event_location.'">
                                  </div>                    
                                </div>

                                <div class="row justify-content-center text-center mt-4">                            
                                    <img class="card-img-top" style="height: 550px; width: 70%;  box-shadow: 1px 8px 20px grey;" src="'.base_url().$row->event_picture.'" alt="Card image cap">                                  
                                </div>

                                <div class="row text-center justify-content-center mt-4">
                                  <div class="col-10">
                                    <p class="text-primary font-weight-bold mt-3 ml-3"><i class="fa fa-exclamation-circle fa-lg"></i> Please note, you must upload an image every time you want to update anything for this event </p>                                  
                                    <input class="form-control mt-2" type="file" name="event_picture" placeholder="Edit">
                                  </div>
                                </div>

                                <div class="row justify-content-center text-center mt-5">
                                  <div class="col-lg-4 col-sm-12">
                                    <h5 class="font-weight-bold card-title">Event Date:</h5>
                                    <input type="text" readonly placeholder="click to choose date" id="date" name="event_date" class="form-control" value="'.$row->event_date.'">
                                  </div>
                                  <div class="text-center col-lg-4 col-sm-12">
                                    <h5 class="font-weight-bold card-title">Event Time:</h5>
                                    <select class="form-control" name="event_time" id="event_time">
                                    <option>'.$row->event_time.'</option>
                                    </select>
                                  </div>
                                </div>

                                <div class="row justify-content-center mt-5">
                                  <div class="text-center col-12">
                                    <h5 class="font-weight-bold card-title"> Event Description</h5>
                                  </div>
                                  <div style=" min-weight: 200px;" class=" mt-4 col-10">
                                    <textarea class="form-control summernote-simple" name="event_description" placeholder="Provide a brief description of this event..">'.$row->event_description.'</textarea>
                                  </div>
                                </div>
                              </div>
                              <div class="row text-center mb-5 justify-content-center mt-5">
                                <div class="col-4">
                                  <a href="../events" class="btn btn-dark btn-lg mr-3"><i class="fas fa-arrow-alt-circle-left"></i> back</a>
                                </div>
                                <div class="col-4">
                                  <button type="submit" class="btn btn-primary">Edit Event</button>
                                </div>
                              </div>
                            </div>
                          </div
                          '.form_close().'
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
