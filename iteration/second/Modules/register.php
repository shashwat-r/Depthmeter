<!DOCTYPE html>
<html lang="en"><?php

require_once("config.php");

$link = mysql_connect(HOST, USER, PW);
if (!$link) {
    echo "h";
    die ("Error connecting to the database: " . mysql_error());
}

$db_selected = mysql_select_db(DB,$link);
if (!$db_selected) {
    die ("Error selecting the database: " . mysql_error());
}

/* Get the variables from the registration form */
$admin = mysql_real_escape_string($_POST['admin']);
$password = mysql_real_escape_string($_POST['password']);
$username = mysql_real_escape_string($_POST['username']);

/* Check section parameters */
$text_match = "/^[a-zA-Z0-9][a-zA-Z0-9._-]*$/";

$error_flag = false;


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
        <li style="margin-left:20px;"><a href="remove.php">Remove user</a></li>
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
                
    </div>
</div><!-- /.navbar-collapse -->



    <div id="center">
        <div id="navigation">
            <div id="pagenav">
            <?php
        }
            /* Check the registration form parameteres */
            if( $username == '' || $password == '') {
                ?>
                <br>
                <br><p style="color:white;">
                <?php
                echo "Error: one or more form fields are empty!";
                $error_flag = true; 
                mysql_close(); ?>
            </p>
                <br>
            <a style="color:white;" href="add.php">Go back</a> 
            <?php }

            if($error_flag == false && ( !preg_match($text_match, $username))) {
                ?>
                <br>
                <br><p style="color:black;">
                <?php
                echo "Error: Username must start with alphabets only. Username must contain only alpha-numeric characters, '.', '_' and '-' symbols!";
                $error_flag = true; 
                mysql_close(); ?>
            </p>
                <br>
                <a style="color:white;" href="add.php">Go back</a>
            <?php }

            if($error_flag == false && ( strlen($password) < 6 || strlen($password) > 40 )) {
                ?>
                <br>
                <br><p style="color:white;">
                <?php
                echo "The password must be at least 6 characters (max 40 characters)!";
                $error_flag = true;
                mysql_close(); ?>
            </p>
                <br>
                <a style="color:white;" href="add.php">Go back</a>
            <?php } 


            if($error_flag == false && ( strlen($username) < 4 || strlen($username) > 20 )) {
                ?>
                <br>
                <br><p style="color:white;">
                <?php
                echo "The username must be at least 4 characters (max 20 characters)!";
                $error_flag = true;
                mysql_close(); ?>
            </p>
                <br>
                <a style="color:white;" href="add.php">Go back</a>
            <?php } 
            
            if($error_flag == false) {
                /* Check if the username already exists (lock the users database table) */
                if(!mysql_query("LOCK TABLES Users WRITE")) {
                        mysql_close();
                        print mysql_error();
                    }

                /* LIMIT 1: stop searching if you find a match */
                $query = "SELECT Username FROM Users WHERE Username = '".$username."' LIMIT 1";
                $result = mysql_query($query);

                if (!$result) {
                            mysql_query("UNLOCK TABLES");
                            mysql_close();
                        print mysql_error();
                    }
    
                /* The usernmae already exists (unlock the user database table) */
                if(mysql_num_rows($result) != 0) { 
                    mysql_query("UNLOCK TABLES");
                        mysql_close();
                        ?>
                        <br>
                        <br>
                        <p style="color:white;">
                        <?php
                    echo "The username $username is already in use.";
                    ?>
                    <br>
                    <?php
                    echo "Please choose another username";
                    $error_flag = true ?>
                    </p>
                    <br>
                     <a style="color:white;" href="add.php">Go back</a>
                    <?php } ?>
                    <br>
                    <br>
                    <p style="color:white;">
                <?php 

                
            }
            
            if($error_flag == false) {
                /* Insert the user data in the database */
                $query = sprintf("INSERT INTO Users (Username, Password, Admin) VALUES ('%s', '%s', '%s')", $username, $password, $admin);
                $result = mysql_query($query);
                
                if (!$result) {
                                        mysql_query("UNLOCK TABLES");
                                        mysql_close();
                                        print mysql_error();
                                }
                              //  print mysqli_error();

                /* Registration Successful */
                mysql_query("UNLOCK TABLES");
            //  header('Location: ../index.php?succesful');
                echo "Registration successful!";?>
                </p>
                <br>
                <a style="color:white;" href="user.php">Home</a>
            <?php
            }

            ?>
            </div>
        </div>
    </div>
<?php
    

?>
