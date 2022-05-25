<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>HEF Login Type</title>

  <!-- Favicon -->
  <link rel="icon" href="<?php echo base_url();?>styling/img/HEF-favicon.png" sizes="32x32">
  
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url();?>dash_styling/dist/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>dash_styling/dist/assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url();?>dash_styling/dist/assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>dash_styling/dist/assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?php echo base_url();?>dash_styling/dist/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>dash_styling/dist/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>dash_styling/dist/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>dash_styling/dist/assets/css/components.css">
<!-- Start GA -->
<!-- custom login styling -->
<style>

/* BASIC */

.link:hover{
  text-decoration: none;
  color: #f6f6f6;
}

.link{
  color: #265857;
}
.content{
  box-shadow: 1px 8px 20px grey;
}

.content:hover{
  box-shadow: 1px 8px 20px #265857; 
}
body {
  margin: 0px;
  background-color: #fff;
  font-family: "Poppins", sans-serif;
  background: url('https://1.bp.blogspot.com/-NmAp0VyE9SI/Vfl2CBIY4RI/AAAAAAAAAJk/l36_1UwSb04/s1600/shutterstock_183832961.jpg');
  background-size: cover;
  height: 100%;
}

a {
  color: #92badd;
  display:inline-block;
  text-decoration: none;
  font-weight: 400;
}

h2 {
  text-align: center;
  font-size: 16px;
  font-weight: 600;
  text-transform: uppercase;
  display:inline-block;
  margin: 40px 8px 10px 8px; 
  color: #cccccc;
}



/* STRUCTURE */

.wrapper {
  margin: 0px;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  min-height: 100%;
  padding: 20px;
}

#formContent {
  margin: 0px;
  -webkit-border-radius: 10px 10px 10px 10px;
  border-radius: 10px 10px 10px 10px;
  background: #fff;
  padding: 30px;
  position: relative;
  padding: 0px;
  -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  text-align: center;
}

#formFooter {
  background-color: #f6f6f6;
  border-top: 1px solid #dce8f1;
  padding: 25px;
  text-align: center;
  -webkit-border-radius: 0 0 10px 10px;
  border-radius: 0 0 10px 10px;
}



/* TABS */

h2.inactive {
  color: #cccccc;
}

h2.active {
  color: #0d0d0d;
  border-bottom: 2px solid #5fbae9;
}

/* ANIMATIONS */

/* Simple CSS3 Fade-in-down Animation */
.fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

@keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

/* Simple CSS3 Fade-in Animation */
@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

.fadeIn {
  opacity:0;
  -webkit-animation:fadeIn ease-in 1;
  -moz-animation:fadeIn ease-in 1;
  animation:fadeIn ease-in 1;

  -webkit-animation-fill-mode:forwards;
  -moz-animation-fill-mode:forwards;
  animation-fill-mode:forwards;

  -webkit-animation-duration:1s;
  -moz-animation-duration:1s;
  animation-duration:1s;
}

.fadeIn.first {
  -webkit-animation-delay: 0.4s;
  -moz-animation-delay: 0.4s;
  animation-delay: 0.4s;
}

.fadeIn.second {
  -webkit-animation-delay: 0.6s;
  -moz-animation-delay: 0.6s;
  animation-delay: 0.6s;
}

.fadeIn.third {
  -webkit-animation-delay: 0.8s;
  -moz-animation-delay: 0.8s;
  animation-delay: 0.8s;
}

.fadeIn.fourth {
  -webkit-animation-delay: 1s;
  -moz-animation-delay: 1s;
  animation-delay: 1s;
}

/* Simple CSS3 Fade-in Animation */
.underlineHover:after {
  display: block;
  left: 0;
  bottom: -10px;
  width: 0;
  height: 2px;
  background-color: #56baed;
  content: "";
  transition: width 0.2s;
}

.underlineHover:hover {
  color: #0d0d0d;
}

.underlineHover:hover:after{
  width: 100%;
}



/* OTHERS */

*:focus {
    outline: none;
} 

#icon {
  width:60%;
  margin: 10px;
}

@media only screen and (max-width: 600px) {
  body {
    background-image: none;
    background-color: #fff;
  }
}
</style>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>
<body>
<div class="wrapper fadeInDown row justify-content-center">
  <div class="col-md-12 col-lg-9 " id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="row mb-3">
      <div class="col fadeIn first">
        <img src="https://hamdeneducationfoundation.org/wp-content/uploads/2020/09/HEF-full-logo-2020.png" id="icon" alt="User Icon" />
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col">
        <h2 style="font-weight: 900; text-align: center; color: #265857; margin-bottom: 20px;">What is your role?</h2>

      </div>
    </div>
    <!--Login Buttons-->
    <div class="row mb-5 p-4">

      <!-- Student Login -->
      <div class="col-lg-4 col-md-12 ">
        <a class="link" href="<?php echo base_url();?>index.php/Login/student_login">
          <div class="card content shadow-lg p-3 mb-5 bg-white rounded">
            <i class="fas fa-graduation-cap" style="font-size: 50px; margin-top: 10px;"></i>
            <div class="card-body">
              <h5 class="card-title">Student</h5>
              <p class="card-text">login to your student account</p>
            </div>
          </div>
        </a>
      </div>
      <!-- End Student Login -->

      <!-- Guest User Login -->
      <div class="col-lg-4 col-md-12">
        <a class="link" href="<?php echo base_url();?>index.php/Login/guest_login">
          <div class="card content shadow-lg p-3 mb-5 bg-white rounded">
            <i class="fas fa-user"  style="font-size: 50px; margin-top: 10px;"></i>   
            <div class="card-body">
              <h5 class="card-title">Guest</h5>
              <p class="card-text">login to your Guest account</p>
            </div>
          </div>
        </a>
      </div>
      <!-- End Teacher Login-->

      <!-- Teacher Login -->
      <div class="col-lg-4 col-md-12">
        <a class="link" href="<?php echo base_url();?>index.php/Login/teacher_login">
          <div class="card content shadow-lg p-3 mb-5 bg-white rounded">
            <i class="fas fa-chalkboard-teacher"  style="font-size: 50px; margin-top: 10px;"></i>   
            <div class="card-body">
              <h5 class="card-title">Teacher</h5>
              <p class="card-text">login to your teacher account</p>
            </div>
          </div>
        </a>
      </div>
      <!-- End Teacher Login-->
    </div>

    <!--Bottom Links-->
    <div id="formFooter">
        <a class="underlineHover ml-3 mr-3" href="../Register/signup">No account?</a>
        <a class="underlineHover ml-3 mr-3" href="<?php echo base_url();?>index.php/Home/new_home"><i class="fas fa-2x fa-home"></i></a>
        <a class="underlineHover ml-3 mr-3" href="<?php echo base_url();?>index.php/Admin/Admin_login/login"><i class="fas fa-2x fa-user-cog"></i></a>
    </div>
  </div>
</div>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>