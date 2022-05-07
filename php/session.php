<?php
session_start();

if(isset($_SESSION['uid'])) {

   $userdata = mysqli_query($config, "SELECT * FROM user_info WHERE acc_no = '$uid'");

   while($rows = mysqli_fetch_array($userdata)) {
      $_SESSION['name'] = $rows['name'];
      $_SESSION['position'] = $rows['position'];
      $_SESSION["loggedin"] = true;
   }
}

else {
   header("location: ../index.php?msg=loginfirst");
}
?>