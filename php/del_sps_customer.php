<?php

include 'database.php';

$id = $_GET['id'];

$del = mysqli_query($config,"delete from customer_info where customer_id = '$id'");

if($del)
{
    mysqli_close($config);
    header("location: ../admin/sps.php");
    exit;   
}
else
{
    echo "Error deleting record";
}
?>