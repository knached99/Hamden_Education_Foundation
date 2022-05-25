<style>
  a:hover{
    text-decoration: none;
    color: #265857;
  }
  h5{
    color: #265857;
  }
  .events{
    box-shadow: 1px 8px 20px grey;
  }
  .events:hover{
    box-shadow: 1px 8px 20px #265857;
  }
</style>
<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div style="background-color: #265857"></div>
        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="row justify-content-center">
              <div class="mt-5 col-12 text-center">
                <h1 style="color: #265857; font-weight: 700;">My Grants</h1>
                <?php if(empty($grants['data'])){ echo '<h6 class="text-danger text-center font-weight-bold m-5">You have no grants created, to create a grant click on "Grant Application" in the sidebar <i class="fa fa-exclamation-circle fa-lg"></i></h6>';}?>
              </div>
              <div class="mt-4 text-center col-12">
                <p>Below is all the Grants that you have submitted, Grant Status Will change when The Grant Reviewer Reviews the Grant.</p>
              </div>
            </div>
            <div class="row justify-content-center m-5">
              <div class="col">
                <div class="card">
                  <div class="card-wrap">
                    <div class="row p-4 text-center">
                        <div class="container shadow-lg p-3 mb-5 bg-white rounded">
                            <div class="responsive">
                            <table class="table table-hover display">
                            <thead style="background-color: #265857;">
                                <tr>
                                    <th class="text-white">School Name</th>
                                    <th class="text-white">Grant Title</th>
                                    <th class="text-white">Grant Amount</th>
                                    <th class="text-white">Grant Status</th>
                                    <th class="text-white">View More</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($grants['data'] as $row){
                                  switch($row->grant_status){
                                    case 0:
                                      $status = '<td class="text-danger font-weight-bold">Denied <i class="fa fa-times-circle"></i></td>';
                                      break;
                                      case 1:
                                        $status ='<td style="color: #198754; font-weight: bolder;">Approved <i class="fa fa-check-circle"></i></td>';
                                        break;
                                      case 2:
                                      $status = '<td class="font-weight-bold" style="color: #6610f2;">Pending Review <i class="fa fa-exclamation-circle"></i></td>';
                                      break;
                                  }
                                    echo '
                                      <tr>
                                        <td>'.$row->school_name.'</td>
                                        <td>'.$row->grant_title.'</td>
                                        <td>$'.$row->grant_amount.'</td>
                                        '.$status.'
                                        <td><a href="grant/'.$row->grant_id.'" style="font-size: 18px; font-weight: bolder;">view <i class="fa fa-eye"></i></a></td>
                                      </tr>
                                    ';
                                }?>
                               
                            </tbody>
                            </table>
                     
                      </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
<body>
    