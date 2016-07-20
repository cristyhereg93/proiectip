<?php
    require_once '../../config.php';
    
    $id = $_POST['id'];
    
    
    $query = "delete from {$tables['medicalReport']} where [Id] = {$id}";
    sqlsrv_query($conn, $query);

    echo 1;
?>

