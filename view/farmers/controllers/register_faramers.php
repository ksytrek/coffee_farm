<?php 

include_once("../../../config/connectdb.php");

if (isset($_POST['key']) && $_POST['key'] == 'form_register_farmers'){

    $input = $_POST['data'];

    $name_farmers = $input['input-name']." ".$input['input-last_name'];
    $email_farmers = $input['input-email_farmers'];
    $pass_farmers = $input['input-pass_farmers'];
    $tel_farmers = $input['input-tel_farmers'];
    $line_farmers = $input['input-line_farmers'];
    $face_farmers = $input['input-face_farmers'];

    $address_farmers = "เลขที่/หมูที่ ".$input['input-add_number']." ซอย/ถนน ".$input['input-road']." แขวง/ ตำบล ".$input['input-sub_district']." เขต/อำเภอ ".$input['input-district'];
    $id_provinces = $input['input-province'];
    $code_provinces = $input['input-post_office'];

    $image_farmers = $input['input-image_farmers']; // รูป

    $num_farm = $input['input-num_farm'];
    $num_field = $input['input-num_field'];

    $lat_farm = $input['input-lat_farm'];
    $lng_farm = $input['input-lng_farm'];

    $organic_farm = $input['input-organic_farm'];
    $type_sale = $input['input-type_sale'];
    $detail_farm = $input['input-detail_farm'];
    
    // $status_farmers = $input['input-status_farm'];


    
    $name_image = upload_image($image_farmers);

    $sql_insert_farmers = "INSERT INTO `farmers` (`id_farmers`, `name_farmers`, `email_farmers`, `pass_farmers`, `tel_farmers`, `line_farmers`, `face_farmers`, `address_farmers`, `id_provinces`, `code_provinces`, `image_farmers`, `num_farm`, `num_field`, `lat_farm`, `lng_farm`, `organic_farm`, `type_sale`, `detail_farm`, `status_farmers`) 
                                        VALUES (NULL, '$name_farmers', '$email_farmers', '$pass_farmers', '$tel_farmers', '$line_farmers', '$face_farmers', '$address_farmers', '$id_provinces', '$code_provinces', '$name_image', '$num_farm', '$num_field', '$lat_farm', '$lng_farm', '$organic_farm', '$type_sale', '$detail_farm', '1');";

    try{
        if(Database::query($sql_insert_farmers,PDO::FETCH_ASSOC)){
            echo "success";
        }else{
            echo "error";
        }
    }catch(Exception $e){
        echo "error";
    }

   
// $sql_insert_farmers = "INSERT INTO `farmers` (`id_farmers`, `name_farmers`, `email_farmers`, `pass_farmers`, `tel_farmers`, `line_farmers`, `face_farmers`, `address_farmers`, `id_provinces`, `code_provinces`, `image_farmers`, `num_farm`, `num_field`, `lat_farm`, `lng_farm`, `organic_farm`, `type_sale`, `detail_farm`, `status_farmers`) 
//                         VALUES (NULL, '1-1', '2@gmail.com', '3', '04', '5', '6', '7', '8', '9', '10.png', '11', '12', '13', '14', '15', '16', '17', '18');";

}

function upload_image($image_farmers):string {

    $name_date = date("Y_m_d_H_i_s").".png";
    file_put_contents('../../../pictures/farmers/'.$name_date, base64_decode($image_farmers));
    return $name_date;
}

?>