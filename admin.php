<?php
include "common.php";
include "DataBase.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        select {
            width: calc(100% - 12px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        select {
            width: 100%;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        .attendance-report {
            margin-top: 50px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .attendance-report h3 {
            margin-bottom: 20px;
            color: #007bff;
        }

        .student-details {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #e7f0ff;
            border-radius: 5px;
        }

        .student-details span {
            font-weight: bold;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h2>Attendance Management</h2>
        <?php
        // echo $_SESSION["RP"];
        ?>
        <a href="admin.php">Add Student</a>
        <a href="a-records.php">Records</a>
        <a href="Logout.php">Log Out</a>
        <form action="admin.php" method="post">
            <div id="students">
                <div class="form-group">
                    <label for="name1">Student Name:</label>
                    <input type="text" id="name1" name="names" required>
                    <label for="reg_no1">Registration Number:</label>
                    <input type="text" id="reg_no1" name="reg_nos" required>
                    <label for="email1">Email ID:</label>
                    <input type="text" id="email1" name="emails" required>
                    
                </div>
            </div>
            <button type="submit" name="submit">Add Student</button>
        </form>
    </div>

    
</body>
</html>
<?php
    if(isset($_POST["submit"])){
        $name=$_POST["names"];
        $email=$_POST["emails"];
        $reg_no=$_POST["reg_nos"];
        $insert="INSERT INTO `student`(`Reg_no`, `Name`, `Email_id`) VALUES ('$reg_no','$name','$email');";
        $result=mysqli_query($conn,$insert);
        $parent="INSERT INTO `lecturer`(`user_name`, `pass`, `temp`) VALUES ('$name','$email',3)";
        $par=mysqli_query($conn,$parent);
        header("Location:admin.php");
    }
?>