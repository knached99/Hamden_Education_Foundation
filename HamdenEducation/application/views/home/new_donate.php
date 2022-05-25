  <style>
    .g{
      color: #265857;
    }
    .but{
      background-color: #265857;
      color: #fff;
      border: 2px solid #000;
      border-radius: 10px;
      padding: 2px;
    }
    .but:hover{
      opacity: .03;
    }
  </style>
  <!-- Header Start -->
  <div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-lg-10 text-center">
          <h1 class="display-3 text-white animated slideInDown">Donate</h1>
        </div>
      </div>
    </div>
  </div>
  <!-- Header End -->

  <!-- About Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="row justify-content-center  g-5">
        <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
          <div style="box-shadow: 1px 8px 20px grey;" class="about_img position-relative h-100 overflow-hidden">
            <img class="img-fluid h-100" src="https://i0.wp.com/cdn-images-1.medium.com/max/1024/1*FRoQ0Q553lRXfO6R62Ctbg.jpeg?w=750&ssl=1" alt="">
          </div>
        </div>
        <div class="align-items-center col-lg-5 wow fadeInUp" data-wow-delay="0.3s">
          <div class="row justify-content-center">
            <div class="col-12 mb-3 text-center">
              <h6 class="section-title bg-white text-center px-3">Donate</h6>
            </div>
            <div class="col-12">
              <p class="mb-4"><span class="g fw-bold">Thank you </span>for your interest in donating to <span class="g fw-bold">The Hamden Education Foundation</span>. Your options are donating to our annual campaign, or buying <span class="g fw-bold">CHEER!</span> for your favorite educators.  You can also attend one of our events! Once you choose your donation, click on the link and you will be brought to the right page. Every gift is appreciated! Thank you for your support! For your convenience you can click the donate now button below.</p>
            </div>
            <div class="row mb-5 justify-content-center">
              <h5 style="color: #265857; text-align: center; paddding-bottom: 20px;" class="col-10 text-center">Click to Donate</h5>
              <a class="g text-center" rel="noopener noreferrer" target="_blank" href="https://www.paypal.com/donate/?hosted_button_id=2FJEXNENPQPE4"> <i class="fa-4x fab fa-cc-paypal" ></i></a>
            </div>
            <div class="row justify-content-center">
              <h3 style="color: #265857; text-align: center; paddding-bottom: 20px;" class="col-10 text-center">Other Methods</h3>
              <div class="mt-5 col-6 wow fadeInUp" data-wow-delay="0.1s" data-bs-toggle="modal" data-bs-target="#generalModal">
                <div style="height: 200px; box-shadow: 1px 8px 20px grey;" class="service-item text-center p-4">
                  <div>
                    <i class="fas fa-3x fa-money-check mb-4"></i>
                    <h5>General Donations</h5>
                  </div>
                </div>
              </div>
              <div class="mt-5 col-6 wow fadeInUp" data-wow-delay="0.1s" data-bs-toggle="modal" data-bs-target="#cheersModal">
                <div style="height: 200px; box-shadow: 1px 8px 20px grey;" class="service-item text-center p-4">
                  <div class="align-self-center">
                    <i class="fas fa-3x fa-money-check mb-4"></i>
                    <h5>C.H.E.E.R.! For Education</h5>
                  </div>
                </div>
              </div> 
            </div>
          </div> 
        </div>
      </div>
    </div>
  </div>
  <!-- About End -->

  <!-- General Donations -->
  <div class="modal fade" id="generalModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="generalModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="generalModal">General Donations</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>
            Donate to our <span class="border-bottom: 2px solid #ffa639;">Annual Campaign</span>. Donations are accepted through <span class="fw-bold">paypal</span> or by <span class="fw-bold">mail</span>. If you choose by mail, please download our donation form and mail it in with your check.
          </p>
        </div>
        <div class="modal-footer">
          <a rel="noopener noreferrer"  href="<?php echo base_url();?>forms/GENERALDONATIONFORM.pdf" target="_blank" class="but p-1">Download Form</a>
        </div>
      </div>
    </div>
  </div>

  <!--CHEERS donation-->
  <div class="modal fade" id="cheersModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cheersModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="generalModal">C.H.E.E.R.! For Education</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h4 class="modal-title" id="cheersModal"><span class="g">C</span>elebrate and <span class="g">H</span>onor <span class="g">E</span>xceptional <span class="g">E</span>ducato<span class="g">R</span >s</h4>
          <p>
            A wonderful way to recognize an exceptional teacher or special someone who has made a difference in the life of your student is to make a gift of C.H.E.E.R! Your C.H.E.E.R! honoree receives a specially designed certificate when you make a donation in his or her name. (No mention of the amount of your gift is made). Teachers, librarians, administrators, secretaries and other Hamden Public Schools staff, coaches, room parents, volunteers and Hamden town and public library employees may all be recognized with a gift of C.H.E.E.R!
          </p>
        </div>
        <div class="modal-footer">
          <a rel="noopener noreferrer" href="<?php echo base_url();?>forms/CheerDonationForms.pdf" target="_blank" class="but p-1">Download Form</a>
        </div>
      </div>
    </div>
  </div>
