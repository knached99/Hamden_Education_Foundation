
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Contact Us</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center px-3">Contact Us</h6>
                <h1 class="mb-5">Have any Questions?</h1>
                <?php 
                if(isset($send_failed)){
                    echo $send_failed;
                }
                else if(isset($send_success)){
                    echo $send_success;
                }
                ?>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.1s">
                    <h5>Get In Touch</h5>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px; background-color: #265857;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 style="color: #265857;" class="">Send a Check</h5>
                            <p class="mb-0">P.O. Box 185783 Hamden, CT 06518-5783</p>
                        </div>
                    </div>
                    <!--<div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px; background-color: #265857;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 style="color: #265857;"  class="">Mobile</h5>
                            <p class="mb-0">+012 345 67890</p>
                        </div>
                    </div>-->
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px; background-color: #265857;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 style="color: #265857;"  class="">Email</h5>
                            <p class="mb-0">info@hamdeneducationfoundation.org</p>
                        </div>
                    </div>
                </div>

                <!--<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <iframe class="position-relative rounded w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>-->
                <div class="col-lg-8 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <?php echo form_open();?>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                    <small class="text-danger fw-bold"><?php echo form_error('name');?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                    <small class="text-danger fw-bold"><?php echo form_error('email');?></small>

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <select name="subject" class="form-control" >
                                        <option disabled selected>Select a Subject</option>
                                        <option value="Technical Issue">Technical Issue</option>
                                        <option value="Suggestions">Suggestions</option>
                                        <option value="Bug Improvements">Bug Improvements</option>
                                    </select>
                                    <small class="text-danger fw-bold"><?php echo form_error('subject');?></small>

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="msg" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                    <label for="message">Message</label>
                                    <small class="text-danger fw-bold"><?php echo form_error('msg');?></small>

                                </div>
                            </div>
                            <div class="col-12">
                                <button style="background-color: #265857; color: #fff;" class="btn w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

