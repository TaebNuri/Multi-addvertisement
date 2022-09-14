<?php
$showalert = false;
$showerror = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_db_connection.php';
    $username = $_POST["username"];
    $occupation = $_POST["occupation"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $age = $_POST["age"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // $exists = false;
    $existsql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $existsql);
    $numExistRows = mysqli_num_rows($result);

    if($numExistRows > 0){
        $showerror = "Username already exists";
    }
    else{
    if(($password == $cpassword)){
        $sql = "INSERT INTO `users` ( `username`,`occupation`, `email`, `mobile`, `age`, `password`, `dt`) VALUES ('$username','$occupation', '$email', '$mobile', '$age', '$password', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if($result){
            $showalert = true;
        }
    }
    else{
        $showerror = "Please provide same password";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/login.css">   
</head>

<body>
    <div class="navbar" id="top">
        <div class="container"> 
            <a class="logo" href="#">Ad<span>Fixer</span></a>

            <img id="mobile-cta" class="mobile-menu" src="image/menu.svg" alt="open navigation" height="25" weight="45">

            <nav>
                <img id="mobile-exit" class="mobile-menu-exit" src="image/close.png" alt="close navigation"height="25" weight="45">
                <ul class="primary-nav">
                    <li class="current"><a href="index.php#top">Home</a></li>
                    <li><a href="index.php#login">Login</a></li>
                    <li><a href="index.php#features">Service</a></li>
                </ul>
            </nav>
        </div>
    </div>
    
    <?php
    if($showalert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account has been created.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
    }
    if($showerror){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '.$showerror.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>';
        }
    ?>
    
    <section class="signup-cta" >
        <div class="container">
                <h2>Sign up</h2>
                <form action="../nuri/login.php" method="post" autocomplete="off">
                    <label for="name">Your name</label>
                    <input type="text" id="name" name="username">

                    <label for="occupatin">Occupation</label>
                    <input type="text" id="occupation" name="occupation">

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">

                    <label for="mobile-number">Mobile</label>
                    <input type="text" id="mobile" name="mobile">

                    <label for="age">Age</label>
                    <input type="text" id="age" name="age">

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">

                    <label for="cpassword">Confirm Password</label>
                    <input type="password" id="cpassword" name="cpassword">
                    <div>
                        <button type="submit" class="sign-up" name="register">
                            Sign up
                        </button>
                    </div>  
                </form>
        </div>
    </section>
</body>
</html>
