
<script>

$(document).ready(function(){
	//as per the 'progress', render the button.
	//if chapter (eg. 0) is less than progress. (i.e. that chapter has already been played.), so render different button
	if(<?php echo $chapter; ?> < <?php echo $_SESSION['progress']; ?>){
		$("#submit-btn").removeClass('red accent-2').addClass('teal darken-1').attr('data-tooltip', 'Show');
	}
});

$("#submit-btn").click(function(){

	var chapter = +$("#chapter").val();			//will get number like 0, 1, 2.
	

	if(<?php echo $chapter; ?> < <?php echo $_SESSION['progress']; ?>){	//already passed that level, now just 'reveal' directly the solution from DB

		//Step 1: $_SESSION["solution_arr"][$i]["solutionRaw"] or "solutionPretty" for this particular chapter, and...
		//..and.. Assign that solution to the javascript variable "solution"

		var solution = <?php  echo json_encode($_SESSION["solution_arr"][$chapter]["solutionPretty"]); ?>;		//json_encode to make that double_quoted string.

		$("#solution").val(solution);
		$("#solution").trigger('autoresize');
	}

	else{	//yet to pass that level/chapter.
		var solution = $.trim($("#solution").val());

		if(solution == ""){
			Materialize.toast("Please Enter Solution first.", 5000);
			return;
		}

		solution = solution.replace(/[\n\r ]/g, "");	//remove space from solution
		solution = solution.toUpperCase();
		
		var dataString = "solution=" + solution;		//this is the 'serialized' string that php (that is handling ajax) will take care of.
		console.log(dataString);

		//Pass this solution to backend script
		$.ajax({
			type: "POST",
			url: "includes/game-mechanics-update.php",
			data: dataString,
			cache: false,
			success: function(result){		

				if(result==="1"){	//if solution was right: 1.
					Materialize.toast("Congratulations! New Level Unlocked.", 5000);
					setTimeout(function(){
					    //do what you need here
						window.location = "storyline.php";
					}, 5000);
				}else{	//otherwise, just prompt the error message
					Materialize.toast("Incorrect Solution!", 5000);
				}
			}
		});

	}

	

});

</script>
