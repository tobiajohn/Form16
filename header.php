<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title> <?= htmlspecialchars($title); ?> </title>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="shortcut icon" href="images/favicon.ico">

	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- 
		SETUP COMMON CSS & JS FILES 
	-->
	<script type="text/javascript" src="lib/jquery-1.12.1.min.js"></script>

	<!-- setup materialize.-->
	<!-- 1. import google icon font -->
		<!-- for offline case -->
	<link rel="stylesheet" href="lib/materialize/iconfont/material-icons.css">
		<!-- or, if online 
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		-->
	<!-- 2. import materialize.css -->
	<link rel="stylesheet" href="lib/materialize/css/materialize.min.css" media="screen,projection">
	<!-- 3. import materilize.js (make sure jquery has already been included) -->
	<script type="text/javascript" src="lib/materialize/js/materialize.min.js"></script>

	<script type="text/javascript" src="lib/validate.min.js"></script>


	<!-- my js: some greet functions; text resize on copy paste, etc.-->
	<script type="text/javascript" src="lib/my/main.js"></script>
	<?php
		/*
			include the "mentioned" css files
		*/
		foreach($css_files as $css_file){ 
			$css_file_path = "lib/".$css_file.".css";
			if(file_exists(__DIR__."/../".$css_file_path)){
				echo('<link rel="stylesheet" href="'.$css_file_path.'">');
			}
		}


		/*
			include the "mentioned" js files
		*/
		foreach($js_files as $js_file){ 
			$js_file_path = "lib/".$js_file.".js";
			if(file_exists(__DIR__."/../".$js_file_path)){
				echo('<script src="'.$js_file_path.'"></script>');
			}
		}


	?>

</head>
<body>