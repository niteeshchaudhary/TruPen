<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="apple-mobile-web-app-title" content="truPen">
    <title>truPen | Login Form -&gt; HTML &amp; CSS</title>
    <link rel="stylesheet" href="globalstyles.css?v=<?php echo time(); ?>">

    <style>

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
                    <p>Forgot password? <a href="#">Click Here</a></p>
                    <p>Don't have an account ?
                        <form method="post" name = "signup" action="signup.php">
                        <button type="submit" id="submit1">Sign Up</button>
                        </form>
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
blink("submit1");
    </script>



</body>

</html>