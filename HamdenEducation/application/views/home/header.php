<head>
    <meta charset="utf-8">
    <!--Title section -->
    <?php
        switch(current_url()){
            case ''.base_url().'index.php/Home/new_about':
                $title='
                    <title>HEF - About</title>
                ';
            break;

            case ''.base_url().'index.php/Home/new_future':
                $title='
                    <title>HEF - Future Plans</title>
                ';
            break;

            case ''.base_url().'index.php/Home/new_acomp':
                $title='
                    <title>HEF - Accomplishments</title>
                ';
            break;

            case ''.base_url().'index.php/Home/new_events':
                $title='
                    <title>HEF - Events</title>
                ';
            break;

            case ''.base_url().'index.php/Home/new_grants':
                $title='
                    <title>HEF - Innovation Grants</title>
                ';
            break;

            case ''.base_url().'index.php/Home/new_awards':
                $title='
                    <title>HEF - Awards</title>
                ';
            break;

            case ''.base_url().'index.php/Home/new_events':
                $title='
                    <title>HEF - Events</title>
                ';
            break;

            case ''.base_url().'index.php/Home/new_scholar':
                $title='
                    <title>HEF - Scholarship</title>
                ';
            break;

            case ''.base_url().'index.php/Home/new_donate':
                $title='
                    <title>HEF - Donate</title>
                ';
            break;
            
            case ''.base_url().'index.php/Home/contact':
                $title='
                    <title>HEF - Contact</title>
                ';
            break;

            default:
                $title='
                    <title>HEF - Home</title>
                ';  
            break;
        }
    echo $title;?>
    <!--End section -->

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url();?>styling/img/HEF-favicon.png" sizes="32x32">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo base_url();?>main_styling/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>main_styling/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url();?>main_styling/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo base_url();?>main_styling/css/style.css" rel="stylesheet">
    <style>
        .y{
            color: #ffa639;
        }
        
        .testimonial-carousel .owl-item{
            box-shadow: 1px 8px 20px grey;
            margin-top: 30px;
            margin-bottom: 30px;
            color: #265857;
        }

        h5{
            color: #ffa639;
        }
    </style>
</head>
