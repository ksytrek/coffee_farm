<?php 

include_once("../../../config/connectdb.php");

if(isset($_POST['key']) && $_POST['key'] == 'form_edit_Product'){
    $value = $_POST['data'];

    $id_products = $value['id_products'];
    $name_products = htmlspecialchars($value['name_products']);
    $id_typepro = htmlspecialchars($value['id_typepro']);
    $num_stock = htmlspecialchars($value['num_stock']);
    $price_unit = htmlspecialchars($value['price_unit']);
    $image_pro = $value['image_pro'];
    // $harvest_date = $values['harvest_date'];
    $harvest_date = htmlspecialchars($value['harvest_date']);
    $name_image = null;

    $sql_select =  "SELECT * FROM `products` WHERE id_products = '$id_products'";
    $result_select = Database::query($sql_select, PDO::FETCH_ASSOC);
    $row = $result_select->fetch(PDO::FETCH_ASSOC);

    if(strlen($image_pro) > 100){
        unlink('../../../pictures/product/'.$row['image_pro']);
        $name_image = upload_image($image_pro);
    }else{
        $name_image = $image_pro;
    }

    $sql_update = "UPDATE `products` SET `name_products` = '$name_products',
                                         `id_typepro` = '$id_typepro',
                                          `num_stock` = '$num_stock', 
                                          `price_unit` = '$price_unit', 
                                         `image_pro` = '$name_image',
                                         `harvest_date` = '$harvest_date'
                                        WHERE `products`.`id_products` = '$id_products';";
    if(Database::query($sql_update,PDO::FETCH_ASSOC)){
        echo "success";
    }else{
        echo "error";
    }
    

    // print_r($row);
}

if(isset($_POST['key']) && $_POST['key'] == 'update_Status_pro'){
    $id_products = $_POST['id_products'];
    $status = $_POST['status'];
    $id_farmers = $_POST['id_farmers'];



    $sql_update_status = "UPDATE `products` SET `status_products` = '$status' WHERE `products`.`id_products` = '$id_products' ;";

    if(Database::query($sql_update_status,PDO::FETCH_ASSOC)){
        echo 'success';

    }else{
        echo 'error';
    }





}


function upload_image($base64_str):string {

    $name_date = date("Y_m_d_H_i_s").".png";
    try {
        file_put_contents('../../../pictures/product/'.$name_date, base64_decode($base64_str));

    } catch (Exception $e) {
        return "Error: ".$e->getMessage();
    }
    return $name_date;
}


?>