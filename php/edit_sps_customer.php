<?php
include 'database.php';

if (isset($_POST['update'])) {
  $update_id         = $_POST['update_id'];
  $category          = $_POST['category'];
  $p_address         = $_POST['p_address'];
  $m_address         = $_POST['m_address'];
  $t_number          = $_POST['t_number'];
  $id_card           = $_POST['id_card'];
  $mother            = $_POST['mother'];
  $father            = $_POST['father'];
  $spouse            = $_POST['spouse'];
  $c_person          = $_POST['c_person'];
  $contact           = $_POST['contact'];
  $s_number          = $_POST['s_number'];
  $c_affiliated      = $_POST['c_affiliated'];
  $c_address         = $_POST['c_address'];
  $c_number          = $_POST['c_number'];
  $c_position        = $_POST['c_position'];
  $w_status          = $_POST['w_status'];

  $query= "UPDATE customer_info SET category='$category', p_address='$p_address', p_address='$m_address', t_number='$t_number', id_card='$id_card', mother='$mother', father ='$father', spouse='$spouse', c_person = '$c_person', contact = '$contact', s_number = '$s_number', c_affiliated = '$c_affiliated', c_address = '$c_address', c_number = '$c_number', c_position = '$c_position', w_status = '$w_status' WHERE customer_id='$update_id'";

  $query_run = mysqli_query($config, $query);


   if ($query_run) {
    header('Location: ../admin/sps.php');
  }
  else{
    echo '<script> alert("ERROR: Data Not Updated!");
    window.location.href="../admin/sps.php";</script>';
  }
}
?>