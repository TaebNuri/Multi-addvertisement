<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_db_connection.php';
    $username = $_POST["username"];
    $phonenumber = $_POST["phonenumber"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $sql = "INSERT INTO `complain` ( `username`, `phonenumber`,`email`, `message`) VALUES ('$username', '$phonenumber', '$email', '$message')";

    $result = mysqli_query($conn, $sql);
}
?>
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
    <link rel="stylesheet" href="CSS/complainP.css">
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
    <div class="hero">
        <form action="../nuri/complain.php" method="post">
            <div class="row">
                <div class="input-group">
                    <input type="text" id="name" name="username" required>
                    <label for="name"><i class="fa-solid fa-user"></i>  Username</label>
                </div>
                <div class="input-group">
                    <input type="text" id="number" name="phonenumber" required>
                    <label for="number"><i class="fa-solid fa-square-phone"></i>  Phone No.</label>
                </div>
            </div>
            <div class="input-group">
                <input type="email" id="email" name="email" required>
                <label for="email"><i class="fa-solid fa-envelope"></i>  Email</label>
            </div>
            <div class="input-group">
                <textarea id="message" name="message" rows="8" required></textarea>
                <label for="message"><i class="fa-solid fa-message"></i>  Your message</label>
            </div>
            <button type="submit">SUBMIT<i class="fa-solid fa-paper-plane"></i></button>
        </form>
    </div>
    </section>
</body>
</html>