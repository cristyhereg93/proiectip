<?php
require_once '../config.php';

$return = array();

$id = $_POST['id'];

$query = " WITH summary AS (
                SELECT p.[FirstName], 
                               a.[Temperature],
                               a.[PulseValue],
                               a.[MeasurementDate], 
                               ROW_NUMBER() OVER(PARTITION BY p.[FirstName]
                                                ORDER BY a.[MeasurementDate] DESC) AS rk
                        from {$tables['activity']} as a
                INNER JOIN {$tables['patient']} as p
                ON (a.PUserId = p.PUserId)
                WHERE a.PUserId = {$id}
            )
            SELECT s.*
                  FROM summary s
                  WHERE s.rk = 1";
            
$result = sqlsrv_query($conn, $query) or die(print_r(sqlsrv_errors(), true));
while ($row = sqlsrv_fetch_array($result))
{
    $return['Temp'] = $row['Temperature'];
    $return['Pulse'] = $row['PulseValue'];
}

echo json_encode($return, JSON_FORCE_OBJECT);
?>

