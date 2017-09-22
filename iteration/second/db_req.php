<?php
require "db_conn.php";

    $setSql = "SELECT `Id`,`Time_Stamp`,`Level` FROM `Water_Level`";
    $setRec = mysqli_query($conn, $setSql);

    $columnHeader = '';
    $columnHeader = "Sr NO" . "\t" . "Time Stamp" . "\t" . "Level" . "\t";

    $setData = '';

    while ($rec = mysqli_fetch_row($setRec)) {
        $rowData = '';
        foreach ($rec as $value) {
            $value = '"' . $value . '"' . "\t";
            $rowData .= $value;
        }
        $setData .= trim($rowData) . "\n";
    }


    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=Water_Level_Report.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    //sleep(5);

    echo ucwords($columnHeader) . "\n" . $setData . "\n";

 ?>
