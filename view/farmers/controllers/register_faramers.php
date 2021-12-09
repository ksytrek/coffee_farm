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

    $address_farmers = "เลขที่/หมูที่ ".$input['input-add_number']."ซอย/ถนน ".$input['input-road']."แขวง/ ตำบล ".$input['input-sub_district']."เขต/อำเภอ ".$input['input-district'];
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
    $status_farmers = $input['input-status_farm'];


    
    file_put_contents('../image_farmers/img1.png', base64_decode($image_farmers));

    // echo $image_farmers;
    
    // if ( 0 < $_FILES['file']['error'] ) {
    //     echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    // }
    // else {
    //     move_uploaded_file($_FILES['file']['tmp_name'], './' . $_FILES['file']['name']);
    // }

    
    // echo $input['input-'];

    // $str = " ";
    // foreach($input as $item) { //foreach element in $arr
    //     // $uses = $item['var1']; //etc
    //     $str = $str." , ".$item;
    // }

    // move_uploaded_file($_FILES[$image_farmers]["tmp_name"],$_FILES[$image_farmers]["name"]);
    // echo $image_farmers;
    // file_put_contents("", file_get_contents($image_farmers));


    // echo $image_upload = str_replace( "\\", '/', $image_farmers);
    // $fileName = $_FILES[$input['input-image_farmers']]['name'];
    // //$fileExt = pathinfo($_FILES["inputFile"]["name"], PATHINFO_EXTENSION);
    // $filePath = $fileName;
    // if (move_uploaded_file($_FILES[$input['input-image_farmers']]["tmp_name"], $filePath)) {
    //     echo "Upload success";
    // } else {
    //     echo "Upload failed";
    // }

    // echo $_FILES[$image_farmers]["tmp_name"];    
    // echo $form_data['file'];
}

?>