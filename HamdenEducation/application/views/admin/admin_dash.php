<style>
  h1{
    color: #265857;
  }

  thead{
    background-color: #265857;
  }
  .l{
    box-shadow: 1px 8px 20px grey;
  }

  .l:hover{
    box-shadow: 1px 8px 20px #265857;
  }
</style>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          
          <!--Header-->
          <div class="row justfiy-content-center text-center">
            <div class="col-12">
              <?php echo $this->session->flashdata('replied');?>
            </div>
            <h1 class="col-12 mt-5">Accounts</h1>
          </div>

          <!--Counters-->
          <div class="row justify-content-center mt-3">
            <!--Teacher Counter-->
            <div data-toggle="modal" data-target="#teacher_modal" class="col-lg-3 col-sm-12">
              <div class="l card card-statistic-2">
                <div class="card-icon shadow-primary" style="box-shadow: 1px 8px 20px grey; background-color: #265857">
                  <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Teachers</h4>
                  </div>
                  <div class="card-body">
                    <?php echo count($teachers['data']);?>
                  </div>
                  
                </div>
                
              </div>
             
            </div> 
            <!--Student Counter-->

            <div data-toggle="modal" data-target="#student_modal" class="col-lg-3 col-sm-12">
              <div class="l card card-statistic-2">
                <div class="card-icon shadow-primary" style="box-shadow: 1px 8px 20px grey; background-color: #265857">
                  <i class="fas fa-user-graduate"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Students</h4>
                  </div>
                  <div class="card-body">
                    <?php echo count($students['data']);?>
                  </div>
                </div>
              </div>
            </div> 

            <!--Guests Counter-->

            <div data-toggle="modal" data-target="#guest_modal" class="col-lg-3 col-sm-12">
              <div class="l card card-statistic-2">
                <div class="card-icon shadow-primary" style="box-shadow: 1px 8px 20px grey; background-color: #265857">
                  <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Guests</h4>
                  </div>
                  <div class="card-body">
                    <?php echo count($guests['data']);?>
                  </div>
                </div>
              </div>
            </div> 
          </div>

          <!--Event attendees-->
          <div class="row justify-content-center mt-5">
            <div class="col-12 text-center">
              <h1>Users that Joined an Event</h1>
            </div>

            <div class="mt-5 container shadow-lg p-3 bg-white rounded">
              <div class="responsive">
                <table id="datatables" class="display table">
                  <thead style="background-color: #265857;">
                    <tr>
                      <th class="text-white">First Name</th>
                      <th class="text-white">Last Name</th>
                      <th class="text-white">Event ID</th>
                      <th class="text-white">Event Date</th>
                      <th class="text-white">Join Date</th>
                    </tr>
                  </thead>
                        
                  <tbody>
                    <?php 
                      foreach($attendees['data'] as $row){
                        echo '
                          <tr>
                            <td>'.$row->first_name.'</td>
                            <td>'.$row->last_name.'</td>
                            <td>'.$row->event_id.'</td>
                            <td>'.$row->event_date.'</td>
                            <td>'.$row->date_joined.'</td>
                          </tr>
                        ';
                      }
                      if(empty($attendees['data'])){
                        echo '<p class="text-center text-primary font-weight-normal"><i class="fa fa-exclamation-circle"></i> Currently have no Users that joined an Event!</p>';
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

    