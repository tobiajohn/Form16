<?php
session_start();

//if userID not set in session i.e. user not logged in. then, redirect compulsorily to index.php
if(!isset($_SESSION['EmpID'])){
	header("Location: index.php");
}

//////////////////////////////////////////////////////////////
?>


<?php require("includes/helpers.php"); ?>
<?php render("header", ["title" => "AdminModule", 
		"css_files" => array("my/main"), 
		"js_files" => array("")]); //give above:- the name of css or js files to be included, located in 'lib' directory.
?>

<!-- 
	Code Begins 
-->
<!-- main screen -->
<!--div class="container"-->
	<br>
	<div class="slider">
			<!--div class="carousel carousel-slider center " data-indicators="true">
		    <div class="carousel-fixed-item center middle-indicator"-->
		     <div class="left">
		     	<i class="material-icons left">chevron_left</i></a>
		     </div>
		     
		     <div class="right">
		     	<i class="material-icons right">chevron_right</i></a>
		     </div>
				
		    <ul class="slides">
		      <li>
		        <img src="images/img1.jpg"> <!-- random image -->
		      </li>
		      <li>
		        <img src="images/img2.jpg"> <!-- random image -->
		      </li>
		      <li>
		        <img src="images/img3.jpg"> <!-- random image -->
		      </li>
		      <li>
		        <img src="images/img3.jpg"> <!-- random image -->
		      </li>
		    </ul>
		  </div>
<!--/div-->


<div class="container">
	<!-- greet first -->

	<div class="row center-align flow-text">
		<div class="col s10 offset-s1">
			<h3>Hello, <?php echo $_SESSION["Name"]; ?></h3>
			<p>
				Welcome to the Form 16.<br>
			</p>
		</div>
	</div>



	<!-- The buttons -->
	<div class="row center-align">
		<a class="waves-effect waves-light btn red darken-2 modal-trigger" href="#empid-modal">Add Emplyoee ID</a>
		<a class="waves-effect waves-light btn red darken-4 " href="admin_add_details.php">Add Emplyoee Details</a>
		<a class="waves-effect waves-light btn">Delete Emplyoee</a>
		<a class="waves-effect waves-light btn">Emplyoee Details</a>
	</div>
	<div class="row center-align">
		<a class="waves-effect waves-light btn teal" href="profile.php">Profile</a>
		<a class="waves-effect waves-light btn grey darken-1 modal-trigger" href="#about-modal">About</a>
		<a class="waves-effect waves-light btn-floating grey lighten-1 tooltipped" data-position="right" data-delay="50" data-tooltip="Logout" href="logout.php"><i class="material-icons">power_settings_new</i></a>
	</div>
</div>



<!-- just for about modal.. -->
<?php
	require("includes/about.php");
	require("includes/empid.php");
	require("includes/empdetails.php");
?>
<script>
	$(document).ready(function() {
	  $('.modal-trigger').leanModal();
		$(".modal").width("30vw");
	});
		$(document).ready(function(){
      		$('.slider').slider({full_width: true});
    	});
</script>

<!-- 
	Code Ends 
-->
<?php render("footer"); ?>