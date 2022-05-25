<style>
  h1{
    color: #265857;
  }
</style>

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="row text-center mt-5 mb-3">
                    <h1 class="col">All Past Grant Recipient</h1>
                </div>
                <div class="row justify-content-center mt-5 mb-5">
                <!--past recipients Counter-->
                <div class="col-lg-3 col-sm-12">
                    <div style="box-shadow: 1px 8px 20px grey;" class="card card-statistic-2">
                        <div class="card-icon shadow-primary" style="box-shadow: 1px 8px 20px grey; background-color: #265857">
                            <i class="fas fa-money-check"></i>  
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Number of Past Grant Recipients</h4>
                            </div>
                            <div class="card-body">
                                <?php echo count($grantRec['data']);?>
                            </div>
                        </div>
                    </div>
                </div> 
                <!--End-->
                </div>
                <div class="container shadow-lg p-3 bg-white rounded">
                    <?php 
                        echo $this->session->flashdata('success');
                        echo $this->session->flashdata('delete_err');
                    ?>
                    <div class="responsive">
                        <table id="datatable" class="display table">
                            <thead style="background-color: #265857;">
                                <tr>
                                    <th class="text-white">Title</th>
                                    <th class="text-white">School</th>
                                    <th class="text-white">Year</th>
                                    <th class="text-white">First Name</th>
                                    <th class="text-white">Last Name</th> 
                                    <th class="text-white">Picture</th>
                                    <th class="text-white">Delete</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                <?php 
                                    foreach($grantRec['data'] as $row){
                                        echo '
                                            <tr>
                                                <td>'.$row->recipients_title.'</td>
                                                <td>'.$row->recipients_school.'</td>
                                                <td>'.$row->recipients_year.'</td>
                                                <td>'.$row->recipients_first_name.'</td>
                                                <td>'.$row->recipients_last_name.'</td>
                                                <td><img style="max-width: 100px; max-height: 100px;" src="'.base_url().$row->recipients_picture.'"></td>
                                                <td><a href="del_recipient/'.$row->recipients_id.' " class="btn btn-danger">delete <i class="fa fa-trash"></i></a></td> 
                                            </tr>
                                        ';
                                    }
                                    if(empty($grantRec['data'])){
                                        echo '<p class="text-primary text-center font-weight-normal"><i class="fa fa-exclamation-circle"></i> You currently have no Grant Recipients, to create one click on the "forms" tab in the sidebar, then on "Create a Recipient"</p>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
</body>