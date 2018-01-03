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
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="active">
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
                        &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="login">wealthytrade.in</a>
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
                <a href="dashboard" class="navbar-brand login-header-h4"><img class="img-responsive" src="assets/img/logo.png">wealthytrade</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="">
                        <a href="appdashboard?app=<?php echo $this->input->get('app'); ?>" >
                            <i class="ti-layout-grid2"></i>
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
    
    <div class="main-panel no-slide-no-bg voffset3">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-plain loffset1">
                            <div class="header">
                                <h4 class="title uppercase"><?php echo $this->input->get('app'); ?></h4>
                                <p class="category lineheight0_0">Dashboard</p>
                            </div>
                            <div class="content">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-wallet gray"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-8">
                                        <div class="numbers">
                                            <p>Test Cases</p>
                                            1,345
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="ti-reload"></i> Current Status
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-check green"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-8">
                                        <div class="numbers">
                                            <p>Passed</p>
                                            1,325
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="ti-reload"></i> Current Status
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-na danger-color"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-8">
                                        <div class="numbers">
                                            <p>Failed</p>
                                            23
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="ti-reload"></i> Current Status
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-server icon-success"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-8">
                                        <div class="numbers">
                                            <p>No Run</p>
                                            2
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="ti-reload"></i> Current Status
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer-app-dashboard-normal">
            <div class="container-fluid">
                <div class="copyright text-center">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="login">wealthytrade.in</a>
                </div>
            </div>
        </footer>
    </div>
</div>

</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="assets/js/bootstrap-checkbox-radio.js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="assets/js/paper-dashboard.js"></script>

<!-- notifyjs to integrate Toast message like android -->
<script src="assets/js/notify.js"></script>

<script>
$( document ).ready(function() {
    $('input[type=text]').tooltip({
        placement: "right",
        trigger: "focus"
    });
    $('input[type=url]').tooltip({
        placement: "right",
        trigger: "focus"
    });  

   

    // Display toast for application created successfully or failed to create
    var appcreatestatus = "";
    <?php if(empty($this->session->flashdata('appcreatestatus'))){
    }else{ ?>
        appcreatestatus = '<?php echo $this->session->flashdata('appcreatestatus') ?>';    
    <?php } ?>
    if(appcreatestatus == "success"){
       notify('success','Application created successfully',"");   // Display success toast
    }else if(appcreatestatus == "failure"){
       notify('error','Application creation failed',"Please try again");    // Display failure toast
    }



    // Display toast for application created successfully or failed to create
    var appdeletestatus = "";
    <?php if(empty($this->session->flashdata('appdeletestatus'))){
    }else{ ?>
        appdeletestatus = '<?php echo $this->session->flashdata('appdeletestatus') ?>';    
    <?php } ?>
    if(appdeletestatus == "success"){
       notify('success','Application deleted successfully',"");   // Display success toast
    }else if(appdeletestatus == "failure"){
       notify('error','Application deletion failed',"Please try again");    // Display failure toast
    }
});



$('.example').each(function() {
    var options = {
        placement: function (context, source) {
            var position = $(source).position();
    
            if (position.left < 280) {
                return "right";
            }
    
            if (position.top < 280){
                return "bottom";
            }
            
            else {
                return "left";
            }
        } , trigger: "hover"
    };
    $('.example').popover(options);
});


$('.example-focus').each(function() {
    var options = {
        placement: function (context, source) {
            var position = $(source).position();
    
            if (position.left < 280) {
                return "right";
            }
    
            if (position.top < 280){
                return "bottom";
            }
            
            else {
                return "left";
            }
        } , trigger: "focus"
    };
    $('.example').popover(options);
});

</script>
</html>
