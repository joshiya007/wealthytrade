<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/logo.png">
    <title>wealthytrade.in</title>

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

</head>
<body>
<div class="wrapper">
    <div class="main-panel no-slide">
        <div class="content">
            <div class="container-fluid">
                <div class="row voffset6">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center login-header-h4"><a href="login">wealthy<span>trade</span></a></h4>
                                
                                <hr class="colorgraph">
                            </div>
                            <div class="content login-form">
                                <div class="col-md-12">
                                    <form method="post" accept-charset="utf-8" id="loginform" role="form" class="form-horizontal" action="login/userlogin">
                                        <div class="form-group sliding-u-r-l">
                                            <label for="emailid"  class="sr-only">Email ID</label>
                                            <input type="email" class="form-control" autosuggest="false" name="emailid" value="" id="emailid" placeholder="Email ID*" tabindex="1" required>
                                        </div>
                                        <div class="form-group form-group sliding-u-r-l">
                                            <label for="password" class="sr-only">Password</label>
                                            <input type="password" class="form-control" name="password" value="" id="password" placeholder="Password*" tabindex="2" required>
                                        </div>
                                        <br>
                                        <div class="form-group pull-left voffset2"> 
                                            <a href="signup">Sign up</a> | <a href="forgot">Forgot Password</a>
                                        </div>
                                        <div class="form-group pull-right">              
                                            <button type="submit" name="" id="submit" tabindex="5" class="btn btn-success button">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
    </div>
</div>

</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- notifyjs to integrate Toast message like android -->
    <script src="assets/js/notify.js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>



    <script>
    // A $( document ).ready() block.
    $( document ).ready(function() {

        // Display toast for signup is successful or failed
        var signupstatus = "";
        <?php if(empty($this->session->flashdata('signupstatus'))){
        }else{ ?>
            signupstatus = '<?php echo $this->session->flashdata('signupstatus') ?>';    
        <?php } ?>
        if(signupstatus == "success"){
           notify('success','User Registration Successful',"Ready to login");   // Display success toast

        }else if(signupstatus == "failure"){
           notify('error','User Registration Failed',"Please contact Administrator");    // Display failure toast
        }


        // Display toast for login failure
        var loginstatus = "";
        <?php if(empty($this->session->flashdata('loginstatus'))){
        }else{ ?>
            loginstatus = '<?php echo $this->session->flashdata('loginstatus') ?>';    
        <?php } ?>
        if(loginstatus == "failure"){
           notify('error','User login Failed',"Please try again or contact Administrator");   // Display success toast

        }

        // Display toast for user session not available or session is expired then get sessionexpire from dashboard.php controller
        var sessionexpire = "";
        <?php if(empty($this->session->flashdata('sessionexpire'))){
        }else{ ?>
            sessionexpire = '<?php echo $this->session->flashdata('sessionexpire') ?>';    
        <?php } ?>
        if(sessionexpire == "failure"){
           notify('error','Login Session Expired',"Please try again or contact Administrator");   // Display success toast
        }
    });
    
    
    </script>



</html>


