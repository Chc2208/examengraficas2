<?php
include "connect.php";
header('Access-Control-Allow-Origin: *');

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dataBase", $userName, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT * FROM Potencia';
    //$sql = 'SELECT reg_date, status FROM statusT ORDER BY reg_date DESC LIMIT 1';

    foreach ($conn->query($sql) as $row) 
    {
        echo "<tr>";

            echo "<td>";
            echo $row['id'];
            echo "</td>";

            echo "<td>";
            echo $row['statusH'];
            echo "</td>";

            echo "<td>";
            echo $row['reg_date'];
            echo "</td>";

        echo "</tr>";
    }

    $conn->exec($sql);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;