<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/logo.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Test Console</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Toast message CSS    -->
    <link href="assets/css/notify.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    <!-- Datatable CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-table.css">
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="#">
                    <a href="appdashboard?app=<?php echo $this->input->get('app'); ?>" >
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="#">
                    <a href="testresource?app=<?php echo $this->input->get('app'); ?>">
                        <i class="ti-link"></i>
                        <p>Test Resources</p>
                    </a>
                </li>
                <li class="active">
                    <a href="testmanager?app=<?php echo $this->input->get('app'); ?>" >
                        <i class="ti-pencil"></i>
                        <p>Test Manager</p>
                    </a>
                </li>
                <li class="#">
                    <a href="testlab?app=<?php echo $this->input->get('app'); ?>" >
                        <i class="ti-control-forward"></i>
                        <p>Test Lab</p>
                    </a>
                </li>
                <li class="#">
                    <a href="dashboard" >
                        <i class="ti-back-left"></i>
                        <p>Back</p>
                    </a>
                </li>
            </ul>
            <footer class="footer-app-dashboard">
                <div class="container-fluid">
                    <div class="copyright text-center">
                        &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="login">testaid.in</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                <a href="dashboard" class="navbar-brand login-header-h4"><img class="img-responsive" src="assets/img/logo.png" >testaid</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="">
                        <a href="appdashboard?app=<?php echo $this->input->get('app'); ?>" >
                            <i class="ti-panel"></i>
                            <p>Dashboard</p>
                        </a>

                    </li>
                    <li class="#">
                        <a href="testresource?app=<?php echo $this->input->get('app'); ?>">
                            <i class="ti-link"></i>
                            <p>Test Resources</p>
                        </a>
                    </li>
                    <li class="#">
                        <a href="testmanager?app=<?php echo $this->input->get('app'); ?>" >
                            <i class="ti-pencil"></i>
                            <p>Test Manager</p>
                        </a>
                    </li>
                    <li class="#">
                        <a href="testlab?app=<?php echo $this->input->get('app'); ?>" >
                            <i class="ti-control-forward"></i>
                            <p>Test Lab</p>
                        </a>
                    </li>
                    <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-user"></i>
                                <p><?php echo $this->session->userdata('sessionusername'); ?></p>
                                <b class="caret"></b>
                          </a>
                          <ul class="dropdown-menu">
                            <li><a href="#" class="dropdown-text">
                                    <p><i class="ti-shield"></i>  <span class="loffset1">Change Password</span></p>
                                </a>
                            </li>
                            <li><a href="#" class="dropdown-text">
                                    <p><i class="ti-id-badge"></i>  <span class="loffset1">User Profile</span></p>
                                </a>
                            </li>

                            <li><a href="logout" class="dropdown-text">
                                    <p><i class="ti-export"></i> <span class="loffset1">Logout</span></p>
                                </a>
                            </li>
                          </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    
    <div class="main-panel no-slide-no-bg">
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-plain loffset1">
                            <div class="header">
                                <h4 class="title uppercase"><?php echo $this->input->get('app'); ?> </h4>
                                <p class="category lineheight0_0">Test Manager</p>
                               
                                <div class="dropdown pull-right loffset2 importbutton">
                                    <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Import Test Cases
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu import-dropdown">
                                      <li><a href="#" data-toggle="modal" data-target="#webapp-upload-testcase" ><img src="http://findicons.com/files/icons/2770/ios_7_icons/128/excel.png" class="img-responsive excel-icon"/> Excel</a></li>
                                      <li><a href="#"><img src="http://www.kovair.com/wp-content/uploads/2014/06/hp-icon.jpg" class="img-responsive excel-icon"/>  ALM/QC</a></li>
                                      <li><a href="#"><img src="https://mark.trademarkia.com/services/logo.ashx?sid=86543166" class="img-responsive excel-icon"/> Rally</a></li>
                                      <li><a href="#"><img src="https://www.consunet.com.au/images/icon-staff-jira.svg" class="img-responsive excel-icon"/> Jira</a></li>
                                      </ul>
                                </div>
                               
                                <!-- <a href="#" data-toggle="modal" data-target="#webapp-upload-testcase" class="btn btn-success pull-right loffset3 addbtn"><i class="ti-upload"></i> Upload Test Cases</a> -->
                                <!-- <a href="#" class="btn btn-success pull-right addbtn" onclick="showAddTestCase();" ><i class="ti-plus"></i> Add Test Cases</a> -->
                            </div>
                            <div class="content">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="offer app">
                            <div class="offer-content testsuite ">
                                <div class="info voffset2 yellowgreen">
                                    <i class="ti-info-alt verticalmiddle font20 yellowgreen"></i>
                                    <span class="font19 loffset1">Download Sample Test Case Template 
                                        <a href="assets/TestCaseTemplate.xlsx" class="loffset1">Click here</a>
                                    </span>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row animated fadeIn hidden" id="addtcdiv">
                    <div class="col-sm-12">
                        <div class="offer app">
                            <div class="offer-content">
                                <h3 class="lead">
                                    
                                    <a href="#" onclick="hideAddTestCase();" ><i class="ti-close pull-right"></i></a>
                                </h3>
                                <div class="info">                                    
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Step 1</a></li>
                                        <li role="presentation"><a  href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Step 2</a></li>
                                        <!-- <div class="col-md-3 pull-right progress-bar-div">
                                            <div class="progress ">
                                               <div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width:33%">
                                                 33%
                                               </div>
                                            </div>
                                        </div>-->
                                        
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active animated pulse" id="tab1">
                                            
                                            <div class="form-group sliding-u-r-l no-display">
                                                <label for="emailid"  class="sr-only">Email ID</label>
                                                <input type="text" data-toggle="tooltip" title="Email ID"  class="form-control" autosuggest="false" name="emailid" value="<?php echo $this->session->userdata('sessionemailid'); ?>" id="emailid" placeholder="Email ID*" tabindex="1" required>
                                            </div>
                                            <div class="form-group sliding-u-r-l no-display">
                                                <label for="appname"  class="sr-only">Application Name</label>
                                                <input type="text" data-toggle="tooltip" title="Application Name"  class="form-control" autosuggest="false" name="appname" value="<?php echo $this->input->get("app"); ?>" id="appname" placeholder="Application Name*" tabindex="1" required>
                                            </div>
                                            <div class="form-group sliding-u-r-l col-md-5 ">
                                                <label for="testresourcename"  class="sr-only">Test Name</label>
                                                <input type="text"  class="form-control " autosuggest="false" name="testresourcename" value="" id="testresourcename" placeholder="Test Case Name*" tabindex="1" required>
                                            </div>
                                            <div class="form-group sliding-u-r-l col-md-4 ">
                                                <label for="resourcevalue"  class="sr-only">Objective</label>
                                                <input type="text" class="form-control " autosuggest="false" name="resourcevalue" value="" id="resourcevalue" placeholder="Test Objective*" tabindex="1" required>
                                            </div>
                                            <div class="form-group sliding-u-r-l col-md-2 ">
                                                <label for="desc"  class="sr-only">Test Suite</label>
                                                <input type="text" class="form-control " autosuggest="false" name="desc" value="" id="desc" placeholder="Test Suite" tabindex="1">
                                            </div>
                                            <div class="row voffset7">
                                                <a href="#" class="btnNext pull-right btn btn-success ">Next</a>
                                            </div>
                                            <div class="row">
                                                
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated pulse" id="tab2">
                                            <div class="form-group sliding-u-r-l col-md-3 ">
                                                <label for="testresourcename"  class="sr-only">Test Step</label>
                                                <input type="text" class="form-control " autosuggest="false" name="testresourcename" value="Step 1" id="testresourcename" placeholder="Test Step*" tabindex="1"  disabled>
                                            </div>
                                            <div class="form-group sliding-u-r-l col-md-5 ">
                                                <label for="resourcevalue"  class="sr-only">Objective</label>
                                                <input type="text" class="form-control " autosuggest="false" name="resourcevalue" value="" id="resourcevalue" placeholder="Description*" tabindex="1" required>
                                            </div>
                                            <div class="form-group sliding-u-r-l col-md-3 ">
                                                <label for="desc"  class="sr-only">Action</label>
                                                <input type="text" class="form-control " autosuggest="false" name="desc" value="" id="desc" placeholder="Action*" tabindex="1">
                                            </div>
                                            <div class="form-group">              
                                                <a href="#" class="font20"><i class="ti-plus"></i></a>
                                            </div>
                                            <div class="row voffset6">
                                                <a href="#" class="btnNext pull-right btn btn-success loffset3">Finish</a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="offer app">
                            <div class="offer-content testsuite">
                                <h3 class="lead">
                                    Test Cases
                                </h3>
                                <div class="info">
                                    <table data-toggle="table"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                                        <thead>
                                        <tr>
                                            <th data-sortable="true">Sr No</th>
                                            <th data-sortable="true">Name</th>
                                            <th data-sortable="true">Objective</th>
                                            <th data-sortable="true">Precondition</th>
                                            <th data-sortable="true">Test Suite</th>
                                            <th ></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $index = 1;
                                                foreach($testcasedata as $testcase){ ?>
                                                <tr class="">
                                                    <td class="text-center"> <?php echo $index ?></td>
                                                    <td><?php echo $testcase['tc_name']; ?></td>
                                                    <td><?php echo $testcase['tc_obj']; ?></td>
                                                    <td><?php echo $testcase['tc_precondition']; ?></td>
                                                    <td><?php echo $testcase['tc_suite']; ?></td>
                                                    <td class="text-center" >
                                                        <a href="#" data-toggle="modal" data-target="#webapp-testcase-edit" >
                                                            <i class="ti-pencil-alt "></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php $index = $index + 1;
                                                } 
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        
                    </div>
                </div>

                
            </div>
        </div>
        <footer class="footer-app-dashboard-normal">
            <div class="container-fluid">
                <div class="copyright text-center">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="login">testaid.in</a>
                </div>
            </div>
        </footer>
    </div>
</div>

</body>

<div id="webapp-upload-testcase" class="row modal animated fadeIn" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content col-sm-8 col-sm-offset-2">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridModalLabel">Upload Test Cases</h4>
      </div>
      <div class="modal-body">
        <form action="testmanager/testcasefromexcel" method="post" enctype="multipart/form-data">
            <div class="form-group sliding-u-r-l no-display">
                <label for="emailid"  class="sr-only">Email ID</label>
                <input type="text" data-toggle="tooltip" title="Email ID"  class="form-control" autosuggest="false" name="emailid" value="<?php echo $this->session->userdata('sessionemailid'); ?>" id="emailid" placeholder="Email ID*" tabindex="1" required>
            </div>
            <div class="form-group sliding-u-r-l no-display">
                <label for="appname"  class="sr-only">Application Name</label>
                <input type="text" data-toggle="tooltip" title="Application Name"  class="form-control" autosuggest="false" name="appname" value="<?php echo $this->input->get("app"); ?>" id="appname" placeholder="Application Name*" tabindex="1" required>
            </div>
            <div class="form-group sliding-u-r-l">
                <label for="appname"  class="sr-only">Test Cases</label>
                <input type="file" class="form-control " name="tsexcel" value="" id="tsexcel" required>
            </div>
            <div class="form-group pull-right">              
                <button type="submit" name="tsexcel" id="submit" tabindex="5" class="btn btn-success button">Upload</button>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>


<div id="webapp-testcase-edit" class="row modal animated fadeIn" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
  <div class="modal-dialog width100percent" role="document">
    <div class="modal-content col-sm-8 col-sm-offset-2">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridModalLabel">Edit Test Cases</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>



<!--   Core JS Files   -->
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="assets/js/bootstrap-checkbox-radio.js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="assets/js/paper-dashboard.js"></script>

<!-- notifyjs to integrate Toast message like android -->
<script src="assets/js/notify.js"></script>

<!-- Datatable integrate Javascript -->
<script type="text/javascript" src="assets/js/bootstrap-table.js"></script>

<!-- Include Bootstrap Wizard -->
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap-wizard/1.2/jquery.bootstrap.wizard.min.js"></script>


<script>
$( document ).ready(function() {

    $('.th-inner').css('font-weight','500');
    $('th').css('margin-bottom','1px solid #ddd');
    if(detectmob()){        
        
        $('.addbtn').addClass('pull-left');
        $('.addbtn').addClass('voffset2');
        $('.progress-bar-div').removeClass('pull-right');
        $('.importbutton').removeClass('pull-right loffset2');

    }else{

    }

    $('input[type=text]').tooltip({
        placement: "right",
        trigger: "focus"
    });
    $('input[type=url]').tooltip({
        placement: "right",
        trigger: "focus"
    });  


   

    // Display toast for application created successfully or failed to create
    var testcaseuploadstatus = "";
    <?php if(empty($this->session->flashdata('testcaseuploadstatus'))){
    }else{ ?>
        testcaseuploadstatus = '<?php echo $this->session->flashdata('testcaseuploadstatus') ?>';    
    <?php } ?>
    if(testcaseuploadstatus == "success"){
       notify('success','Test Cases uploaded successfully',"");   // Display success toast
    }else if(testcaseuploadstatus == "failure"){
       notify('error','Test Cases upload failed',"Some testcases already present, Please try again");    // Display failure toast
    }



});


function showAddTestCase(){
    $('#addtcdiv').removeClass('hidden');
}

function hideAddTestCase(){
    $('#addtcdiv').addClass('fadeOut');
    setTimeout(
      function() 
      {
        //do something special
        $('#addtcdiv').addClass('hidden');
        $('#addtcdiv').removeClass('fadeOut');
      }, 1000);
}



</script>

<script>

// Script for Tab next previous button
$(document).ready(function() {
    $('.btnNext').click(function(){
        $('.nav-tabs > .active').next('li').find('a').trigger('click');
    });

    $('.btnPrevious').click(function(){
        $('.nav-tabs > .active').prev('li').find('a').trigger('click');
    });

    
});

</script>
</html>
