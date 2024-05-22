<?php
include "common.php";
include "DataBase.php";
if(isset($_GET['login'])){
    // echo "login success";
    $userid = $_GET['userid'];
    $password = $_GET['pass'];
    // if($userid == 'Admin' && $password == '123'){

    // }
    
    $select = "SELECT `temp` FROM `lecturer` WHERE `user_name`='$userid'  AND `pass`='$password';";
    $result = mysqli_query($conn, $select);
    $row=mysqli_fetch_assoc($result);
    
    // }
    // echo $pass;
    // check the login member is Admin or not, if yes redirect to admin.php
        
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>E-Attendance System</title>
<style>
    body {
        margin: 0;
        padding: 0;
        background: linear-gradient(135deg, #ff6b81, #54a0ff, #5f27cd);
        background-size: 600% 600%;
        animation: gradientAnimation 10s ease infinite;
        font-family: Arial, sans-serif;
        color: #fff;
    }

    @keyframes gradientAnimation {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    .container {
        padding: 20px;
        text-align: center;
       
    }

    header h1 {
        font-size: 36px;
        margin-bottom: 20px;
    }

    button {
        background-color: #fff;
        color: #333;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        margin: 0 10px;
        font-size: 16px;
    }

    footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: rgba(255, 255, 255, 0.7);
        color: #333;
        padding: 10px 0;
        text-align: center;
    }

    footer p {
        font-size: 14px;
    }

    .login-container {
        position: absolute;
        color: black;
        top: 55%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(255, 255, 255, 0.8);
        padding: 40px;
        border-radius: 20px;
        text-align: center;
    }
	input[type="text"], input[type="username"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
        border: none;
        background-color: #f2f2f2;
    }

    input[type="text"], input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
        border: none;
        background-color: #f2f2f2;
    }
	
    .login-btn {
        background-color: #3498db;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .login-btn:hover {
        background-color: #2980b9;
    }
</style>
</head>
<body>
<header>
    <div class="container">
        <h1>E-Attendance System</h1>
	<h2>work smart......!</h2>
    </div>
</header>
<div class="login-container">
    <h2>Login</h2>
    <?php
        // echo $_SESSION["RP"];
        ?>
    <form method="GET" action="home.php">
        <input type="username" placeholder="Username" name="userid" required><br>
        <input type="password" placeholder="Password" name="pass" required><br>
        <!-- <input type="button" value="Submit" name="Login"> -->
        <?php
        if(isset($_GET["login"])){
            if($row){
                $user=$row['temp'];
                // unset($_SESSION['RP']);
                // $_SESSION["RP"]='$user';
            // if(isset($_POST["Login"])){
                if ($user ==1) {
                    
                    header("Location:attendance.php");
                }
                elseif($user==2) {
                    header("Location:admin.php");
                }
                elseif($user== 3) {
                    header("Location:Parent.php?name=$userid");
                }
                else{
                    echo "Wrong Username or password<br>";
                } }}
        ?>
        <button type="Submit" name="login" value="Submit" class="login-btn">Login</button>
    </form>
    <?php
        // echo $userid;
        ?>
</div>
 <footer>
    <p>NDRK FIRST GRADE COLLEGE-HASSAN</p>
</footer>

</body>
</html>
