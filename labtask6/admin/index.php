<?php
session_start();
require_once './dbcon.php';
  if(!isset($_SESSION['user_login'])){
    header('location:login.php');
  }
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SMS</title>


    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/dataTables.bootstrap.min.css" rel="stylesheet" >
    <link href="style.css" rel="stylesheet">

    <script type="text/javascript" src="../js/jquery-3.3.1.js">    </script>
    <script type="text/javascript" src="../js/jquery.dataTables.min.js">    </script>
    <script type="text/javascript" src="../js/dataTables.bootstrap.min.js">    </script>
    <script type="text/javascript" src="../js/script.js">    </script>

  </head>

  <body>
    <nav class="navbar  navbar-default ">
      <div class="container-fluid">

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

           <ul class="nav navbar-nav navbar-right">
            
            <?php
                $session_user = $_SESSION['user_login'];
                $user_data = mysqli_query($linnk,"SELECT * FROM `users` WHERE `username`= '$session_user'");
                $user_row  = mysqli_fetch_assoc($user_data);
            ?>

            <li><a href="logout.php"><i class="fa fa-caret-square-o-right"></i> Welcome: <?= ucwords($user_row['name']); ?></a></li>
            
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3">
          <!-- <div class="list-group">
              <a href="index.php?page=dashboard" class="list-group-item active "><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
              <a href="index.php?page=add-student" class="list-group-item "><i class="fa fa-plus-square" aria-hidden="true"></i> Add student</a>
                <a href="index.php?page=all-students" class="list-group-item"><i class="fa fa-caret-square-o-down" aria-hidden="true"></i> All students</a>
                  <a href="index.php?page=all-users" class="list-group-item  "><i class="fa fa-users" aria-hidden="true"></i> All Users</a>

            </div> -->
        </div>

        <div class="col-sm-9">
          <div class="content">
            <?php

                if(isset($_GET['page']))
                {
                    $page = $_GET['page'].'.php';
                }
                else
                {
                    $page = "dashboard.php";
                }

                if(file_exists($page))
                {
                  require_once $page;
                }
                else
                {
                  require_once '404.php';
                }

              ?>

          </div>
        </div>

      </div>
    </div>


    <footer class="footer-area">
      <p>Copyright &copy; 2019 Student Management System. All Rights Reserved</p>
    </footer>

    </body>

</html>
