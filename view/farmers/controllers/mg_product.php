<?php 

// include (dirname(__FILE__)."../../../../config/connectdb.php");
include_once(__DIR__.'../../../../config/connectdb.php');
// include_once("../../../config/connectdb.php");

if(isset($_POST['key']) && $_POST['key'] == "form_addProduct"){
    // echo "Add Product1111";

    $values = $_POST['data'];

    $name_products = htmlspecialchars($values['name_products']);
    $id_typepro = htmlspecialchars($values['id_typepro']);
    $num_stock = htmlspecialchars($values['num_stock']);
    $price_unit = htmlspecialchars($values['price_unit']);
    $id_farmers = $values['id_farmers'];
    $image_pro = $values['image_pro'];
    $harvest_date = $values['harvest_date'];
    $name_image_pro = upload_image($image_pro);

    $status_products = "1";


    $sql = "INSERT INTO `products` (`id_products`, `name_products`, `id_typepro`, `num_stock`, `price_unit`,  `id_farmers`, `image_pro`,`harvest_date`) 
                                 VALUES (NULL, '$name_products', '$id_typepro', '$num_stock', '$price_unit', '$id_farmers', '$name_image_pro','$harvest_date');";

    try {
        if (Database::query($sql, PDO::FETCH_ASSOC)) {
            echo "success";
        } else {
            echo "error";
        }
    } catch (Exception $e) {
        echo "error".$e->getMessage();
    }
}

function upload_image($image_farmers):string {

    $name_date = date("Y_m_d_H_i_s").".png";
    // @mkdir("../../../pictures/product");
    @mkdir("../../../pictures/product", 0755, true);
    @file_put_contents('../../../pictures/product/'.$name_date, base64_decode($image_farmers));
    return $name_date;
}

?>