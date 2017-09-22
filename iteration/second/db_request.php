<?php 

shell_exec('./db.sh');
//echo json_encode("http://172.24.1.1/filename.csv");
header("Location: http://172.24.1.1/filename.csv");
?>
