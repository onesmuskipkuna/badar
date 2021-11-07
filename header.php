
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Fleet Management System</title>
<!-- <link rel="stylesheet" href="style.css"> -->
  <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="test1.css">
<link rel="stylesheet" href="test.css">
<link rel="stylesheet" href="style.css">
<script src="jquery.min.js"></script>
<script src="ckeditor.js"></script>
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="index.php"><?php $session= (isset($_SESSION['role'])) ?  $_SESSION['role'] : "Fleet Management System"; echo $session;?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <?php
            if (isset($_SESSION['valid'])) {
              // code...
              include("connection.php");
              $result=mysqli_query($mysqli,"SELECT * FROM users");

           ?>
           <?php switch ($_SESSION['role']):case 'Sales Manager': ?>

          <li class="nav-item active">
            <a class="nav-link" href="viewGoods.php">Manage Cleared Goods
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <!-- <li class="nav-item active">
            <a class="nav-link" href="view.php">Manage Editors</a>
          </li> -->
          <!-- <li class="nav-item active">
            <a class="nav-link" href="viewArticles.php">Manage Articles</a>
          </li> -->
          <?php break; ?>
          <?php case 'Driver': ?>
          <li class="nav-item active">
            <a class="nav-link" href="verifyGoods.php">Verify Transit Goods</a>
          </li>
          <?php break; ?>
          <?php case 'Customer': ?>
          <li class="nav-item active">
            <a class="nav-link" href="verifyReceivedGoods.php">Verify Received Goods</a>
          </li>
          <?php break; ?>
          <?php case 'Clearence Officer': ?>
          <li class="nav-item active">
            <a class="nav-link" href="verifyTransitGoods.php">Cleared Goods</a>
          </li>
          <?php break; ?>
          <?php case 'Admin': ?>
          <li class="nav-item active">
            <a class="nav-link" href="verifyTransitGoodsAdmin.php">Manage Goods</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="viewUsers.php">Manage Users</a>
          </li>
          <li class="nav-item active">
            <a href="register.php" class="btn btn-secondary btn-xl rounded-pill mt-5">Register</a>
            </li>
          <li class="nav-item active">
            <a class="nav-link" href="deliveredGoods.php">Delivered Goods</a>
          </li>
          <?php break; ?>
          <?php default: ?>
          <li class="nav-item active">
            <a class="nav-link" href="editorViewArticles.php">Manage Goods</a>
          </li>


            <?php break; ?>
        <?php endswitch ?>
          <div class="dropdown">
            <button class="dropbtn">Welcome, <?php echo $_SESSION['name'] ?></button>
              <div class="dropdown-content">
                  
                  <li class="nav-item active">
                <a class="nav=link" href="pass_recovery/enter_email.php"><b>Change Password</b></a>
            </li> 
          
                  <li class="nav-item active">
                      <a class="nav-link" href="logout.php">Log out</a>
                  </li>
                  
              </div>
        </div>
            
          <?php
          }  else {


          ?>
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          
        <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
