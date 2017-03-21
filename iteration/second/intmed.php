<!DOCTYPE html>
<html lang="en">
<?php

require_once("config.php");
require_once("class_session.php");

session_start();

if(isset($_GET['logout'])) {
    session_destroy();
    $_SESSION = NULL;
    header('Location: store.php');
}
if(isset($_GET['logout1'])) {
    session_destroy();
    $_SESSION = NULL;
    header('Location: products.php?logout1');
}

if(isset($_GET['succesful'])) {
    echo "yo";
    ?><div class="alert alert-success">
  <strong>Success!</strong>
</div><?php
}

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

    <title>Heroic Features - Start Bootstrap Template</title>

    
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/heroic-features.css" rel="stylesheet">

    <link href="css/login-css.css" rel="stylesheet">




    <style>
    body{
    background: url('Image/yo.jpg');
    background-repeat:no-repeat;
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

.wrapper {
  text-align:center;
}

.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #272c2d;
  border: none;
  opacity: 0.8%;
  color: #FFFFFF;
  text-align: center;
  font-size: 20px;
  padding: 10px;
  width: 220px;
  transition: all 0.5s;
  cursor: pointer;
  position: absolute;
  top: 66%;
}



.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
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
      <a class="navbar-brand" href="modules/store.php" style="font-size:175%;">Group 007</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li style="margin-left:20px;"><a href="#">Home</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Info<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
        </li>
        <?php
        ?>
      </ul>
    </nav>
      <?php
                    //LOGIN PART
                if(!empty($_POST['username']) && !empty($_POST['password']) && !isset($_SESSION['username'])) {
                    $username = mysql_real_escape_string($_POST['username']);
                    $password = mysql_real_escape_string($_POST['password']);
                    $_POST['username']=NULL;
                    $_POST['password']=NULL;
                    /* LIMIT 1: stop searching if you find a match */
                    $query = "SELECT * FROM Users WHERE Username='".$username."' AND Password='".$password."' LIMIT 1";
                    $result = mysql_query($query);


                   



                   // $_SESSION['log']=1;
                   // echo  $_SESSION['log'];


                    if(!$result) {

                        die ("Query error $query: " . mysql_error());
                    }
                    
                    if(!mysql_num_rows($result)) {
                        mysql_close();
                        //echo $username.$password;
?>
      <div class="login-page">
        <script src="js/login_js.js"></script>
  <div class="form">
    <form class="register-form" action="intmed.php" method="post">
      <input type="text" placeholder="name"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a rel="nofollow" rel="noreferrer"href="#">Sign In</a></p>
    </form>
    <form class="login-form" action="intmed.php" method="post">
      <input type="text" name="username" placeholder="username"/>
      <input type="password" name="password" placeholder="password"/>
      <button type="submit">login</button>
      <p class="message">Not registered? <a rel="nofollow" rel="noreferrer"href="#">Create an account</a></p>
    </form>
  </div>
</div>
        

      <?php
                       header('Location: ../index.php?wrong');
                        

                        $error_flag = true;
                    }
                    else {
                        /* Setup the SESSION */
                        $_SESSION['username'] = $username;
                        ?>
                                 
                <?php
                    } header("HTTP/1.1 302 Found");
header('Location: store.php');
                }
                else if(isset($_SESSION['username'])) {
                    ?>
                   
                        
                <?php
                }
                else {

                    ?>


                   <div class="login-page">
        <script src="js/login_js.js"></script>
  <div class="form">
    <form class="register-form" action="intmed.php" method="post">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button type="submit">create</button>
      <p class="message">Already registered? <a rel="nofollow" rel="noreferrer"href="#">Sign In</a></p>
    </form>
    <form class="login-form" action="intmed.php" method="post">
      <input type="text" name="username" placeholder="username"/>
      <input type="password" name="password" placeholder="password"/>
      <button type="submit">login</button>
      <p class="message">Not registered? <a rel="nofollow" rel="noreferrer"href="#">Create an account</a></p>
    </form>
  </div>
</div>

    
      <?php




                    //session_regenerate_id();
                    //mysql_close();
                    //echo "Session Expired!";
                    //header('Location: ../index.php');
                    //$error_flag = true;             
                }
?>
                


               


               
               
                <?php

                //hello part dropdown

                 if(isset($_SESSION['username'])){?>
                                <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b><?php
                                                                    print "Hello ".$_SESSION['username']; ?></b> <span class="caret"></span></a>
            <li><a href="modules/store.php?logout1">Logout</a></li>
            </ul>
        </li>
      </ul>

                

    </div><!-- /.navbar-collapse -->
  </div>

  
  <div class="wrapper">
    <form action="Modules/display.php" method="post">
    <input type="hidden" id="yo" name="username">
    <input type="hidden" id="dawg" name="password">
    <script>
    var unaam = "<?php echo $_SESSION['username'] ?>";
    var pusswd= "<?php echo $password ?>";
    document.getElementById('yo').value = unaam;
    document.getElementById('dawg').value = pusswd;
  </script>
    <button input="submit" class="button" onclick="javascript:completeAndRedirect();"><span>Proceed Securely</span></button><!-- /.container-fluid -->
    </form>
    <script>
function completeAndRedirect(){
      document.getElementById("myForm").action = "Modules/display.php";
      document.getElementById("myForm").submit();
    
    }
</script>
  </div>        <!-- /.container -->
    
    <br>
    <br>
    <!-- Page Content -->

    <?php
  }

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
