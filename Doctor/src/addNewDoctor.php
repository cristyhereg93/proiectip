<?php
    require_once '../../config.php';

    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $function = $_POST['Function'];
    $hospital = $_POST['Hospital'];
    
    $username = $_POST['Username'];
    $password = $_POST['password'];
    
    $password = hash('sha256', $password);
    
    
    $query = "INSERT INTO {$tables['identity']}(Username, Password, Role) VALUES ('{$username}','{$password}', 1)";
    sqlsrv_query($conn, $query);
    
    $query = "select [UserId] from {$tables['identity']} where [Username] = '{$username}'";
    $result = sqlsrv_query($conn, $query);
    $row = sqlsrv_fetch_array($result);
    
    $query = "INSERT INTO {$tables['doctor']} VALUES ({$row['UserId']}, '{$firstName}', '{$lastName}', '{$function}', '{$hospital}')";
    sqlsrv_query($conn, $query);
    
    header('Location: ../index.php');
    
?>
