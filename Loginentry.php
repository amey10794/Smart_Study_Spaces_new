<?php
session_start();
//unset($_SESSION['auth']);
$auth=true;
if(isset($_SESSION['auth'])){
    if($_SESSION['auth']==0){
        $auth=false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Interns!</title>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="https://goo.gl/UHdDoA">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap-social.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="css/hover-min.css" rel="stylesheet">
    <link href="css/hover.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- My javascript files-->

</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">

        <a class="navbar-brand " href="internships.php">Smart Study Spaces</a>
    </div>

</nav>

<div class="container" style="position:absolute;margin-top:50px">
            <div class="row" align="center">
                <h1>Welcome to Smart Study Spaces</h1>
                <p>We are glad you are here!!!</p>
                <div class="col-xs-6">
                  <h2>Log In</h2>
                  <form class="form-horizontal" action="login.php" method="post"  role="form">
                    <div class="form-group">
                        
                        <div class="col-xs-12">
                            <input type="text" id="eml" class="form-control" placeholder="Email" name="eemail">
                        </div>
                      </div>
                      <div class="form-group">
                        
                        <div class="col-xs-12">
                            <input type="password" id="passl" class="form-control" placeholder="Password" name="epassword">
                        </div>
                      </div>
                      <div>
                          <?php echo  $auth==false?"<h4 style='color: red'>Email and Password don't match</h4>":""; ?>
                           </div>
                      <div>

                        <input type="submit" class="btn btn-success" value="Login">
                      </div>
                  </form>
                </div>      
                <div class="col-xs-6" style="border-left:1px ridge">
                  <h2>Sign Up</h2>
                  <form class="form-inline" action="signup.php" role="form" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                          <div class="col-xs-6">
                              <input type="text" id="firstname" name="firstname" class="form-control" placeholder="First Name">
                              <span class="input-group-addon form-control">cms</span>
                          </div>
                          <div class="col-xs-6">
                              <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Last Name">
                              <span for="lastname" class="input-group-addon form-control">cms</span>
                          </div>
                      </div>
                      <div class="form-group">
                        
                        <div class="col-xs-12">
                            <input type="text" id="em" class="form-control" name="email" placeholder="Email">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-xs-12">
                            <input type="password" id="password" class="form-control" placeholder="Set Password" name="password">
                        </div>
                      
                      </div>
                      <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" id="org" class="form-control" placeholder="Company or College Name" name="org">
                        </div>
                      </div>
                      <div class="form-group">
                          <label class="col-xs-3 control-label" for="mem" style="font-size:30px">You are:</label>
                          <div class="col-xs-4">
                              
                              Student:<input type="radio" id="mem" value="1" class="form-control" name="mem">
                              
                          </div>
                          <div class="col-xs-4">
                            Employer:<input type="radio" id="mem" value="2"  class="form-control" name="mem">
                          </div>
                      </div>
                      
                      <div>
                        <input type="submit" class="btn btn-success" name="Submit" value="Get Interned">
                      </div>
                      
                  </form>
                </div>
            </div>
            
        </div>
        
</body>
</html>