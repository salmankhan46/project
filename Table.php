<?php
    include("DataBase.php");
    include("common.php");
    $date=date("Y-m-d");
    $table="SELECT * FROM `e-attendance` WHERE `Date`='$date' order by Reg_no;";
    $sql= mysqli_query($conn, $table);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="table.css">
</head>
<body>
<a href="attendance.php">Attendance</a>
            <a href="Table.php">Records</a>
            <a href="Logout.php">Log Out</a>
            
           
    <div class="table">
    <table border 1px >
        <th>Register No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Date</th>
        <th>Status</th>
    
    <?php
    while($row=mysqli_fetch_assoc($sql)){
        if($row['Status']==1){
            $st='Present';
        }
        else{
            $st= 'Absent';
        }
        echo '
        
        <tr>
        <td>'.$row['Reg_no'].'</td>
        <td>'.$row['Name'].'</td>
        <td>'.$row['Email_id'].'</td>
        <td>'.$row['Date'].'</td>
        <td>'.$st.'</td>
    </tr>
        ';
    }
    ?>
    </table>
    </div> 
</body>
</html>