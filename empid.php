<?php
	//just modal html, js and ajax js in this page.
?>

<!-- Modal Structure -->
  <div id="empid-modal" class="modal">

    <div class="modal-content">
      <h4 class="center-align">Add Employee ID</h4>
      <div class="divider"></div>
      <p>
        <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
            <input onkeyup="numberonly(this)" maxlength="5" pattern="\d{5}" id="icon_prefix" type="text" class="validate" name="empid" required>
            <label for="icon_prefix">Employee ID</label>
          </div>
          <div class="row">
          <div class="col s4 offset-s4">
          <button id="signup-btn" class="btn waves-effect waves-light z-depth-0 modal-action" type="submit">ADD
            <i class="material-icons right">person_add</i>
         </button>
       </div>
        
      </p>
    </div>

  <!--   <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-dark btn-flat">OK</a>
    </div>
	-->

  </div>
<script>
function numberonly(input) {
              var empidPat=/[^0-9]/;
              input.value=input.value.replace(empidPat,"");

            }
</script>