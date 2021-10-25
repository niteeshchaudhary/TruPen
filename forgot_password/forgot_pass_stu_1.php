<h3>Enter Registered Email</h3>
<form> <!--method="POST" action="forgot_pass_stu_2.php"-->
	<input type="text" name="mailid" id ="mailid" required>
	<!--input type="submit" value="Submit" onclick="checkdb()">-->
	<button  onclick="checkdb()">sub</button>
</form>
<script src='../Design_Components/jquery.min.js'></script>
<script>
function checkdb(){
          let emailText  = $("#mailid").val();
		  alert("hello");
           $.ajax({
                   type:"POST",
                   url: "forgot_pass_stu_2.php",
                   data:{ "mailid": emailText},
                    success: function(msg){
                      alert(msg);
                        if(msg==2){
                          alert('Email sending failed... Try again');
                        }
                        else if(msg==0){
                          alert('Email Not in database');
                        }
                        else if(msg==1){
                          header("location: forgot_pass_stu_3.php");
                        }
                    }
                 });
  }
  </script>