<?php
require("../../../config/connectdb.php");
if(isset($_POST['key']) && $_POST['key'] == 'update_staus_transale' && $_POST['status'] == '4'){
    // UPDATE `transale` SET `status_transale` = '2' WHERE `transale`.`id_transale` = 49;
    $sql_update = "UPDATE `transale` SET `status_transale` = '4' WHERE `transale`.`id_transale` = {$_POST['id_transale']};";

    if(Database::query($sql_update,PDO::FETCH_ASSOC)){
        echo "success";
    }else{
        echo "error";
    }

}
if(isset($_POST['key']) && $_POST['key'] == 'update_staus_transale' && $_POST['status'] == '2'){
    // UPDATE `transale` SET `status_transale` = '2' WHERE `transale`.`id_transale` = 29;
    $sql_update = "UPDATE `transale` SET `status_transale` = '2' WHERE `transale`.`id_transale` = {$_POST['id_transale']};";

    if(Database::query($sql_update,PDO::FETCH_ASSOC)){
        echo "success";
    }else{
        echo "error";
    }

}
if(isset($_POST['key']) && $_POST['key'] == 'update_staus_transale' && $_POST['status'] == '3'){
    // UPDATE `transale` SET `status_transale` = '3' WHERE `transale`.`id_transale` = 39;
    $sql_update = "UPDATE `transale` SET `status_transale` = '3' WHERE `transale`.`id_transale` = {$_POST['id_transale']};";

    if(Database::query($sql_update,PDO::FETCH_ASSOC)){
        echo "success";
    }else{
        echo "error";
    }

}