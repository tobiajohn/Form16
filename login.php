<?php
	//just modal html, js and ajax js in this page.
?>

<!-- Modal Structure -->
  <div id="login-modal" class="modal center-align">
  	
    <div class="modal-content" >
    
      <div class="row"></div><!-- just for upper space -->
      
      <!-- form's entire row -->
      <div class="row">
	    <form class="col s12" name="login-form">
	      <div class="row">
	        <div class="input-field col s12">
	          <i class="material-icons prefix">account_circle</i>
			  <input onkeyup="numberonly(this)" maxlength="5" pattern="\d{5}" id="icon_prefix" type="text" class="validate" name="empid" required>
	          <label for="icon_prefix">Employee ID</label>
	        </div> 
	        <div class="input-field col s12">
	          <i class="material-icons prefix">vpn_key</i>
	          <input id="icon_prefix_b" type="password" class="validate" name="passwd" required>
	          <label for="icon_prefix_b">Password</label>
	        </div>
	      </div>
	      <!-- button row -->
	      <div class="row"></div>
	      <div class="row">
	    	<div class="col 6 offset-s3">
	    		<button id="login-btn" class="btn waves-effect waves-light z-depth-0 modal-action" type="submit">Login
				 </button><br><br>
					<a class="modal-trigger" href="#forget-modal" style="color:#aaa;font-size:0.95em">Forget Password?</a>
	    	</div>
		  </div>
	    </form>
	  </div>
	  
	  
	  
    </div><!-- modal content ended -->
    
  </div>
  
  
<script type="text/javascript">

	
	$("#login-btn").click(function(event){
		//ajax request for validation and other stuff.

		var dataString = $("form[name='login-form']").serialize();	//serialize all form inputs
		dataString += "&submit=something";

		$.ajax({
			type: "POST",
			url: "includes/login-process.php",
			data: dataString,
			cache: false,
			success: function(result){		//our php script on the page will make sure that the 'result' is a 'message-string' which we will prompt to user
				if(result==="1"){	//'1' is result only when successfully logged in
					window.location = "adminModule.php";
				}
				else if(result === "2"){
					window.location = "home.php";
				}
				else{	//otherwise, just prompt the error message
					Materialize.toast(result, 4000);
				}
			}
		});

		event.preventDefault(); // avoid to execute the actual submit of the form.
		

	});
		function numberonly(input) {
							var empidPat=/[^0-9]/;
							input.value=input.value.replace(empidPat,"");

						}
</script>

