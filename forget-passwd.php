<?php
	//just modal html, js and ajax js in this page.
?>
<!-- Modal Structure -->
  <div id="forget-modal" class="modal center-align">
  	
    <div class="modal-content" >
    
      <div class="row"></div><!-- just for upper space -->
      
      <div class="row">
      	To <strong>Reset</strong> your password to "password":<br><br>

      	Submit your email id (with which you registered) encrypted using Caesar Cipher and key = 2.<br><br>

      	<span style="color:#444">( Example: &nbsp; a@a.com &nbsp; => &nbsp; c@c.eqo )</span>

      </div>

      <!-- form's entire row -->
      <div class="row">
	    <form class="col s12" name="forget-form">
	      <div class="row">
	        <div class="input-field col s12">
	          <input id="username" type="text" name="username" required>
	          <label for="username">Username</label>
	        </div>
	        <div class="input-field col s12">
	          <input id="encrypted" type="text" name="encrypted" required>
	          <label for="encrypted">Encrypted email Id</label>
	        </div>
	      </div>
	      <!-- button row -->
	      <div class="row"></div>
	      <div class="row">
	    	<div class="col s4 offset-s4">
	    		<button id="submit-btn" class="btn waves-effect waves-light z-depth-0 modal-action" type="submit">Submit
				 </button>
	    	</div>
		  </div>
	    </form>
	  </div>
	  
	  
	  
    </div><!-- modal content ended -->
    
  </div>
  
  
<script type="text/javascript">

	
$("#submit-btn").click(function(event){
	//ajax request for validation and other stuff.

	var username = $.trim($("#username").val());
	var encrypted = $.trim($("#encrypted").val());

	//validate
	if(username == "" || encrypted == ""){
		Materialize.toast("Enter remaining fields.", 8000);
		return;
	}

	//decrypt the entered email
	var email = caesar(encrypted, 2, true);

	//proceed --> send ajax to create php file.
	//ajax request for validation and other stuff.

	var dataString = "username=" + username + "&email=" + email + "&submit=something";	//serialize all inputs

	$.ajax({
		type: "POST",
		url: "includes/forget-passwd-process.php",
		data: dataString,
		cache: false,
		success: function(result){		//our php script on the page will make sure that the 'result' is a 'message-string' which we will prompt to user
			Materialize.toast(result, 4000);
			
		}
	});

	event.preventDefault(); // avoid to execute the actual submit of the form.
	

});

//Our main JS function for this Cipher technique
//Parameters:- iString: string, key: num between 1-25; mode: false[encrypt]/true[decrypt]
function caesar(iString, key, mode){
	var oString = "";

	//the computation goes here.
	//oString = iString;
	
	var iString = iString.toUpperCase();
	
	//var letterArray = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
    var letterArray = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";		//it's actually string as an array!
    
    //for each character in string:
    for(var i=0; i<iString.length; i++){
    	var character = iString.charAt(i);
    	var digit = 0;
    	
    	//check if it's a letter
    	if(letterArray.indexOf(character)>-1){	//meaning, it IS a letter, in the "letterArray".
    		digit = letterArray.indexOf(character);
    		
    		//now we have 'index' of that character; eg: A=0, B=1, ... Z=25.
    		
    		if(mode==false){	//ENCRYPTION checked
    			//code for encryption
    			//Step 1: add the key
    			digit += eval(key);
    			
    			//Step 2: Check
    			if(digit>25){	//for: overflow more than 25!
    				digit = digit % 26;
    				oString += letterArray.charAt(digit);
    			}else{	//meaning, no overflow. normal.
    				oString += letterArray.charAt(digit);
    			}
    			
    		}else{	//DECRYPTION checked
    			//code for decryption
    			//Step 1: shift back / subtract the key
    			digit -= eval(key);
    			//Step 2: Check
    			if(digit<0){	//for: underflow less than 0, eg: -1, -2, etc.
    				digit = digit + 26;
    				oString += letterArray.charAt(digit);
    			}else{	//meaning, no underflow. normal.
    				oString += letterArray.charAt(digit);
    			}
    		}
    		
    	}else{	//it's not in "letterArray"
    		oString += character;
    	}
    		
    }
	return oString;
}
</script>
</script>