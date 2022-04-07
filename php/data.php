<?php
include "connect.php";
header('Access-Control-Allow-Origin: *');

/* try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dataBase", $userName, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $stmt = $conn->prepare('SELECT id, statusH FROM Potencia');
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($results); 

    

    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
} */

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dataBase", $userName, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT * FROM Potencia';    
    $array = array();
    $array['bar'] = array(
        // $val['id'], $val['status'], "silver"
            ["id", "valor"] 
        );
    foreach ($conn->query($sql) as $row=>$val) {
        $array['data'][$row] = array(
            'id' => $val['id'],
            'status' => $val['statusH']
        );
        array_push($array['bar'],["".$val['id']."",$val['statusH']]);
    }
    echo json_encode($array);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;