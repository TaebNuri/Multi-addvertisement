<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $login = false;
    include '_db_connection.php';
    $username = $_POST["username"];
    $password = $_POST["password"];

    if( $username =='admin' && $password=='1234'){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: admin.php");
    }
    else{
    $sql = "Select * from users where username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: publisher.php");
    }}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdFixer</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div class="navbar" id="top">
        <div class="container"> 
            <a class="logo" href="#">Ad<span>Fixer</span></a>

            <img id="mobile-cta" class="mobile-menu" src="image/menu.svg" alt="open navigation" height="25" weight="45">

            <nav>
                <img id="mobile-exit" class="mobile-menu-exit" src="image/close.png" alt="close navigation"height="25" weight="45">
                <ul class="primary-nav">
                    <li class="current"><a href="#top">Home</a></li>
                    <li><a href="#login">Login</a></li>
                    <li><a href="#features">Service</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <section class="hero">
        <div class="container">
            <h1 class="head">BOOST YOUR PRODUCTS</h1>
            <a href="../nuri/login.php" class="publisher-cta">Become a Publisher</a>
        </div>
    </section>

    <section class="login-cta" id="login">
        <div class="container">
            <div class="login-cta-left">
                <h2>Login</h2>

                <form action="../nuri/index.php" method="post" autocomplete="off">
                    <label for="username">Username</label>
                    <input type="text" id="name" name="username">

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password"><br/>

                    <button type="submit" class="sign-in">
                        Sign in
                    </button>
                </form>
            </div>

            <!-- <div class="login-cta-right">
                <h2>Publisher</h2>

                <form action="../nuri/index.php" method="post">
                    <label for="username">Username</label>
                    <input type="text" id="name" name="username">

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password"><br/>

                    <button type="submit" class="sign-in">
                        Sign in
                    </button>
                </form>
            </div> -->
        </div>
    </section>

    <section class="feature-cta" id="features">
        <div class="container">
            <div class="feature-left">
                <img src="image/ads.png" alt="ads-position">
                <p>The ADSs conform in all material respects to the description thereof contained in the Registration Statement, the General Disclosure Package and the Prospectus.</p>
            </div>

            <div class="feature-middle">
                <img src="image/ad1.png" alt="ads-position">
                <p>The ADSs conform in all material respects to the description thereof contained in the Registration Statement, the General Disclosure Package and the Prospectus.</p>
            </div>

            <div class="feature-right">
                <img src="image/ad2.png" alt="ads-position">
                <p>The ADSs conform in all material respects to the description thereof contained in the Registration Statement, the General Disclosure Package and the Prospectus.</p>
            </div>
        </div>
    </section>
        
    <section class="footer">
        <div class="container">
            <p>Copyright 1999-2022 by Refsnes Data. All Rights Reserved.
                AdFixer is Powered by ADFIXER.CSS.</p>
            <a class="logo" href="#">Ad<span>Fixer</span></a>
        </div>
    </section>

    <script>
        const mobileBtn = document.getElementById('mobile-cta')
            nav = document.querySelector('nav')
            mobileBtnExit = document.getElementById('mobile-exit');

        mobileBtn.addEventListener('click', () => {
            nav.classList.add('menu-btn');
        })

        mobileBtnExit.addEventListener('click', () => {
            nav.classList.remove('menu-btn');
        })
    </script>
</body>
</html>