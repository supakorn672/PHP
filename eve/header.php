<!DOCTYPE html>
<html lang="en">
<head>
    <title>Virtual run</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 150px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background: linear-gradient(125deg, #e61b36, #9c1032);
}

.sidenav a {
  padding: 6px 6px 6px 32px;
  text-decoration: none;
  font-size: 15px;
  color: #000;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 200px; /* Same as the width of the sidenav */
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body class="container">
<?php
$pageName = basename($_SERVER['PHP_SELF'], '.php');
  
?>
<nav class="navbar navbar-default" style="background: linear-gradient(125deg, #e61b36, #9c1032);">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="showevent.php" style="color: white;">Virtual run</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <!-- <li <?php echo $pageName == 'index' ? 'class="active"' : '' ?> ><a href="index.php">Products <span class="sr-only">(current)</span></a></li> -->
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
            <?php
            if(isset($_SESSION['account'])){
              ?>
                <li class='user user-menu'>
                  <a href='logout.php' style="color: white;">Logout</a>
                </li>
               <?php 
              
            }
            else{
              ?>
              <?php $_SESSION['error'] = 'You must log in first!';
              header("location: login-register.php"); ?>
              <?php
              
            }
          ?>
            </ul>
        </div>
    </div>
</nav>