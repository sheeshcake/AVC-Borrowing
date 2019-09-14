<?php
  include('controller/connect.php');
  session_start();
  if(isset($_SESSION['row'])){
    if($_SESSION['row']['user_type'] != 'admin'){
      header("Location: forbidden.php");
    }
  }
  else{
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>AVC - Admin Panel</title>
  <link rel="stylesheet" type="text/css" href="css/admin-dashboard.css">
  <?php
    if(isset($_GET['open'])){
      if($_GET['open'] == 'dashboard'){
        echo '<link rel="stylesheet" type="text/css" href="css/admin-dashboard.css">';
      }
      if($_GET['open'] == 'register'){
        echo '<link rel="stylesheet" type="text/css" href="css/admin-register.css">';
      }
      if($_GET['open'] == 'manage'){
        echo '<link rel="stylesheet" type="text/css" href="css/admin-manage.css">';
      }
    }
  ?>
</head>
<body>

<section id="sidebar"> 
  <div class="white-label">
  </div> 
  <div id="sidebar-nav">   
    <ul>
      <form method="get">
        <li><a href="?open=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="?open=manage"><i class="fa fa-desktop"></i> Manage Equipment</a></li>
        <li><a href="?open=register"><i class="fa fa-usd"></i> Register Students</a></li>
      </form>
    </ul>
  </div>
</section>
<section id="content">
  <div id="header">
    <div class="header-nav">
      <div class="menu-button">
        <!--<i class="fa fa-navicon"></i>-->
      </div>
      <div class="nav">
        <ul>
          <li class="nav-profile" style="float: left">
            <div class="nav-profile-image">
              <img src="assets/avatar.png" alt="profile-img" alt="profile image">
              <div class="nav-profile-name"><?php echo $_SESSION['row']['name']; ?><i class="fa fa-caret-down"></i></div>
            </div>
          </li>
          <li>
            <div style="padding: 11px">
              <a href="controller/logout.php">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="content">
    <?php
      if(isset($_GET['open'])){
        if($_GET['open'] == 'dashboard'){
          include("includes/dashboard.php"); 
        }
        if($_GET['open'] == 'manage'){
          include("includes/equipment.php");
        }
        if($_GET['open'] == 'register'){
          include("includes/register.php");
        }
      }

    ?>
  </div>
</section>

</body>
</html>