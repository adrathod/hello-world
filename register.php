<?php
   include "inc-common.php";
   include "inc-dbconfig.php";
   $error_msg='';
   $success_msg='';
   if(isset($_POST['join']))
   {
		$first_name=mysql_real_escape_string($_POST['first_name']);
		$last_name=mysql_real_escape_string($_POST['last_name']);
		$user_email=mysql_real_escape_string($_POST['user_email']);
		$user_pass=mysql_real_escape_string($_POST['user_pass']);
		$user_registered = date("Y-m-d");	
   	
		if(IsNullOrEmptyString($first_name))
		{ 
			$error_msg.="Please input first name.</br>"; 
		}
		if(IsNullOrEmptyString($last_name))
		{ 
			$error_msg.="Please input last name.</br>"; 
		}
		if(IsNullOrEmptyString($user_email))
		{ 
			$error_msg.="Please input email.</br>"; 
		}
		if(IsNullOrEmptyString($user_pass))
		{ 
			$error_msg.="Please input password."; 
		}
		if(empty($error_msg))
		{	
			$hash = md5($user_pass);
			$query="INSERT INTO tbl_users(first_name,last_name,user_email,user_pass,user_registered) ";
			$query.=" VALUES('$first_name','$last_name','$user_email','$hash','$user_registered')";
			$result=mysql_query($query)or die(mysql_error());
			if($result=='1')
			{
				$success_msg.=" User is registered successfully.";
			}
			else
			{
				$error_msg.=" Error in registration.";
			}
		}
   }
?>
<!DOCTYPE html>
<html>
   <head>
      <!-- Title here -->
      <title>Register</title>
      <!-- Description, Keywords and Author -->
      <meta name="description" content="Your description">
      <meta name="keywords" content="Your,Keywords">
      <meta name="author" content="Diesel Beast">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      <div class="page-content blocky">
         <div class="container">
            <div class="row" >
               <div class="col-md-12">
                  <div class="awidget login-reg" style="max-width:650px;">
                     <div class="awidget-body">
						<!-- Page title -->
						<div class="page-title text-center">
							<h2>Register</h2>
							<hr />
						</div>
						<!-- Page title -->
						<br />
                        <form class="form-horizontal" role="form" id="frm_register" method="post">
                           <div>									
                              <?php
                                 if(!empty($error_msg))
                                 {
                                 	echo "<div class='alert alert-danger'>$error_msg</div>";
                                 }
                                 else if(!empty($success_msg))
                                 {
                                 	echo "<div class='alert alert-success'>$success_msg</div>";
                                 }
                                 ?>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-3 control-label">First Name<span class="required">*</span></label>
                              <div class="col-lg-9">
                                 <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required="required"/>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-3 control-label">Last Name<span class="required">*</span></label>
                              <div class="col-lg-9">
                                 <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required="required"/>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-3 control-label">Email<span class="required">*</span></label>
                              <div class="col-lg-9">
                                 <input type="email" class="form-control" name="user_email" id="user_email" placeholder="Email" required="required"/>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-3 control-label">Password<span class="required">*</span></label>
                              <div class="col-lg-9">
                                 <input type="password" class="form-control" name="user_pass" id="user_pass" placeholder="Password" minlength="5" required="required"/>
                              </div>
                           </div>
						   <div class="form-group">
                              <label class="col-lg-3 control-label">Confirm password<span class="required">*</span></label>
                              <div class="col-lg-9">
                                 <input type="password" class="form-control" name="confirm_pass" id="confirm_pass" placeholder="Confirm Password" data-rule-equalto="#user_pass" data-msg-equalto="Please enter the same password again." minlength="5" required="required"/>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-lg-3 control-label"></label>
                              <div class="col-lg-9">
                                 <input type="submit" class="btn btn-primary" name="join" id="join" value="Submit"/>
                                 <button type="reset" class="btn btn-default">Reset</button>
                              </div>
                           </div>
                        </form>
                     </div>
                     <!--  awidgit body-->
                  </div>
                  <!-- awidget -->
               </div>
               <!-- col-md-12-->
            </div>
            <!-- row -->
         </div>
         <!-- container -->
      </div>
      <!--page-content blocky-->
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
      <!--    <script src="js/jquery.flot.js"></script>     
         <script src="js/jquery.flot.pie.js"></script>
         <script src="js/jquery.flot.stack.js"></script>
         <script src="js/jquery.flot.resize.js"></script>
         -->
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
      <!-- Custom JS -->
      <script src="js/custom.js"></script>
	  <!-- JQuery Validation JS -->
	  <script src="js/jquery.validate.js"></script>		
	  <script>
		   $(document).ready(function() {
				$("#frm_register").validate({errorElement: 'span'});
		   });
	  </script>	
   </body>
</html>