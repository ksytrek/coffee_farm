<?php
require('../../../config/connectdb.php');

$resultArray = array();
    try {
        $sql_location_search = "SELECT * FROM `farmers`";
        if ($show_tebelig = Database::query($sql_location_search, PDO::FETCH_ASSOC)) {
            foreach ($show_tebelig  as $row) {
                array_push($resultArray, $row);
            }
            echo json_encode($resultArray);
        }else{
            echo json_encode($resultArray);
        }
    } catch (Exception $e) {
        $resultArray = [
            "error" => $e->getMessage()
        ];
        echo json_encode($resultArray);
    }