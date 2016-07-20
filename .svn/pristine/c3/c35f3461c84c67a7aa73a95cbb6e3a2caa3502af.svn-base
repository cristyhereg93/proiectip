<?php
    require_once "../../config.php";
    
    $username = $_POST['username'];
    
    $query = "select * from {$tables['identity']} where [Username] = '{$username}'";
    
    $result = sqlsrv_query($conn, $query);
    
    $row = sqlsrv_fetch_array($result);
    
    if (!empty($row) )
    {
        echo 1;
    }else{
        echo 0;
    }

?>
