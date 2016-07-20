<?php
require_once 'config.php';

session_start();
unset($_SESSION['SESS_ERR']);

$username = $_POST['username'];
$password = $_POST['password'];


if (empty($username) || empty($password)) {
    $_SESSION['SESS_ERR'] = 'Please fill all forms !';
    session_write_close();
    header('location: index.php');
}


$password = hash('sha256', $password);


$query = "SELECT * FROM {$tables['identity']} WHERE username = '{$username}' and password = '{$password}'";

$result = sqlsrv_query($conn, $query) or die( print_r( sqlsrv_errors(), true));
$row = sqlsrv_fetch_array($result);
 
if (empty($row)) {
    $_SESSION['SESS_ERR'] = 'Invalid username or password !';
    header('location: index.php');
} else {
    $_SESSION['SESS_USER'] = $row['Username'];
    $_SESSION['SESS_ID'] = $row['UserId'];
    if ($row['Role'] == 0 || $row['Role'] == 1)
    {
        $_SESSION['SESS_ROLE'] = $row['Role'];
        header('location: Doctor/index.php');
    }elseif ($row['Role'] == 2){
        header('location: Pacient/pacient.php');
    }
}
?>


