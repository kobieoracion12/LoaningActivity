<?php

include '../php/database.php';

$id = $_GET['id'];

$del = mysqli_query($config,"delete from customer_cred where customer_id = '$id'");

if($del)
{
    mysqli_close($config);
    header("location: atm.php");
    exit;   
}
else
{
    echo "Error deleting record";
}
?>