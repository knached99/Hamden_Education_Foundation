        <?php switch($this->session->account_type){
                  case 'Student':
                    $update_profile = '../index.php/Dash/student_upload_profile_pic';
                  break;
                  case 'Teacher':
                    $update_profile = '../index.php/Dash/teacher_upload_profile_pic';
                  break;
                  case 'Guests':
                      $update_profile = '../index.php/Dash/teacher_upload_profile_pic';
                  break;
                  case 'admin':
                    $update_profile = '../index.php/Admin/Dash/upload_profile_pic';
                    $update_rubric = '../index.php/Admin/Dash/rubric';

                  break;

                }?>
      <footer class="main-footer">
        <div class="footer-left" hidden>
          Copyright &copy; <?php echo date('Y');?> <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Profile Pic</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo form_open_multipart($update_profile);?>
      <input class="form-control" name="profile_pic" type="file">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Upload</button>
      </div>
      <?php echo form_close();?>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->  

<!-- Modal -->
<div class="modal fade" id="rubricModal" tabindex="-1" role="dialog" aria-labelledby="rubricLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rubricLabel">Upload Rubric Pic</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo form_open_multipart($update_rubric);?>
      <input class="form-control" name="rubric_pic" type="file">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Upload</button>
      </div>
      <?php echo form_close();?>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->  



<!-- Delete Event Modal -->
<!--<div class="modal fade" id="delete_event" tabindex="-1" role="dialog" aria-labelledby="delete_event" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete_event">Are you sure you want to delete this event?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo form_open('../Admin/Dash/del_event/'.$id.' ');?>
      <h6>Deleting this event will remove all associated attendees with this event. If you are 100% sure you want to continue, click on "delete"</h6>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
      <?php echo form_close();?>
      </div>
    </div>
  </div>
</div> -->
<!-- End Modal -->  

<!-- Teacher Modal -->
<div class="modal fade row" id="teacher_modal" tabindex="-1" role="dialog" aria-labelledby="teacher_modal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="teacher_modal"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row justify-content-center">
          <div class="col-12">
            <h1 class="text-center font-weight-bold">All Teachers</h1>
          </div>
        </div>
        <div class="row justify-content-center mt-5">
          <?php 
            foreach($teachers['data'] as $row){
              echo '
                <div class="col-lg-4 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
                  <div style="background-color: #f6f6f6; box-shadow: 1px 8px 20px grey;" class="team-item">
                    <div class="overflow-hidden">
                      <img class="img-fluid" src="'.base_url().$row->profile_pic.'" alt="No Profile Picure">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                      <div stlye="background-color: #fff;" class="d-flex justify-content-center pt-2 px-1">
                        <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href="'.$row->facebook.'"><i class="fab fa-facebook-f"></i></a>
                        <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href="'.$row->twitter.'"><i class="fab fa-twitter"></i></a>
                        <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href="'.$row->linkedin.'"><i class="fab fa-linkedin"></i></a>
                      </div>
                    </div>
                    <div class="text-center p-4">
                      <h5 style="color: #265857;" class="mb-0">'.$row->first_name.' '.$row->last_name.'</h5>
                      <p class="card-text"><a href="mailto:'.$row->email.'">'.$row->email.'</a></p>
                      <p class="btn btn-primary"><a style="color: #fff;" href="'.base_url().'index.php/Admin/Dash/view_teacher/'.$row->user_id.'">View More Details</a></p>
                    </div>
                  </div>
                </div>
              ';
            }
          ?>
        </div>   
      </div>
    </div>
  </div>
</div>
<!-- End Teacher Modal-->



<!-- Student Modal -->
<div class="modal fade" id="student_modal" tabindex="-1" role="dialog" aria-labelledby="student_modal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="student_modal"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row justify-content-center">
          <div class="col-12">
            <h1 class="text-center font-weight-bold">All Students</h1>
          </div>
        </div>
        <div class="row justify-content-center mt-3">
          <?php 
            foreach($students['data'] as $row){
              echo '
                <div class="mt-5 col-lg-4 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
                  <div style="background-color: #f6f6f6; box-shadow: 1px 8px 20px grey;" class="team-item">
                    <div class="overflow-hidden">
                      <img class="img-fluid" src="'.base_url().$row->profile_pic.'" alt="No Profile Picure">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                      <div stlye="background-color: #fff;" class="d-flex justify-content-center pt-2 px-1">
                        <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href="'.$row->facebook.'"><i class="fab fa-facebook-f"></i></a>
                        <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href="'.$row->twitter.'"><i class="fab fa-twitter"></i></a>
                        <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href="'.$row->linkedin.'"><i class="fab fa-linkedin"></i></a>
                      </div>
                    </div>
                    <div class="text-center p-4">
                      <h5 style="color: #265857;" class="mb-0">'.$row->first_name.' '.$row->last_name.'</h5>
                      <p class="card-text"><a href="mailto:'.$row->email.'">'.$row->email.'</a></p>
                      <p class="btn btn-primary"><a style="color: #fff;" href="'.base_url().'index.php/Admin/Dash/view_student/'.$row->user_id.'">View More Details</a></p>
                    </div>
                  </div>
                </div>
              ';
            }
          ?>
        </div>   
      </div>
      </div>
    </div>
  </div>
</div>
<!-- End Student Modal-->


<!-- Guest Modal -->
<div class="modal fade" id="guest_modal" tabindex="-1" role="dialog" aria-labelledby="guest_modal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="guest_modal"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row justify-content-center">
          <div class="col-12">
            <h1 class="text-center font-weight-bold">All Guests</h1>
          </div>
        </div>
        <div class="row justify-content-center mt-3">
          <?php 
            foreach($guests['data'] as $row){
              echo '
                <div class="mt-5 col-lg-4 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
                  <div style="background-color: #f6f6f6; box-shadow: 1px 8px 20px grey;" class="team-item">
                    <div class="overflow-hidden">
                      <img class="img-fluid" src="'.base_url().$row->profile_pic.'" alt="No Profile Picure">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                      <div stlye="background-color: #fff;" class="d-flex justify-content-center pt-2 px-1">
                        <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href="'.$row->facebook.'"><i class="fab fa-facebook-f"></i></a>
                        <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href="'.$row->twitter.'"><i class="fab fa-twitter"></i></a>
                        <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href="'.$row->linkedin.'"><i class="fab fa-linkedin"></i></a>
                      </div>
                    </div>
                    <div class="text-center p-4">
                      <h5 style="color: #265857;" class="mb-0">'.$row->first_name.' '.$row->last_name.'</h5>
                      <p class="card-text"><a href="mailto:'.$row->email.'">'.$row->email.'</a></p>
                      <p class="btn btn-primary"><a style="color: #fff;" href="'.base_url().'index.php/Admin/Dash/view_guest/'.$row->user_id.'">View More Details</a></p>
                    </div>
                  </div>
                </div>
              ';
            }
          ?>
        </div>   
      </div>
      </div>
    </div>
  </div>
</div>
<!-- End Guest Modal-->

  <!-- General JS Scripts -->
  <script src="<?php echo base_url();?>dash_styling/dist/assets/modules/jquery.min.js"></script>
  <script src="<?php echo base_url();?>dash_styling/dist/assets/modules/popper.js"></script>
  <script src="<?php echo base_url();?>dash_styling/dist/assets/modules/tooltip.js"></script>
  <script src="<?php echo base_url();?>dash_styling/dist/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>dash_styling/dist/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php echo base_url();?>dash_styling/dist/assets/modules/moment.min.js"></script>
  <script src="<?php echo base_url();?>dash_styling/dist/assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="<?php echo base_url();?>dash_styling/dist/assets/modules/jquery.sparkline.min.js"></script>
  <script src="<?php echo base_url();?>dash_styling/dist/assets/modules/chart.min.js"></script>
  <script src="<?php echo base_url();?>dash_styling/dist/assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
  <script src="<?php echo base_url();?>dash_styling/dist/assets/modules/summernote/summernote-bs4.js"></script>
  <script src="<?php echo base_url();?>dash_styling/dist/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url();?>dash_styling/dist/assets/js/page/index.js"></script>
  
  <!-- Template JS File -->
  <script src="<?php echo base_url();?>dash_styling/dist/assets/js/scripts.js"></script>
  <script src="<?php echo base_url();?>dash_styling/dist/assets/js/custom.js"></script>

  <!-- Datatables JS Scripts -->
  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
  <!-- Datatables buttons -->
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
  <script>
    $(document).ready(function() {
      $('table.display').DataTable({
        scrollY: 400, 
        //scrollX: 400,
        processing: true,
        searching: true,
        responsive: true,
        scrollCollapse: true,
        paging: true,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        stateSave: true,
        // Buttons to save data 
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
    });
  </script>
  <!-- Date Picker Script -->
  <script src="<?php echo base_url();?>dash_styling/date_picker/dist/mc-calendar.min.js"></script>
  <script>
    const myDatePicker = MCDatepicker.create({ 
      el: '#date',
      dateFormat: 'mm/dd/yyyy'
    })
  </script>

  <script>
    // Password validation as the user types
    var myInput = document.getElementById("pwd");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");
    var special = document.getElementById("special");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function () {
      document.getElementById("msg").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function () {
      document.getElementById("msg").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function () {
      // Validate lowercase letters
      var lowerCaseLetters = /[a-z]/g;
      if (myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
      } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
      }

      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
      }

      // Validate numbers
      var numbers = /[0-9]/g;
      if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
      }

      // Validate special characters
      var specialChars = /[\!\@\#\$\%\^\&\*\)\(\+\=\.\<\>\{\}\[\]\:\;\'\"\|\~\`\_\-\?]/g;
      if (myInput.value.match(specialChars)) {
        special.classList.remove("invalid");
        special.classList.add("valid");
      } else {
        special.classList.remove("valid");
        special.classList.add("invalid");
      }
      // Validate length
      if (myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
      }
    }
  </script>

  <script>
    // toggle password visibilty
    function showpwd() {
      let z = document.getElementById("curr_pwd");
      let x = document.getElementById("pwd");
      let y = document.getElementById('confirm_pwd');
      let text = document.getElementById('text');
      if (x.type === "password") {
        x.type = "text";
        y.type = "text";
        z.type = "text";
        text.innerHTML = "Hide Password";
      } else {
        x.type = "password";
        y.type = "password";
        z.type = "password";
        text.innerHTML = "Show Password";
      }
    }
  </script>
 <script>
  let time = ["12:00 AM", "12:30 AM", "1:00 AM", "1:30 AM", "2:00 AM", "2:30 AM", "3:00 AM", "3:30 AM", "4:00 AM", "4:30 AM", "5:00 AM", "5:30 AM", "6:00 AM", "6:30 AM", "7:00 AM", "7:30 AM", "8:00 AM", "8:30 AM", "9:00 AM", "9:30 AM", "10:00 AM", "10:30 AM", "11:00 AM", "11:30 AM", "12:00 PM", "12:30 PM", "1:00 PM", "1:30 PM", "2:00 PM", "2:30 PM", "3:00 PM", "3:30 PM", "4:00 PM", "4:30 PM", "5:00 PM", "5:30 PM", "6:00 PM", "6:30 PM", "7:00 PM", "7:30 PM", "8:00 PM", "8:30 PM", "9:00 PM", "9:30 PM", "10:00 PM", "10:30 PM", "11:00 PM", "11:30 PM"];
  let html = [];
  for(var i=0; i < time.length; i++){
  html.push("<option>" + time[i] + "</option>");
   }
   document.getElementById('event_time').innerHTML=html.join("");
 </script>
    
</body>
</html>