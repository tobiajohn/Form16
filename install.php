<?php require("includes/helpers.php"); ?>
<?php render("header", ["title" => "Installation", 
		"css_files" => array("my/main"), 
		"js_files" => array("")]); //give above:- the name of css or js files to be included, located in 'lib' directory.
?>


<!-- 
	Code Begins 
-->

<div class="container" style="background-color:#85d8df">
	<div class="row" style="margin: 3em">
		<div class="col s12 center-align">
			<h5><strong>FORM 16</strong> &nbsp; INSTALLATION*</h5>
		<br><br>
		</div>
		<div class="col offset-s2 s8" style="text-align:justify">
			Welcome to Form16, Computation of Total Taxable Income and Income Tax. Before getting started, we need some information on the database. Enter the database connection details below and proceed.<br><br>

			(All this does is: 1. create the database with a given name, 2. import the data from <span style="font-family: courier">form16.sql</span> file,  3. write the database connection information to the configuration file <span style="font-family: courier">connection/connection_config.php</span>. You can also do all that manually.)<br><br>

			<em>note: </em> For the third step to work, the <span style="font-family: courier">connection/connection_config.php</span> must be writable (To do that, in linux, you can use the  command like:  <span style="font-family: courier">chmod 666 connection/connection_config.php</span>). Otherwise, just edit the file manually.<br><br><br>

		</div>
		<div class="col offset-s2 s8">
			<form>
				<div class="input-field col s12">
		          <input id="host" type="text" value="localhost" required>
		          <label for="host">Enter Database Host</label>
		        </div>
				<div class="input-field col s12">
		          <input id="db" type="text" value="Form16" required>
		          <label for="db">Enter Database Name</label>
		        </div>
				<div class="input-field col s12">
		          <input id="db_user" type="text" value="root" required>
		          <label for="db_user">Enter Database User</label>
		        </div>
				<div class="input-field col s12">
		          <input id="db_password" type="password">
		          <label for="db_password">Enter Database Password</label>
		        </div>
		        <div class="col s12 center-align">
		        	<br><br>
		        	<a id="install" class="waves-effect waves-light btn">INSTALL</a>
				</div>
			</form>
		</div>

		<div class="col offset-s2 s8" style="text-align:justify">
			<br><br><br><br>

			<strong>Note: </strong>	We assume two other things also.<br><br>

			One: that you have already installed Apache, PHP and MySQL. (Installing a web development stack like WAMP or XAMPP is recommended.)<br><br>

			Two: All the files and folders in the game folder (which is hosted on the server) have been given 'enough' permissions. If you are using linux, you can assign permissions like this: Open terminal, Go to that folder using commandline, and use the command: <span style="font-family: courier">chmod 755 * -R</span><br>
			Also, give 'writable' permissions to the DB configuration file: <span style="font-family: courier">connection/connection_config.php</span> by using a command like: <span style="font-family: courier">chmod 666 connection/connection_config.php</span><br><br>

			*<span class="cyan lighten-3">Just some patience and efforts in the Installation, and then, a <span class="red lighten-3">Marvellous</span> experience awaits you.</span><br><br><br>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$('select').material_select();
});

$("#install").click(function(){
	//var dbType = $("#db_type").val();
	var host = $.trim($("#host").val());
	var db = $.trim($("#db").val());
	var db_user = $.trim($("#db_user").val());
	var db_password = $.trim($("#db_password").val());

	//validate
	if(host == "" || db == "" || db_user == ""){
		Materialize.toast("Enter remaining fields.", 8000);
		return;
	}

	//proceed --> send ajax to create php file.
	//ajax request for validation and other stuff.

	var dataString = "host=" + host + "&db=" + db + "&db_user=" + db_user + "&db_password=" + db_password + "&submit=something";	//serialize all inputs

	$.ajax({
		type: "POST",
		url: "install-process.php",
		data: dataString,
		cache: false,
		success: function(result){		//our php script on the page will make sure that the 'result' is a 'message-string' which we will prompt to user
			if(result==="1"){	//'1' is result only when successfully logged in
				//window.location = "index.php";
				Materialize.toast("Congratulations. Installed Successfully!!", 3000);
				setTimeout(function(){
					    //do what you need here
						window.location = "index.php";
					}, 3000);
			}else if(result === "1045"){//otherwise, just prompt the error message
				Materialize.toast("Username-Password is incorrect.", 4000);

			}else if(result === "2005"){//otherwise, just prompt the error message
				Materialize.toast("DB Host is incorrect.", 4000);

			}else if(result == "not-writable"){
				var amsg = "Sorry, I can't write to &nbsp; <span style='font-family:courier'>connection_config.php</span> &nbsp; file. Do this manually yourself.";
				Materialize.toast(amsg, 4000);
			}else{	//otherwise, just prompt the error message
				Materialize.toast("Incorrect details.", 4000);
			}
		}
	});

	event.preventDefault(); // avoid to execute the actual submit of the form.
		
});
</script>
<!-- 
	Code Ends 
-->

<?php render("footer"); ?>