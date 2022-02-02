<?php 

// include('../../config/connectdb.php');
require_once("../../../config/connectdb.php");

if(isset($_POST['key']) && $_POST['key'] == 'edit_account_submit'){
    // $data = $_POST['data'];
    $input = $_POST['data'];
    $id_farmers = $_POST['id_farmers'];

    $name_farmers = $input['input-name_farmers'];
    $email_farmers = $input['input-email_farmers'];
    $tel_farmers = $input['input-tel_farmers'];
    $line_farmers = $input['input-line_farmers'];
    $face_farmers = $input['input-face_farmers'];
    $image_farmers = $input['input-image_farmers'];
    $detail_farm = $input['input-detail_farm'];
    $name_img = upload_image($image_farmers);

    $sql_update_account = "UPDATE `farmers` SET 
                                `name_farmers` = '$name_farmers', 
                                `email_farmers` = '$email_farmers', 
                                `tel_farmers` = '$tel_farmers', 
                                `face_farmers` = '$face_farmers', 
                                `line_farmers` = '$line_farmers' 
                            WHERE `farmers`.`id_farmers` = '$id_farmers';";
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
    $id_farmers = $_POST['id_farmers'];

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
                            WHERE `roasters`.`id_farmers` = '$id_farmers';";
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
    $id_farmers = $_POST['id_farmers'];

    $con_pass_new = $input['input-con_pass_new'];
    $pass_new  = $input['input-pass_new'];


    $password = $input['input-password'];


    $sql_update_account = "UPDATE `roasters` SET `pass_roasters` = '$pass_new' WHERE `roasters`.`id_farmers` = '$id_farmers';";
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
        echo "error";
    }


}


function upload_image($image_farmers):string {

    $name_date = date("Y_m_d_H_i_s").".png";
    try {
        file_put_contents('../../../pictures/farmers/'.$name_date, base64_decode($image_farmers));

    } catch (Exception $e) {
        echo "Error: ".$e->getMessage();
    }
    return $name_date;
}
?>