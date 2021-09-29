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
      <form method="POST" name="signup" action="adduserEntry.php">
        <div class="inputBx">
          <input type="text" name="LoginID" id = "LoginID" required="required">
          <span>User ID</span>
          <img src="us.png" alt="user">
        </div>
        <div class="inputBx password">
          <input type="password" name="password" id = "password"  required="required">
          <span>Password</span>
          <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
          <img src="ps.png" alt="key">
        </div>
        <div class="inputBx password">
          <input type="password" name="cpassword" id = "cpassword" required="required">
          <span>Confirm Password</span>
          <img src="cps.png" alt="key">
          <p id="error"></p>
        </div>
      </form>
        <div class="inputBx">
            <input type = "safe" value="Sign Up" id="submit" onclick="validate();"> 
        </div>
      </form>
      <p>Already have an Account ? <a href="index.php">Log-in</a></p>
    </div>
  </div>
    
  </div>
</section>

  <script id="rendered-js" >
    function show_hide_password(target) {
      var input = document.getElementById('password');
      if (input.getAttribute('type') == 'password') {
        target.classList.add('view');
        input.setAttribute('type', 'text');
      } else {
        target.classList.remove('view');
        input.setAttribute('type', 'password');
      }
      return false;
    }
    var error = document.getElementById('error');
    function submitform(){
          var c = document.forms["signup"];
          c.submit();
        }
    function validate(){
      var x = document.getElementById("password").value;
      var y = document.getElementById("cpassword").value;
      if(x === y && x.trim("")!=""){
        submitform();
      }
      else if(x!=y){
        error.innerHTML = "<font style='color:#FF2400;font-size:tiny;'>*Error : Password mismatch detected !</font>";
      }
      else{
        error.innerHTML = "<font style='color:#FF2400;font-size:tiny;'>*Error : Empty Fields detected !</font>";
      }
    }
  </script>

  

</body>

</html>
 
