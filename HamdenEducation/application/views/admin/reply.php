
<style>
  button{
    background-color: #265857;
    color: #fff;
  }

  .yellow{
    color: #ffa639;
  }
  
  h1{
    color:  #265857;
  }

  h3{
    background-color: #265857;
    color: #fff;
    padding: 10px;
  }

  .message{
    padding: 30px;
    background-color: #fafbf9;
  }
  .form-label{
    border-bottom: 2px solid #ffa639;
    color: #265857;
  }
</style>

<body>  
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
           <div class="container shadow-lg p-3 bg-white rounded">
             <h1 class="mt-3 text-center mb-3"> <span class="yellow"> - </span>Reply to <?php echo $name;?> <span class="yellow"> - </span></h1>
             <?php if(isset($delete_err)){echo $delete_err;}?> 
            <?php echo form_open();?>
            <?php 
           

            ?>
            <div class="row mt-5 justify-content-center">
              <div class="col-12">
                <h3><?php echo $name;?>'s Message</h3>
              </div>

              <div class="col-12 mt-3">
                <h5 class="text-center mt-3 mb-5">Subject: <?php echo $subject;?></h5>
                <p class="message">
                  <?php 
                    echo $msg;
                  ?>
                </p>
              </div>
            </div>
            
            <div class="row mt-5 justify-content-center">
              <div class="col-12">
                <h3>Leave a Response</h3>
              </div>
              <div class="col-12">
                <textarea name="msg" class="form-control summernote-simple"  placeholder="reply to <?php echo $name;?>"></textarea>
                <small class="text-danger font-weight-bold"><?php echo form_error('msg');?></small>
              </div>
            </div>
         
            <div class="row justify-content-center">
              <div class="col-md-6 text-center">
                <button class="btn btn-lg" type="submit">Reply</button>
              </div>
            </div>
            <?php echo form_close();?>
           </div>
        </section>
      </div>
    