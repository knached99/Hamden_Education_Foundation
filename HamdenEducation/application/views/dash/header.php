<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  
     <!--Title section -->
     <?php
        switch($this->session->account_type){
            case 'admin':
                $title='
                    <title>Admin - Dashboard</title>
                ';
            break;

            default:
                $title='
                    <title>User - Dashboard</title>
                ';  
            break;
        }
    echo $title;?>
    <!--End section -->
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

  <!-- Datatables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
  <!-- Date Picker CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>dash_styling/date_picker/dist/mc-calendar.min.css" />
<!-- Time Picker CSS -->
<style></style>
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA -->
</head>