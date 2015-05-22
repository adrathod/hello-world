<?php
function IsNullOrEmptyString($question)
{	
	return (!isset($question) || trim($question)=='');
}

function get_header($title)
{
?>
<!DOCTYPE html>
<html>
   <head>
      <!-- Title here -->
      <title><?php echo $title; ?></title>
      <!-- Description, Keywords and Author -->
      <meta name="description" content="Your description">
      <meta name="keywords" content="Your,Keywords">
      <meta name="author" content="">
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
      <!-- bootstrap duallistbox -->
      <link href="css/duallistbox.css" rel="stylesheet">
      <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
      <link rel="stylesheet" href="css/jquery.fileupload.css">
      <!-- Bootstrap tagsinput -->
      <link rel="stylesheet" href="css/bootstrap-tagsinput.css">
      <!-- Custom CSS -->
      <link href="css/style.css" rel="stylesheet">
      <!-- Favicon -->
      <link rel="shortcut icon" href="#">
   </head>
   <body>
      <!-- Page content -->      
      <div class="page-content blocky">
      <div class="container">
      <div class="sidebar-dropdown"><a href="#">MENU</a></div>
      <div class="sidey">
         <div class="side-cont">
            <ul class="nav">
               <!-- Main menu -->
               <li class="current"><a href="dashboard.php"><i class="icon-home"></i> Dashboard</a></li>
               <li><a href="logout.php"><i class="icon-off"></i> Logout</a></li>
            </ul>
         </div>
      </div>
<?php
}
function get_footer()
{
?>
				<div class="clearfix"></div>
			</div>
		</div>
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
		<script type="text/javascript" src="js/jquery-te-1.4.0.min.js" charset="utf-8"></script>
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
		<script src="js/bootbox.js"></script>
		<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
		<script src="js/jquery.iframe-transport.js"></script>
		<!-- The basic File Upload plugin -->
		<script src="js/jquery.fileupload.js"></script>		
		<!-- Tagsinput-->
		<script src="js/bootstrap-tagsinput.min.js"></script>
		<script src="js/typeahead.bundle.js"></script>    
		<script src="js/jquery.duallistbox.js"></script>    
		<script src="js/ckeditor.js"></script>
		<script src="js/custom.js"></script>    
	</body>	
</html>
<?php
}
?>