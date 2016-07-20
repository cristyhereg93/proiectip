<?php
    require_once '../../config.php';
    
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $email = $_POST['EMail'];
    $CNP = $_POST['CNP'];
    $job = $_POST['Job'];
    $profession = $_POST['Profession'];
    $phone = $_POST['Phone'];
    $age = $_POST['Age'];
    $streetName = $_POST['StreetName'];
    $streetNumber = $_POST['StreetNumber'];
    $city = $_POST['City'];
    $country = $_POST['Country'];
    $postalCode = $_POST['PostalCode'];
    
    $username = $_POST['Username'];
    $password = $_POST['password'];
    
    $DUserId = $_POST['DUserID'];
    
    $password = hash('sha256', $password);
    
    
    $query = "insert into {$tables['identity']}(Username, Password, Role) VALUES ('{$username}','{$password}', 2)";
    sqlsrv_query($conn, $query);
    
    $query = "select [UserId] from {$tables['identity']} where [Username] = '{$username}'";
    $result = sqlsrv_query($conn, $query);
    $row = sqlsrv_fetch_array($result);

    $query = "insert into {$tables['patient']} values ({$row['UserId']}, '{$firstName}', '{$lastName}', '{$CNP}', '{$job}', '{$profession}', '{$email}', '{$age}', '{$phone}', 0, {$DUserId})";
    sqlsrv_query($conn, $query);
    
    
    $query = "insert into {$tables['address']} values({$row['UserId']}, '{$streetName}', {$streetNumber}, '{$city}', '{$country}', {$postalCode})";
    sqlsrv_query($conn, $query);

    header('Location: ../index.php');
?>

