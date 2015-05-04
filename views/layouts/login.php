<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Login - SIPUT FUKI 2015</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
	<link href="<?=Yii::$app->params['base']?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=Yii::$app->params['base']?>css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
	
	<link href="<?=Yii::$app->params['base']?>css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
	<link href="<?=Yii::$app->params['base']?>css/style.css" rel="stylesheet" type="text/css">
	<link href="<?=Yii::$app->params['base']?>css/pages/signin.css" rel="stylesheet" type="text/css">

</head>

<body>
	
	<!--Navigasi Header-->
	<div class="navbar navbar-fixed-top">	
		<div class="navbar-inner">		
			<div class="container">			
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>			
				<a class="brand" href="index.html" style='font-family: Arial, Helvetica, sans-serif'>
					SIPUT FUKI 2K15			
				</a>			
			</div> 		
		</div> 		
	</div> 


	<!--Content Login Form-->
	<div class="account-container">
		<div class="content clearfix">
			<?= $content ?>		
		</div> 
	</div> 

	<!--Code Javascript-->
	<script src="<?=Yii::$app->params['base']?>js/jquery-1.7.2.min.js"></script>
	<script src="<?=Yii::$app->params['base']?>js/bootstrap.js"></script>	
	<script src="<?=Yii::$app->params['base']?>js/signin.js"></script>

</body>

</html>
