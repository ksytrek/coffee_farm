<?php 

include_once("../../../config/connectdb.php");

if (isset($_POST['key']) && $_POST['key'] == 'form_register_farmers'){

    $input = $_POST['data'];

    $name_farmers = htmlspecialchars($input['input-name'])." ".htmlspecialchars($input['input-last_name']);
    $email_farmers = htmlspecialchars($input['input-email_farmers']);
    $pass_farmers = htmlspecialchars($input['input-pass_farmers']);
    $tel_farmers = htmlspecialchars($input['input-tel_farmers']);
    $line_farmers = htmlspecialchars($input['input-line_farmers']);
    $face_farmers = htmlspecialchars($input['input-face_farmers']);

    $address_farmers = "เลขที่/หมูที่ ".$input['input-add_number']." ซอย/ถนน ".$input['input-road']." แขวง/ ตำบล ".$input['input-sub_district']." เขต/อำเภอ ".$input['input-district'];
    $id_provinces = htmlspecialchars($input['input-province']);
    $code_provinces =htmlspecialchars($input['input-post_office']);

    $image_farmers = $input['input-image_farmers']; // รูป

    $num_farm = htmlspecialchars($input['input-num_farm']);
    $num_field = htmlspecialchars($input['input-num_field']);

    $lat_farm = htmlspecialchars($input['input-lat_farm']);
    $lng_farm = htmlspecialchars($input['input-lng_farm']);

    $organic_farm = htmlspecialchars($input['input-organic_farm']);
    $type_sale = htmlspecialchars($input['input-type_sale']);
    $detail_farm = htmlspecialchars($input['input-detail_farm']);
    
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
// check_email_farmers_acc
if(isset($_POST['key']) && $_POST['key'] == 'check_email_farmers'){
    // echo 'Please';
    $email_farmers = $_POST["email_farmers"];

    $sql = "SELECT COUNT(*) as 'count' FROM `farmers` WHERE email_farmers = '$email_farmers';";

    // echo $num_trade_reg;
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
if(isset($_POST['key']) && $_POST['key'] == 'check_email_farmers_acc'){
    // echo 'Please';
    $email_farmers = $_POST["email_farmers"];
    $id_farmers = $_POST["id_farmers"];

    $sql_search_farmers = "SELECT * FROM `farmers` WHERE id_farmers = '$id_farmers'";
    $resu_row = Database::query($sql_search_farmers, PDO::FETCH_ASSOC)->fetch(PDO::FETCH_ASSOC);


    if($resu_row['email_farmers'] == $email_farmers){
        echo '0';
    }else{
        $sql = "SELECT COUNT(*) as 'count' FROM `farmers` WHERE email_farmers = '$email_farmers';";
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
function upload_image($image_farmers):string {

    $name_date = date("Y_m_d_H_i_s").".png";
    try {
        file_put_contents('../../../pictures/farmers/'.$name_date, base64_decode($image_farmers));

    } catch (Exception $e) {
        echo "Error: ".$e->getMessage();
    }
    return $name_date;
}


if(isset($_POST['key']) && $_POST['key'] == 'get_provinces'){
    $id_provinces = $_POST['id_provinces'];
    // echo $id_code;
    $resultArray = array();
    try {
        $sql = "SELECT * FROM `provinces` WHERE `id_provinces` = '$id_provinces';";
        if ($show_tebelig = Database::query($sql, PDO::FETCH_ASSOC)) {
            foreach ($show_tebelig  as $row) {
                array_push($resultArray, $row);
            }
            echo json_encode($resultArray);
        }else{
            echo json_encode($resultArray);
        }
    } catch (Exception $e) {
        $resultArray = [
            "error" => $e->getMessage()
        ];
        echo json_encode($resultArray);
    }
}

?>