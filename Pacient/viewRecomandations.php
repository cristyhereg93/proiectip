<?php
    require_once '../config.php';
    
    $id = $_GET['p'];
    
    $query = "select Date, Diagnostic, Recomandation from {$tables['medicalReport']} where [UserId] = {$id}";
    $result = sqlsrv_query($conn, $query);
    
    echo "<h2>Istoric Medical</h2><hr/>";
    echo "<table class='hoverTable' style='width: 80%; margin-left: 10%;'>";
    echo "<tr><th>Data</th> <th>Diagnostic</th> <th>Recomandare</th></tr>";
    while ($row = sqlsrv_fetch_array($result))
    {
        echo "<tr>";
        echo 
            "<td>" . date_format($row['Date'], 'Y-m-d H:i:s') . "</td>".
            "<td>" . $row['Diagnostic'] . "</td>".
            "<td>" . $row['Recomandation'] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
?>
