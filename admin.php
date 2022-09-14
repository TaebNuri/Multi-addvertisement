<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: index.php");
    exit;
}
?>
<?php
    include '_db_connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdFixer</title>
    <script src="https://kit.fontawesome.com/8656ada1c2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/admin1.css">
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

        <h3 class="i-name">
            Publisher
        </h3>

        <div class="values">
            <div class="val-box">
                <i class="fas fa-users"></i>
                 <div>
                     <h3><?php 
                     $sql = "SELECT sno FROM users ORDER BY SNO";
                     $query = $conn->query($sql);
                     $row = mysqli_num_rows($query);
                     echo $row-1;?></h3>
                     <span>New Users</span>
                 </div>
            </div>

            <div class="val-box">
                <i class="fa-solid fa-rectangle-ad"></i>
                 <div>
                     <h3><?php 
                     $sql = "SELECT id FROM ads ORDER BY id";
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
                     $sql = "SELECT sum(amount) as total FROM payment";
                     $query = $conn->query($sql);
                     $row = $query->fetch_object();
                     echo $row->total;?></h3>
                     <span>Total Deposit</span>
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
                        <td>Occupation</td>
                        <td>Age</td>
                        <td>Phone</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM users";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc())
                    {
                        if($row['username']!='admin'){
                            ?>
                            <tr>
                                <td class="people">
                                    <img src="image/user.png" alt="">
                                    <div class="people-de">
                                        <h5><?php echo $row['username'];?></h5>
                                        <p><?php echo $row['email'];?></p>
                                    </div>
                                </td>

                                <td class="people-des">
                                    <h5><?php echo $row['occupation'];?></h5>
                                </td>

                                <td class="age">
                                    <p><?php echo $row['age'];?></p>
                                </td>

                                <td class="age">
                                    <p><?php echo $row['mobile'];?></p>
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