<?php
include_once 'database.php';

if (isset($_POST['delete'])) {

    $viewid3 = $_POST['viewid3'];

    $sql = "DELETE FROM acc_cred WHERE acc_no = '$viewid3' ";
    $sql_run = mysqli_query($config, $sql);

    if ($sql_run) {
        header("location: ../admin/account.php");
    }
    else{
        echo "Error deleting record";
    }
}
?>