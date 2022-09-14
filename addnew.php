<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: index.php");
    exit;
}
?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $target = "images/".basename($_FILES['imagefile']['name']);
    $target1 = "images/".basename($_FILES['adsfile']['name']);

    include '_db_connection.php';
    $username = $_SESSION['username'];
    $adsname = $_POST["adsname"];
    $adstitle = $_POST["adstitle"];
    $adsdescription = $_POST["adsdescription"];
    $imagefile = $_FILES["imagefile"]['name'];
    $plan = $_POST["plan"];
    $adsfile = $_FILES["adsfile"]['name'];
    $sql = "INSERT INTO `ads` ( `username`,`adsname`,`adstitle`,`adsdescription`,`imagefile`,`plan`,`adsfile`) VALUES ('$username','$adsname','$adstitle','$adsdescription','$imagefile','$plan','$adsfile')";
    mysqli_query($conn, $sql);
    move_uploaded_file($_FILES['imagefile']['tmp_name'],$target);
    move_uploaded_file($_FILES['adsfile']['tmp_name'],$target1);
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
    <link rel="stylesheet" href="CSS/addnew.css">
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
            <form action="../nuri/addnew.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="row">
                    <div class="col">
                        <h3 class="title">add new ads</h3>
                        <div class="inputBox">
                            <span>Name :</span>
                            <input type="text" placeholder="Harpic" name="adsname">
                        </div>
                        <div class="inputBox">
                            <span>Title :</span>
                            <input type="text" placeholder="Toilet cleaner" name="adstitle">
                        </div>
                        <div class="inputBox">
                            <span>Description :</span>
                            <input type="text" placeholder="very useful" name="adsdescription">
                        </div>
                    </div>

                    <div class="col">
                        <div class="col2">
                            <div class="inputBox">
                                <span>Image File :</span>
                                <input type="file" id="img" name="imagefile">
                            </div>
                            <div class="inputBox">
                                <span>Plan :</span>

                                <select name="plan" id="plan">
                                    <option value="Starter">Starter</option>
                                    <option value="Advanced">Advanced</option>
                                    <option value="Premium">Premium</option>
                                </select>
                            </div>
                            <div class="inputBox">
                                <span>Ads File :</span>
                                <input type="file" placeholder="put ads file here" name="adsfile">
                            </div>
                        </div>
                    </div>
                </div>
             <input type="submit" value="Add to list" class="submit-btn">
            </form>
        </div>
    </section>
</body>
</html>