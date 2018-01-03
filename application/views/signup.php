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
                            <div class="content signup-form">
                                <div class="col-md-12">
                                    <form method="post" accept-charset="utf-8" id="signupform" role="form" class="form-horizontal" action="signup/insert">
                                        <div class="form-group sliding-u-r-l">
                                            <label for="name"  class="sr-only">Name</label>
                                            <input type="text" class="form-control" autosuggest="false" name="name" value="" id="name" placeholder="Name*" tabindex="1" required>
                                        </div>
                                        <div class="form-group sliding-u-r-l">
                                            <label for="email"  class="sr-only">Email ID</label>
                                            <input type="email" class="form-control" autosuggest="false" name="email" value="" id="emailid" placeholder="Email ID*" tabindex="2" required>
                                        </div>
                                        <div class="form-group sliding-u-r-l">
                                            <label for="password"  class="sr-only">Password</label>
                                            <!-- <input type="password" class="form-control"  name="password" value="" id="password" placeholder="Password*" tabindex="2" required> -->
                                            <div class="password">
                                                <input type="password" id="passwordfield" autosuggest="false" class="form-control"  placeholder="password"name="password" tabindex="2" required>
                                                <span class="label">SHOW</span>
                                            </div>
                                        </div>
                                        <div class="form-group pull-left voffset4"> 
                                            <a href="../login">Go Back</a>
                                        </div>
                                        <br>
                                        <div class="form-group pull-right">              
                                            <button type="submit" name="" id="submit" tabindex="4" class="btn btn-success button">Sign Up</button>
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

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>
    <script>
    
    </script>
	
</html>


