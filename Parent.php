<?php
session_start();
include("DataBase.php");
    $name=$_GET['name'];
    // echo $name;
    $rec="SELECT * FROM `e-attendance` WHERE `Name`='$name';";
    $res=mysqli_query($conn,$rec);
    $rec1="SELECT * FROM `student` WHERE `Name`='$name';";
    $res1=mysqli_query($conn,$rec1);
    $row= mysqli_fetch_assoc($res1);
    // echo $row['Name'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent's Portal</title>
</head>
<body>
<a href="Logout.php">Log Out</a>
    <div>
        Name : <?php echo $row['Name'];?><br>
        Register No : <?php echo $row['Reg_no'];?><br>
        Email Id : <?php echo $row['Email_id'];?>
    </div>
<div class="table">
    <table border 1px >
        <th>Sl No</th>
        <th>Date</th>
        <th>Status</th>
    
    <?php
    $i=1;
    while($row=mysqli_fetch_assoc($res)){
        if($row['Status']==1){
            $st='Present';
        }
        else{
            $st= 'Absent';
        }
        echo '
        
        <tr>
        
        <td>'.$i.'</td>
        <td>'.$row['Date'].'</td>
        <td>'.$st.'</td>
    </tr>
        ';
        $i++;
    }
    ?>
    </table>
    </div> 
</body>
</html>