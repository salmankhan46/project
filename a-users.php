<?php
    include("DataBase.php");
    include("common.php");
    // $date=date("Y-m-d");
    $table="SELECT * FROM `student` ORDER by `Reg_no`;";
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
<a href="admin.php">Add Student</a>
            <a href="a-records.php">Records</a>
            <a href="Logout.php">Log Out</a>
            
      
    <div>
        
    <table border 1px >
        <th>Register No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Delete</th>

        
    
    <?php
    while($row=mysqli_fetch_assoc($sql)){
        $r=$row['Reg_no'];
        echo '
        
        <tr>
        <td>'.$row['Reg_no'].'</td>
        <td>'.$row['Name'].'</td>
        <td>'.$row['Email_id'].'</td>
        <td><a href="delete.php?del='.$r.'">Delete</a></td>
    </tr>
        ';
    }
    ?>
    </table></div>
</body>
</html>