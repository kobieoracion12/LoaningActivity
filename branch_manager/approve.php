<?php
include_once("../php/database.php");

if (isset($_POST['approve'])) {
  $viewid1         = $_POST['viewid1'];
  $status = 'Approved';

  $query= "UPDATE acc_cred SET acc_status='$status'WHERE acc_no='$viewid1'";

  $query_run = mysqli_query($config, $query);


   if ($query_run) {
    header('Location: account.php');
  }
  else{
    echo '<script> alert("ERROR: Data Not Updated!");
    window.location.href="account.php";</script>';
  }
}
?>