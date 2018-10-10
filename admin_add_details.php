<?php
session_start();

//if userID not set in session i.e. user not logged in. then, redirect compulsorily to index.php
if(!isset($_SESSION['EmpID'])){
	header("Location: index.php");
}

//////////////////////////////////////////////////////////////
?>


<?php require("includes/helpers.php"); ?>
<?php render("header", ["title" => "add_detail", 
		"css_files" => array("my/main"), 
		"js_files" => array("")]); //give above:- the name of css or js files to be included, located in 'lib' directory.
?>
<?php
	include "includes/connect.php";


	 if(empty($_POST) === false && empty($errors) === true){
			$empid = $_POST['empid'];
			$hs = $_POST['hs'];
			$gs = $_POST['gs'];
			$r = $_POST['r'];
			$epf = $_POST['epf'];
			$lic = $_POST['lic'];
			$td = $_POST['td'];
			if($empid == "" || $empid == "0"){
				$errMsg = "Employee Id must not be empty or 0 <br>";
 				goto end;

			}
			if($empid == "" || $hs == "" || $gs == "" || $r == "" || $epf == "" || $lic == "" || $td == ""){
 	$errMsg = "All fields are required. <br>";
 	goto end;
}

			
	 add_keyword($empid,$hs,$gs,$r,$epf,$lic,$td);
	   exit();  
	}
	function add_keyword($empid,$hs,$gs,$r,$epf,$lic,$td){
		global $con;
		$empid = $empid;
		$hs = $hs;
		$gs = $gs;
		$r = $r;
		$epf = $epf;
		$lic = $lic;
		$td = $td;
/*
		$keyword = $keyword;
		$Subject = $Subject;
		$description = $description;

*/	
		$stmt = $con->prepare("INSERT INTO `formdetails`(`EmpID`, `GrossSalaryA`, `GrossSalary`, `Remuneration`, `EPF`, `LIC`, `TDAT`) VALUES ('$empid','$hs','$gs','$r','$epf','$lic','$td')");
		$stmt->execute();
		if($stmt->rowCount()>0){		//meaning, empid already exist!
			echo'<h1>Details successfully addedd</h1>';			
		}
		else{
		echo'<h1>Data does not entered</h1>';
		}
	}

	$errMsg = "UnSuccessfully insertion :)";	//not actually an error message !:)

//Step final: close DB connection & echo errMessage
end:

$con = null;
echo "<h1>".$errMsg."</h1>";
?>


	<div id=m1>
	<form name="add" method="POST" action="">
			<table>
				<tr>
					<td>Employee ID</td>
					<td><input type="text" name="empid" id="empid" value="0" class="validate"required onkeyup="numberonly(this)"></td>
				</tr>
				<tr>
					<td>Income Chargeable under head Salary</td>
					<td><input type="text" name="hs" id="hs" value="0" class="validate" required onkeyup="numberonly(this)"></td>
				</tr>
				<tr>
					<td>Gross Salary</td>
					<td><input type="text" name="gs" id="gs" value="0" class="validate" required onkeyup="numberonly(this)"></td>
				</tr>
				<tr>
					<td>Remuneration</td>
					<td><input type="text" name="r" id="r" value="0" class="validate" required onkeyup="numberonly(this)"></td>
				</tr>
				<tr>
					<td>EPF</td>
					<td><input type="text" name="epf" id="epf" value="0" class="validate" required onkeyup="numberonly(this)"></td>
				</tr>
				<tr>
					<td>LIC</td>
					<td><input type="text" name="lic" id="lic" value="0" class="validate" required onkeyup="numberonly(this)"></td>
				</tr>
				<tr>
					<td>Tax Deducted at source</td>
					<td><input type="text" name="td" id="td" value="0" class="validate" required onkeyup="numberonly(this)"></td>
				</tr>
			
			</table>
				<center><button class="button">Submit</button></center>
	</form>	

	</div>
	
	<script>
		var signupValidator = new FormValidator('add', [/*{
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
				//url: "includes/signup-process.php",
				data: dataString,
				cache: false,
				success: function(result){		//our php script on the page will make sure that the 'result' is a 'message-string' which we will prompt to user
					
					Materialize.toast(result, 4000);
				}
			});

			event.preventDefault(); // avoid to execute the actual submit of the form.
		}
	});


		function numberonly(input){
		
			var regex=/[^0-9]/;
			input.value=input.value.replace(regex,"");
		
		}
		
	</script>

<?php render("footer"); ?>
