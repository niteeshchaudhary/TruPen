<!Doctype html>
<html lang='en'>

<head>
    <meta charset="UTF-8">
    <title>
        i-Drive Login
    </title>
    <link rel="stylesheet" href="globalstyles.css">
</head>

<body class="bgstyle">
    <h1 class="heading" align="center">Indian Institute of Technology , Dharwad &nbsp;<img src="IITDh_logo.png" align="center" width="100" height="80"></h1>
    <hr style="margin-left: 15em;margin-right: 15em;border-color: chocolate;border-width: 3px;">
    <hr style="margin-left: 25em;margin-right: 25em;border-color: chocolate;border-width: 3px;">
    <hr style="margin-left: 30em;margin-right: 30em;border-color: chocolate;border-width: 3px;">
    <hr style="opacity: 0">
    <p class="subheading" style="font-size:x-large;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">&nbsp;&rarr;&nbsp;Sign-Up Page</p>
    <marquee direction="right" style="background-color:cornflowerblue; color: black;font-size: medium;">This is the sign-up page.</marquee><br><br>
    <div style="margin-left:350pt;margin-right: 350pt;" class="card">
        <div style="margin-left: 70pt;">
            <form method="POST" name="i-Drive" action="adduserEntry.php">
                <legend>
                    <img src="avatar.png" height="228" width="228" align="right" style="margin-right: 30pt;"><br><br>
                </legend>
                <label>
				Enter the Login-ID :<br>
                <input type="text" name="LoginID" id = "LoginID" required>  
			    </label>
                <br>
                <label>
				Enter password :<br>
				<input type="password" name="password" id = "password" onkeyup="validate();" required>
			    </label>
                <br>
                <br>
                <button type="submit" id="submit">Sign-up</button>
                <br>
                <br>
            </form>
        </div>
    </div>
    <script>
    function blink(c){
var s = document.getElementById(c);
s.classList.add("loginbuttonOff");
s.addEventListener("mouseleave", ()=>{
    s.classList.remove("loginbuttonOn");
    s.classList.add("loginbuttonOff");
});
s.addEventListener("mouseover", ()=>{
    s.classList.remove("loginbuttonOff");
    s.classList.add("loginbuttonOn");
});
}
blink("submit");
</script>

</html>