<?php 

// include('../../config/connectdb.php');
require_once("../../../config/connectdb.php");

function upload_image($image_farmers):string {

    $name_date = date("Y_m_d_H_i_s").".png";
    try {
        file_put_contents('../../../pictures/farmers/'.$name_date, base64_decode($image_farmers));

    } catch (Exception $e) {
        echo "Error: ".$e->getMessage();
    }
    return $name_date;
}

if(isset($_POST['key']) && $_POST['key'] == 'edit_account_submit'){
    // $data = $_POST['data'];
    $input = $_POST['data'];
    $id_farmers = $_POST['id_farmers'];

    $name_farmers = htmlspecialchars($input['input-name_farmers']);
    $email_farmers = htmlspecialchars($input['input-email_farmers']);
    $tel_farmers = htmlspecialchars($input['input-tel_farmers']);
    $line_farmers = htmlspecialchars($input['input-line_farmers']);
    $face_farmers = htmlspecialchars($input['input-face_farmers']);
    $image_farmers = $input['input-image_farmers'];
    $name_img = null;
    $detail_farm = htmlspecialchars($input['input-detail_farm']);

    $sql_search_farm = "SELECT * FROM farmers WHERE `id_farmers` = '$id_farmers' ";
    $search_result = Database::query($sql_search_farm, PDO::FETCH_ASSOC)->fetch(PDO::FETCH_ASSOC);
    $search_imgName = $search_result['image_farmers'];

    if($image_farmers == null || $image_farmers == 'null'){
        $name_img = $search_imgName;
    }else{
        @unlink("../../../pictures/farmers/".$search_imgName);
        $name_img = upload_image($image_farmers); 
    }

    $sql_update_account = "UPDATE `farmers` SET 
                                `name_farmers` = '$name_farmers', 
                                `email_farmers` = '$email_farmers', 
                                `tel_farmers` = '$tel_farmers', 
                                `face_farmers` = '$face_farmers', 
                                `line_farmers` = '$line_farmers',
                                `image_farmers` = '$name_img'
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

    $address_farmers = htmlspecialchars($input['input-address_farmers']);
    $id_provinces  = htmlspecialchars($input['input-id_provinces']);
    $code_provinces = htmlspecialchars($input['input-code_provinces']);
    $lat_farm = htmlspecialchars($input['input-lat_farm']);
    $lng_farm = htmlspecialchars($input['input-lng_farm']);

    $sql_update_address = "UPDATE `farmers` SET 
                                `address_farmers` = '$address_farmers', 
                                `id_provinces` = '$id_provinces', 
                                `code_provinces` = '$code_provinces', 
                                `lat_farm` = '$lat_farm', 
                                `lng_farm` = '$lng_farm' 
                            WHERE `farmers`.`id_farmers` = '$id_farmers';";
    // print_r($input);
    if(Database::query($sql_update_address,PDO::FETCH_ASSOC)){
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

    $con_pass_farmers_new = htmlspecialchars($input['input-con_pass_farmers_new']);
    $pass_farmers_new  = htmlspecialchars($input['input-pass_farmers_new']);


    $pass_farmers = htmlspecialchars($input['input-pass_farmers']);


    $sql_update_account = "UPDATE `farmers` SET `pass_farmers` = '$pass_farmers_new' WHERE `farmers`.`id_farmers` = '$id_farmers';";
    // print_r($input);

    $sql_search = "SELECT pass_farmers FROM `farmers` WHERE pass_farmers = '$pass_farmers'";
    $row_p = Database::query($sql_search, PDO::FETCH_ASSOC)->fetch(PDO::FETCH_ASSOC);

    if(isset($row_p['pass_farmers']) && $row_p['pass_farmers'] == $pass_farmers){
        // echo "Password already";
        if($con_pass_farmers_new == $pass_farmers_new){
            // echo "success";
            if(Database::query($sql_update_account,PDO::FETCH_ASSOC)){
                echo "success";
            }else{
                echo "error";
            }
        }
    }else{
        echo "รหัสปัจจุบันไม่ถุกต้อง";
    }


}



?>