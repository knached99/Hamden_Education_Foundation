    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Events</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    

    <!-- Main Events -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center px-3">Events</h6>
                <h1 class="mb-5">Our Events</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <?php 
                    foreach($events['data'] as $row){
                        echo '
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div style="background-color: #f6f6f6; box-shadow: 1px 8px 20px grey;" class="course-item">
                                    <div class="position-relative overflow-hidden">
                                        <img class="img-fluid" style="height: 300px; width: 100%;" src="'.base_url().$row->event_picture.'" alt="Event Image">
                                    </div>
                                    <div class="text-center p-4 pb-0">
                                        <h5 style="color: #265857;" class="mb-4">'.$row->event_title.'</h5>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border py-2"><a style="color: #ffa639;" href="choose_login"><i class="fa fa-user-tie me-2"></i>Attend</a></small>
                                        <small class="flex-fill text-center border py-2"><i class="fa fa-clock me-2"></i>Date: '.$row->event_date.'</small>
                                    </div>
                                </div>
                            </div>';
                        }
                    if(empty($events['data'])){
                        echo '<h6 class="text-center text-secondary" style="font-weight: 800;">There are currently no events at this time</h6>';
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- Events End -->