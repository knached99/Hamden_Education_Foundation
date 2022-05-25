<style>
  button{
    background-color: #265857;
    color: #fff;
  }

  .yellow{
    color: #ffa639;
  }

  h1{
    color: #265857;
  }

  .form-label{
    color: #265857;
  }
</style>

<body>  
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
           <div class="container shadow-lg p-3 mt-5 bg-white rounded">
             <h1 class="mt-3 text-center mb-3">Enter a Past Grant Recipient</h1> 
             <?php echo form_open_multipart();?>
            <?php 
             echo $this->session->flashdata('error');
             echo $this->session->flashdata('success');
            ?>
            <div class="row justify-ccontent-center p-3">
                <div class="col-lg-6 col-sm-12 mt-4">
                    <label class="font-weight-bold form-label">Picture of Recipient</label>
                    <input class="form-control" type="file" name="recipients_picture">
                </div>
              <div class="col-sm-12 col-lg-6 mt-4">
                    <label class="font-weight-bold form-label">Receiving Grant Title</label>
                    <input type="text" name="recipients_title" class="form-control" placeholder="Enter Title">     
                    <small class="text-danger"><?php echo form_error('recipients_title');?></small>
              </div>
            </div>
            <div class="row justify-content-center p-3">
                <div class="col-lg-3 col-sm-6 mt-4">
                    <label class="font-weight-bold form-label">Recipient's First Name:</label>
                    <input type="text" name="recipients_first_name" class="form-control" placeholder="Enter First Name of Recipient">     
                    <small class="text-danger"><?php echo form_error('recipients_first_name');?></small>
                </div>

                <div class="col-lg-3 col-sm-6 mt-4">
                    <label class="font-weight-bold form-label">Recipient's Last Name:</label>
                    <input type="text" name="recipients_last_name" class="form-control" placeholder="Enter Last Name of Recipient">     
                    <small class="text-danger"><?php echo form_error('recipients_last_name');?></small>
                </div>

                <div class=" col-lg-3 col-sm-6 mt-4">
                    <label class="font-weight-bold form-label">Recipient's School:</label>
                    <select name="recipients_school" id="Recipients_School" class="form-control" placeholder="Enter School of Recipient"></select>
                    <small class="text-danger font-weight-bold"><?php echo form_error('recipients_school');?></small>
                </div>

                <div class="col-lg-3 col-sm-6 mt-4">
                    <label class="font-weight-bold form-label">Receiving Year:</label>
                    <input class="form-control" type="text" name="recipients_year" placeholder="Enter the recieving year of Recipient">
                    <small class="text-danger font-weight-bold"><?php echo form_error('recipients_year');?></small>
                </div>
            </div>

            <div class="row justify-content-center p-3">
                <div class=" col-lg-12 col-sm-12 mt-4">
                    <label class="font-weight-bold form-label">Grant Description</label>
                    <textarea name="recipients_description" class="form-control summernote-simple" placeholder="Briefly describe.."></textarea>
                    <small class="text-danger font-weight-bold"><?php echo form_error('recipients_description');?></small>
                </div>
            </div>



            <div class="row m-3">
                <div class="col-md-6">
                    <button class="btn btn-lg" type="submit">Create Grant Recipient</button>
                </div>
            </div>
            <?php echo form_close();?>
           </div>
        </section>
      </div>
      <script>
            let schools = ["Alice Peck Learning Center", "Bear Path Elementary", "Church Street Elementary", "Dunbar Hill Elementary", "Helen Street Elementary", "Ridge Hill Elementary", "Shephred Glen Elementary", "Spring Glen Elementary", "West Woods Elementary", "Hamden Collaborative Learning Center (HCLC)", "Hamden Middle School", "Hamden High School"];
            let html = [];
            for(var i=0; i < schools.length; i++){
                html.push("<option>" + schools[i] + "</option>");
            }
            document.getElementById('Recipients_School').innerHTML=html.join("");
      </script>
    