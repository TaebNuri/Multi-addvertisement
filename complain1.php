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
    $delete = mysqli_query($conn,"DELETE FROM `complain` WHERE `sno`='$id'");
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
    <link rel="stylesheet" href="CSS/complain1.css">
</head>
<body>
    
    <section id="menu">
        <div class="logo">
            <a  class="logo-cta" href="#">Ad<span>Fixer</span></a>
        </div>

        <div class="items">
            <li><i class="fa-solid fa-chart-bar"></i><a href="admin.php">Publisher</a></li>
            <li><i class="fa-solid fa-rectangle-ad"></i><a href="ads.php">Ads</a></li>
            <li><i class="fa-solid fa-warehouse"></i><a href="domain.php">Domain</a></li>
            <li><i class="fa-solid fa-credit-card"></i><a href="transaction.php">Transaction</a></li>
            <li><i class="fa-solid fa-bullseye"></i><a href="complain1.php">Complain</a></li>
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
                <img src="image/1.jpg" alt="">
            </div>
        </div>

        
        <div class="board">
            <table width="100%">
                <tbody>
                <?php
                    include '_db_connection.php';
                    $sql = "SELECT * FROM complain";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc())
                    {?>
                    <tr>
                        <td class="ads">
                            <div class="ads-de">
                                <h5><?php echo $row['username'];?></h5>
                            </div>
                        </td>

                        <td class="ads-des">
                            <p><?php echo $row['message'];?></p>
                        </td>

                        <td class="plan">
                        <p><?php echo "<a href = 'complain1.php?id=".$row['sno']."' class='btn' style='text-decoration:none;color:#5c639d;'><b>Done</b></a>"; ?></p>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>