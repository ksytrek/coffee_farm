<?php 

require_once("../../../config/connectdb.php");
$mg_success = null ;

// print_r($_POST['sel']);

if(isset($_POST['key']) && $_POST['key'] == 'add_trnsale'){
    // $json = $_POST['data'];
    $sel = $_POST['sel'];
    $id_roasters = $_POST['id_roasters'];

    $id_farmers = null;

    $index = 0;
    foreach($sel as $value){
        $sum_price = null;
        $id_transale = null;

        $id_farmers = $value[0]['id_farmers'];
        // $sum_price = $value[$index]['sum_price'];
        foreach($value as $sel_list){
            //     echo $sel_list['id_roasters'];
            $sum_price = $sum_price + $sel_list['sum_price'];
            $id_products = $sel_list['id_products'];
            $num_item = $sel_list['num_item'];
            $search_product = "SELECT * FROM `products` WHERE id_products = '$id_products';";
            $row_pro = Database::query($search_product, PDO::FETCH_ASSOC)->fetch(PDO::FETCH_ASSOC);
            $stock = $row_pro['num_stock'] - $num_item;
            if($stock < 0 ){
                echo "สินค้า : ".$row_pro['name_products']." "."มีจำนวนสินค้าในสต็อกไม่เพียงพอ";
                exit;
            }else if($stock == 0){
                $update_staus = "UPDATE `products` SET `status_products` = '0' WHERE `products`.`id_products` = '$id_products';" ;
                Database::query($update_staus,PDO::FETCH_ASSOC);
            }

            
        }

        $time =  date("Y-m-d h:i:sa");
        // 2021-12-27 08:50:24.000000
        // current_timestamp()
        $sql_insert_transale = "INSERT INTO `transale` (`id_transale`, `date_transale`, `id_farmers`, `id_roasters`, `sum_price`, `status_transale`) VALUES (NULL, '$time' , '$id_farmers', '$id_roasters', '$sum_price', '1');";
        
        if(Database::query($sql_insert_transale,PDO::FETCH_ASSOC)){
            $sql_select_transale = "SELECT * FROM `transale` WHERE date_transale = '$time' AND id_farmers = '$id_farmers' AND id_roasters = '$id_roasters' AND sum_price = '$sum_price'";
            $result = Database::query($sql_select_transale, PDO::FETCH_ASSOC)->fetch(PDO::FETCH_ASSOC);
            $id_transale =  $result['id_transale'];

            // exit;
            foreach($value as $sel_list){
                $id_products = $sel_list['id_products'];
                $num_item = $sel_list['num_item'];
                $price_tran = $sel_list['price_unit'];

                $search_product = "SELECT * FROM `products` WHERE id_products = '$id_products';";
                $row_pro = Database::query($search_product, PDO::FETCH_ASSOC)->fetch(PDO::FETCH_ASSOC);
                $stock = $row_pro['num_stock'] - $num_item;
                $update_num_stock = "UPDATE `products` SET `num_stock` = '$stock' WHERE `products`.`id_products` = '$id_products';" ;

                $sql_insert_transale_de = "INSERT INTO `transalede` (`id_transalede`, `id_transale`, `id_products`, `num_item`, `price_tran`) VALUES (NULL, '$id_transale', '$id_products', '$num_item', '$price_tran');";
                if(Database::query($sql_insert_transale_de,PDO::FETCH_ASSOC) && Database::query($update_num_stock,PDO::FETCH_ASSOC)){
                    $mg_success =  true;
                }

                // $sql_insert_transale_de = "INSERT INTO `transalede` (`id_transalede`, `id_transale`, `id_products`, `num_item`, `price_tran`) VALUES (NULL, '{$sel_list['']}', '1', '1', '1200');"
            }
        }

        

        $index++;
        
    }

    if($mg_success == true){
        echo "success";
    }else{
        echo "error";
    }



}
