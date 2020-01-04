<?php
$signedin = false;
require 'check_session.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require './common_head.php';
    ?>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./css/admin.css">
</head>
<?php
if (!$signedin) {
    require './common_nav_signedout.php';
    require './admin_signedout.php';
} else {
    require './common_nav_signedin.php';
    require './shifts_signedin.php';
}
require './common_footer.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Deactivate zoom in mobile device -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css"
        integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js"
        integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P"
        crossorigin="anonymous"></script>
    <!-- Icon libraries -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- jQuery Roadmap plugin CSS -->
    <!-- <link href="jquery.roadmap.min.css" rel="stylesheet"> -->
    <!-- Custom styles -->
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/shifts.css">
    <link rel="stylesheet" href="./css/custom_schedule.css">
    <link rel="stylesheet" href="./css/bs4_timeline.css">
    <style></style>
</head>

<body>
    <section id="section-nav">
        <nav class="navbar navbar-expand-sm bg-light fixed-top">
            <!-- logo -->
            <a href="#" class="navbar-brand order-sm-1 d-flex">
                <img class="d-none d-md-block mr-md-4" src="./data/png/logo_travel_color_large.png" alt="imgLogo">
                <p class="d-none d-sm-block mr-md-4">外国人旅行センター</p>
                <p class="d-sm-none">外旅</p>
            </a>
            <!-- Navbar -->
            <ul class="px-0 ml-auto mr-2 my-0 order-sm-3" id="navbar">
                <li class="nav-item dropdown no-arrow">
                    <a href="" class="nav-link dropdown-toggle text-light" role="button" data-toggle="dropdown">
                        <span class="badge badge-sm badge-danger">
                            <i class="fas fa-exchange-alt"></i>
                        </span>

                    </a>
                    <span class="badge badge-sm badge-danger">3</span>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header">Requests</div>
                        <a href="#" class="dropdown-item">Request 1</a>
                        <a href="#" class="dropdown-item">Request 2</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">Action</a>
                    </div>
                </li>
                <li class="nav-item dropdown no-arrow">
                    <a href="" class="nav-link dropdown-toggle text-light" role="button" data-toggle="dropdown">
                        <span class="badge badge-sm badge-warning">
                            <i class="fas fa-bell fa-fw"></i>
                        </span>
                    </a>
                    <span class="badge badge-sm badge-warning">3</span>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header">Notices</div>
                        <a href="#" class="dropdown-item">Notice 1</a>
                        <a href="#" class="dropdown-item">Notice 2</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">Action</a>
                    </div>
                </li>
            </ul>
            <!-- nav-menu toggler -->
            <button class="navbar-toggler btn" data-toggle="collapse" data-target="#navMenu">
                <!-- <img src="./data/png/list-2x.png" alt="navbar-toggler-icon"> -->
                <i class="fas fa-bars"></i>
            </button>
            <!-- menu -->
            <div class="collapse navbar-collapse order-sm-2" id="navMenu">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="./admin.html" class="nav-link">Overview</a></li>
                    <li class="nav-item"><a href="./shifts.html" class="nav-link">Shifts</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">History</a></li>
                    <li class="nav-item text-"><a href="#" class="nav-link">News</a></li>
                    <li class="nav-item"><a href="./forms.html" class="nav-link">Forms</a></li>
                </ul>
            </div>
        </nav>
    </section>
    <header></header>
    <main>
        <div class="container px-1">
            <section id="section-main">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a href="#tab-content1" class="nav-link" data-toggle="tab">My Shifts</a>
                    <li>
                    <li class="nav-item"><a href="#tab-content2" class="nav-link" id="tab-daily-members"
                            data-toggle="tab">Daily Members</a>
                    </li>
                    <li class="nav-item"><a href="#tab-content3" class="nav-link active" data-toggle="tab">Market</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade" id="tab-content1">
                        <h5 class="text-center">Shifts Assigned</h5>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>2020/1/15</td>
                                    <td>H</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">See daily members</a>
                                                <a class="dropdown-item" href="#">Put</a>
                                                <a class="dropdown-item" href="#">Advertise</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2020/1/13</td>
                                    <td>D</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">See daily members</a>
                                                <a class="dropdown-item" href="#">Put</a>
                                                <a class="dropdown-item" href="#">Advertise</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2020/1/7</td>
                                    <td>B</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">See daily members</a>
                                                <a class="dropdown-item" href="#">Put</a>
                                                <a class="dropdown-item" href="#">Advertise</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2020/1/2</td>
                                    <td>B</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">See daily members</a>
                                                <a class="dropdown-item" href="#">Put</a>
                                                <a class="dropdown-item" href="#">Advertise</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="tab-content2">
                        <!-- Empty modal -->
                        <div class="modal fade" id="modal-A">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="modal-title"></div>
                                    </div>
                                    <div class="modal-body">
                                    </div>
                                    <div class="modal-footer"><button class="btn btn-danger" type="button"
                                            data-dismiss="modal">Close</button></div>
                                </div>
                            </div>
                        </div>
                        <!-- Search bar -->
                        <div class="div-search jumbotron bg-light mb-2 p-2">
                            <div class="div-search-year">
                                <div class="dropdown text-center">
                                    <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                        data-toggle="dropdown">2020</button>
                                    <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item">2019</a>
                                        <a href="#" class="dropdown-item active">2020</a>
                                        <a href="#" class="dropdown-item disabled">2021</a>
                                    </div>
                                </div>
                            </div>
                            <div class="div-search-week">
                                <ul class="pagination pagination-sm justify-content-center">
                                    <li class="page-item"><a class="page-link" href="#"><i
                                                class="fas fa-angle-double-left"></i></a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i
                                                class="fas fa-angle-left"></i></a></li>
                                    <li class="page-item"><a class="page-link" href="#" title="Mar 1~7">12</a></li>
                                    <li class="page-item"><a class="page-link" href="#" title="Mar 8~14">13</a></li>
                                    <li class="page-item active"><a class="page-link" href="#" title="Mar 15~21">14</a>
                                    </li>
                                    <li class="page-item disabled"><a class="page-link" href="#"
                                            title="Mar 22~28">15</a></li>
                                    <li class="page-item disabled"><a class="page-link" href="#"
                                            title="Mar 29~Apr 4">16</a></li>
                                    <li class="page-item disabled"><a class="page-link" href="#"><i
                                                class="fas fa-angle-right"></i></a></li>
                                    <li class="page-item disabled"><a class="page-link" href="#"><i
                                                class="fas fa-angle-double-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Accordion -->
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header"><a href="#day1" class="card-link"
                                        data-toggle="collapse">Monday</a></div>
                                <div class="collapse" data-parent="#accordion" id="day1">
                                    <div class="card-body">
                                        <div class="row no-gutters">
                                            <div class="col-md-8">
                                                <div class="div-schedule"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="shift-member-table"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header"><a href="#day2" class="card-link"
                                        data-toggle="collapse">Tuesday</a></div>
                                <div class="collapse" data-parent="#accordion" id="day2">
                                    <div class="card-body">
                                        <div class="row no-gutters">
                                            <div class="col-md-8">
                                                <div class="div-schedule"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="shift-member-table"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header"><a href="#day3" class="card-link"
                                        data-toggle="collapse">Wednesday</a></div>
                                <div class="collapse" data-parent="#accordion" id="day3">
                                    <div class="card-body">
                                        <div class="row no-gutters">
                                            <div class="col-md-8">
                                                <div class="div-schedule"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="shift-member-table"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header"><a href="#day4" class="card-link"
                                        data-toggle="collapse">Thurday</a></div>
                                <div class="collapse show" data-parent="#accordion" id="day4">
                                    <div class="card-body">
                                        <div class="row no-gutters">
                                            <!-- col left -->
                                            <div class="col-md-8" id="schedule">
                                                <div class="div-schedule">
                                                    <!-- timeline -->
                                                    <div class="timeline">
                                                        <ul type="none">
                                                        </ul>
                                                    </div>
                                                    <div class="div-columns">
                                                        <div class="column" id="column1">
                                                            <a class="btn btn-info" time-start="07:30" time-end="12:00"
                                                                data-toggle="modal">
                                                                <h5>A</h5>
                                                                <ul type="none">
                                                                    <li>Member1</li>
                                                                    <li>Member2</li>
                                                                    <li>Member3</li>
                                                                    <li>Member4</li>
                                                                </ul>
                                                            </a>
                                                            <a class="btn btn-secondary" time-start="12:30"
                                                                time-end="18:00" data-toggle="modal">
                                                                <h5>C</h5>
                                                                <ul type="none">
                                                                    <li>Member1</li>
                                                                    <li>Member2</li>
                                                                    <li>Member3</li>
                                                                    <li>Member4</li>
                                                                </ul>
                                                            </a>
                                                        </div>
                                                        <div class="column" id="column2">
                                                            <a class="btn btn-success" time-start="13:30"
                                                                time-end="18:00" data-toggle="modal">
                                                                <h5>D</h5>
                                                                <ul type="none">
                                                                    <li>Member1</li>
                                                                    <li>Member2</li>
                                                                    <li>Member3</li>
                                                                    <li>Member4</li>
                                                                </ul>
                                                            </a>
                                                            <a class="btn btn-dark text-light" time-start="08:00"
                                                                time-end="13:00" data-toggle="modal">
                                                                <h5>H</h5>
                                                                <ul type="none">
                                                                    <li>Member1</li>
                                                                    <li>Member2</li>
                                                                    <li>Member3</li>
                                                                    <li>Member4</li>
                                                                </ul>
                                                            </a>
                                                        </div>
                                                        <div class="column" id="column3">
                                                            <a class="btn btn-warning" time-start="08:00"
                                                                time-end="13:30" data-toggle="modal">
                                                                <h5>B</h5>
                                                                <ul type="none">
                                                                    <li>Member1</li>
                                                                    <li>Member2</li>
                                                                    <li>Member3</li>
                                                                    <li>Member4</li>
                                                                </ul>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script src="./js/custom_schedule.js"></script>
                                            </div>
                                            <!-- col right -->
                                            <div class="col-md-4">
                                                <div class="shift-member-table">
                                                    <div class="row">
                                                        <div class="col-2 d-flex">
                                                            <p>A</p>
                                                        </div>
                                                        <div class="col-10">
                                                            <ul class="list-group">
                                                                <li class="list-group-item px-1">
                                                                    <div class="dropdown">
                                                                        <a data-toggle="dropdown">
                                                                            Member
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <div class="dropdown-header">Member
                                                                            </div>
                                                                            <a class="dropdown-item" href="#">Call this
                                                                                shift</a>
                                                                            <a class="dropdown-item" href="#">Put your
                                                                                shift</a>
                                                                            <a class="dropdown-item" href="#">Send
                                                                                message</a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-2 d-flex">
                                                            <p>H</p>
                                                        </div>
                                                        <div class="col-10">
                                                            <ul class="list-group">
                                                                <li class="list-group-item">
                                                                    <div class="dropdown">
                                                                        <a data-toggle="dropdown">
                                                                            Member
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <div class="dropdown-header">Member
                                                                            </div>
                                                                            <a class="dropdown-item" href="#">Call this
                                                                                shift</a>
                                                                            <a class="dropdown-item" href="#">Put your
                                                                                shift</a>
                                                                            <a class="dropdown-item" href="#">Send
                                                                                message</a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item text-info">
                                                                    <div class="dropdown">
                                                                        <a data-toggle="dropdown">
                                                                            Member(Toshi)
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <div class="dropdown-header">Member
                                                                            </div>
                                                                            <a class="dropdown-item" href="#">Call this
                                                                                shift</a>
                                                                            <a class="dropdown-item" href="#">Put your
                                                                                shift</a>
                                                                            <a class="dropdown-item" href="#">Send
                                                                                message</a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-2 d-flex">
                                                            <p>B</p>
                                                        </div>
                                                        <div class="col-10">
                                                            <ul class="list-group">
                                                                <li class="list-group-item active">YOU</li>
                                                                <li class="list-group-item">
                                                                    <div class="dropdown">
                                                                        <a data-toggle="dropdown">
                                                                            Member
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <div class="dropdown-header">Member
                                                                            </div>
                                                                            <a class="dropdown-item" href="#">Call this
                                                                                shift</a>
                                                                            <a class="dropdown-item" href="#">Put your
                                                                                shift</a>
                                                                            <a class="dropdown-item" href="#">Send
                                                                                message</a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="dropdown">
                                                                        <a data-toggle="dropdown">
                                                                            Member
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <div class="dropdown-header">Member
                                                                            </div>
                                                                            <a class="dropdown-item" href="#">Call this
                                                                                shift</a>
                                                                            <a class="dropdown-item" href="#">Put your
                                                                                shift</a>
                                                                            <a class="dropdown-item" href="#">Send
                                                                                message</a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-2 d-flex">
                                                            <p>C</p>
                                                        </div>
                                                        <div class="col-10">
                                                            <ul class="list-group">
                                                                <li class="list-group-item">
                                                                    <div class="dropdown">
                                                                        <a data-toggle="dropdown">
                                                                            Member
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <div class="dropdown-header">Member
                                                                            </div>
                                                                            <a class="dropdown-item" href="#">Call this
                                                                                shift</a>
                                                                            <a class="dropdown-item" href="#">Put your
                                                                                shift</a>
                                                                            <a class="dropdown-item" href="#">Send
                                                                                message</a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="dropdown">
                                                                        <a data-toggle="dropdown">
                                                                            Member
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <div class="dropdown-header">Member
                                                                            </div>
                                                                            <a class="dropdown-item" href="#">Call this
                                                                                shift</a>
                                                                            <a class="dropdown-item" href="#">Put your
                                                                                shift</a>
                                                                            <a class="dropdown-item" href="#">Send
                                                                                message</a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-2 d-flex">
                                                            <p>D</p>
                                                        </div>
                                                        <div class="col-10">
                                                            <ul class="list-group">
                                                                <li class="list-group-item text-info">
                                                                    <div class="dropdown">
                                                                        <a data-toggle="dropdown">
                                                                            Member(Toshi)
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <div class="dropdown-header">Member
                                                                            </div>
                                                                            <a class="dropdown-item" href="#">Call this
                                                                                shift</a>
                                                                            <a class="dropdown-item" href="#">Put your
                                                                                shift</a>
                                                                            <a class="dropdown-item" href="#">Send
                                                                                message</a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="dropdown">
                                                                        <a data-toggle="dropdown">
                                                                            Member
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <div class="dropdown-header">Member
                                                                            </div>
                                                                            <a class="dropdown-item" href="#">Call this
                                                                                shift</a>
                                                                            <a class="dropdown-item" href="#">Put your
                                                                                shift</a>
                                                                            <a class="dropdown-item" href="#">Send
                                                                                message</a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header"><a href="#day5" class="card-link"
                                        data-toggle="collapse">Friday</a>
                                </div>
                                <div class="collapse" data-parent="#accordion" id="day5">
                                    <div class="card-body">
                                        <div class="row no-gutters">
                                            <div class="col-md-8">
                                                <div class="div-schedule"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="shift-member-table"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header"><a href="#day6" class="card-link"
                                        data-toggle="collapse">Saturday</a></div>
                                <div class="collapse" data-parent="#accordion" id="day6">
                                    <div class="card-body">
                                        <div class="row no-gutters">
                                            <div class="col-md-8">
                                                <div class="div-schedule"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="shift-member-table"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header"><a href="#day7" class="card-link"
                                        data-toggle="collapse">Sunday</a>
                                </div>
                                <div class="collapse" data-parent="#accordion" id="day7">
                                    <div class="card-body">
                                        <div class="row no-gutters">
                                            <div class="col-md-8">
                                                <div class="div-schedule"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="shift-member-table"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            // text color of card-headers
                            $('#accordion .card-header a').addClass('text-dark')
                        </script>
                    </div>
                    <div class="tab-pane active fade show" id="tab-content3">
                        <h2 class="pb-3 pt-2 border-bottom mb-5">Market Timeline</h2>
                        <div class="bs4-timeline">
                            <!--first section-->
                            <div class="row align-items-center how-it-works d-flex">
                                <div
                                    class="col-2 text-center bottom d-inline-flex justify-content-center align-items-center">
                                    <div class="circle">
                                        <p>Feb 28<br>土</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12 col-put">
                                            <ul type="none">
                                                <li>H: Member1</li>
                                                <li>D: Member3, Member4</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-call">
                                            <ul type="none">
                                                <li>B: Member2, Member5</li>
                                                <li>A: Member3</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--path between 1-2-->
                            <div class="row timeline">
                                <div class="col-2">
                                    <div class="corner top-right"></div>
                                </div>
                                <div class="col-8">
                                    <hr />
                                </div>
                                <div class="col-2">
                                    <div class="corner left-bottom"></div>
                                </div>
                            </div>
                            <!--second section-->
                            <div class="row align-items-center justify-content-end how-it-works d-flex">
                                <div class="col-6 text-right">
                                    <div class="row">
                                        <div class="col-12 col-put">
                                            <ul type="none">
                                                <li>H: Member1</li>
                                                <li>D: Member3, Member4</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-call">
                                            <ul type="none">
                                                <li>B: Member2, Member5</li>
                                                <li>A: Member3</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-2 text-center full d-inline-flex justify-content-center align-items-center">
                                    <div class="circle">
                                        <p>Mar 2<br>月</p>
                                    </div>
                                </div>
                            </div>
                            <!--path between 2-3-->
                            <div class="row timeline">
                                <div class="col-2">
                                    <div class="corner right-bottom"></div>
                                </div>
                                <div class="col-8">
                                    <hr />
                                </div>
                                <div class="col-2">
                                    <div class="corner top-left"></div>
                                </div>
                            </div>
                            <!--third section-->
                            <div class="row align-items-center how-it-works d-flex">
                                <div
                                    class="col-2 text-center top d-inline-flex justify-content-center align-items-center">
                                    <div class="circle">
                                        <p>Mar 4<br>水</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12 col-put">
                                            <div class="btn-group">
                                                <button class="btn" type="button">A</button>
                                                <button class="btn" type="button">C</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-call">
                                            <ul type="none">
                                                <li>B: Member2, Member5</li>
                                                <li>A: Member3</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="div-market-bg">
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-4"></div>
                                <div class="col-4"></div>
                                <div class="col-2"></div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </section>
        </div>

    </main>
    <footer></footer>
</body>

</html>