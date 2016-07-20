<?php
    require_once '../../config.php';
    
    $PUserID = $_POST['PUserID'];
    $DUserID = $_POST['DUserID'];
    $alarmName = $_POST['AlarmName'];
    $signalName = $_POST['SignalName'];
    $operator = $_POST['Operator'];
    $value = $_POST['Value'];
    
    if ($_POST['Comments'] != '')
    {
        $comments = $_POST['Comments']; 
    }
    else
    {
        $comments = "No comments";
    }
    
    
    
    $query = "insert into {$tables['alarms']}(DoctorId,TargetedPatientId,AlarmName,SignalName,Operator,Value,Comments) VALUES ({$DUserID},{$PUserID}, '{$alarmName}', '{$signalName}', '{$operator}', {$value}, '{$comments}')";
    sqlsrv_query($conn, $query);

    header('Location: ../index.php');
?>

