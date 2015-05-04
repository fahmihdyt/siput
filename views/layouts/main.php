<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>SIPUT : Sistem Informasi Publikasi Terintegrasi</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="<?=Yii::$app->params['base']?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?=Yii::$app->params['base']?>css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
<link href="<?=Yii::$app->params['base']?>css/font-awesome.css" rel="stylesheet">
 <link href="<?php echo Yii::$app->params['base']?>css/jquery-ui.css" rel="stylesheet">
 <link href="<?=Yii::$app->params['base']?>js/datatable/css/jquery.dataTables.css" rel="stylesheet">
<link href="<?=Yii::$app->params['base']?>css/style.css" rel="stylesheet">
<link href="<?=Yii::$app->params['base']?>css/pages/dashboard.css" rel="stylesheet">

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
	
	<!--Navbar atas-->
	<div class="navbar navbar-fixed-top">
	  <div class="navbar-inner">
	    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
	                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.html">SIPUT FUKI 2015</a>
	      <div class="nav-collapse">
	        <ul class="nav pull-right">
	          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
	                            class="icon-user"></i> <?= Yii::$app->user->identity->username ?> <b class="caret"></b></a>
	            <ul class="dropdown-menu">
	              <li><a href="javascript:;">Profile</a></li>
	              <li><a href="<?=Yii::$app->params['url']?>login/logout">Logout</a></li>
	            </ul>
	          </li>
	        </ul>
	       </div>      
	    </div>
	  </div>
	</div>

	<!--Mengambil Location Menu-->
	<?php 
        $urlName = $_SERVER['REQUEST_URI'];
        $url = explode('/', $urlName);
		$currentUrl = $url[4];
		$role=Yii::$app->user->identity->departemen;		
     ?>
	
	<!--Navbar bagian bawah-->
	<div class="subnavbar">
	  <div class="subnavbar-inner">
	    <div class="container">
	      <ul class="mainnav">
	        <li class="<?php echo ($currentUrl=='home')?'active':'' ?>"><a href="<?= Yii::$app->params['url']?>home"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
	        <li class='<?php echo ($currentUrl=='event')?'active':'' ?>'><a href="<?= Yii::$app->params['url']?>event"><i class="icon-group"></i><span>My Event</span> </a> </li>
	        <?php if($role=='humas'||$role=='super'){?><li class='<?php echo ($currentUrl=='humas')?'active':'' ?>'><a href="#"><i class="icon-twitter"></i><span>Humas</span> </a> </li><?php } ?>
	        <?php if($role=='media'||$role=='super'){?><li class='<?php echo ($currentUrl=='media')?'active':'' ?>'><a href="<?= Yii::$app->params['url']?>media"><i class="icon-picture "></i><span>Media</span> </a></li><?php } ?>
	        <li class='<?php echo ($currentUrl=='calender')?'active':'' ?>'><a href="#"><i class="icon-calendar  "></i><span>Publication Calender</span> </a></li>
	      	 <?php if($role=='super'){?><li class='<?php echo ($currentUrl=='akun')?'active':'' ?>'><a href="<?= Yii::$app->params['url']?>akun"><i class="icon-user"></i><span>Account</span> </a></li><?php } ?>
	     
	      </ul>
	    </div>
	  </div>
	</div>

	<div class="main" style='min-height: 423px;'>
	  <div class="main-inner">
	    <div class="container">
	      
	      	<?= $content?>
	     
	   </div>
	  </div>
	</div>



	<div class="footer">
	  <div class="footer-inner">
	    <div class="container">
	      <div class="row">
	        <div class="span12"> &copy; 2015 <a href="http://www.egrappler.com/">Relasi FUKI Fasilkom</a>. </div>
	      </div>
	    </div>
	  </div>
	</div>


<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="<?=Yii::$app->params['base']?>js/jquery-1.7.2.min.js"></script> 
<script src="<?=Yii::$app->params['base']?>js/excanvas.min.js"></script> 
<script src="<?=Yii::$app->params['base']?>js/chart.min.js" type="text/javascript"></script> 
<script src="<?=Yii::$app->params['base']?>js/bootstrap.js"></script>
<script src="<?=Yii::$app->params['base']?>js/datatable/jquery.dataTables.js"></script>
<script language="javascript" type="text/javascript" src="<?=Yii::$app->params['base']?>js/full-calendar/fullcalendar.min.js"></script>
<!--custome Date Picker-->
	<script type='text/javascript' src="<?php echo Yii::$app->params['base']?>js/jquery-ui.js"></script>
	<script>
	$(document).ready(function(){
		$( ".date" ).datepicker();
	});
	</script> 
<script src="<?=Yii::$app->params['base']?>js/base.js"></script> 

<!-- DataTables JavaScript -->
<script src="<?=Yii::$app->params['base']?>js/datatable/jquery.dataTables.js"></script>
    <!-- <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script> -->
    
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
 $(document).ready(function() {
     $('.tables').dataTable({
     	paging:true,
	    ordering:false,
	    info:false,
	    "iDisplayLength": 25
     });
 });
</script>
</body>
</html>
