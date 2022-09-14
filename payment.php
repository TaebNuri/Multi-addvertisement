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
    <link rel="stylesheet" href="CSS/payment.css">
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
            <form action="../nuri/checkout.php">
                <div class="row">
                    <div class="col">
                        <h3 class="title">billing adress</h3>
                        <div class="inputBox">
                            <span>full name :</span>
                            <input type="text" placeholder="jhon deo" required>
                        </div>
                        <div class="inputBox">
                            <span>email :</span>
                            <input type="email" placeholder="taeb@gmail.com" required>
                        </div>
                        <div class="inputBox">
                            <span>address :</span>
                            <input type="text" placeholder="room - street - locality" required>
                        </div>
                        <div class="inputBox">
                            <span>city :</span>
                            <input type="text" placeholder="dhaka" required>
                        </div>
                        <div class="inputBox">
                            <span>state :</span>
                            <input type="text" placeholder="bangladesh" required>
                        </div>
                        <div class="inputBox">
                            <span>zip code :</span>
                            <input type="text" placeholder="1230" required>
                        </div>
                    </div>

                    <div class="col">
                        <h3 class="title">payment</h3>
                        <div class="inputBox">
                            <span>card accepted :</span>
                            <img src="image/credit-card-photo.png" alt="" >
                        </div>
                        <div class="inputBox">
                            <span>name on card :</span>
                            <input type="text" placeholder="jhon deo" required>
                        </div>
                        
                        <div class="inputBox">
                            <span>credit card number :</span>
                            <input type="number" placeholder="1111-2222-3333-4444" required>
                        </div>
                        <div class="inputBox">
                            <span>exp year :</span>
                            <input type="number" placeholder="2022" required>
                        </div>
                        <div class="inputBox">
                            <span>CW:</span>
                            <input type="text" placeholder="1234" required>
                        </div>
                    </div>
                </div>
                <input type="submit" value="proceed to checkout" class="submit-btn">
            </form>
        </div>
    </section>
</body>
</html>