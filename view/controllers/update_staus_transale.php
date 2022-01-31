<?php
require("../../config/connectdb.php");
$message = null;
if (isset($_POST['key']) && $_POST['key'] == 'update_staus_transale' && $_POST['status'] == '4') {
    // UPDATE `transale` SET `status_transale` = '2' WHERE `transale`.`id_transale` = 49;

    $id_transale = $_POST['id_transale'];

    $sql_search_transalede = "SELECT * FROM `transalede` WHERE id_transale = '$id_transale';";
    foreach (Database::query($sql_search_transalede) as $row) {
        $id_products = $row['id_products'];

        $search_product = "SELECT * FROM `products` WHERE id_products = '$id_products';";
        $row_pro = Database::query(
            $search_product,
            PDO::FETCH_ASSOC
        )->fetch(PDO::FETCH_ASSOC);
        $stock = $row_pro['num_stock'] + $row['num_item'];

        $update_num_stock = "UPDATE `products` SET `num_stock` = '$stock' WHERE `products`.`id_products` = '$id_products';" ;

        if(Database::query($update_num_stock,PDO::FETCH_ASSOC)){

        }else{
            echo  "error";
            exit;
        }
    }



    $sql_update = "UPDATE `transale` SET `status_transale` = '4' WHERE `transale`.`id_transale` = '{$id_transale}';";

    if (Database::query($sql_update, PDO::FETCH_ASSOC)) {
        $message = "success";
    } else {
        $message = "error";
    }



    echo $message;
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