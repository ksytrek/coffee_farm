<?php
require("../../../config/connectdb.php");
if(isset($_POST['key']) && $_POST['key'] == 'cancel_transel'){
    // UPDATE `transale` SET `status_transale` = '2' WHERE `transale`.`id_transale` = 49;
    $sql_update = "UPDATE `transale` SET `status_transale` = '4' WHERE `transale`.`id_transale` = {$_POST['id_transale']};";

    if(Database::query($sql_update,PDO::FETCH_ASSOC)){
        echo "success";
    }else{
        echo "error";
    }


}