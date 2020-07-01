<?php
//Definir formato de arquivo
header('Content-Type:' . "text/plain");

include '../connection.php';

if (!$con) {
    echo '[{"error": "DB offline"';
    echo '}]';
} else {
    $sql = "SELECT billYear AS year, SUM(billValue) AS totalMonth, month.monthName AS month, users.userName AS user 
    FROM bills,month,users 
    WHERE bills.userId=users.userId AND bills.monthId=month.monthId 
    GROUP BY users.userId, month.monthId 
    ORDER BY TotalMonth DESC";
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
