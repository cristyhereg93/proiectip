<?php
require_once '../../config.php';

$id = $_POST['id'];

$query = "SELECT * FROM {$tables['patient']} WHERE PUserId = {$id}";

$result = sqlsrv_query($conn, $query) or die( print_r( sqlsrv_errors(), true));

$array = array();

while ($row = sqlsrv_fetch_array($result))
{
    $array[$row['PUserId']]['first_name'] = $row['FirstName'];
    $array[$row['PUserId']]['last_name'] = $row['LastName'];
    $array[$row['PUserId']]['cnp'] = $row['CNP'];
    $array[$row['PUserId']]['job'] = $row['Job'];
    $array[$row['PUserId']]['proffession'] = $row['Proffession'];
    $array[$row['PUserId']]['email'] = $row['Email'];
    $array[$row['PUserId']]['age'] = $row['Age'];
    $array[$row['PUserId']]['phonenumber'] = $row['PhoneNumber'];
}
if (!empty($array))
{
    echo json_encode($array, JSON_FORCE_OBJECT);
}
else 
{
    echo 0;
}

?>

