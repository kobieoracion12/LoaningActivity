<?php
include_once("../php/database.php");

if (isset($_POST['reject'])) {
  $viewid2         = $_POST['viewid2'];
  $status = 'Declined';

  $query= "UPDATE acc_cred SET acc_status='$status'WHERE acc_no='$viewid2'";

  $query_run = mysqli_query($config, $query);


   if ($query_run) {
    header('Location: account.php');
  }
  else{
    echo '<script> alert("ERROR: Data Not Updated!");
    window.location.href="../admin/account.php";</script>';
  }
}
?>