<?php
    require_once '../../config.php';

    $PUserId = $_POST['id'];
    
    
    $query = "delete from {$tables['identity']} where [UserId] = {$PUserId}";
    sqlsrv_query($conn, $query);
    
    $query = "delete from {$tables['patient']} where [PUserId] = {$PUserId}";
    sqlsrv_query($conn, $query);
    
    $query = "delete from {$tables['address']} where [UserId] = {$PUserId}";
    sqlsrv_query($conn, $query);
    
    $query = "delete from {$tables['activity']} where [PUserId] = {$PUserId}";
    sqlsrv_query($conn, $query);
    
    $query = "delete from {$tables['medicalReport']} where [UserId] = {$PUserId}";
    sqlsrv_query($conn, $query);
    
    $query = "delete from {$tables['alarms']} where [TargetedPatientId] = {$PUserId}";
    sqlsrv_query($conn, $query);
    
    echo 1;
?>
