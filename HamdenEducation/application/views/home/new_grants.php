
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Grant Recipients</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    
    <!-- Main Events -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center px-3">Past Grant Recipients</h6>
                <h1 class="mb-5">Our Recipients</h1>
            </div>

            <!-- about grants -->
            <div class="row g-4 mt-5 mb-5">
                <div class="col wow fadeInUp" data-wow-delay="0.3s">
                    <div style="box-shadow: 1px 8px 20px grey;" class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fas fa-3x fa-medal mb-2"></i> 
                            <h5 class="mb-3">About the Grants</h5>  
                            <p>Since 2001, HEF has awarded 189 Innovation Grants totaling $116,500, supporting teacher-driven initiatives in technology, engineering, mathematics, reading, foreign languages, creative arts, social development and parental engagement.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End -->

            <!-- Grant Year Wheele -->
            <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="container">
                    <div class="text-center">
                        <h6 class="section-title bg-white text-center px-3 mb-2">All Past Grant Recipients</h6>
                    </div>
                    
                    <div class="owl-carousel testimonial-carousel position-relative">
                        <?php 
                            foreach($grantRec['data'] as $row){
                                echo '
                                    <div class="testimonial-item text-center">
                                        <img class="img-fluid" style="width: 100%;" src="'.base_url().$row->recipients_picture.'" alt="recipients Image">

                                        <div class="row mt-3 justify-content-center">
                                            <div class="col-10">
                                                <h5 style="background-color: #265857; color: #fff;" class=" p-2 mt-3">Awarded Year</h5>
                                                <p>'.$row->recipients_year.'</p>
                                            </div>
                                        </div>

                                        <div class="row mt-3 justify-content-center">
                                            <div class="col-5">
                                                <h5 style="background-color: #265857; color: #fff;" class=" p-2 mt-3">First Name</h5>
                                                <p>'.$row->recipients_first_name.'</p>
                                            </div>

                                            <div class="col-5">
                                                <h5 style="background-color: #265857; color: #fff;" class="p-2 mt-3">Last Name</h5>
                                                <p>'.$row->recipients_last_name.'</p>
                                            </div>
                                        </div>

                                        <div class="row mt-3 justify-content-center">
                                            <div class="col-10">
                                                <h5 style="background-color: #265857; color: #fff;" class="p-2">School</h5>
                                                <p>'.$row->recipients_school.'</p>
                                            </div>
                                        </div>

                                        <div class="row mt-3 justify-content-center">
                                            <div class="col-10">
                                                <h5 style="background-color: #265857; color: #fff;" class="p-2">Grant Title</h5>
                                                <p>'.$row->recipients_title.'</p>
                                            </div>
                                        </div>

                                        <div class="row mt-3 justify-content-center">
                                            <div class="col-10">
                                                <h5 style="background-color: #265857; color: #fff;" class="p-2">Grant Description</h5>
                                                <p>'.$row->recipients_description.'</p>
                                            </div>
                                        </div>
                                    </div>
                                ';
                            }
                            if(empty($grantRec['data'])){
                                echo '<h6 class="text-center text-secondary" style="font-weight: 800;">There are currently no grant recipients at this time</h6>';
                            }
                        ?>
                    </div> 
                </div>
            </div>
            <!-- End -->
        </div>
    </div>
    <!-- End -->
