<?php
    require_once '../../config.php';
    
    $id = $_POST['id'];

    $query = "select TOP(50) * from {$tables['activity']} WHERE [PUserId] = {$id} ORDER BY [MeasurementDate] DESC";
    
    $result = sqlsrv_query($conn, $query);
    
    $return = array();
    
    while ($row = sqlsrv_fetch_array($result))
    {
        $return[$row['Id']]['PulseValue'] = $row['PulseValue'];   
        $return[$row['Id']]['Temperature'] = $row['Temperature'];  
        $return[$row['Id']]['Date'] = date_format($row['MeasurementDate'], 'Y-m-d H:i:s');  
        $return[$row['Id']]['Status'] = $row['Status'];  
    }
    
    
    if (!empty($return))
    {
        echo json_encode($return, JSON_FORCE_OBJECT);
    }
    else 
    {
        echo 0;
    }
    
?>