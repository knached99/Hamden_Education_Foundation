<!DOCTYPE html>
<html lang="en">

<body>
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Our Team</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a style="border-bottom: 2px solid #ffa639;" class="text-white" href="new_about">Our Team</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="new_acomp">Accomplishments</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="new_future">Future Plans</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    
    <!--team section-->
    <div id="team">
        <!-- Officers Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title bg-white text-center px-3">Board Officers</h6>
                    <h1 class="mb-5">Our Board Officers</h1>
                </div>
                <div class="row g-4 justify-content-center">
                    <?php 
                        foreach($officers['data'] as $row){
                            echo '
                                <div class="mt-5 col-lg-3 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
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
                                            <small>'.$row->board_position.'</small>
                                        </div>
                                    </div>
                                </div>
                                
                            ';
                            }
                        if(empty($officers['data'])){
                            echo '<h6 class="text-center text-secondary" style="font-weight: 800;">There are currently no Board Officers at this time</h6>';
                        }
                    ?>
                </div>
                <!--<div class="row g-4">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div style="background-color: #f6f6f6; box-shadow: 1px 8px 20px grey;" class="team-item">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="<?php echo base_url();?>main_styling/img/team-1.jpg" alt="">
                            </div>
                            <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4">
                                <h5 style="color: #265857;" class="mb-0">Amy Baker</h5>
                                <small>Co-President</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div style="background-color: #f6f6f6; box-shadow: 1px 8px 20px grey;" class="team-item">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="<?php echo base_url();?>main_styling/img/team-2.jpg" alt="">
                            </div>
                            <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4">
                                <h5 style="color: #265857;" class="mb-0">Robin Hochstrasser</h5>
                                <small>Co-President</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div style="background-color: #f6f6f6; box-shadow: 1px 8px 20px grey;" class="team-item">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="<?php echo base_url();?>main_styling/img/team-3.jpg" alt="">
                            </div>
                            <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4">
                                <h5 style="color: #265857;" class="mb-0">Sue Kirsch Wildes</h5>
                                <small>Secretary</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div style="background-color: #f6f6f6; box-shadow: 1px 8px 20px grey;" class="team-item">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="<?php echo base_url();?>main_styling/img/team-4.jpg" alt="">
                            </div>
                            <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4">
                                <h5 style="color: #265857;" class="mb-0">Jennifer McGarry</h5>
                                <small>Treasurer</small>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
        <!-- End -->

        <!-- Member -->
        <div class="container-xxl py-5">
            <div class="container">
                <!--Team header-->
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title bg-white text-center px-3">Board Members</h6>
                    <h1 class="mb-5">Members</h1>
                </div>

                <div class="row g-4 justify-content-center">
                    <?php 
                        foreach($members['data'] as $row){
                            echo '
                                <div class="mt-5 col-lg-3 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
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
                                            <small>'.$row->board_position.'</small>
                                        </div>
                                    </div>
                                </div>
                                
                            ';
                            }
                        if(empty($members['data'])){
                            echo '<h6 class="text-center text-secondary" style="font-weight: 800;">There are currently no Board Members at this time</h6>';
                        }
                    ?>
                </div>

                <!-- 1 -->
                <!--<div class="row g-4 mb-5">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div style="background-color: #f6f6f6; box-shadow: 1px 8px 20px grey;" class="team-item">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="<?php echo base_url();?>main_styling/img/team-1.jpg" alt="">
                            </div>
                            <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                                <div class="text-center p-4">
                                <h5 style="color: #265857;" class="mb-0">Leslie Aceto</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div style="background-color: #f6f6f6; box-shadow: 1px 8px 20px grey;" class="team-item">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="<?php echo base_url();?>main_styling/img/team-2.jpg" alt="">
                            </div>
                            <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4">
                                <h5 style="color: #265857;" class="mb-0">Maureen Armstrong</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div style="background-color: #f6f6f6; box-shadow: 1px 8px 20px grey;" class="team-item">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="<?php echo base_url();?>main_styling/img/team-3.jpg" alt="">
                            </div>
                            <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4">
                                <h5 style="color: #265857;" class="mb-0">Linda Bonadies</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div style="background-color: #f6f6f6; box-shadow: 1px 8px 20px grey;" class="team-item">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="<?php echo base_url();?>main_styling/img/team-4.jpg" alt="">
                            </div>
                            <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4">
                                <h5 style="color: #265857;" class="mb-0">Peter Bonadies</h5>
                            </div>
                        </div>
                    </div>
                </div>-->

                <!-- 2 -->
                <!--<div class="row g-4 mb-5">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div style="background-color: #f6f6f6; box-shadow: 1px 8px 20px grey;" class="team-item">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="<?php echo base_url();?>main_styling/img/team-1.jpg" alt="">
                            </div>
                            <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4">
                                <h5 style="color: #265857;" class="mb-0">Amy Lynn</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div style="background-color: #f6f6f6; box-shadow: 1px 8px 20px grey;" class="team-item">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="<?php echo base_url();?>main_styling/img/team-2.jpg" alt="">
                            </div>
                            <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4">
                                <h5 style="color: #265857;" class="mb-0">Eileen Carpinella</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div style="background-color: #f6f6f6; box-shadow: 1px 8px 20px grey;" class="team-item">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="<?php echo base_url();?>main_styling/img/team-3.jpg" alt="">
                            </div>
                            <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4">
                                <h5 style="color: #265857;" class="mb-0">Steve Delgrego</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div style="background-color: #f6f6f6; box-shadow: 1px 8px 20px grey;" class="team-item">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="<?php echo base_url();?>main_styling/img/team-4.jpg" alt="">
                            </div>
                            <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4">
                                <h5 style="color: #265857;" class="mb-0">Ruth Johnson</h5>
                            </div>
                        </div>
                    </div>
                </div>-->

                <!-- 3 -->
                <!--<div class="row justify-content-center g-4 mb-5">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div style="background-color: #f6f6f6; box-shadow: 1px 8px 20px grey;" class="team-item">
                            <div class="overflow-hidden">
                            <img class="img-fluid" src="<?php echo base_url();?>main_styling/img/team-1.jpg" alt="">
                            </div>
                            <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4">
                                <h5 style="color: #265857;" class="mb-0">Jack O’Donnell</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div style="background-color: #f6f6f6; box-shadow: 1px 8px 20px grey;" class="team-item">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="<?php echo base_url();?>main_styling/img/team-2.jpg" alt="">
                            </div>
                            <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4">
                                <h5 style="color: #265857;" class="mb-0">Tami Reilly</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div style="background-color: #f6f6f6; box-shadow: 1px 8px 20px grey;" class="team-item">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="<?php echo base_url();?>main_styling/img/team-3.jpg" alt="">
                            </div>
                            <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a style="background-color: #ffa639; color: #fff;" class="btn btn-sm-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4">
                                <h5 style="color: #265857;" class="mb-0">Vin Iezzi, Ex-Officio</h5>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
        <!-- End -->
    </div>
    <!--End-->
</body>

</html>