<?php 
ob_start();
include "../../func/db.php";

$message = [];
// var_dump($_SESSION);
if(!isset($_SESSION["logged_in"])) {
  $_SESSION['username'] = null;
  $_SESSION['user_id'] = null;
  $_SESSION['Fname'] = null;
  $_SESSION['Lname'] = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.6.0/cosmo/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- <script src="https://kit.fontawesome.com/ea7b7f7751.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="../../css/Style.css">
    <title>School Management System</title>
</head>
<body style="background: #ecf0f4">
    <!-- horizontal navbar -->
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <img src="../../images/logo.png" alt="" height="55">
            <button class="navbar-toggler bg-white mr-4" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav ml-auto" style="margin: 0px 25px;">
                    <?php if($_SESSION['image'] == ""):?>
                    <img src="../../images/user.png" alt="hugenerd" width="40" height="40"
                        class="rounded-circle horizontal-nav-img">
                    <?php else: ?>
                    <img src="<?=$_SESSION['image']?>" alt="hugenerd" width="40" height="40"
                        class="rounded-circle horizontal-nav-img">
                    <?php endif; ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <?=$_SESSION['Fname'] . " " . $_SESSION['Lname']?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-light">
                            <li class="text-center">
                                <?php if($_SESSION['image'] == ""):?>
                                <img src="../../images/user.png" alt="hugenerd" width="120" height="120"
                                    class="rounded-circle horizontal-nav-img">
                                <?php else: ?>
                                <img src="<?=$_SESSION['image']?>" alt="hugenerd" width="120" height="120"
                                    class="rounded-circle horizontal-nav-img">
                                <?php endif; ?>
                            </li>
                            <li class="text-center">
                                <p class="dropdown-item" style="color: #646566;margin-bottom: -7px;">
                                    <?=$_SESSION['Fname'] . " " . $_SESSION['Lname']?></p>
                            </li>
                            <li class="text-center">
                                <p class="dropdown-item" style="font-size: 12px;color: #646566;">
                                    <?=$_SESSION['email']?>
                                </p>
                            </li>
                            <li><a class="dropdown-item" href="admin.php"><i class="fa-regular fa-user mr-2"></i>My
                                    Profile</a></li>
                            <li><a class="dropdown-item" href="setting.php"><i
                                        class="fa-solid fa-bolt-lightning mr-2"></i>Setting</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../../homepage/signout.php"><i
                                        class="fa-solid fa-power-off mr-2"></i>Sign Out</a></li>
                        </ul>
                    </li>
                    <!-- collpase horizontal nav -->
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start hidden-menu-horizontal"
                        id="menu1">
                        <li class="nav-item border-bottom d-flex align-items-center justify-content-between">
                            <a href="index.php" class="nav-link align-middle px-0">
                                <span class="ms-1 d-none d-sm-inline text-white active">Dashboard</span>
                            </a>
                            <i class="text-success fa-solid fa-display"></i>
                        </li>
                        <li class="nav-item border-bottom">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="#Submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle"><span
                                        class="ms-1 d-none d-sm-inline text-white">Class</span></a>
                                <i class="text-success fa-solid fa-layer-group"></i>
                            </div>
                            <ul class="collapse nav flex-column ms-1" id="Submenu1" data-bs-parent="#menu1">
                                <li class="w-100">
                                    <a href="addClass.php" class="nav-link px-0"> <span
                                            class="d-none d-sm-inline text-white">> Add Class</span></a>
                                </li>
                                <li>
                                    <a href="manageClass.php" class="nav-link px-0"> <span
                                            class="d-none d-sm-inline text-white">> Manage Class</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item border-bottom">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="#Submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle"><span
                                        class="ms-1 d-none d-sm-inline text-white">Student</span></a>
                                <i class="text-success fa-solid fa-users"></i>
                            </div>
                            <ul class="collapse nav flex-column ms-1" id="Submenu2" data-bs-parent="#menu1">
                                <li class="w-100">
                                    <a href="addStudent.php" class="nav-link px-0"> <span
                                            class="d-none d-sm-inline text-white">> Add Student</span></a>
                                </li>
                                <li>
                                    <a href="manageStudent.php" class="nav-link px-0"> <span
                                            class="d-none d-sm-inline text-white">> Manage Student</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item border-bottom">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="#Submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle"><span
                                        class="ms-1 d-none d-sm-inline text-white">Teacher</span></a>
                                <i class="fa-solid fa-chalkboard-user text-success"></i>
                            </div>
                            <ul class="collapse nav flex-column ms-1" id="Submenu3" data-bs-parent="#menu1">
                                <li class="w-100">
                                    <a href="addTeacher.php" class="nav-link px-0"> <span
                                            class="d-none d-sm-inline text-white">> Add Teacher</span></a>
                                </li>
                                <li>
                                    <a href="manageTeacher.php" class="nav-link px-0"> <span
                                            class="d-none d-sm-inline text-white">> Manage Teacher</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item border-bottom">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="#Submenu4" data-bs-toggle="collapse" class="nav-link px-0 align-middle"><span
                                        class="ms-1 d-none d-sm-inline text-white">Class Notice</span></a>
                                <i class="text-success fa-solid fa-file"></i>
                            </div>
                            <ul class="collapse nav flex-column ms-1" id="Submenu4" data-bs-parent="#menu1">
                                <li class="w-100">
                                    <a href="addClassNotice.php" class="nav-link px-0"> <span
                                            class="d-none d-sm-inline text-white">> Add Notice</span></a>
                                </li>
                                <li>
                                    <a href="manageClassNotice.php" class="nav-link px-0"> <span
                                            class="d-none d-sm-inline text-white">> Manage Notice</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item border-bottom">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="#Submenu5" data-bs-toggle="collapse" class="nav-link px-0 align-middle"><span
                                        class="ms-1 d-none d-sm-inline text-white">Public Notice</span></a>
                                <i class="text-success fa-solid fa-passport"></i>
                            </div>
                            <ul class="collapse nav flex-column ms-1" id="Submenu5" data-bs-parent="#menu1">
                                <li class="w-100">
                                    <a href="addPublicNotice.php" class="nav-link px-0"> <span
                                            class="d-none d-sm-inline text-white">> Add Notice</span></a>
                                </li>
                                <li>
                                    <a href="managePublicNotice.php" class="nav-link px-0"> <span
                                            class="d-none d-sm-inline text-white">> Manage Notice</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item border-bottom">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="#Submenu6" data-bs-toggle="collapse" class="nav-link px-0 align-middle"><span
                                        class="ms-1 d-none d-sm-inline text-white">Users</span></a>
                                <i class="fa-regular fa-user text-success"></i>
                            </div>
                            <ul class="collapse nav flex-column ms-1" id="Submenu6" data-bs-parent="#menu1">
                                <li class="w-100">
                                    <a href="admin.php" class="nav-link px-0"> <span
                                            class="d-none d-sm-inline text-white">> My Profile</span></a>
                                </li>
                                <li>
                                    <a href="setting.php" class="nav-link px-0"> <span
                                            class="d-none d-sm-inline text-white">> Setting</span></a>
                                </li>
                                <li>
                                    <a href="../../homepage/signout.php" class="nav-link px-0"> <span
                                            class="d-none d-sm-inline text-white">> Sign out</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </ul>
            </div>
        </div>
    </nav>

    <!-- vertical nav -->
    <div class="row flex-nowrap container-fluid">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark hidden-menu-vertical">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item d-flex align-items-center justify-content-between pb-3 mt-3">
                        <a href="admin.php" class="d-flex align-items-center text-white text-decoration-none">
                            <?php if($_SESSION['image'] == ""):?>
                            <img src="../../images/user.png" alt="hugenerd" width="40" height="40"
                                class="rounded-circle horizontal-nav-img mb-3 mr-2">
                            <?php else: ?>
                            <img src="<?=$_SESSION['image']?>" alt="hugenerd" width="40" height="40"
                                class="rounded-circle horizontal-nav-img mb-3 mr-2">
                            <?php endif; ?>
                            <div class="text-wrap">
                                <span class="d-none d-sm-inline mx-1"
                                    style="font-size: 15px;"><?=$_SESSION['Fname'] . " " . $_SESSION['Lname']?></span>
                                <p style="font-size: 12px; font-weight: 400; color:#9c9fa6;"><?=$_SESSION['email']?></p>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item border-bottom d-flex align-items-center justify-content-between">
                        <a href="index.php" class="nav-link align-middle px-0">
                            <span class="ms-1 d-none d-sm-inline text-white">Dashboard</span>
                        </a>
                        <i class="text-success fa-solid fa-display"></i>
                    </li>
                    <li class="nav-item border-bottom">
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle"><span
                                    class="ms-1 d-none d-sm-inline text-white">Class</span></a>
                            <i class="text-success fa-solid fa-layer-group"></i>
                        </div>
                        <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="addClass.php" class="nav-link px-0"> <span
                                        class="d-none d-sm-inline text-white">> Add Class</span></a>
                            </li>
                            <li>
                                <a href="manageClass.php" class="nav-link px-0"> <span
                                        class="d-none d-sm-inline text-white">> Manage Class</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item border-bottom">
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle"><span
                                    class="ms-1 d-none d-sm-inline text-white">Student</span></a>
                            <i class="text-success fa-solid fa-users"></i>
                        </div>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="addStudent.php" class="nav-link px-0"> <span
                                        class="d-none d-sm-inline text-white">> Add Student</span></a>
                            </li>
                            <li>
                                <a href="manageStudent.php" class="nav-link px-0"> <span
                                        class="d-none d-sm-inline text-white">> Manage Student</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item border-bottom">
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle"><span
                                    class="ms-1 d-none d-sm-inline text-white">Teacher</span></a>
                            <i class="fa-solid fa-chalkboard-user text-success"></i>
                        </div>
                        <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="addTeacher.php" class="nav-link px-0"> <span
                                        class="d-none d-sm-inline text-white">> Add Teacher</span></a>
                            </li>
                            <li>
                                <a href="manageTeacher.php" class="nav-link px-0"> <span
                                        class="d-none d-sm-inline text-white">> Manage Teacher</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item border-bottom">
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="#submenu4" data-bs-toggle="collapse" class="nav-link px-0 align-middle"><span
                                    class="ms-1 d-none d-sm-inline text-white">Class Notice</span></a>
                            <i class="text-success fa-solid fa-file"></i>
                        </div>
                        <ul class="collapse nav flex-column ms-1" id="submenu4" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="addClassNotice.php" class="nav-link px-0"> <span
                                        class="d-none d-sm-inline text-white">> Add Notice</span></a>
                            </li>
                            <li>
                                <a href="manageClassNotice.php" class="nav-link px-0"> <span
                                        class="d-none d-sm-inline text-white">> Manage Notice</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item border-bottom">
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="#submenu5" data-bs-toggle="collapse" class="nav-link px-0 align-middle"><span
                                    class="ms-1 d-none d-sm-inline text-white">Public Notice</span></a>
                            <i class="text-success fa-solid fa-passport"></i>
                        </div>
                        <ul class="collapse nav flex-column ms-1" id="submenu5" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="addPublicNotice.php" class="nav-link px-0"> <span
                                        class="d-none d-sm-inline text-white">> Add Notice</span></a>
                            </li>
                            <li>
                                <a href="managePublicNotice.php" class="nav-link px-0"> <span
                                        class="d-none d-sm-inline text-white">> Manage Notice</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>