<?php
	include "inc-common.php";
	include "inc-dbconfig.php";
	session_start();
	$error_msg="";
	
	if(!isset($_SESSION['user_id']))
	{
		// Check if the cookie exists
		if(isset($_COOKIE["autologin"]))
		{
			$sql = "SELECT * FROM tbl_users WHERE user_status='0' AND user_email='".$_COOKIE["user_email"]."' AND user_pass='".$_COOKIE["user_pass_hash"]."'";
			$result = mysql_query($sql)or die(mysql_error());		
			if(mysql_num_rows($result)>0)
			{
				$row = mysql_fetch_assoc($result);
				$_SESSION['user_id']=$row['user_id'];
				$_SESSION['user_email']=$row['user_email'];
				$_SESSION['user_name']=$row['first_name']." ".$row['last_name'];
			}		
		}
	}

	if(isset($_SESSION['user_id']))
	{
		header("Location:dashboard.php");
		exit;
	}
	
	if(isset($_POST['submit']))
	{
		$flag=0;
		$user_email=mysql_real_escape_string($_POST['user_email']);
		$user_pass=mysql_real_escape_string($_POST['user_pass']);	
		if(isset($_POST['autologin']))
			$autologin=mysql_real_escape_string($_POST['autologin']);
		else
			$autologin="0";
		if(IsNullOrEmptyString($user_email))
		{
			$error_msg = "Email is required.\n";
			$flag=1;
		}
		if(IsNullOrEmptyString($user_pass))
		{
			$error_msg .= "Password is required.\n";
			$flag=1;
		}
		if($flag==0)
		{
			$hash = md5($user_pass);
			$sql = "SELECT * FROM tbl_users WHERE user_status='0' AND user_email='$user_email' AND user_pass='$hash'";
			$result = mysql_query($sql)or die(mysql_error());
			if(mysql_num_rows($result)==0)
			{
				$error_msg="Please enter valid Email or Password.";
			}
			else
			{	
				$row = mysql_fetch_assoc($result);
				$_SESSION['user_id']=$row['user_id'];
				$_SESSION['user_email']=$row['user_email'];
				$_SESSION['user_name']=$row['first_name']." ".$row['last_name'];
				if($autologin == 1)
				{
					setcookie ("autologin", "1", time() + (3600 * 24 * 30)); // 30 days
					setcookie ("user_email", $row['user_email'], time() + (3600 * 24 * 30));
					setcookie ("user_pass_hash", md5($row['user_pass']), time() + (3600 * 24 * 30));
				}
				if(isset($_SESSION['back_url_user']))
				{
					header("Location:".$_SESSION['back_url_user']);
				}else{
					header("Location:dashboard.php");
				}
			}
		}
	}
?>

<!DOCTYPE html>
<html>
   <head>
      <!-- Title here -->
      <title>Login</title>
      <!-- Description, Keywords and Author -->
      <meta name="description" content="Your description">
      <meta name="keywords" content="Your,Keywords">
      <meta name="author" content="ResponsiveWebInc">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
      <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600italic,600' rel='stylesheet' type='text/css'>
      <!-- Styles -->
      <!-- Bootstrap CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- Animate css -->
      <link href="css/animate.min.css" rel="stylesheet">
      <!-- Gritter -->
      <link href="css/jquery.gritter.css" rel="stylesheet">
      <!-- Calendar -->
      <link href="css/fullcalendar.css" rel="stylesheet">
      <!-- Bootstrap toggable -->
      <link href="css/bootstrap-switch.css" rel="stylesheet">
      <!-- Date and Time picker -->
      <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
      <!-- Star rating -->
      <link href="css/rateit.css" rel="stylesheet">
      <!-- Star rating -->
      <link href="css/jquery.cleditor.css" rel="stylesheet">
      <!-- jQuery UI -->
      <link href="css/jquery-ui.css" rel="stylesheet">
      <!-- prettyPhoto -->
      <link href="css/prettyPhoto.css" rel="stylesheet">
      <!-- Font awesome CSS -->
      <link href="css/font-awesome.min.css" rel="stylesheet">
      <!-- Custom CSS -->
      <link href="css/style.css" rel="stylesheet">
      <!-- Favicon -->
      <link rel="shortcut icon" href="#">
   </head>
   <body>
      <!-- Logo & Navigation starts -->
      <div class="header">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <!-- Logo -->
                  <div class="logo text-center">
                     <h1><a href="#">My System</a></h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Logo & Navigation ends -->
      <!-- Page content -->
      <div class="page-content blocky">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="awidget login-reg">
                     <div class="awidget-head">
                     </div>
                     <div class="awidget-body">
                        <!-- Page title -->
                        <div class="page-title text-center">
                           <h2>Login</h2>
                           <hr />
                        </div>
                        <!-- Page title -->
						<?php
							if(!IsNullOrEmptyString($error_msg))
								echo "<div class='alert alert-danger'>$error_msg</div>";
						?>
                        <form name="frm_login" id="frm_login" class="form-horizontal" role="form" method="post">							
                           <div class="form-group">
                              <label for="user_email" class="col-lg-2 control-label">Email</label>
                              <div class="col-lg-10">
                                 <input type="email" class="form-control" name="user_email" id="user_email" placeholder="Email" required="required">
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="user_pass" class="col-lg-2 control-label">Password</label>
                              <div class="col-lg-10">
                                 <input type="password" class="form-control" name="user_pass" id="user_pass" placeholder="Password" required="required">
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-lg-offset-2 col-lg-10">
                                 <div class="checkbox">
                                    <label>
                                    <input name="autologin" id="autologin" type="checkbox" value="1"> Remember me
                                    </label>
                                 </div>
                              </div>
                           </div>
                           <hr />
                           <div class="form-group">
                              <div class="col-lg-offset-2 col-lg-10">
                                 <button name="submit" type="submit" class="btn btn-info">Sign in</button>
                                 <button type="reset" class="btn btn-default">Reset</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Footer starts -->
      <footer>
         <div class="container">
            <div class="copy text-center">
               Copyright <?php echo date('Y'); ?> &copy; - <a href="#">My System</a>
            </div>
         </div>
      </footer>
      <!-- Footer ends -->
      <!-- Scroll to top -->
      <span class="totop"><a href="#"><i class="icon-chevron-up"></i></a></span> 
      <!-- Javascript files -->
      <!-- jQuery -->
      <script src="js/jquery.js"></script>
      <!-- Bootstrap JS -->
      <script src="js/bootstrap.min.js"></script>  
      <!-- jQuery UI -->
      <script src="js/jquery-ui-1.10.2.custom.min.js"></script>     
      <!-- jQuery Peity -->
      <script src="js/peity.js"></script>  
      <!-- Calendar -->
      <script src="js/fullcalendar.min.js"></script>  
      <!-- jQuery Star rating -->
      <script src="js/jquery.rateit.min.js"></script>
      <!-- prettyPhoto -->
      <script src="js/jquery.prettyPhoto.js"></script>  
      <!-- jQuery flot -->
      <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
      <script src="js/jquery.flot.js"></script>     
      <script src="js/jquery.flot.pie.js"></script>
      <script src="js/jquery.flot.stack.js"></script>
      <script src="js/jquery.flot.resize.js"></script>
      <!-- Gritter plugin -->
      <script src="js/jquery.gritter.min.js"></script> 
      <!-- CLEditor -->
      <script src="js/jquery.cleditor.min.js"></script> 
      <!-- Date and Time picker -->
      <script src="js/bootstrap-datetimepicker.min.js"></script>  
      <!-- jQuery Toggable -->
      <script src="js/bootstrap-switch.min.js"></script>
      <!-- Respond JS for IE8 -->
      <script src="js/respond.min.js"></script>
      <!-- HTML5 Support for IE -->
      <script src="js/html5shiv.js"></script>
	  <!-- Custom JS-->
	  <script src="js/custom.js"></script>
	  <!-- JQuery Validation JS -->
	  <script src="js/jquery.validate.js"></script>		
	  <script>
		   $(document).ready(function() {
				$("#frm_login").validate({errorElement: 'span'});
		   });
	  </script>		
   </body>
</html>