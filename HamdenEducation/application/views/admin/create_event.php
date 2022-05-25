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
              <h1 class="mt-3 text-center mb-3">Create an Event</h1> 
              <?php echo form_open_multipart();?>
              <?php 
                if(isset($success)){
                  echo $success;
                }
                else if(isset($error)){
                  echo $error;
                }
                else if(isset($file_upload_errors)){
                  echo $file_upload_errors;
                }
              ?>
              <div class="row mt-4">
                <div class="mt-4 col-lg-4 col-sm-12">
                  <label class="font-weight-bold form-label">What day will this event be hosted?</label>
                  <input type="text" readonly placeholder="click to choose date" id="date" name="event_date" class="form-control">
                  <small class="text-danger font-weight-bold"><?php echo form_error('event_date');?></small>
                </div>

                <div class="mt-4 col-lg-4 col-sm-12">
                  <label class="font-weight-bold form-label">What time will this event be hosted?</label>
                  <select  name="event_time" class="form-control" id="event_time">
                  </select>
                  <small class="text-danger font-weight-bold"><?php echo form_error('event_time');?></small>
                </div>

                <div class="mt-4 col-lg-4 col-sm-12">
                  <label class="font-weight-bold form-label">Event Picture</label>
                  <input class="form-control" type="file" name="event_picture">
                </div>
              </div>

              <div class="row mt-4">
                <div class="mt-4 col-lg-6 col-sm-12">
                  <label class="font-weight-bold form-label">Event Title</label>
                  <input class="form-control" type="text" name="event_title" placeholder="Event Title">
                  <small class="text-danger font-weight-bold"><?php echo form_error('event_title');?></small>
                </div>

                <div class="mt-4 col-lg-6 col-sm-12">
                  <label class="font-weight-bold form-label">Event Location</label>
                  <input class="form-control" type="text" name="event_location" placeholder="What's the location of this event?">
                  <small class="text-danger font-weight-bold"><?php echo form_error('event_location');?></small>
                </div>
              </div>

              <div class="row justify-content-center mt-4">
                <div class="mt-4 col-lg-12">
                  <label class="font-weight-bold form-label">Event Description</label>
                  <textarea class="form-control summernote-simple" name="event_description" placeholder="Provide a brief description of this event.."></textarea>
                  <small class="text-danger font-weight-bold"><?php echo form_error('event_description');?></small>
                </div>
              </div>

              <div class="row mt-4">
                <div class="col-lg-6">
                  <button class="btn btn-lg" type="submit">Upload Event</button>
                </div>
              </div>
            <?php echo form_close();?>
           </div>
        </section>
      </div>
  