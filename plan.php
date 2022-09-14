<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdFixer</title>
    <script src="https://kit.fontawesome.com/8656ada1c2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/plan.css">
</head>

<body>
    <section id="menu">
        <div class="logo">
            <a  class="logo-cta" href="#">Ad<span>Fixer</span></a>
        </div>

        <div class="items">
            <li><i class="fa-solid fa-rectangle-ad"></i><a href="publisher.php">Ads</a></li>
            <li><i class="fa-solid fa-credit-card"></i><a href="payment.php">Payment</a></li>
            <li><i class="fa-solid fa-cart-plus"></i><a href="addnew.php">Add new</a></li>
            <li><i class="fa-solid fa-lightbulb"></i><a href="plan.php">Plan</a></li>
            <li><i class="fa-solid fa-bullseye"></i><a href="complain.php">Complain</a></li>
            <li><i class="fa-solid fa-arrow-right-from-bracket"></i><a href="logout.php">Logout</a></li>
        </div>
    </section>
    <section id="interface">
    <div class="container">
        <h2>Choose your plan</h2>
        <div class="price-row">
            <div class="price-col">
                <p>Starter</p>
                <h3>19$ <span>/ month</span></h3>
                <ul>
                    <li>3 website</li>
                    <li>Fixed 1 position</li>
                    <li>For lower side</li>
                    <li>3 hours in a week</li>
                    <li>No SSL Certification</li>
                    <li>Limited Support</li>
                </ul>
            </div>

            <div class="price-col">
                <p>Advanced</p>
                <h3>39$ <span>/ month</span></h3>
                <ul>
                    <li>7 website</li>
                    <li>Fixed 2 position</li>
                    <li>For lower & right side</li>
                    <li>7 hours in a week</li>
                    <li>SSL Certification</li>
                    <li>Limited Support</li>
                </ul>
            </div>

            <div class="price-col">
                <p>Premium</p>
                <h3>69$ <span>/ month</span></h3>
                <ul>
                    <li>11 website</li>
                    <li>Fixed 3 position</li>
                    <li>For all side</li>
                    <li>15 hours in a week</li>
                    <li>SSL Certification</li>
                    <li>Advanced Support</li>
                </ul>
            </div>
        </div>
    </div>
    </section>
</body>
</html>