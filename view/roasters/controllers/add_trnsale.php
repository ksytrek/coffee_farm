<?php 

require('../../../config/connectdb.php');
$mg_success = null ;


if(isset($_POST['key']) && $_POST['key'] == 'add_trnsale'){
    // $json = $_POST['data'];
    $sel = $_POST['sel'];
    $id_roasters = $_POST['id_roasters'];


    // $array = json_decode($json);
    // $value = json_decode(json_encode($array), true);
    // print_r($sel);


    $id_farmers = null;
   
    $index = 0;
    foreach($sel as $value){
        $sum_price = null;
        $id_transale = null;

        $id_farmers = $value[$index]['id_farmers'];
        // $sum_price = $value[$index]['sum_price'];
        foreach($value as $sel_list){
            //     echo $sel_list['id_roasters'];
            $sum_price = $sum_price + $sel_list['sum_price'];
        }

        $time =  date("Y-m-d h:i:sa");
        // 2021-12-27 08:50:24.000000
        // current_timestamp()
        $sql_insert_transale = "INSERT INTO `transale` (`id_transale`, `date_transale`, `id_farmers`, `id_roasters`, `sum_price`, `status_transale`) VALUES (NULL, '$time' , '$id_farmers', '$id_roasters', '$sum_price', '1');";
        if(Database::query($sql_insert_transale,PDO::FETCH_ASSOC)){
            $sql_select_transale = "SELECT * FROM `transale` WHERE date_transale = '$time' AND id_farmers = '$id_farmers' AND id_roasters = '$id_roasters' AND sum_price = '$sum_price'";
            $result = Database::query($sql_select_transale, PDO::FETCH_ASSOC)->fetch(PDO::FETCH_ASSOC);
            $id_transale =  $result['id_transale'];
        }

        foreach($value as $sel_list){
            $id_products = $sel_list['id_products'];
            $num_item = $sel_list['num_item'];
            $price_tran = $sel_list['price_unit'];

            $sql_insert_transale_de = "INSERT INTO `transalede` (`id_transalede`, `id_transale`, `id_products`, `num_item`, `price_tran`) VALUES (NULL, '$id_transale', '$id_products', '$num_item', '$price_tran');";
            if(Database::query($sql_insert_transale_de,PDO::FETCH_ASSOC)){
                $mg_success =  true;
            }

            // $sql_insert_transale_de = "INSERT INTO `transalede` (`id_transalede`, `id_transale`, `id_products`, `num_item`, `price_tran`) VALUES (NULL, '{$sel_list['']}', '1', '1', '1200');"
        }

        $index++;
        
    }

    if($mg_success == true){
        echo "success";
    }else{
        echo "error";
    }



}


?>