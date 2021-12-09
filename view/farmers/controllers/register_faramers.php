<?php 

include_once("../../../config/connectdb.php");

if (isset($_POST['key']) && $_POST['key'] == 'form_register_farmers'){

    // echo $_POST['data'];
    // $input = json_decode($_POST['data'], true);
    $input = $_POST['data'];
    // 

    $name_farmers = $input['name_farmers'];
    $email_farmers = $input['email_farmers'];
    $pass_farmers = $input['pass_farmers'];
    $tel_farmers = $input['tel_farmers'];
    $line_farmers = $input['line_farm'];
    $face_farmers = $input['face_farmers'];

    $address_farmers = $input['address_farmers'];
    $id_provinces = $input['id_provinces'];
    $code_provinces = $input['code_provinces'];

    $image_farmers = $input['image_farmers'];

    $num_farm = $input['num_farm'];
    $num_field = $input['num_field'];

    $lat_farm = $input['lat_farm'];
    $lng_farm = $input['lng_farm'];

    $organic_farm = $input['organic_farm'];
    $type_sale = $input['type_sale'];
    $detail_farm = $input['detail_farm'];
    $status_farmers = $input['status_farm'];
    // echo $input['input-'];

}

?>