<?php
session_start();


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: index.php");
    exit;
}
?>

<?php
if(isset($_GET['id'])){
    include '_db_connection.php';
    $id = $_GET['id'];
    $delete = mysqli_query($conn,"DELETE FROM `ads` WHERE `id`='$id'");
}
?>

<?php
include '_db_connection.php';
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdFixer</title>
    <script src="https://kit.fontawesome.com/8656ada1c2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/publisher1.css">
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
        <div class="navigation">
            <div class="n1">
                <div class="search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search">
                </div>
            </div>

            <div class="profile">
                <i class="far fa-bell"></i>
                <img src="image/user.png" alt="">
            </div>
        </div>

        <h3 class="i-name">
            Ads
        </h3>

        <div class="values">
            <div class="val-box">
                <i class="fas fa-users"></i>
                 <div>
                     <h3>0</h3>
                     <span>Total click</span>
                 </div>
            </div>

            <div class="val-box">
                <i class="fa-solid fa-rectangle-ad"></i>
                 <div>
                 <h3><?php 
                     $sql = "SELECT username FROM ads WHERE username='$username' GROUP BY username";
                     $query = $conn->query($sql);
                     $row = mysqli_num_rows($query);
                     echo $row;?></h3>
                     <span>Total Ads</span>
                 </div>
            </div>

            <div class="val-box">
                <i class="fa-solid fa-money-bill"></i>
                 <div>
                     <h3><?php 
                     $sql = "SELECT sum(amount) as total FROM payment WHERE username='$username'";
                     $query = $conn->query($sql);
                     $row = $query->fetch_object();
                     echo $row->total;?></h3>
                     <span>Total Payment</span>
                 </div>
            </div>

            <div class="val-box">
                <i class="fa-solid fa-city"></i>
                 <div>
                     <h3><?php 
                     $sql = "SELECT id FROM website ORDER BY id";
                     $query = $conn->query($sql);
                     $row = mysqli_num_rows($query);
                     echo $row;?></h3>
                     <span>Total Domain</span>
                 </div>
            </div>
        </div>

        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Title</td>
                        <td>Plan</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT * FROM ads";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc())
                    {
                    if($row['username']=="$username"){?>
                    <tr>
                        <td class="ads">
                        <?php echo "<img src = 'images/".$row['imagefile']."'>";?>
                            <div class="ads-de">
                                <h5><?php echo $row['adsname'];?></h5>
                            </div>
                        </td>

                        <td class="ads-des">
                        <h5><?php echo $row['adstitle'];?></h5>
                            <p><?php echo $row['adsdescription'];?></p>
                        </td>

                        <td class="plan">
                            <p><?php echo $row['plan'];?></p>
                        </td>

                        <td class="active">
                            <?php
                            $sql1 = "SELECT * FROM payment";
                            $query1 = $conn->query($sql1);
                            while($row1 = $query1->fetch_assoc())
                            {
                            if($row['adsname']==$row1['adsname']){?>
                            <p><?php echo $row1['status'];?></p>
                            <?php
                            }
                            }
                            ?>
                        </td>

                        <td class="edit">
                            <p><?php echo "<a href = 'publisher.php?id=".$row['id']."' class='btn' style='text-decoration:none;color:#5c539d;'><b>Remove</b></a>"; ?></p>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>