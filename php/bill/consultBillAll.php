<?php
//Definir formato de arquivo
header('Content-Type:' . "text/plain");

include '../connection.php';

if (!$con) {
    echo '[{"error": "DB offline"';
    echo '}]';
} else {
    $sql = "SELECT billName as name, billYear AS year, billValue AS value, month.monthName AS month
    FROM bills,month
    WHERE bills.monthId=month.monthId  
ORDER BY year,month DESC";
    $result = mysqli_query($con, $sql); 
    $n = mysqli_num_rows($result); 

    if (!$result) {
        echo '[{"error": "No result"';
        echo '}]';
    } else if ($n < 1) {
        '[{"erro": "No item"';
        echo '}]';
    } else {
        while ($n = mysqli_fetch_assoc($result)) {
            $data[] = $n;
        }
        echo json_encode($data, JSON_PRETTY_PRINT);
    }
}
