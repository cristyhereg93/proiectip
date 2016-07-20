<?php
    require_once '../../config.php';
    
    date_default_timezone_set("Europe/Bucharest");
    
    $id = $_POST['PUserID'];
    $diagnostic = $_POST['Diagnostic'];
    $recomandation = $_POST['Recomandation'];
    
    $micro_date = microtime();
    $date_array = explode(" ",$micro_date);
    $date = date("Y-m-d H:i:s",$date_array[1]);
    $millisec = explode(".",$date_array[0]);
    
    $currentDate = "$date." . substr($millisec[1],0,3);
    
    
    $query = "insert into {$tables['medicalReport']} VALUES ({$id},'{$diagnostic}', '{$recomandation}', '{$currentDate}')";
    sqlsrv_query($conn, $query);

    header('Location: ../index.php');
?>

