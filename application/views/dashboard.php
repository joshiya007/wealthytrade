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

    <!-- Bootstrap tour -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.11.0/css/bootstrap-tour.min.css">
</head>
<body>

<div class="wrapper">
    <div class="main-panel no-slide-content dashboard-background">
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
                        
                        <li class="dropdown user-options-tour">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                                    <i class="ti-user white"></i>
                                    <p class="white"><?php echo $this->session->userdata('sessionusername'); ?></p>
                                    <b class="caret white"></b>
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

        
        <div class="content-touch">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="card">
                            <div class="col-md-5 pull-left voffset2">
                                <div class="header">
                                    <h4 class="title">Welcome to testaid</h4>
                                    <p class="category">Continue testing your apps with testaid using <br>some of the resources below</p>
                                </div>
                                
                                <div class="row content">
                                    <div class="col-md-6 voffset2">
                                        <div class="form-group">
                                            <a href="#" class="loffset1" onclick="localStorage.clear(); tour.init(); tour.start(); localStorage.clear()"> <i class="ti-direction"></i><span class="loffset2">Take Tour</span> </a>
                                        </div>
                                        <div class="form-group">
                                            <a href="#" class="loffset1"> <i class="ti-file"></i><span class="loffset2">Documentation</span> </a>
                                        </div>
                                        <div class="form-group">
                                            <a href="#" class="loffset1"> <i class="ti-video-clapper"></i><span class="loffset2">Sample Demo</span> </a>
                                        </div>
                                        <div class="form-group">
                                            <a href="#" class="loffset1"> <i class="ti-money"></i><span class="loffset2">Pricing</span> </a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-7 voffset2 getting-started-tour" >
                                <div class="header">
                                    <h4 class="title">Getting Started</h4>
                                    <p class="category">Create application of your choice </p>
                                </div>
                                <a href="#" data-toggle="modal" data-target="#webapp-add-model">
                                    <div class="col-md-3 text-center voffset5">
                                        <img src="assets/img/web.png" class="app-icon text-center" />
                                        <h5>Web</h5>
                                </div></a>
                                <a href="#">
                                    <div class="col-md-3 text-center voffset5">
                                        <img src="assets/img/ios.png" class="app-icon text-center" />
                                        <h5>iOS</h5>
                                </div></a>
                                <a href="#">
                                    <div class="col-md-3 text-center voffset5">
                                        <img src="assets/img/android.png" class="app-icon text-center" />
                                        <h5>Android</h5>
                                </div></a>
                            
                            </div>
                        </div>
                        <?php if(count($applistdata) > 0){ ?>
                        <div class="row voffset2">
                            <div class="header">
                                <h4 class="title"></h4>
                                <p class="category loffset3 gray existing-app-tour">Your existing applications</p>
                            </div>
                            <div class="content">
                                <?php foreach($applistdata as $app){ ?>
                                <div class="col-sm-4">
                                    <div class="offer app">
                                        <div class="shape">
                                            <a href="#" data-toggle="modal" data-target="#app-delete-model-<?php echo str_replace(' ', '', $app['appname']); ?>">
                                                <div class="shape-text">
                                                    <i class="ti-trash"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="offer-content">
                                            <h3 class="lead">
                                                <?php if($app['variant'] === "web"){?>
                                                <i class="ti-split-v-alt"></i>
                                                <?php } ?>
                                                <?php if($app['variant'] === "android"){?>
                                                <i class="ti-android"></i>
                                                <?php } ?>
                                                <?php if($app['variant'] === "ios"){?>
                                                <i class="ti-apple"></i>
                                                <?php } ?>
                                                <a href="appdashboard?app=<?php echo urlencode($app['appname']); ?>"> <?php echo $app['appname'] ?></a>
                                            </h3>
                                            <hr>
                                            <!--<div class="text-center">
                                                <div class="col-sm-4 test-status">
                                                    <i class="ti-menu-alt example" data-toggle="tooltip" title="Total Test Cases" data-content="Total 48 Test cases"></i> <p>48</p>
                                                </div>
                                                <div class="col-sm-4 test-status green"> 
                                                    <i class="ti-check example" data-toggle="tooltip" title="Passed Test Cases" data-content="Passed 45 Test cases"></i><p>45</p>
                                                </div>
                                                <div class="col-sm-4 test-status danger-color"  >
                                                    <i class="ti-na example" data-toggle="tooltip" title="Failed Test Cases" data-content="Failed 3 Test cases"></i> <p>3</p>
                                                </div>
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
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
<div id="webapp-add-model" class="row modal animated fadeIn" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content col-sm-8 col-sm-offset-2">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridModalLabel">Create Application</h4>
      </div>
      <div class="modal-body">
        <form action="applications" method="post">
            <div class="form-group sliding-u-r-l no-display">
                <label for="emailid"  class="sr-only">Email ID</label>
                <input type="text" data-toggle="tooltip" title="Email ID"  class="form-control" autosuggest="false" name="emailid" value="<?php echo $this->session->userdata('sessionemailid'); ?>" id="emailid" placeholder="Email ID*" tabindex="1" required>
            </div>
            <div class="form-group sliding-u-r-l no-display">
                <label for="variant"  class="sr-only">App Variant</label>
                <input type="text" data-toggle="tooltip" title="variant"  class="form-control" autosuggest="false" name="variant" value="web" id="variant" placeholder="App Variant*" tabindex="1" required>
            </div>
            <div class="form-group sliding-u-r-l">
                <label for="appname"  class="sr-only">Application Name</label>
                <input type="text" data-toggle="tooltip" title="Enter unique name for application"  class="form-control " autosuggest="false" name="appname" value="" id="appname" placeholder="Application Name*" tabindex="1" required>
            </div>
            <div class="form-group form-group sliding-u-r-l">
                <label for="slaveurl" class="sr-only">Slave URL</label>
                <input type="url" data-toggle="tooltip" title="Ex. http://slave-domain:4444" class="form-control example-focus" name="slaveurl" value="" id="slaveurl" placeholder="Slave URL*" tabindex="2" required>
            </div>
            <div class="form-group form-group sliding-u-r-l">
                <label for="appurl" class="sr-only">Application URL</label>
                <input type="url" data-toggle="tooltip" title="Ex. http://app-domain:8080"  class="form-control example-focus" name="appurl" value="" id="appurl" placeholder="Application URL*" tabindex="2" required>
            </div>
            <div class="form-group pull-right">              
                <button type="submit" name="" id="submit" tabindex="5" class="btn btn-success button">Create</button>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>

<?php if(count($applistdata) > 0){ ?>
<?php $index = 0; ?>
<?php foreach($applistdata as $app){ ?>
<div id="app-delete-model-<?php echo str_replace(' ', '', $app['appname']); ?>" class="row modal animated fadeIn" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content col-sm-8 col-sm-offset-2">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridModalLabel">Delete Application</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <p>When you delete a project, this immediately happens:
                <li>You lose entire Test Suites</li>
                <li>You lose entire Test Cases & Resources</li>
            <p style="font-size: 13px" class="voffset3">To delete your project, type : <span class="danger-color"><?php echo $app['appname']; ?></span></p>
            
        </div>
        <form action="applications/deleteapp" method="POST">
            <div class="form-group sliding-u-r-l">
                <label for="appname"  class="sr-only">Application Name</label>
                <input type="text" data-toggle="tooltip" title="Enter Application Name provided"  class="form-control" autosuggest="false" name="appname" value="" id="appname<?php echo $index; ?>" placeholder="Application Name*" tabindex="1" required>
            </div>
            <div class="form-group pull-right">              
                <button type="submit" name="" onclick="return validateAppName('<?php echo $app['appname'];?>','appname<?php echo $index; ?>')" id="submit" tabindex="5" class="btn btn-success button">Delete</button>
            </div>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<?php $index = $index + 1; ?>
<?php } ?>
<?php } ?>

</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Bootstrap Javascript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.11.0/js/bootstrap-tour.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="assets/js/bootstrap-checkbox-radio.js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="assets/js/paper-dashboard.js"></script>

<!-- notifyjs to integrate Toast message like android -->
<script src="assets/js/notify.js"></script>

<script>
$( document ).ready(function() {
    localStorage.clear();  

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


var tour = new Tour({
    smartPlacement: true,
    storage: window.localStorage,
    debug: false,
    backdrop: false,
    backdropContainer: 'main-panel',
    steps: [
    {
        element: ".getting-started-tour",
        title: "Step 1 : Getting Started",
        content: "To automate various types of application by adding here",
        backdrop: true,
        backdropPadding: 5
    },{
        path: "/appdashboard?app=DemoApp",
        element: ".user-options-tour",
        title: "Step 1 : Getting Started",
        content: "To automate various types of application by adding here",
        backdrop: true,
        backdropPadding: 5 
    }
]});

</script>
</html>
