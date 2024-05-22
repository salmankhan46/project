<?php
include('common.php');
include('DataBase.php');
    if(isset($_GET['del'])){
        $de=$_GET['del'];
        $dele="DELETE FROM `student` WHERE `Reg_no`=$de;";
        $dl=mysqli_query($conn,$dele);
        header('Location:a-users.php');
    }

?>