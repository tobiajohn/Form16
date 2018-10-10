<?php require("includes/helpers.php"); ?>
<?php render("header", ["title" => "Form16", 
		"css_files" => array("my/main"), 
		"js_files" => array("")]); //give above:- the name of css or js files to be included, located in 'lib' directory.
?>

<!-- 
	Code Begins 
-->



<!-- main screen -->
<div class="container">
	
	<br>
	<div class="row">
		
		<!-- poster -->
	
		<div class="col s6">
			<img class="materialboxed responsive-img z-depth-1" src="images/homePoster.jpg" style="max-height:auto;width:100%;">
		</div>
	

		<!-- rest of the details -->

		<div class="col s6">
			<div class="row right-align flow-text">
				<div class="s12"><br>
					<h3> F O R M - 1 6 </h3>
					<h5>Computation of Total Taxable Income and Income Tax</h5>
					
				</div>
			</div>
<br><br><br><br>
			<!-- buttons for first-visitor -->
			<div class="row center-align">
				<div class="col s6 offset-s3 m3 offset-m1">
					<a class="waves-effect waves-light btn grey modal-trigger" href="#about-modal">About</a><br>
				</div>
				<div class="col s6 offset-s3 m3 offset-m1">
					<a class="waves-effect waves-light btn teal accent-4 modal-trigger" href="#signup-modal">Signup</a><br>
				</div>
				<div class="col s6 offset-s3 m3 offset-m1">
					<a class="waves-effect waves-light btn teal darken-1 modal-trigger" href="#login-modal">Login</a>
				</div>
			</div>
		</div>
	</div>

</div>

<?php

	require("includes/login.php");
	require("includes/signup.php");
	require("includes/about.php");
	require("includes/forget-passwd.php");

?>


<script>
	$(document).ready(function() {
		  
		  $('.carousel').carousel();

	  	$('.modal-trigger').leanModal();
		$(".modal").width("30vw");
	});
</script>



<!-- 
	Code Ends 
-->

<?php render("footer"); ?>