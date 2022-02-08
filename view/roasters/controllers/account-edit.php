<?php 

// include('../../config/connectdb.php');
require_once("../../../config/connectdb.php");

if(isset($_POST['key']) && $_POST['key'] == 'edit_account_submit'){
    // $data = $_POST['data'];
    $input = $_POST['data'];
    $id_roasters = $_POST['id_roasters'];

    $name_roasters = $input['input-name_roasters'];
    $num_trade_reg = $input['input-num_trade_reg'];
    $name_entrep = $input['input-name_entrep'];
    $e_mail_roasters = $input['input-e_mail_roasters'];
    $detail_roasters = $input['input-detail_roasters'];
    $tel_roasters = $input['input-tel_roasters'];

    $sql_update_account = "UPDATE `roasters` SET 
                                `name_roasters` = '$name_roasters', 
                                `num_trade_reg` = '$num_trade_reg', 
                                `name_entrep` = '$name_entrep', 
                                `detail_roasters` = '$detail_roasters', 
                                `tel_roasters` = '$tel_roasters', 
                                `e_mail_roasters` = '$e_mail_roasters' 
                            WHERE `roasters`.`id_roasters` = '$id_roasters';";
    // print_r($input);
    if(Database::query($sql_update_account,PDO::FETCH_ASSOC)){
        echo "success";
    }else{
        echo "error";
    }


}

// button-payment-address
if(isset($_POST['key']) && $_POST['key'] == 'button-payment-address'){
    // $data = $_POST['data'];
    $input = $_POST['data'];
    $id_roasters = $_POST['id_roasters'];

    $address_office = $input['input-address_office'];
    $id_provinces  = $input['input-id_provinces'];
    $code_provinces = $input['input-code_provinces'];
    $lat_roasters = $input['input-lat_roasters'];
    $lng_roasters = $input['input-lng_roasters'];

    $sql_update_account = "UPDATE `roasters` SET 
                                `address_office` = '$address_office', 
                                `id_provinces` = '$id_provinces', 
                                `code_provinces` = '$code_provinces', 
                                `lat_roasters` = '$lat_roasters', 
                                `lng_roasters` = '$lng_roasters' 
                            WHERE `roasters`.`id_roasters` = '$id_roasters';";
    // print_r($input);
    if(Database::query($sql_update_account,PDO::FETCH_ASSOC)){
        echo "success";
    }else{
        echo "error";
    }


}

// button-change-password
if(isset($_POST['key']) && $_POST['key'] == 'button-change-password'){
    // $data = $_POST['data'];
    $input = $_POST['data'];
    $id_roasters = $_POST['id_roasters'];

    $con_pass_new = $input['input-con_pass_new'];
    $pass_new  = $input['input-pass_new'];


    $password = $input['input-password'];


    $sql_update_account = "UPDATE `roasters` SET `pass_roasters` = '$pass_new' WHERE `roasters`.`id_roasters` = '$id_roasters';";
    // print_r($input);
    $sql_search = "SELECT pass_roasters FROM `roasters` WHERE pass_roasters = '$password'";
    $row_p = Database::query($sql_search, PDO::FETCH_ASSOC)->fetch(PDO::FETCH_ASSOC);

    if(isset($row_p['pass_roasters']) && $row_p['pass_roasters'] == $password){
        // echo "Password already";
        if($con_pass_new == $pass_new){
            // echo "success";
            if(Database::query($sql_update_account,PDO::FETCH_ASSOC)){
                echo "success";
            }else{
                echo "error";
            }
        }
    }else{
        echo "error-1";
    }


}


if(isset($_POST['key']) && $_POST['key'] == 'check_num_trade_reg'){
    // echo 'Please';
    $num_trade_reg = $_POST["num_trade_reg"];
    $id_roasters = $_POST["id_roasters"];

    $sql_search_roasters = "SELECT * FROM `roasters` WHERE $id_roasters = '$id_roasters'";
    $resu_row = Database::query($sql_search_roasters, PDO::FETCH_ASSOC)->fetch(PDO::FETCH_ASSOC);


    if($resu_row['num_trade_reg'] == $num_trade_reg){
        echo '0';
    }else{
        $sql = "SELECT COUNT(*) as 'count' FROM `roasters` WHERE num_trade_reg = '$num_trade_reg';";
        try {
            $search = Database::query($sql,PDO::FETCH_ASSOC)->fetch();
            if($search['count'] == 0) {
                echo $search['count'];
            }else{
                echo $search['count'];
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

if(isset($_POST['key']) && $_POST['key'] == 'check_e_mail_roasters'){
    // echo 'Please';
    $e_mail_roasters = $_POST["e_mail_roasters"];
    $id_roasters = $_POST["id_roasters"];

    $sql_search_roasters = "SELECT * FROM `roasters` WHERE $id_roasters = '$id_roasters'";
    $resu_row = Database::query($sql_search_roasters, PDO::FETCH_ASSOC)->fetch(PDO::FETCH_ASSOC);


    if($resu_row['e_mail_roasters'] == $e_mail_roasters){
        echo '0';
    }else{
        $sql = "SELECT COUNT(*) as 'count' FROM `roasters` WHERE e_mail_roasters = '$e_mail_roasters';";
        try {
            $search = Database::query($sql,PDO::FETCH_ASSOC)->fetch();
            if($search['count'] == 0) {
                echo $search['count'];
            }else{
                echo $search['count'];
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
