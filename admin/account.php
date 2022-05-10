<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: ../login.php");
  exit;
}
if (!isset($_SESSION["position"]) || $_SESSION["position"] != 'Admin') {
  header("location: ../login.php");
  exit;
}
require_once "../php/database.php";
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WEB AND DATABASE</title>
    <meta name="description" content="WEB AND DATABASE">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--   <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico"> -->

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="dashboard.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Customer</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-credit-card"></i><a href="add_costumer.php">Add Costumer</a></li>
                            <li><i class="fa fa-credit-card"></i><a href="atm.php">ATM</a></li>
                            <li><i class="fa fa-money"></i><a href="sps.php">SPS</a></li>
                            <li><i class="fa fa-bars"></i><a href="spsv1.php">SPSV1</a></li>
                        </ul>
                    </li> 
                     <li>
                        <a href="chat.php"> <i class="menu-icon fa fa-envelope"></i>Chat</a>
                    </li>
                    <li class="active">
                        <a href="account.php"> <i class="menu-icon fa fa-users"></i>Account</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">5</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                                <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-email"></i>
                                <span class="count bg-primary">9</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have 4 Mails</p>
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-5" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-3" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Rachel Santos</span>
                                    <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#modal-det"><i class="fa fa-user"></i> My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="../php/logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Account&nbsp
                            &nbsp&nbsp
                            <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add"><i class="fa fa-plus">&nbsp&nbspADD ACCOUNT</i>
                                                 </button></h1>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="content mt-3">
            <?php
                $fetch = mysqli_query($config, "SELECT * FROM user_info");
                $email = mysqli_query($config, "SELECT email FROM acc_cred");
                $records = mysqli_query($config, "SELECT * FROM user_info");

                while($data = mysqli_fetch_array($fetch) AND $data2 = mysqli_fetch_array($email) AND $data3 = mysqli_fetch_array($records)) {

            ?>
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">

                        <aside class="profile-nav alt">
                            <section class="card">
                                <div class="card-header user-header alt bg-dark">
                                    <div class="media">
                                        <a href="#">
                                                <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="images/admin.jpg">
                                         </a>
                                         
                                        <div class="media-body">
                                            <h4 class="text-light display-6"><?php echo $data['name']?></h4>
                                            <p><?php echo $data['position']?></p>
                                        </div>
                                    </div>
                                </div>

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <a href="#"> <?php echo $data2['email']?> <span class="badge badge-primary pull-right"></span></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#"> <i class="fa fa-tasks"></i> <?php echo $data['user_address']?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <center>
                                            <table>
                                             <tr>
                                                 <th style="display: none;">ID</th>
                                             </tr>
                                             <tr>
                                                 <td style="display: none;"><?php echo $data3['acc_no']?></td>
                                                 <td style="display: none;"><?php echo $data2['email']?></td>
                                                 <td style="display: none;"><?php echo $data3['user_address']?></td>
                                                 <td style="display: none;"><?php echo $data3['user_edu']?></td>
                                                 <td style="display: none;"><?php echo $data3['user_mobile']?></td>
                                                 <td style="display: none;"><?php echo $data3['user_status']?></td>
                                                 <td style="display: none;"><?php echo $data3['user_age']?></td>
                                                 <td style="display: none;"><?php echo $data3['user_gender']?></td>
                                                 <td style="display: none;"><?php echo $data3['name']?></td>
                                                 <td style="display: none;"><?php echo $data3['position']?></td>
                                                 <td style="display: none;"><?php echo $data3['user_mobile']?></td>
                                                 <td style="display: none;"><?php echo $data3['user_bday']?></td>
                                             
                                            <td><button type="submit" class="btn btn-primary btn-sm viewbtn" data-bs-toggle="modal" data-bs-target="#view"><i class="fa fa-eye"></i> </button>
                                            <button type="submit" class="btn btn-primary btn-sm approvebtn" data-bs-toggle="modal" data-bs-target="#approved"><i class="fa fa-check"></i></button>
                                            <button type="submit" class="btn btn-primary btn-sm rejectbtn" data-bs-toggle="modal" data-bs-target="#reject"><i class="fa fa-times"></i></button>
                                            <button type="submit" class="btn btn-primary btn-sm deletebtn" data-bs-toggle="modal" data-bs-target="#delete"><i class="fa fa-trash"></i></button></td>
                                            </tr>
                                            </table>
                                        </center>
                                    </li>
                                </ul>
                            </section>
                        </aside>
                    </div>

                </div>
            </div>
            <?php
                }
            ?>

        </div> <!-- .content -->
        
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <!-- <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script> -->

    <!-- modal view -->
<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Costumer Information</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-header">
                    <strong class="card-title">Personal Information</strong>
                </div><br/>
                <div class="row">
                    <div class="col-sm-6">
                        <aside class="profile-nav alt">
                            <section class="card">
                                <div class="card-header user-header alt bg-dark">
                                    <div class="media">
                                        <a href="#">
                                            <img class="align-self-center rounded-circle mr-3" style="width:125px; height:135px;" alt="" src="images/admin.jpg">
                                        </a>
                                        <div class="media-body">
                                            <div class="media-body"><br/>
                                                <input type="text" id="name" style="border: none;" class="text-light bg-dark" readonly>
                                                <p><input type="text" id="position" style="border: none;" class="text-light bg-dark" readonly>
                                                    <input type="text" id="c_no" style="border: none;" class="text-light bg-dark" readonly><br/><input type="text" id="b_day" style="border: none;" class="text-light bg-dark" readonly></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </aside>
                     </div>
                    <div class="col-sm-6">
                        <input type="hidden" id="viewid" name="viewid">
                        <input id="name" name="name" type="text" class="form-control" value="Name"><br/>
                        <input id="user_address" name="user_address" type="text" class="form-control" value="Address"><br/>
                        <input id="user_edu" name="user_edu" type="text" class="form-control" value="Highest Educational Attainment">
                    </div>                         
                </div>
                <div class="row">
                     <div class="col-sm-6">
                        <label></label>
                          <input id="user_mobile" name="user_mobile" type="text" class="form-control" placeholder="Telephone/Mobile Number">
                          <label></label>
                          <input id="user_status" name="user_tatus" type="text" class="form-control" placeholder="Civil Status">
                    </div>
                     <div class="col-sm-6">
                        <label></label>
                          <input id="user_age" name="user_age" type="text" class="form-control" placeholder="Age">
                        <label></label>
                          <input id="user_gender" name="user_gender" type="text" class="form-control" placeholder="Gender">
                    </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
            <!-- end modal view -->

<!-- modal approved -->
<div class="modal fade" id="approved" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Approved Account</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../php/approve.php" method="post">
                <div class="modal-body">
                <input type="hidden" id="viewid1" name="viewid1">
                <p align="center">Are you sure? You want to approved this Account?</p>

                <div class="modal-footer">
                      <button type="submit" name="approve" class="btn btn-secondary">YES</button>  
                     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">NO</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal approved -->

<!-- modal reject -->
<div class="modal fade" id="reject" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Approved Account</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../php/reject.php" method="post">
                <div class="modal-body">

                <input type="hidden" id="viewid2" name="viewid2">
                <p align="center">Are you sure? You want to Reject this Account?</p>

                <div class="modal-footer">
                    <button type="submit" name="reject" class="btn btn-secondary">YES</button>
                     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">NO</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal reject -->

<!-- modal delete -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Approved Account</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../php/delete.php" method="post">
                 <div class="modal-body">

                        <input type="hidden" id="viewid3" name="viewid3">
                        <p align="center">Are you sure? You want to Delete this Account?</p>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary" name="delete">YES</button>
                             <button type="button" class="btn btn-danger" data-bs-dismiss="modal">NO</button>
                        </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal delete -->

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Add  Costumer</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                
                        <form action="../php/add-user.php" method="post">
                            <div class="card-header">
                                <strong class="card-title">Personal Information</strong>
                            </div><br/>
                            <div class="row">
                                        <div class="col-sm-4">
                                              <label for="lname" class="control-label mb-1">Lastname</label>
                                              <input id="lname" name="lname" type="text" class="form-control" placeholder="Lastname">
                                        </div>
                                         <div class="col-sm-4">
                                              <label for="fname" class="control-label mb-1">Firstname</label>
                                              <input id="fname" name="fname" type="text" class="form-control" placeholder="Firstname">
                                        </div>
                                         <div class="col-sm-4">
                                              <label for="mname" class="control-label mb-1">Middle Name</label>
                                              <input id="mname" name="mname" type="text" class="form-control" placeholder="Middlename">
                                        </div>
                                                                    
                            </div>
                            <div class="row">
                                        <div class="col-sm-6">
                                              <label for="bday" class="control-label mb-1">Date of Birth</label>
                                              <input id="bday" name="bday" type="date" class="form-control" placeholder="Birthday">
                                        </div>
                                         <div class="col-sm-6">
                                              <label for="t_number" class="control-label mb-1">Telephone/Mobile Number</label>
                                              <input id="m_number" name="m_number" type="text" class="form-control" placeholder="Telephone/Mobile Number">
                                        </div>
                            </div>

                            <div class="row">
                                        <div class="col-sm-4">
                                              <label for="lname" class="control-label mb-1">Email Address</label>
                                              <input id="email" name="email" type="text" class="form-control" placeholder="Email">
                                        </div>
                                         <div class="col-sm-4">
                                              <label for="fname" class="control-label mb-1">Password</label>
                                              <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="col-sm-4">
                                              <label for="type" class="control-label mb-1">User Type</label>
                                              <select class="form-control" id="type" name="type">
                                                  <option value="Admin">Admin</option>
                                                  <option value="Branch Manager">Branch Manager</option>
                                                  <option value="Staff">Staff</option>
                                              </select>
                                        </div>
                                         <div class="col-sm-4">
                                              <label for="mname" class="control-label mb-1">Age</label>
                                              <input id="age" name="age" type="text" class="form-control" placeholder="Age">
                                        </div>
                                                                    
                            </div>

                            <div class="row">
                                        <div class="col-sm-8">
                                               <label for="father" class="control-label mb-1">Permanent Address</label>
                                              <input id="address" name="address" type="text" class="form-control" placeholder="Address">

                                               <label for="spouse" class="control-label mb-1">Highest Education Attainment</label>
                                              <input id="edu" name="edu" type="text" class="form-control" placeholder="Highest Educational Attainment">
                                        </div>
                                         <div class="col-sm-4">
                                              <label for="t_number" class="control-label mb-1">Gender</label>
                                              <input id="gender" name="gender" type="text" class="form-control" placeholder="Gender">
                                              <label for="bday" class="control-label mb-1">Civil Status</label>
                                              <input id="civil" name="civil" type="text" class="form-control" placeholder="Civil Status">
                                        </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm" style="">
                                         <i class="fa fa-save"></i> Save
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Clear
                                </button>
                            </div>
                        </form>
                            </div>
                                                         
                        </div>
                    </div>
                </div>

<!--Details Modal-->
  <div class="modal fade" id="modal-det">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h3><b>Account Details</b></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
        <div class="modal-body">
          <form action="edit_users.php" method="post">
            <fieldset id="tableFieldset" disabled>
              <div class="mb-3">
                <?php
                $records = mysqli_query($config, "select * from user_info where acc_no = '{$_SESSION['uid']}'");

                $data = mysqli_fetch_array($records);
                ?>
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $data['name'] ?>" placeholder="Enter First Name">
                <label class="form-label">Position</label>
                <input type="text" name="position" class="form-control" value="<?php echo $data['position'] ?>" placeholder="Enter Last Name">
                <label class="form-label">Contact No.</label>
                <input type="text" name="user_mobile" class="form-control" value="<?php echo $data['user_mobile'] ?>" placeholder="Enter Last Name">
                <br>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>

<!-- end modal delete -->
<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
  <script src="../js/bootstrap.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.viewbtn').on('click', function() {

        $('#view').modal('show');


        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();


        }).get();

        console.log(data);
        $('#viewid').val(data[0]);
        $('#name').val(data[1]);
        $('#user_address').val(data[2]);
        $('#user_edu').val(data[3]);
        $('#user_mobile').val(data[4]);
        $('#user_status').val(data[5]);
        $('#user_age').val(data[6]);
        $('#user_gender').val(data[7]);
        $('#name').val(data[8]);
        $('#position').val(data[9]);
        $('#c_no').val(data[10]);
        $('#b_day').val(data[11]);
      })
    });

    $(document).ready(function() {
      $('.approvebtn').on('click', function() {

        $('#approve').modal('show');


        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();


        }).get();

        console.log(data);
        $('#viewid1').val(data[0]);
      })
    });

    $(document).ready(function() {
      $('.rejectbtn').on('click', function() {

        $('#reject').modal('show');


        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();


        }).get();

        console.log(data);
        $('#viewid2').val(data[0]);
      })
    });

    $(document).ready(function() {
      $('.deletebtn').on('click', function() {

        $('#delete').modal('show');


        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();


        }).get();

        console.log(data);
        $('#viewid3').val(data[0]);
      })
    });
</script>


</body>

</html>
