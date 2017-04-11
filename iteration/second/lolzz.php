<?php
error_reporting(0);
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

	
	if(!empty($_POST['username']) && !empty($_POST['password'])) {
                    $username = mysql_real_escape_string($_POST['username']);
                    $password = mysql_real_escape_string($_POST['password']);
                  
                    /* LIMIT 1: stop searching if you find a match */
                    $query = "SELECT * FROM Users WHERE Username='".$username."' AND Password='".$password."' AND Admin=1 LIMIT 1";
                    $result = mysql_query($query);
                    if(mysql_fetch_array($result))
                    {

                    	setcookie('username',$username,time()+3600,"/");
                    	$_SESSION['username']=$username;
                    	echo "<script>location='Modules/user.php'</script>";
                    	//echo $_COOKIE['username'];
                    }
                    else
                    {
                    	echo "<script>location='index.php'</script>";
                    }

	}
             echo "lol";
  
?>