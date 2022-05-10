<?php
include_once('database.php');
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = mysqli_real_escape_string($config,$_POST["email"]);
    $password = mysqli_real_escape_string($config,$_POST["password"]);

    $sql = "SELECT acc_no FROM acc_cred WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($config, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    $uid = $row['acc_no'];
    
    $_SESSION['email'] = $email;
    $_SESSION['uid'] = $uid;

    if($count == 1) {

        $userdata = mysqli_query($config, "SELECT * FROM user_info WHERE acc_no = '$uid'");

            while($rows = mysqli_fetch_array($userdata)) {
              $_SESSION['name'] = $rows['name'];
              $_SESSION['position'] = $rows['position'];
              $_SESSION["loggedin"] = true;
              $_SESSION['acc_no'] = $rows['acc_no'];
           }

        $query = mysqli_query($config, "SELECT position FROM user_info WHERE acc_no = '$uid'");

        while($rows = mysqli_fetch_array($query)) {
            $priv = $rows['position'];

            if ($priv == "Admin") {
                header("Location: ../admin/dashboard.php");
            }
            else if ($priv == "Branch Manager") {
                header("Location: ../branch_manager/dashboard.php");
            }
            else if ($priv == "Staff") {
                header("Location: ../staff/dashboard.php");
            }
            else {
                header("Location: ../login.php?msg=invalid");
            }
            
            mysqli_close($config);
        }

    }
    else {
       header("Location: ../login.php?invalid");
    }
}

?>