<?php
session_start();

//if userID not set in session i.e. user not logged in. then, redirect compulsorily to index.php
if(!isset($_SESSION['EmpID'])){
	header("Location: index.php");
}

//////////////////////////////////////////////////////////////
?>


<?php require("includes/helpers.php"); ?>
<?php render("header", ["title" => "Form 16", 
		"css_files" => array("my/main"), 
		"js_files" => array("")]); //give above:- the name of css or js files to be included, located in 'lib' directory.
?>

<!-- 
	Code Begins 
-->



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
		<div class="row">
			<div class="col offset-s2 s7">
				<ul class="collapsible popout" data-collapsible="accordion">	
		    		<li>
		      			<div class="collapsible-header">Fill Form 16<i class="material-icons right">send</i></div>
		      			<div class="collapsible-body">
		      				<?php render_form(); ?>
		      			</div>
		    		</li>
		    	</ul>
			</div>
		</div>
		<div class="row">
			<div class="col s6 offset-s3">
			<a class="waves-effect waves-light btn-large cyan darken-3" href="cryptolab.php">Past Year Report<i class="material-icons right">description</i></a>
			</div>
		</div>

		<div class="row"><div class="col s6 offset-s3">
			<a class="waves-effect waves-light btn teal" href="profile.php">Profile</a>
		</div></div>
		<div class="row"><div class="col s6 offset-s3">
			<a class="waves-effect waves-light btn grey darken-1 modal-trigger" href="#about-modal">About</a>
		</div></div>
		<div class="row"><div class="col s6 offset-s3">
			<a class="waves-effect waves-light btn-floating red lighten-1 tooltipped" data-position="right" data-delay="50" data-tooltip="Logout" href="logout.php"><i class="material-icons">power_settings_new</i></a>
		</div></div>

	</div>

</div>

<?php 
function render_form()
	{
?>	<form method="post">
		<table class="form">
			<tr>
				<td colspan="2" >1. Gross Salary (Estimated)</td>
				<td> <input type="text" value = "0"></td> 
				<td> <input type="text" value = "0" readonly></td>
			</tr>
			<tr>
				<td colspan="2">2. Income Chargeable under the head 'Salaries'</td>
				<td> <input type="text" value = "0"></td></tr>
			
			<tr>
				<td colspan="2">3. Less:Interest on H.B. Loan (self-occupied) - F.Y.2017-18</td>
				<td><input type="text" value = "0"></td>
			</tr>
			<tr>
				<td colspan="2">4. Add any other income reported by the employee</td>
			</tr>
			<tr>
				<td colspan="2"> -Remuneration Charges/ Fee Claim/Medical Expenses Claim record.(from BIT up to Dec 2018)</td>
				<td><input type="text" value = "0"></td>
			</tr>
		    <tr>
		    	<td colspan="2"> -Interest on N.S.C. FDR & etc</td>
		    	<td><input type="text" value = "0"></td>
		    </tr>
			<tr>
				<td colspan="2"> -Other Income </td>
				<td><input type="text" value = "0"></td>
			</tr>
			<tr>
				<td colspan="2">5. Gross Total Income </td>
				<td><input type="text" value = "0"></td></tr>
			<tr>
				<td><i>Deductions under Chapter VI-A</i></td>
			</tr>
			<tr>
				<td colspan="2">6.a) Section 80C</td>
			</tr>
			<tr>
				<td colspan="2"> -E.P.F</td>
				<td><input type="text" value = "0"></td>
			</tr>
			<tr>
				<td colspan="2"> -L.I.C. Premium (Through Salary Serving Scheme) </td>
				<td><input type="text" value="0"></td>
			</tr>
			<tr>
				<td colspan="2"> -Insurance Premium (LIC/OTHS. Insu. Co.) </td>
				<td><input type="text" value = "0"></td>
			</tr>
			<tr>
				<td colspan="2"> -P.P.F. </td>
				<td><input type="text" value = "0"></td>
			</tr>
			<tr>
				<td colspan="2"> -N.S.C. </td>
				<td><input type="text" value = "0"></td>
			</tr>
			<tr>
				<td colspan="2"> -Tution Fee(maximium of 2 children)</td>
				<td><input type="text" value="0"></td>
			</tr>
			<tr>
				<td colspan="2"> -ULIP,Tax Saving FD & Others</td>
				<td><input type="text" value="0"></td>
			</tr>
			<tr>
				<td colspan="2"> -ELSS Mutual Fund</td>
				<td><input type="text" value="0"></td>
			</tr>
			<tr>
				<td colspan="2"> -Repayment of Principal of House Build Loan</td>
				<td><input type="text" value="0"></td>
			</tr>
			<tr><td colspan="2"> -N.S.C Interest Accrued for F.Y. 2018-19</td>
				<td><input type="text" value="0"></td>
			</tr>
			<tr>
				<td colspan="2">6.b) Section 80CCC - Contribution to Pension Fund </td>
				<td><input type="text" value="0"></td>
			</tr>
			<tr>
				<td colspan="2">6.c) Total amount of 6(a)+8(b)</td>
				<td><input type="text" value="0" readonly></td>
			</tr>
			<tr>
				<td colspan="2">6.d) Qualifying amount of Sec 80C & 80CCC</td>
			</tr>
			<tr>
				<td colspan="2">6(c)[maximum Rs. 1,50,000/-]</td>
				<td><input type="text" value="0" readonly></td>
			</tr>
			<tr>
				<td colspan="2">6.e) Other Section under Chapter VI-A</td>
			</tr>
			<tr>
				<td colspan="2"> -Sec 80D <i>(Medical Insurance Premium) -[max Rs 25,000]</i></td>
				<td> <input type="text" value="0"></td>
			</tr>
			<tr>
				<td colspan="2"> -Sec 80E <i>(Education Loan Interest)</i></td>
				<td><input type="text" value="0"></td>
			</tr>
			<tr>
				<td colspan="2"> -Sec 80G <i>(Donation 50% (or) 100%)</i></td>
				<td><input type="text" value="0"></td>
			</tr>
			<tr>
				<td colspan="2"> -Sec 80DD</td>
				<td> <input type="text" value ="0"></td>
			</tr>
			<tr>
				<td colspan="2"> -Other Sec </td>
				<td> <input type="text" value="0"></td>
			</tr>
			<tr>
				<td colspan="2"> Total 6(e)</td>
				<td><input type="text" value="0" readonly></td>
			</tr>
			<tr>
				<td colspan="2"> 7. Aggregate of deductible amounts under Chapter VI-A </td>
			</tr>
			<tr>
				<td colspan="2"> Total of [6(d) + 6(e)]</td>
				<td><input type="text" value="0" readonly></td>
			</tr>
			<tr>
				<td colspan="2"> 8. Total Taxable Income (5-7)</td>
				<td><input type="text" value = "0" readonly></td>
			</tr>
			<tr>
				<td colspan="0"> 9. Tax on Total Taxable Income <i>(Use I.T. Chart for calculation- See overleaf)</i></td> 
				<td><label id="2a">39982</label></td>
				<td><input type="text" value = "0" readonly></td>
			</tr>
			<tr>
				<td colspan="0"> 10. Tax (T.D.S.) </td> 
				<td><label id="4a">39982</label></td>
				<td><input type="text" value="0" readonly></td>
			</tr>
			<tr>
				<td colspan="0"> 11. Education Cess @4% on Tax <i>(10)</i></td>
				<td><label id="5a">1199</label></td>
				<td><input type="text" value="0" readonly></td>
			</tr>
			<tr>
				<td colspan="0"> 12. Tax Payable (10+11)</td>
				<td><label id="6a">41181</label></td>
				<td><input type="text" value="0" readonly></td>
			</tr>
			<tr>
				<td colspan="2"> 13. Tax Deducted at Source <i>(From Salary-up to Dec '17 paid Jan '18)</i></td>
				<td><input type="text" value="0" readonly></td>
			</tr>
			<tr>
				<td colspan="0"> 14. Tax Payable / (Refundable) <i>(12 - 13)</i></td>
				<td><label id="7a">37679</label></td>
				<td><input type="text" value="0" readonly></td>
			</tr>
		</table>
		<div class="center-align"><br>
			<button id="form-btn" class="btn waves-effect waves-light z-depth-0 green modal-action" type="submit">SUBMIT
			 </button>					<!--btn waves-effect waves-light z-depth-0 red -->
		</div>
		<br>
	</form>
<?php
}
?>


<!-- just for about modal.. -->
<?php
	require("includes/about.php");
?>
<script>
	$(document).ready(function() {
	  $('.modal-trigger').leanModal();
		$(".modal").width("30vw");
	});


	$("#submit-btn").click(function(event){
	var dataString = $("form[name='delete-form']").serialize();	//serialize all form inputs

	$.ajax({
		type: "POST",
		url: "includes/delete-account.php",
		data: dataString,
		cache: false,
		success: function(result){		//our php script on the page will make sure that the 'result' is a 'message-string' which we will prompt to user
			Materialize.toast(result, 4000);
			setTimeout(function() {
				window.location = "index.php";
			}, 4000);
		}
	});
	
	event.preventDefault(); // avoid to execute the actual submit of the form.
});

</script>

<!-- 
	Code Ends 
-->



<?php render("footer"); ?>