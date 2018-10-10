<?php
	//just modal html, js and ajax js in this page.
?>

<!-- Modal Structure -->
  <div id="signup-modal" class="modal center-align">
  	
    <div class="modal-content">
    
      <div class="row"></div><!-- just for upper space -->
      
      <!-- form's entire row -->
      <div class="row">
	    <form class="col s12" name="signup-form" method="POST">
	      <div class="row">
	        <div class="input-field col s12">
	          <i class="material-icons prefix">account_circle</i>
	          <input onkeyup="numberonly(this)" maxlength="5" pattern="\d{5}" id="icon_prefix" type="text" class="validate" name="empid" required>
	          <label for="icon_prefix">Employee ID</label>
	        </div>
	        <div class="input-field col s12">
	          <i class="material-icons prefix">person</i>
	          <input id="icon_prefix" type="text" class="validate" name="name" required>
	          <label for="icon_prefix">Full Name</label>
	        </div>
	        <div class="input-field col s12">
	          <i class="material-icons prefix">person_pin</i>
	          <input onkeyup="ValidatePAN(this);" maxlength="10" id="icon_prefix" type="text" class="validate" name="pan" required> 
	          <label for="icon_prefix">PAN</label>
	        </div>
	        <div class="input-field col s12">
	          <i class="material-icons prefix">home</i>
	          <input id="icon_prefix" type="text" class="validate" name="address" required>
	          <label for="icon_prefix">Address</label>
	        </div> 
	        <div class="input-field col s12">
	          <i class="material-icons prefix">event</i>
	          <input id="icon_prefix" type="text" class="datepicker" name="dob" required>
	          <label for="icon_prefix">DOB</label>
	        </div> 
	        <div class="input-field col s12">
	          <i class="material-icons prefix">event</i>
	          <input id="icon_prefix" type="text" class="datepicker" name="doj" required>
	          <label for="icon_prefix">DOJ</label>
	        </div>
	        <div class="input-field col s12">
	          <i class="material-icons prefix">vpn_key</i>
	          <input id="icon_prefix2" type="password" class="validate" name="passwd" required>
	          <label for="icon_prefix2">New Password</label>
	        </div>
	        <div class="input-field col s12">
	          <i class="material-icons prefix">vpn_key</i>
	          <input id="icon_prefix3" type="password" class="validate" name="passwd2" required>
	          <label for="icon_prefix3">Retype Password</label>
	        </div>
	        <div class="input-field col s12">
	          <i class="material-icons prefix">email</i>
	          <input id="icon_prefix4" type="email" class="validate" name="email" required>
	          <label for="icon_prefix4">Email</label>
	        </div>
	      </div>
	      <!-- TODO: Captcha code -->
	      <!-- button row -->
	      <div class="row"></div>
	      <div class="row">
	    	<div class="col s4 offset-s4">
	    		<button id="signup-btn" class="btn waves-effect waves-light z-depth-0 modal-action" type="submit">signup
				    <i class="material-icons right">send</i>
				 </button>
	    	</div>
		  </div>
	    </form>
	  </div>
	  
	  
	  
    </div><!-- modal content ended -->
    
  </div>
  
  
<script type="text/javascript">
	
	//TODO: Space within username!
	//Front End Form validation using validate.js
	var signupValidator = new FormValidator('signup-form', [/*{
		/*name: 'usr',
		display: 'Username',
		rules: 'min_length[3]|max_length[20]'
	},*/{
		name: 'empid',
		display: 'EmployeeID',
		rules: 'min_length[5]|max_length[5]'
	},{
		name: 'Name',
		display: 'Full Name',
		rules: 'max_length[100]'
	},{
		name: 'pan',
		display: 'PAN',
		rules: 'max_length[10]'
	},/*{
		name:'address',
		display: 'Address'
	},{
		name: 'dob',
		display: 'DOB'
	},{
		name: 'doj',
		display: 'DOJ'
	},*/{
		name: 'passwd',
		display: 'Password',
		rules: 'min_length[5]|max_length[20]'
	},{
		name: 'passwd2',
		display: 'Password Confirmation',
		rules: 'matches[passwd]'
	}],
	function(errors, event){
		if(errors.length > 0){
			//show the errors
			errors.forEach(function(entry){
				Materialize.toast(entry.message, 4000);
			});
		}else{

			//ajax request for validation and other stuff


			var dataString = $("form[name='signup-form']").serialize();	//serialize all form inputs
			dataString += "&submit=something";

			$.ajax({
				type: "POST",
				url: "includes/signup-process.php",
				data: dataString,
				cache: false,
				success: function(result){		//our php script on the page will make sure that the 'result' is a 'message-string' which we will prompt to user
					
					Materialize.toast(result, 4000);
				}
			});

			event.preventDefault(); // avoid to execute the actual submit of the form.
		}
	});
	$('.datepicker').pickadate({
	    selectMonths: true, // Creates a dropdown to control month
	    selectYears: 100, // Creates a dropdown of 100 years to control year,
	    today: 'Today',
	    clear: 'Clear',
	    close: 'Ok',
	    format: 'yyyy-mm-dd',
	    closeOnSelect: false // Close upon selecting a date,
	  });
	function numberonly(input) {
							var empidPat=/[^0-9]/;
							input.value=input.value.replace(empidPat,"");

						}
	/*function ValidatePAN(input) { 
  	            var panPat = /^([a-z]{3}[cphfatblj][a-z]\d{4}[a-z]/i)$/;
  	            input.value=input.value.replace(panPat,"");
    			}*/
		function ValidatePAN() { 
		  var Obj = document.getElementById("textPanNo");
		        if (Obj.value != "") {
		            ObjVal = Obj.value;
		            var panPat = /^([a-zA-Z]{5})(\d{4})([a-zA-Z]{1})$/;
		            if (ObjVal.search(panPat) == -1) {
		                alert("Invalid Pan No");
		                Obj.focus();
		                return false;
		            }
		          else
		            {
		              alert("Correct Pan No");
		              }
		        }
		  } 


</script>
