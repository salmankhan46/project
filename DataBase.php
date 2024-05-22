<!-- New File -->
<!-- Database Connectivity in my laptop -->

<?php

$DBserver = 'localhost';
$DBuname = 'root';
$DBpass = '';
$DBname = 'Attendance';

$conn = mysqli_connect($DBserver, $DBuname, $DBpass, $DBname);

if (!$conn) {
    die("Database connection failure " + $conn);
}
// else{
//     echo "Connection success";
// }

?>