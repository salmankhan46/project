<?php
include("common.php");
include "DataBase.php";
$array=[];
// $array[0]=NULL;

if(isset($_POST["add"])){
    $insert="SELECT * FROM `student`";
    $result=mysqli_query($conn,$insert);

    
}
// if(isset($_POST["attend"])){
    
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
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
            margin: 0px auto;
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

<?php
        // echo $_SESSION["RP"];
        ?>
        
        
    <div class="container">
        <h2>Attendance Management</h2>
        <a href="attendance.php?a">Attendance</a>
        <a href="Table.php">Present Day Status</a>
        <a href="Logout.php">Log Out</a>
        
        <form action="attendance.php" method="post">
        <button type="Submit" name="add" value="Submit" class="login-btn">Add Student</button>
        </form>
        <?php
        if(isset($_POST["add"])){
            if(mysqli_num_rows($result)> 0){
                while($row=mysqli_fetch_assoc($result)){
                $na=$row['Name'];
                $reg=$row['Reg_no'];
                $email=$row['Email_id'];
                // echo'name'.$na.'regno'.$reg.'email'.$email;
                $at="INSERT INTO `e-attendance`(`Reg_no`, `Name`, `Email_id`) VALUES ('$reg','$na','$email');";
                $add=mysqli_query($conn,$at);
                header("Location:attendance.php?a=1");
            }
            }
        // while($row){
           
        // }
    }
    // echo $array[0];
        ?>
        <?php
        if(isset($_GET['a'])){?>
                <form action="attendance.php" method="post">
                    <div id="students">
                        <div class="form-group">
                            <label for="name1">Student Name:</label>
                <!-- Student List -->
                <?php
                // $temp='simply';
                    $attend ="SELECT Name FROM `e-attendance` WHERE `Flag`is null;";
                    $result=mysqli_query($conn,$attend);
                    
                    $i=0;
                    while($row=mysqli_fetch_array($result)){
                        $array[$i]=$row['Name'];
                        $i++;
                        // echo $row['Name'];
                    }
                    
                ?>
                <select name="stat" id="" autofocus>
                <?php
                    foreach($array as $arr){
                       
                            // $_SESSION["temp"]=$array[0];
                       
                        ?>
                        <option value="<?php print($arr); ?>" >
                            <?php 
                            print($arr);
                            // $temp=$arr;
                            
                            ?>
                        </option><?php
                    }?>
                
            </select><br><br>
            
                    <label for="status1">Attendance Status:</label>
                    <select id="status1" name="statuses" required>
                        <option value=1>Present</option>
                        <option value=0>Absent</option>
                    </select>


                </div>
            </div>
            
            <button type="submit" name="attend">Submit</button>
        </form>
        <?php } ?>
    </div>
    <?php
    if(isset($_POST['attend'])){   
        $sname=$_POST['stat'];
        $stat=$_POST['statuses'];
        // $stats=$_SESSION['temp'];
        // echo $sname;

    // if($stat== 'present'){
        // print_r($_SESSION["temp"]);


        $stats="UPDATE `e-attendance` SET `Status`=$stat,`Flag`=1 WHERE Name='$sname' AND Flag is null;";


    // }
    // else if($stat== 'absent'){
    //     print_r($_SESSION["temp"]);
    //     $stats="UPDATE `e-attendance` SET `Status`=1,`Flag`=1 WHERE Name='Yaseen' AND Flag is null;";
    // }


    $try=mysqli_query($conn,$stats);
    // echo $array[0];
    // if($array[0]!=NULL){
        header('Location:attendance.php?a=1');
    // }
    // header('Location:attendance.php');


}
?>            
   
</body>
</html>