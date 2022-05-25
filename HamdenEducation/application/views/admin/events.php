<style>
  h1{
    color: #265857;
  }
</style>

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="row text-center mt-5 mb-3">
                    <h1 class="col">All Created Events</h1>
                </div>
                <div class="row justify-content-center mt-5 mb-5">
                <!--Event Counter-->
                <div class="col-lg-3 col-sm-12">
                    <div style="box-shadow: 1px 8px 20px grey;" class="card card-statistic-2">
                        <div class="card-icon shadow-primary" style="box-shadow: 1px 8px 20px grey; background-color: #265857">
                            <i class="far fa-calendar"></i>                        
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Number of Events</h4>
                            </div>
                            <div class="card-body">
                                <?php echo count($events['data']);?>
                            </div>
                        </div>
                    </div>
                </div> 
                <!--End-->
                </div>

                <div class="container shadow-lg p-3 bg-white rounded">
                    <?php 
                        echo $this->session->flashdata('success');
                        echo $this->session->flashdata('delete_err');
                    ?>
                    <div class="responsive">
                        <table id="datatables" class="display table">
                            <thead style="background-color: #265857;">
                                <tr>
                                    <th class="text-white">Event Title</th>
                                    <th class="text-white">Event Date</th>
                                    <th class="text-white">Event Time</th>
                                    <th class="text-white">Event Location</th>
                                    <th class="text-white">Event ID</th>
                                    <th class="text-white">Edit Event</th>
                                    <th class="text-white">Delete Event</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                <?php 
                                    foreach($events['data'] as $row){
                                        echo '
                                            <tr>
                                                <td>'.$row->event_title.'</td>
                                                <td>'.$row->event_date.'</td>
                                                <td>'.$row->event_time.'</td>
                                                <td>'.$row->event_location.'</td>
                                                <td>'.$row->event_id.'</td>
                                                <!--<td><img style="max-width: 100px; max-height: 100px;" src="'.base_url().$row->event_picture.'"></td>-->
                                                <td><a href="event_details/'.$row->event_id.'" class="btn btn-primary">edit <i class="fas fa-pencil-alt"></i></a></td>
                                               <td><a data-toggle="tooltip" data-placement="bottom" title="if you click delete, all users registered with this event will be removed" href="del_event/'.$row->event_id.' " class="btn btn-danger">delete <i class="fa fa-trash"></i></a></td> 
                                            </tr>
                                        ';
                                    }
                                    if(empty($events['data'])){
                                        echo '<p class="text-primary font-weight-normal"><i class="fa fa-exclamation-circle"></i> you currently have no events, to create one click on the "forms" tab in the sidebar, then on "Create an Event"</p>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
</body>

    