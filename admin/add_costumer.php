<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
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
<style>
    ::-webkit-scrollbar {
  width: 5px;
}

::-webkit-scrollbar-track {
  width: 5px;
  background: #f5f5f5;
}

::-webkit-scrollbar-thumb {
  width: 1em;
  background-color: #ddd;
  outline: 1px solid slategrey;
  border-radius: 1rem;
}

.text-small {
  font-size: 0.9rem;
}

.messages-box,
.chat-box {
  height: 510px;
  overflow-y: scroll;
}

.rounded-lg {
  border-radius: 0.5rem;
}

input::placeholder {
  font-size: 0.9rem;
  color: #999;
}
</style>
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
                    <li class="active">
                        <a href="dashboard.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Costumer</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-credit-card"></i><a href="#">Add Costumer</a></li>
                            <li><i class="fa fa-credit-card"></i><a href="atm.php">ATM</a></li>
                            <li><i class="fa fa-money"></i><a href="sps.php">SPS</a></li>
                            <li><i class="fa fa-bars"></i><a href="spsv1.php">SPSV1</a></li>
                        </ul>
                    </li> 
                     <li class="active">
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
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

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
                        <h1>Costumer/Add Costumer</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

           <!--  <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
 -->
            <!--/.col-->

            
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                       
                            
                            <!--/.col-->


                      <!--   </div> -->
                        <!-- form -->
                        <form action="../php/customer.php" method="POST">
                            <div class="card-header">
                                <strong class="card-title">Personal Information</strong>
                            </div><br/>
                            <div class="row">
                                        <div class="col-sm-3">
                                              <label for="lname" class="control-label mb-1">Lastname*</label>
                                              <input id="lname" name="lname" type="text" class="form-control" placeholder="Lastname here!">
                                        </div>
                                         <div class="col-sm-3">
                                              <label for="fname" class="control-label mb-1">Firstname</label>
                                              <input id="fname" name="fname" type="text" class="form-control" placeholder="Firstname here!">
                                        </div>
                                         <div class="col-sm-3">
                                              <label for="mname" class="control-label mb-1">Middle Name</label>
                                              <input id="mname" name="mname" type="text" class="form-control" placeholder="Middlename here!">
                                        </div>
                                        <!--  <div class="col-sm-3">
                                              <label for="mname" class="control-label mb-1">Catteg</label>
                                              <input id="mname" name="mname" type="text" class="form-control" placeholder="Middlename here!">
                                        </div> -->

                                             <div class="col-sm-3">
                                                <label for="select" class="control-label mb-1">Categories</label>
                                                    <select name="select" id="select" class="form-control">
                                                        <option value="0">Please select</option>
                                                        <option value="atm">ATM</option>
                                                        <option value="sps">SPS</option>
                                                        <option value="spsv1">SPSV1</option>
                                                    </select>
                                            </div>

                                                                    
                            </div>

                            <div class="row">
                                        <div class="col-sm-6">
                                              <label for="p_address" class="control-label mb-1">Permanent Address</label>
                                              <input id="p_address" name="p_address" type="text" class="form-control" placeholder="Permanent Address here!">
                                        </div>
                                         <div class="col-sm-6">
                                              <label for="e_address" class="control-label mb-1">Email Address</label>
                                              <input id="e_address" name="e_address" type="text" class="form-control" placeholder="Email Address here!">
                                        </div>
                            </div>

                            <div class="row">
                                        <div class="col-sm-4">
                                              <label for="bday" class="control-label mb-1">Date of Birth</label>
                                              <input id="bday" name="bday" type="date" class="form-control" placeholder="Birthday here!">
                                        </div>
                                         <div class="col-sm-4">
                                              <label for="t_number" class="control-label mb-1">Telephone/Mobile Number</label>
                                              <input id="t_number" name="t_number" type="text" class="form-control" placeholder="Telephone/Mobile Number here!">
                                        </div>
                                         <div class="col-sm-4">
                                              <label for="id_card" class="control-label mb-1">ID Card Number</label>
                                              <input id="id_card" name="id_card" type="text" class="form-control" placeholder="ID Card Number here!">
                                        </div>
                            </div>

                            <div class="row">
                                        <div class="col-sm-6">
                                              <label for="mother" class="control-label mb-1">Mother's Name</label>
                                              <input id="mother" name="mother" type="text" class="form-control" placeholder="Mother's Name here!">
                                               <label for="father" class="control-label mb-1">Father's Name</label>
                                              <input id="father" name="father" type="text" class="form-control" placeholder="Father's Name here!">
                                               <label for="spouse" class="control-label mb-1">Name of Spouse</label>
                                              <input id="spouse" name="spouse" type="text" class="form-control" placeholder="Name of Spouse here!">
                                        </div>
                                        <div class="col-sm-6">
                                              <label for="m_contact" class="control-label mb-1">Contact Person</label>
                                              <input id="m_contact" name="m_contact" type="text" class="form-control" placeholder="Contact Person here!">

                                               <label for="f_contact" class="control-label mb-1">Contact Number</label>
                                              <input id="f_contact" name="f_contact" type="text" class="form-control" placeholder="Contact Number here!">

                                               <label for="s_contact" class="control-label mb-1">Spouse Contact Number</label>
                                              <input id="s_contact" name="s_contact" type="text" class="form-control" placeholder="Spouse Contact Number here!">
                                        </div>  
                            </div><br/>

                            <div class="card-header">
                                <strong class="card-title">Company Information</strong>
                            </div><br/>
                            <div class="row">
                                        <div class="col-sm-4">
                                              <label for="c_affiliated" class="control-label mb-1">Company Affiliated With</label>
                                              <input id="c_affiliated" name="c_affiliated" type="text" class="form-control" placeholder="Lastname here!">
                                        </div>
                                         <div class="col-sm-4">
                                              <label for="c_address" class="control-label mb-1">Company Address</label>
                                              <input id="c_address" name="c_address" type="text" class="form-control" placeholder="Firstname here!">
                                        </div>
                                         <div class="col-sm-4">
                                              <label for="c_number" class="control-label mb-1">Company Contact Number</label>
                                              <input id="c_number" name="c_number" type="text" class="form-control" placeholder="Middlename here!">
                                        </div>
                            </div>

                             <div class="row">
                                        <div class="col-sm-6">
                                              <label for="position" class="control-label mb-1">Position/Occupation</label>
                                              <input id="position" name="position" type="text" class="form-control" placeholder="Permanent Address here!">
                                        </div>
                                         <div class="col-sm-6">
                                              <label for="w_status" class="control-label mb-1">Work Status</label>
                                              <input id="w_status" name="w_status" type="text" class="form-control" placeholder="Email Address here!">
                                        </div>
                            </div><br/>


                            <div class="card-header">
                                <strong class="card-title">Loan Type</strong>
                            </div><br/>
                            <div class="row">
                                        <div class="col-sm-4">
                                              <label for="" class="control-label mb-1">Loan Amount</label>
                                              <input id="" name="" type="text" class="form-control" placeholder="Lastname here!">
                                        </div>
                                         <div class="col-sm-4">
                                              <label for="" class="control-label mb-1">Company Address</label>
                                              <input id="" name="" type="text" class="form-control" placeholder="Firstname here!">
                                        </div>
                                         <div class="col-sm-4">
                                              <label for="" class="control-label mb-1">Company Contact Number</label>
                                              <input id="" name="" type="text" class="form-control" placeholder="Middlename here!">
                                        </div>
                            </div>

                             <div class="row">
                                        <div class="col-sm-6">
                                              <label for="" class="control-label mb-1">Position/Occupation</label>
                                              <input id="" name="" type="text" class="form-control" placeholder="Permanent Address here!">
                                        </div>
                                         <div class="col-sm-6">
                                              <label for="" class="control-label mb-1">Work Status</label>
                                              <input id="" name="" type="text" class="form-control" placeholder="Email Address here!">
                                        </div>
                            </div><br/>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm" style="">
                                         <i class="fa fa-save"></i> Save
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Clear
                                </button>
                            </div>
                        </form>


                        <!-- end of form -->
                      
                                  <br/><br/>
                                </div>
                              </div>
                            </div>
                        </div>
                        <!-- end chat -->
                    </div>
                  
                </div>
            </div>

           

           


            

            

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



</body>

</html>
