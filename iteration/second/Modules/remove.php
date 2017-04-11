<!DOCTYPE html>
<html lang="en">
<?php

session_start();
require_once("config.php");

$link = mysql_connect(HOST, USER, PW);
if (!$link) {
    die ("Error connecting to the database: " . mysql_error());
}

$db_selected = mysql_select_db(DB,$link);
if (!$db_selected) {
    die ("Error selecting the database: " . mysql_error());
}

$error_flag = false;

//include("header.html");
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/heroic-features.css" rel="stylesheet">


    <link href="css/style.css" rel="stylesheet">




    <style>
    body{
    background: url('Image/yo.jpg');

    background-size:100%;
    padding:50px;
}

#login-dp{
    min-width: 250px;
    padding: 14px 14px 0;
    overflow:hidden;
    background-color:rgba(255,255,255,.8);
}
#login-dp .help-block{
    font-size:12px    
}
#login-dp .bottom{
    background-color:rgba(255,255,255,.8);
    border-top:1px solid #ddd;
    clear:both;
    padding:14px;
}
#login-dp .social-buttons{
    margin:12px 0    
}
#login-dp .social-buttons a{
    width: 49%;
}
#login-dp .form-group {
    margin-bottom: 10px;
}
.btn-fb{
    color: #fff;
    background-color:#3b5998;
}
.btn-fb:hover{
    color: #fff;
    background-color:#496ebc 
}
.btn-tw{
    color: #fff;
    background-color:#55acee;
}
.btn-tw:hover{
    color: #fff;
    background-color:#59b5fa;
}
@media(max-width:768px){
    #login-dp{
        background-color: inherit;
        color: #fff;
    }
    #login-dp .bottom{
        background-color: inherit;
        border-top:0 none;
    }
}

.table-fixed {
    vertical-align: middle;
    max-width: 600px;
}

.table-fixed thead {
  width: 100%;
}
.table-fixed tbody {
  height: 230px;
  overflow-y: auto;
  width: 100%;
}
.table-fixed thead, .table-fixed tbody, .table-fixed tr, .table-fixed td, .table-fixed th {
  display: block;
}
.table-fixed tbody td, .table-fixed thead > tr> th {
  float: left;
  border-bottom-width: 0;
}

    </style>

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <!-- /.navbar-collapse -->
        <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="user.php" style="font-size:175%;">Group 007</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li style="margin-left:20px;"><a href="user.php">Home</a></li>
        <li style="margin-left:20px;"><a href="view.php">View user</a></li>
        <li style="margin-left:20px;"><a href="add.php">Add user</a></li>
        <li style="margin-left:20px;"><a href="#">Remove user</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Info<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
        </li>
      </ul>
  </nav>
      <?php
                    //LOGIN PART
                if(isset($_POST['username'])) {                   
                    $username = mysql_real_escape_string($_POST['username']);
                    $_POST['username']=NULL;
                    $cookie_user="username";
                    $cookie_value=$username;
                    setcookie("ida", $username, time()+3600, "/","", 0);
                }
?>
                


               


               
               
                <?php
                //hello part dropdown

                if(isset($_SESSION['username'])){ ?>
                                <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b><?php
                                                                    print "Hello ".$_SESSION['username']; ?></b> <span class="caret"></span></a>
            <ul id="login-dp" class="dropdown-menu">
            <li><a href="../index.php">Logout</a></li>
            </ul>
        </li>
      </ul>
                
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
    <br>
    <br>    <!-- /.container -->
    </nav>
    <form class="" action="deregister.php" method="post">
    <input type="hidden" id="yo" name="username">
    <input type="hidden" id="dawg" name="password">
<script type="text/javascript">
    var unaam = " <?php echo $_SESSION['username'] ?> ";
    var pusswd= "<?php echo $_POST['password'] ?>";
    document.getElementById('yo').value = unaam;
    document.getElementById('dawg').value = pusswd;
</script>
  <div class="form-group">
    <label for="username1">Enter username to be removed:</label>
    <input type="text" class="form-control" id="username" name="username1">
  </div>
  <button type="submit" class="btn btn-default">Remove</button>
</form>
            <?php 
    }
    ?>
            
            
    
    
    <br>
    <br>
    <!-- Page Content -->

    <?php


    require_once("config.php");
require_once("class_session.php");

session_start();
if(isset($_SESSION['username']))   
                  
    header('Location: modules/store.php');

if(isset($_GET['succesful'])) {
    //echo "yo";
    ?><div class="alert alert-success">
  <strong>Success!</strong> Login Now.
</div><?php
}
if(isset($_GET['wrong'])) {
    //echo "yo";
    ?><div class="alert alert-danger">
  <strong>Wrong credentials!</strong> Login Now.
</div><?php
}
//echo $_SESSION['username'];
?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>



</body>

</html>
