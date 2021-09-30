<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="trupen" content="truPen">
    <title>truPen | Login Form -&gt; HTML &amp; CSS</title>
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
<?php
$user = 'root';
$pass = '';
$con = new mysqli('localhost', $user, $pass);
if($con->connect_error)
{
	die("Connection Error: " . $con->connect_error);
}
$sql = 'CREATE DATABASE IF NOT EXISTS users';
if($con->query($sql) === False)
{
	die("Error: ". $con->error);
}
$con = new mysqli('localhost', $user, $pass, 'users');
$sql = 'CREATE TABLE IF NOT EXISTS user
		(No int NOT NULL AUTO_INCREMENT,
		username varchar(120) NOT NULL UNIQUE,
		 passcode varchar(120) NULL,
		 firstname varchar(120) NULL,
		 lastname varchar(120) NULL,
		 email varchar(120) NULL,
		 gender varchar(120) NULL,
		 birthday varchar(120) NULL,
		 bio varchar(800) NULL,
		 PRIMARY KEY (No))';
if ($con->query($sql) === FALSE)
{
	die("Error creating table: " . $con->error);
}
$sql = "SELECT * FROM user";
$result = $con->query($sql) or die("Error: ". $con->error);
if($result->num_rows == 0)
{
	$sql = "INSERT INTO user(username, passcode, firstname, lastname, email, gender, birthday, bio)
			VALUES ('user', 'pass', 'foo', 'bar', 'user@gmail.com', 'male', '2000-08-14', 'fantastic person')";
	$con->query($sql);
	$sql = "INSERT INTO user(username, passcode, firstname, lastname, email, gender, birthday, bio)
			VALUES ('eval', 'eva', 'eval', 'eva', 'eval@gmail.com', 'female', '2003-05-17', 'cool person')";
	$con->query($sql);
}
?>
<body translate="no">

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
                    <h2>LOGIN to truPen</h2>
                    <form method="POST" action="login.php">
                        <div class="inputBx">
                            <input type="text" name="LoginID" id="LoginID" required="required">
                            <span>Login</span>
                            <img src="us.png" alt="user">
                        </div>
                        <div class="inputBx password">
                            <input id="password-input" type="password" name="password" required="required">
                            <span>Password</span>
                            <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
                            <img src="ps.png" alt="key">
                        </div>
                        <label class="remember"><input type="checkbox">
                        Remember</label>
                        <div class="inputBx">
                            <input type="submit" value="Log in">
                        </div>
                    </form>
                    <p>Forgot password? 
                        <a href="#">Click Here</a>
                    </p>
                    <p>Don't have an account ? 
                        <a href="signup.php">Sign up</a>
                    </p>
                </div>
            </div>

        </div>
    </section>

    <script id="rendered-js">
        function show_hide_password(target) {
            var input = document.getElementById('password-input');
            if (input.getAttribute('type') == 'password') {
                target.classList.add('view');
                input.setAttribute('type', 'text');
            } else {
                target.classList.remove('view');
                input.setAttribute('type', 'password');
            }
            return false;
        }
        //# sourceURL=pen.js

        // function to toggle button effect
        function blink(c){
        var s = document.getElementById(c);
        s.classList.add("buttonOff");
        s.addEventListener("mouseleave", ()=>{
        s.classList.remove("buttonOn");
        s.classList.add("buttonOff");
        });
        s.addEventListener("mouseover", ()=>{
        s.classList.remove("buttonOff");
        s.classList.add("buttonOn");
        });
        }

    </script>



</body>

</html>