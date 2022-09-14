<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: index.php");
    exit;
}
?>

<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){
include '_db_connection.php';
$username = $_SESSION['username'];
$sql1 = "SELECT * FROM ads";
$query1 = $conn->query($sql1);
while($row1 = $query1->fetch_assoc())
{
if($row1['username']=="$username"){                          
    
    $rand = rand(1234567,9999999);
    
    $adsname = $_POST["adsname"];
    $amount = $_POST["amount"];
    $pin = $_POST["pin"];
    $status = $_POST["status"];

if($row1['adsname']=="$adsname"){
    $sql = "INSERT INTO `payment` ( `username`,`adsname`, `amount`,`pin`, `status`,`trx`) VALUES ('$username','$adsname', '$amount', '$pin', '$status','$rand')";

    $result = mysqli_query($conn, $sql);
}
}
}
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
    <link rel="stylesheet" href="CSS/checkout.css">
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
            <form action="../nuri/checkout.php" method="post" autocomplete="off">
                <div class="row">
                    <div class="col">
                        <h3 class="title">Checkout</h3>
                        <div class="inputBox">
                            <span>Ads Name :</span>
                            <input type="text" placeholder="Harpic" name="adsname">
                        </div>
                        <div class="inputBox">
                            <span>Amount :</span>
                            <input type="text" placeholder="5000" name="amount">
                        </div>
                    </div>

                    <div class="col">
                        <div class="col2">
                            <div class="inputBox">
                                <span>Pin :</span>
                                <input type="text" placeholder="1234" name="pin">
                            </div>
                            <div class="inputBox">
                                <span>Status :</span>

                                <select name="status" id="plan">
                                    <option value="Active">Active</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                    <input type="submit" value="Proceed" class="submit-btn">
            </form>
        </div>
    </section>
</body>
</html>