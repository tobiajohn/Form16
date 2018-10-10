<div class="card">
  <div class="row">
    <div class="col offset-s2 s8">
      <br>
      <h5>Keys Generation</h5>
      <br>
      <span style="color:#9e9e9e"><em>note: Longer bit size of primes will take longer time.</em></span>
      <br><br><br>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s2 offset-s2">
          <input placeholder="5 to 1024" id="bits_for_prime" type="number" class="validate">
          <label for="bits_for_prime">Bit size (of primes)</label>
    </div>
    <div class="col s4">

      <!-- Compute button -->
      <a id="generate-btn" class="btn-floating btn-large waves-effect waves-light cyan darken-3 tooltipped" data-position="right" data-delay="50" data-tooltip="Generate"><i class="material-icons">done</i></a>

    </div>
    <div class="input-field col s2">
         <select id="block-cipher-mode">
          <option value="65537" selected>65537</option>
          <option value="257">257</option>
          <option value="17">17</option>
          <option value="5">5</option>
          <option value="3">3</option>
        </select>
        <label>Public exponent, e</label>    
    </div>
  </div>
  <div class="row">
    <div class="input-field col offset-s2 s4">
          <textarea id="p_bin" class="materialize-textarea" readonly="readonly" style="color:#9e9e9e" placeholder="Will Be Computed."></textarea>
          <label for="p_bin" style="color:#9e9e9e">Prime 1, p (in binary)</label>
    </div>
    <div class="input-field col s4">
      <textarea id="q_bin" class="materialize-textarea" readonly="readonly" style="color:#9e9e9e" placeholder="Will Be Computed."></textarea>
      <label for="q_bin" style="color:#9e9e9e">Prime 2, q (in binary)</label>
    </div>
    <div class="input-field col offset-s2 s4">
          <textarea id="p" class="materialize-textarea" readonly="readonly" style="color:#9e9e9e" placeholder="Will Be Computed."></textarea>
          <label for="p" style="color:#9e9e9e">Prime 1, p</label>
    </div>
    <div class="input-field col s4">
      <textarea id="q" class="materialize-textarea" readonly="readonly" style="color:#9e9e9e" placeholder="Will Be Computed."></textarea>
      <label for="q" style="color:#9e9e9e">Prime 2, q</label>
    </div>
    <div class="input-field col s8 offset-s2">
      <textarea id="pq" class="materialize-textarea" readonly="readonly" style="color:black" placeholder="Will Be Computed."></textarea>
      <label for="pq" style="color:#9e9e9e">Product of Primes, n = p*q</label>
    </div>
    <div class="input-field col s8 offset-s2">
      <textarea id="phi" class="materialize-textarea" readonly="readonly" style="color:#9e9e9e" placeholder="Will Be Computed."></textarea>
      <label for="phi" style="color:#9e9e9e">Phi function = (p-1)*(q-1)</label>
    </div>
    <div class="input-field col offset-s2 s4">
          <textarea id="e" class="materialize-textarea" readonly="readonly" style="color:black"   placeholder="Will Be Computed."></textarea>
          <label for="e" style="color:#9e9e9e">Public exponent, e </ltextareaabel>
    </div>
    <div class="input-field col s4">
      <textarea id="d" class="materialize-textarea" readonly="readonly" style="color:black" placeholder="Will Be Computed."></textarea>
      <label for="d" style="color:#9e9e9e">Private exponent, d  = e<sup>-1</sup> mod phi </label>
    </div>
    <div class="col s8 offset-s2" style="color: #9e9e9e">
      <em>note: multiplying e and d (in modulo phi) will give 1.<br> e*d mod phi = 1</em>
    </div>
  </div>
  <div class="row">
    <div id="keys" class="col s8 offset-s2" style="color: #9e9e9e">
      <span style='color:#009688' class='teal lighten-4'>Public Key = 'e' and 'n'</span> [ Public Exponent and Modulus ] <br> <span style='color:#00838f' class='indigo lighten-4'>Private Key = 'd' and 'n'</span>  [ Private Exponent and Modulus ]
      <br><br><br>
    </div>
  </div>
</div>

<br>

<div class="card">
  <div class="row">
    <div class="col offset-s2 s8">
      <br>
      <h5>Encryption / Decryption</h5>
      <br>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s8 offset-s2">
      <textarea id="iString" class="materialize-textarea" style="color:black" placeholder="All Keys except TAB and ENTER"></textarea>
      <label for="iString" style="color:#9e9e9e">Enter Input String (in base95)</label>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s8 offset-s2">
      <textarea id="iString_num" class="materialize-textarea" readonly="readonly" style="color:black" placeholder="Will Be Computed."></textarea>
      <label for="iString_num" style="color:#9e9e9e">Input String in Number, M </label>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s8 offset-s2">
      <textarea id="exponent" class="materialize-textarea" style="color:black"></textarea>
      <label for="exponent" style="color:#9e9e9e">Enter Exponent, e </label>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s8 offset-s2">
      <textarea id="modulus" class="materialize-textarea" style="color:black"></textarea>
      <label for="modulus" style="color:#9e9e9e">Enter Modulus, n </label>
    </div>
  </div>
  <div class="col s8 offset-s2">

    <!-- Compute button -->
    <a id="compute-btn" class="btn-floating btn-large waves-effect waves-light cyan darken-3 tooltipped" data-position="right" data-delay="50" data-tooltip="Compute"><i class="material-icons">done</i></a>

  </div>
  <div class="row">
    <div class="input-field col s8 offset-s2">
      <textarea id="oString_num" readonly="readonly" class="materialize-textarea" style="color:black" placeholder="Will Be Computed."></textarea>
      <label for="oString_num" style="color:#9e9e9e">Output String in Number, M<sup>e</sup> mod n</label>
    </div>
    <div class="input-field col s8 offset-s2">
      <textarea id="oString" readonly="readonly" class="materialize-textarea" style="color:black" placeholder="Will Be Computed."></textarea>
      <label for="oString" style="color:#9e9e9e">Output String</label>
      <br><br>
    </div>
  </div>
</div>

<script>

//To Compute the given input to output.
$(document).ready(function(){
  
  //to render 'select' of materialize.
  $('select').material_select();
  $("#e").val($("select option:selected").val());


  //also bind the paste button. (auto calculation of input string to rsa)
  $("#iString").bind('paste', function(e) {
          var ctl = $(this);
          setTimeout(function() {
              //Do whatever you want to $(ctl) here....
              $(ctl).trigger('autoresize');
              
              /* 
                and convert to binary.
              */
              var iString = $.trim($("#iString").val());
              //convert this binary to bigInt
              //bigInt2str(str2bigInt(document.nnna.nnnp.value,  currBase,0),newBase)
              var iString_num = bigInt2str(str2bigInt(iString, 95, 0), 10);
              $("#iString_num").text(iString_num);
               $('#iString_num').trigger('autoresize');

          }, 100);

        
  });
});


//on Changing the 'select', also change the 'public Exponent textarea'
$("select").change(function(){
  $("#e").val($("select option:selected").val());
});


//whenever GENERATE button is clicked.
$("#generate-btn").click(function(){
  var bits_for_prime = $.trim($("#bits_for_prime").val());

  if(bits_for_prime.match('[^0-9]')){ //meaning, not a valid 'binary'
      oString = "Please Enter Number Correctly.";
      Materialize.toast(oString, 4000);
      return;
  }else if(bits_for_prime < 5 || bits_for_prime > 1024){
      oString = "Bit size must be between 5 to 1024.";
      Materialize.toast(oString, 4000);
      return;
  }else{ //number entered is good (i.e. a valid 'number')
      
      
    /*
      Generating all the values from e and bits_for_prime
    */
      var e = $("#e").val();
      var e = str2bigInt(e, 10, 0);
      var bits_for_prime = parseInt(bits_for_prime);

      /* 
        Step-1: Generating Primes p and q
      */
      var r1, r2;
      //first, generating r1
      while(1){
        r1 = randTruePrime(bits_for_prime);
        if(!equalsInt(mod(r1, e), 1))   //prime must not be congruent to 1 modulo e
          break;
      }
      var p_bin = bigInt2str(r1, 2); $("#p_bin").val(p_bin);
      var p = bigInt2str(r1, 10); $("#p").val(p);

      //secondly, generating r2
      while(1){
        r2 = randTruePrime(bits_for_prime);
        if(!equalsInt(mod(r2, e), 1) && !equals(r1, r2))   //prime must be distinct and not congruent to 1 modulo e
          break;
      }
      var q_bin = bigInt2str(r2, 2); $("#q_bin").val(q_bin);
      var q = bigInt2str(r2, 10); $("#q").val(q);


      /* 
        Step-2: Generating n (=pq) and phi (= (p-1)(q-1))
      */
      var t, pq;
      t = mult(r1, r2);
      pq = bigInt2str(t, 10);
      $("#pq").val(pq);

      t = mult(addInt(r1, -1), addInt(r2, -1));  //t is our temp variable
      phi = bigInt2str(t, 10);
      $("#phi").val(phi);


      /*
        Step-3: Generating d (which is inverse modulo of e)
      */
      //note that 't' at this moment =  bigInt value of 'phi',
      //and 'e' = bigInt value of 'e'; so we can use them.
      var d, s;
      s = inverseMod(e, t);
      if(s) //if GCD!=1 then no inverse exists
        d = bigInt2str(s, 10);
      else{
        Materialize.toast("e isn't invertible. Try a different prime e", 8000);
        return;   //won't need this line, as our 'e' can only be from {3,5,7,17,257,65537}
      }
      $("#d").val(d);

    //finally resize all the 'boxes'
    $('textarea, input').trigger('autoresize');
  }
});


//when user types Message, convert it to number.
$("#iString").keyup(function(){
    var iString = $.trim($("#iString").val());

    //convert this binary to bigInt
    //bigInt2str(str2bigInt(document.nnna.nnnp.value,  currBase,0),newBase)
    var iString_num = bigInt2str(str2bigInt(iString, 95, 0), 10);
    $("#iString_num").text(iString_num);

});


//whenever COMPUTE button is clicked.
$("#compute-btn").click(function(){
  var iString_num = $.trim($("#iString_num").val());
  var exponent = $.trim($("#exponent").val());
  var modulus = $.trim($("#modulus").val());

  var oString = "";
  $("#outputString").text(oString); //clear the oString box first.

  //step - 1: validations
  if(iString_num == ""){
    oString = "Please enter all the Input Fields first.";
    Materialize.toast(oString, 4000);
    return;
  }else{


    //validate the input exponent and modulus
    if(exponent == "" || modulus == ""){
      oString = "Please enter all the Input Fields first.";
      Materialize.toast(oString, 4000);
      return;      
    }
    if(exponent.match('[^0-9 ]') || modulus.match('[^0-9 ]')){   //are exponent and modulus valid numbers
      oString = "Please enter numbers correctly.";
      Materialize.toast(oString, 4000);
      return;
    }

    //remove spaces from numbers, if any
    exponent = exponent.replace(/[ ]/g, "");
    modulus = modulus.replace(/[ ]/g, "");
    $("#exponent").val(exponent);
    $("#modulus").val(modulus);

    //check if M is greater than n (then not possible!)
    if(greater(str2bigInt(iString_num, 10, 0), str2bigInt(modulus, 10, 0))){
      oString = "Exponent (n) must be greater than Numeric Input String (M).";
      Materialize.toast(oString, 8000);
      return;
    }

    //Now from these three, raise iString to exponent in modulus
    var M = str2bigInt(iString_num, 10, 0);
    var e = str2bigInt(exponent, 10, 0);
    var n = str2bigInt(modulus, 10, 0);
    var t;

    t = powMod(M, e, n);

    oString = bigInt2str(t, 10);


    $("#oString_num").text(oString);

    //oString back from decimal to binary; and then from binary to Ascii
    oString = bigInt2str(str2bigInt(oString, 10, 0), 95);

    //Display the output String.
    if(oString.length > 100){
      $("#oString").text(oString);
      
    }else{  //'with-style!'
      $("#oString").shuffleLetters({
          "text": oString
        });
    }
    //finally resize all the 'boxes'
    $('textarea, input').trigger('autoresize');
  } 
});
</script>
