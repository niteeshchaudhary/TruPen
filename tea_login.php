<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="trupen" content="truPen">
    <title>truPen | Login Form -&gt; HTML &amp; CSS</title>
    <link rel = "icon" href ="Image_Components/truPen Better Logo.png"  type = "image/x-icon">
    <link rel="stylesheet" href="globalstyles.css?v=<?php echo time(); ?>">
    <style>
        .logo {
            display: flex;
            align-items: center;
            font-weight: 600;
            font-size: 18px;
            cursor: pointer;
        }
        .logo svg {
            width: 24px;
            margin-right: 12px;
        }
        .header {
            display: flex;
            align-items: center;
            transition: box-shadow 0.3s;
            flex-shrink: 0;
            padding: 0 40px;
            white-space: nowrap;
            background-color: rgba(255, 255, 255, 1);
            height: 60px;
            font-size: 14px;
            justify-content: space-between;
        }
        .header-menu a {
            text-decoration: none;
            color: var(--body-color);
            font-weight: 500;
        }
        .header-menu a:hover {
            color: var(--active-color);
        }
        .header-menu a:not(:first-child) {
            margin-left: 30px;
        }
        .header-menu a.active {
            color: var(--active-color);
        }
        .user-settings {
            display: flex;
            align-items: center;
            font-weight: 500;
        }
        .user-settings svg {
            width: 20px;
            color: #94949f;
        }

        .user-menu {
            position: relative;
            margin-right: 8px;
            padding-right: 8px;
            border-right: 2px solid #d6d6db;
        }
        .user-menu:before {
            position: absolute;
            content: "";
            width: 7px;
            height: 7px;
            border-radius: 50%;
            border: 2px solid var(--header-bg-color);
            right: 6px;
            top: -1px;
            background-color: var(--active-color);
        }
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
    <header>
        <div class="header">
            <div class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="10 0 512 512" fill="#fff" style="background-color:#99ffaa;border-radius:50%;">
                    <g transform="translate(0.000000,512.000000) scale(0.110000,-0.110000)" fill="#000000" stroke="none">
                        <path d="M3234 3848 c-7 -11 6 -28 64 -89 l43 -46 -40 -63 c-23 -35 -41 -71
                        -41 -81 0 -10 -13 -41 -30 -67 -34 -56 -36 -67 -14 -76 17 -7 34 0 34 14 0 5
                        5 21 11 37 l10 27 21 -33 21 -33 -41 -41 -42 -41 -33 32 c-18 18 -40 32 -48
                        32 -8 0 -97 -83 -198 -184 -131 -131 -182 -189 -178 -200 4 -9 14 -16 24 -16
                        10 0 93 75 185 167 167 166 167 167 188 148 21 -19 21 -19 -267 -307 l-288
                        -288 103 -102 102 -103 282 282 c195 194 291 283 308 285 18 2 25 9 25 24 0
                        13 24 47 56 81 31 32 59 69 63 81 9 27 18 28 33 2 12 -19 13 -19 65 5 28 13
                        75 27 104 31 48 6 52 8 58 36 3 17 6 48 6 69 l0 39 110 -7 c81 -4 110 -3 110
                        6 0 6 -72 92 -160 190 l-159 179 -123 6 c-233 11 -359 12 -364 4z"/>
                        <path d="M2544 2668 c-33 -35 -204 -356 -204 -383 0 -8 7 -18 16 -22 21 -8
                        349 160 392 201 l32 31 -103 103 -103 102 -30 -32z"/>
                        <path d="M1280 2525 l0 -65 -46 0 c-58 0 -111 -25 -129 -61 -22 -42 -22 -1006
                        0 -1048 31 -62 34 -62 574 -59 479 3 490 3 518 24 53 40 53 32 53 565 0 488 0
                        497 -21 523 -29 37 -71 56 -124 56 l-45 0 0 65 0 65 -65 0 -65 0 0 -65 0 -65
                        -260 0 -260 0 0 65 0 65 -65 0 -65 0 0 -65z m840 -750 l0 -355 -455 0 -455 0
                        0 355 0 355 455 0 455 0 0 -355z"/>
                        <path d="M1730 1845 l-155 -155 -67 67 -68 68 -35 -35 -35 -35 103 -103 102
                        -102 195 195 195 195 -35 29 c-19 17 -37 30 -40 31 -3 0 -75 -70 -160 -155z"/>
                        <path d="M3330 1519 c-371 -270 -675 -497 -674 -503 2 -17 184 -266 195 -266
                        17 0 1359 982 1358 993 0 15 -181 259 -194 264 -5 1 -314 -218 -685 -488z
                        m751 374 c34 -49 73 -102 86 -119 l23 -31 -652 -474 c-358 -261 -659 -480
                        -669 -486 -15 -11 -27 1 -105 109 l-88 121 29 25 29 24 20 -25 c12 -13 34 -42
                        50 -63 46 -59 43 -22 -3 40 -23 30 -41 57 -41 60 0 3 13 14 30 26 l30 21 25
                        -28 c27 -31 36 -13 10 23 -13 19 -12 23 15 42 16 12 33 22 38 22 5 0 28 -27
                        51 -60 23 -33 47 -58 52 -54 5 3 -11 35 -37 71 -49 69 -49 67 0 95 17 9 23 7
                        34 -11 8 -11 21 -21 29 -21 11 0 11 6 -4 31 l-18 31 29 23 29 23 51 -66 c27
                        -36 52 -60 54 -54 2 7 -15 37 -37 67 -23 30 -41 58 -41 62 0 4 12 17 28 29
                        l27 22 22 -26 c26 -33 42 -22 19 14 -17 24 -17 26 1 40 48 38 50 38 95 -26 40
                        -57 58 -73 58 -50 0 6 -19 36 -42 67 l-42 55 29 24 c37 30 39 30 55 -1 14 -25
                        30 -33 30 -15 0 6 -7 21 -15 34 -15 23 -15 25 14 45 16 12 33 21 38 21 5 0 29
                        -27 53 -60 24 -32 47 -57 52 -54 10 6 6 13 -45 81 l-39 53 23 20 c31 25 46 25
                        61 0 13 -20 38 -28 38 -11 0 5 -7 14 -15 21 -8 7 -15 18 -15 26 0 17 60 59 69
                        48 4 -5 24 -33 45 -61 33 -46 56 -66 56 -47 0 3 -20 34 -45 68 l-44 63 30 23
                        31 22 23 -28 c28 -34 45 -26 21 10 -22 34 -21 39 14 59 l29 18 43 -60 c24 -33
                        46 -61 51 -61 16 0 5 23 -34 76 -43 58 -42 71 3 95 14 8 23 4 43 -18 27 -31
                        34 -16 10 21 -15 22 -14 25 19 50 l34 26 47 -65 c25 -36 51 -63 56 -60 5 4
                        -12 35 -37 71 l-46 64 24 20 c12 11 28 19 34 20 7 0 40 -39 75 -87z"/>
                        <path d="M2727 1801 l-27 -6 40 -57 41 -57 55 6 c61 7 60 8 37 -54 -3 -7 -1
                        -13 4 -13 6 0 18 18 28 40 l18 39 -42 56 c-39 52 -44 55 -84 54 -23 -1 -54 -4
                        -70 -8z"/>
                        <path d="M3094 1705 c-48 -38 -54 -46 -38 -51 10 -4 41 -15 67 -26 l48 -18 47
                        36 47 36 5 -38 c3 -21 10 -39 17 -41 9 -3 10 7 6 34 -9 58 -17 67 -82 90 l-60
                        22 -57 -44z"/>
                        <path d="M2432 1589 c-29 -22 -52 -43 -52 -47 0 -5 28 -18 62 -30 67 -24 60
                        -26 131 28 l27 22 0 -25 c0 -32 9 -57 21 -57 12 0 0 82 -15 96 -6 7 -36 21
                        -67 32 l-55 20 -52 -39z"/>
                        <path d="M2707 1464 c-3 -4 11 -31 31 -60 l37 -54 58 2 c51 3 57 1 53 -14 -4
                        -10 -9 -27 -12 -38 -12 -38 14 -20 30 21 17 41 17 42 -9 78 -52 74 -48 71
                        -117 71 -36 0 -67 -3 -71 -6z"/>
                    </g>
                </svg>
                TruPen
            </div>
            <div class="header-menu">
            </div>
        </div>
    </header>
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
                    <form method="POST" action="tealogin.php">
                        <div class="inputBx">
                            <input type="text" name="LoginID" id="LoginID" autocomplete="off" required="required">
                            <span>Login</span>
                            <img src="Image_Components/us.png" alt="user">
                        </div>
                        <div class="inputBx password">
                            <input id="password" type="password" name="password" required="required">
                            <span>Password</span>
                            <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
                            <img src="Image_Components/ps.png" alt="key">
                        </div>
                        <label class="remember"><input type="checkbox">
                        Remember</label>
                        <div class="inputBx">
                            <input type="submit" value="Log in">
                        </div>
                    </form>
                    <p>Forgot password? 
                        <a href="forgot_password/forgot_pass_teacher_1.php">Click Here</a>
                    </p>
                    <p>Don't have an account ? 
                        <a href="tea_signup.php">Sign up</a>
                    </p>
                </div>
            </div>

        </div>
    </section>
    <script  id="rendered-js" src="Design_Components/Button-Effect.js"></script>

</body>

</html>