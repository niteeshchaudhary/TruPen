<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en" >

<head>

  <meta charset="UTF-8">
  <meta name="TRUPEN" content="TRUPEN">

  <title>TRUPEN | SIGN UP Form</title>
  <link rel="stylesheet" href="globalstyles.css?v=<?php echo time(); ?>">
<style>
svg {
    width: 100%;
    height: 100%;
    visibility: hidden;
}

#emoji,#emojc,#avail {
    font-family: Arial, sans-serif;
    font-size: 40px;
    text-anchor: middle;
    font-weight: 100px;
    -webkit-user-select: none;
       -moz-user-select: none;
        -ms-user-select: none;
            user-select: none;
    pointer-events: none;
}/*
#emoji-circle{
    cursor: pointer;
}*/
</style>

  <script>
  window.console = window.console || function(t) {};
</script>

  
  
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>


</head>

<body translate="no" >

<div class="background">
   <div class="shape"></div>
   <div class="shape"></div>
</div>
  <section>
  
  <div class="box">
    
    <div class="square" style="--i:0;"></div>
    <div class="square" style="--i:1;"></div>
    <div class="square" style="--i:2;"></div>
    <div class="square" style="--i:3;"></div>
    <div class="square" style="--i:4;"></div>
    <div class="square" style="--i:5;"></div>
    
   <div class="container"> 
    <div class="form"> 
      <h2>Sign Up to truPen</h2>
      <form method="POST" name="signup" action="tea_adduserEntry.php" onsubmit="return validateForm()">
        <div class="inputBx">
          <input type="text" name="LoginID" id = "LoginID" onfocusout="checkdb()" autocomplete="off" required="required">
          <p class="user-avail"><svg viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg" text-rendering="optimizeSpeed" style="visibility: visible;">
                    <g transform="matrix(1, 0, 0, 1, 32, 32)">
                      <g filter="url(#goo)">
                        <circle id="bgRing" fill="#51249b" stroke="#51249b" stroke-width="0" stroke-miterlimit="10" cx="0" cy="0" r="30"></circle>
                        <line id="track" fill="none" stroke="#51249b" stroke-width="60" stroke-linecap="round" stroke-miterlimit="10" x1="50" y1="30"
                          x2="387" y2="30"></line>
                      </g>
                      <circle id="emoji-circle" fill="#fff" stroke="none" stroke-width="0" stroke-miterlimit="10" cx="0" cy="-3" r="27"></circle>
                      <text id="avail" x="0" y="10">😑</text>
                    </g>
                  </svg></p>
          <span>User ID</span>
          <img src="Image_Components/us.png" alt="user">
        </div>
        <div class="inputBx password">
          <input type="password" name="password" id = "password" maxlength="17" required="required">
          <span>Password</span>
          <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
          <p class="password-strength"><svg viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg" text-rendering="optimizeSpeed" style="visibility: visible;">
                    <g transform="matrix(1, 0, 0, 1, 32, 32)">
                      <g filter="url(#goo)">
                        <circle id="bgRing" fill="#51249b" stroke="#51249b" stroke-width="0" stroke-miterlimit="10" cx="0" cy="0" r="30"></circle>
                        <line id="track" fill="none" stroke="#51249b" stroke-width="60" stroke-linecap="round" stroke-miterlimit="10" x1="50" y1="30"
                          x2="387" y2="30"></line>
                      </g>
                      <circle id="emoji-circle" fill="#fff" stroke="none" stroke-width="0" stroke-miterlimit="10" cx="0" cy="-3" r="27"></circle>
                      <text id="emoji" x="0" y="10">😑</text>
                    </g>
                  </svg></p>
          <img src="Image_Components/ps.png" alt="key">
        </div>
        <div class="inputBx password">
          <input  type="password" name="cpassword" id="cpassword" maxlength="17" required="required">
          <span>Confirm Password</span>
          <a href="#" class="password-control" onclick="return show_hide_cpassword(this);"></a>
          <p class="password-match"><svg viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg" text-rendering="optimizeSpeed" style="visibility: visible;">
                    <g transform="matrix(1, 0, 0, 1, 32, 32)">
                      <g filter="url(#goo)">
                        <circle id="bgRing" fill="#51249b" stroke="#51249b" stroke-width="0" stroke-miterlimit="10" cx="0" cy="0" r="30"></circle>
                        <line id="track" fill="none" stroke="#51249b" stroke-width="60" stroke-linecap="round" stroke-miterlimit="10" x1="50" y1="30"
                          x2="387" y2="30"></line>
                      </g>
                      <circle id="emoji-circle" fill="#fff" stroke="none" stroke-width="0" stroke-miterlimit="10" cx="0" cy="-3" r="27"></circle>
                      <text id="emojc" x="0" y="10">😒</text>
                    </g>
                  </svg></p>
          <img src="Image_Components/cps.png" alt="key">
          <p id="error"></p>
        </div>
        <div class="inputBx">
            <input type = "submit" value="Sign Up" id="submit"> 
        </div>
      </form>
      <p>Already have an Account ? <a href="index.php">Log-in</a></p>
    </div>
  </div>
    
  </div>
</section>
<script type="text/javascript" src="Design_Components/jquery.min.js"></script>
<script  id="rendered-js" src="Design_Components/Button-Effect.js"></script>
  <script>
        const emojies = ['😑', '😕', '😊', '😎', '💪'];
        const emojiec = ['😒','😌','😑','😕', '✔️'];
        const emojiea = ['😑','✔️','❗'];
        const inputp = document.getElementById('password');
        const inputc = document.getElementById('cpassword');
        const emoji = document.getElementById('emoji');
        const emojc = document.getElementById('emojc');
        const error = document.getElementById('error');
        let submit_chk=false;

        inputp.oninput = function () {
          const fac=3.51;
          var c=(document.forms["signup"]["password"].value).length;
          if(Math.floor(c/fac>4)){c=fac*4;}
          emoji.innerHTML = emojies[Math.floor(c/fac)];
        };
        inputc.oninput = function () {
          var p=document.forms["signup"]["password"].value;
          var cp=document.forms["signup"]["cpassword"].value;
          var s=similarity(p, cp);
          if(cp==""){s=0;}
          emojc.innerHTML = emojiec[Math.floor(4*s)];
        };
        function checkdb(){
          let username=document.forms["signup"]["LoginID"].value;
          //let username  = $("#LoginID").val();
           $.ajax({
                   type:"POST",
                   url: "checkuser.php",
                   data:{ "username": username},
                    success: function(msg){
                        document.getElementById("avail").innerHTML = emojiea[msg];
                        if(msg==2){
                          document.getElementById("error").innerHTML="<font style='color:#FF2400;font-size:tiny;'>*Error : user name not available !</font>";
                          submit_chk=true;
                        }
                        else{
                          document.getElementById("error").innerHTML="";
                          submit_chk=false;
                        }
                    }
                 });
        }
        function validateForm(){
                  let x = document.forms["signup"]["password"].value;
                  let y = document.forms["signup"]["cpassword"].value;
                  let z=document.forms["signup"]["LoginID"].value;
                  if(submit_chk){
                    return false;
                  }
                  if(x.length<8){
                    error.innerHTML = "<font style='color:#FF2400;font-size:tiny;'>*Error : password minimum length should be 8 !</font>";
                    return false;
                  }
                  else if(x!=y){
                    error.innerHTML = "<font style='color:#FF2400;font-size:tiny;'>*Error : Password mismatch detected !</font>";
                    return false;
                  }
                  else if(z==""||x==""){
                    error.innerHTML = "<font style='color:#FF2400;font-size:tiny;'>*Error : Empty Fields detected !</font>";
                    return false;
                  }
        }
        function similarity(s1, s2) {
          var longer = s1;
          var shorter = s2;
          if (s1.length < s2.length) {
            longer = s2;
            shorter = s1;
          }
          var longerLength = longer.length;
          if (longerLength == 0) {
            return 1.0;
          }
          return (longerLength - editDistance(longer, shorter)) / parseFloat(longerLength);
        }
        function editDistance(s1, s2) {
          s1 = s1.toLowerCase();
          s2 = s2.toLowerCase();

          var costs = new Array();
          for (var i = 0; i <= s1.length; i++) {
            var lastValue = i;
            for (var j = 0; j <= s2.length; j++) {
              if (i == 0)
                costs[j] = j;
              else {
                if (j > 0) {
                  var newValue = costs[j - 1];
                  if (s1.charAt(i - 1) != s2.charAt(j - 1))
                    newValue = Math.min(Math.min(newValue, lastValue),
                      costs[j]) + 1;
                  costs[j - 1] = lastValue;
                  lastValue = newValue;
                }
              }
            }
            if (i > 0)
              costs[s2.length] = lastValue;
          }
          return costs[s2.length];
        }

    function show_hide_cpassword(target) {
      var input = document.getElementById('cpassword');
      if (input.getAttribute('type') == 'password') {
        target.classList.add('view');
        input.setAttribute('type', 'text');
      } else {
        target.classList.remove('view');
        input.setAttribute('type', 'password');
      }
      return false;
    }
  </script>
</body>
</html>
 
